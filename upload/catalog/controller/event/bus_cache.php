<?php
// *   Аўтар: "БуслікДрэў" ( https://buslikdrev.by/ )
// *   © 2016-2022; BuslikDrev - Усе правы захаваныя.
// *   Спецыяльна для сайта: "OpenCart.pro" ( https://opencart.pro/ )

//namespace Opencart\Catalog\Controller\Extension\BusCache\Event;

// забараняем прамы доступ
if (!defined('VERSION')) {
	header('Refresh: 1; URL=/');
	exit('ЗАПРЫШЧАЮ!');
}

if (version_compare(VERSION, '4.0.0', '>=')) {
	class Controller extends \Opencart\System\Engine\Controller {}
} else {
	class ControllerEventBusCache extends BusCache {}
}

class BusCache extends Controller {
	public function images(&$route, &$args, &$output = '') {
		//$this->registry->set('bus_cache', new \Opencart\System\library\Bus_Cache\Bus_Cache($this->registry, microtime(true)));
	}

	public function start(&$route, &$args, &$output = '') {
		if ((!empty($this->request->get['route']) && $this->request->get['route'] == $route || $this->config->get('action_default') == $route) && !defined('DIR_CATALOG') && substr(php_sapi_name(), 0, 3) != 'cli') {
			if (version_compare(VERSION, '4.0.0', '>=')) {
				$this->registry->set('bus_cache', new \Opencart\Extension\Bus_Cache\System\library\Bus_Cache\Bus_Cache($this->registry, microtime(true)));
			}  else {
				$this->registry->set('bus_cache', new \Bus_Cache\Bus_Cache($this->registry, microtime(true)));
			}
		}
	}

	public function output(&$route, &$args, &$output = '') {
		if (!defined('DIR_CATALOG') && $this->registry->get('bus_cache') && (!empty($this->request->get['route']) && $this->request->get['route'] == $route || $this->config->get('action_default') == $route)) {
			if (!$output) {
				$output = $this->response->getOutput();
			}

			if ($output) {
				$this->response->setOutput($this->registry->get('bus_cache')->output($output));
			}
		}
	}

	public function controller(&$route, &$args, &$output = '') {
		if (!empty($this->request->get['route']) && $this->request->get['route'] != $route || $this->config->get('action_default') != $route) {
			if (version_compare(VERSION, '4.0.0', '>=') && !defined('DIR_CATALOG') && $this->registry->get('bus_cache')) {
				$trigger = $route;

				$action = new \Opencart\System\Engine\Action($route);
				$output = $this->registry->get('bus_cache')->controller($action, $route, $args);

				if ($output) {
					$this->event->trigger('controller/' . $trigger . '/after', [&$route, &$args, &$output]);

					$args = array($output);
					$route = 'extension/bus_cache/event/bus_cache|controllerFree';
				}
			}
		}
	}

	public function controllerFree($output) {
		return $output;
	}

	public function model(&$route, &$args, &$output = '') {
		if (version_compare(VERSION, '4.0.0', '>=') && !defined('DIR_CATALOG') && $this->registry->get('bus_cache')) {
				$trigger = $route;

				// Create a key to store the model object
				$key = substr($route, 0, strrpos($route, '/'));

				// Check if the model has already been initialised or not
				if (!$this->registry->has($key)) {
					// Create the class name from the key
					$class = '\Opencart\\' . $this->config->get('application') . '\Model\\' . str_replace(['_', '/'], ['', '\\'], ucwords($key, '_/'));

					$model = new $class($this->registry);
					//$model = $this->registry->get('bus_cache')->model(new $class($this->registry), $key, $class);

					$this->registry->set($key, $model);
				} else {
					$model = $this->registry->get($key);
				}

				// Get the method to be used
				$method = substr($route, strrpos($route, '/') + 1);

				$callable = [$model, $method];

				if (is_callable($callable)) {
					$output = call_user_func_array($callable, $args);
				} else {
					throw new \Exception('Error: Could not call model/' . $route . '!');
				}

				return $output;
		}
	}
}

//namespace Opencart\Catalog\Model\Extension\BusCache\Event;

if (version_compare(VERSION, '4.0.0', '>=')) {
	class Model extends \Opencart\System\Engine\Model {}
} else {
	class ModelEventBusCache extends BusCache {}
}

class BusCache extends Model {
	public function modelFree($output) {
		return $output;
	}
}