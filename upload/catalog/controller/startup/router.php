<?php
// *	@copyright	OPENCART.PRO 2011 - 2022.
// *	@forum		http://forum.opencart.pro
// *	@source		See SOURCE.txt for source and other copyright.
// *	@license	GNU General Public License version 3; see LICENSE.txt

class ControllerStartupRouter extends Controller {
	public function index() {
		// Route
		if (isset($this->request->get['route']) && $this->request->get['route'] != 'startup/router') {
			$route = $this->request->get['route'];
		} else {
			$route = $this->config->get('action_default');
		}

		// Sanitize the call
		$route = preg_replace('/[^a-zA-Z0-9_\/]/', '', (string)$route);

		$config_seo_url_hide_controller = $this->config->get('config_action_not_found');
		if ($config_seo_url_hide_controller) {
			if (strpos($config_seo_url_hide_controller, $this->request->get['route'] . "\r\n") !== false) {
				$route = $this->config->get('action_error');
			} elseif (strpos($config_seo_url_hide_controller, $this->request->get['route'] . "|") !== false) {
				$hide_controller = explode("\r\n", $config_seo_url_hide_controller);
				foreach ($hide_controller as $result) {
					if (strpos($result, $this->request->get['route'] . '|') !== false && strpos($this->request->server['REQUEST_URI'], ltrim(strstr($result, '|'), '|')) !== false) {
						$route = $this->config->get('action_error');
					}
				}
			} elseif (strpos($config_seo_url_hide_controller, "#|") !== false) {
				$hide_controller = explode("\r\n", $config_seo_url_hide_controller);
				foreach ($hide_controller as $result) {
					if (strpos($result, '#|') !== false && strpos($this->request->server['REQUEST_URI'], ltrim(strstr($result, '|'), '|')) !== false) {
						$route = $this->config->get('action_error');
					}
				}
			}
			$this->config->set('config_action_not_found', false);
		}

		// Trigger the pre events
		$result = $this->event->trigger('controller/' . $route . '/before', array(&$route, &$data));

		if (!is_null($result)) {
			return $result;
		}

		// We dont want to use the loader class as it would make an controller callable.
		$action = new Action($route);

		// Any output needs to be another Action object.
		$output = $action->execute($this->registry); 

		// Trigger the post events
		$result = $this->event->trigger('controller/' . $route . '/after', array(&$route, &$data, &$output));

		if (!is_null($result)) {
			return $result;
		}

		return $output;
	}
}
