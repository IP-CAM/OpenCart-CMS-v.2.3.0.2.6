<?php
// *   Аўтар: "БуслікДрэў" ( https://buslikdrev.by/ )
// *   © 2016-2022; BuslikDrev - Усе правы захаваныя.
// *   Спецыяльна для сайта: "OpenCart.pro" ( https://opencart.pro/ )

/*
                                                             ░░░░░                                                      
                                                            ▒░    ▒░                                                    
                                 ▒▒░░                       ▒  ▒▒  ▓                                                    
                                  ▓████▓▒░▒░░               ▒  ░▒░░▒                                                    
                                    ▒██████████▒░           ░    ▓▓░                                                    
                                    ░▒▒▓████▒▒▒▒▓██▒░       ░     █▓                                                    
                                     ░▓█████▓░     ▒▓█▒     ▒      █                                                    
                                       ░▒██████▓▒     ▒▓░   ▒       ░                                                   
                                       ▒██████████▒     ░▓  ▒                                                           
                                         ▒█████████       ░░ ▒                                                          
                                           ░▒▓█████         ░▒                                                          
                                          ▒▓███████▓         ░▒                                                         
                                              ░▓█▓▒▒▒░░░      ░                                                         
                                               ░░              ░                                                        
                                            ░▒                 ░                                                        
                                           ▓▒▒▒░░░░░░     ░    ░                                                        
                                           ▒█▒░▓▓▒░  ▒     ░░░                                                          
                                                     ░░   ▓                                                             
                                                      ▒  ▓                                                              
                                                      ▓ ▒░                                                              
                                                      ▓ ▓                                                               
                                                      ▓ ▒                                                               
                                                      ▒░░                                                               
                                                      ▒▒░                                                               
                                                      ▒▒░                                                               
                                                      ▓░░                                                               
                                                      ▓░▒                                                               
                                               ████▓ ░▒ ▒           ░▓███                                               
                                               ▒██████  ▓         ░██████                                               
                                                 ▒█████▓▓       ░██████░                                                
                                                   ▒█████▓    ░██████░                                                  
                                                     ▒█████▒░██████░                                                    
                                                       ▒█████████░                                                      
                                                        ▒██▒░███                                                        
                                                      ░██████████▒                                                      
                                                    ░██████░ ▓█████▒                                                    
                                                  ░██████░     ▓█████▒                                                  
                                                ░██████░         ▓█████▒                                                
                                              ░██████░             ▓█████▒                                              
                                            ▒██████░                 ▓█████▒                                            
                                          ░█████▓░                     ▓█████▒                                          
                                        ░▓████▓░                         ▓█████▒                                        
        ▒▒▒▒▒▒░                    ░▒▒▒▓███▓█▓▒       ▒▒▒▒▒▒░              ▓███▓▓░             ▒▒▒                      
        ████▓███░                  ▓███▓███░███░      ████████░              ▒▒▒▒▒▒           ░███                      
        ████ ███▓▒██▓ ▓██▒ ▒▓███▓▒ ▓███▒██▓░███░░███░ ███▓ ███▓░███▓██▓░ ▒▓███▓▓░▓██▒ ░███    ░███▓██▓░▒██▓  ▓██▒       
        ████ ███▒▒███ ███▓▒███░███▒▓██▓▒███░███░███▒  ███▓ ███▓▒███░███▓▒███░███▒▒███ ▒███    ░███░▓██▓ ███░ ███        
        ███████▒ ▒███ ███▓▒███ ███▒▓██▓▒███░██████▓   ███▓ ███▓▒███ ▓██▓▓███ ███▒ ███ ▓██▒    ░███ ▓██▓ ▓██▒▒██▓        
        ████ ███▒▒███ ███▓ ▓████▒░ ▓██▓▒███░██████░   ███▓ ███▓▒███     ▓███▓███▒ ███▒███     ░███ ▓██▓ ░███▓██▒        
        ████ ███▓▒███ ███▓░▒▒▓▓███▒▓██▓▒███░███████   ███▓ ███▓▒███     ▓███░▓▓▓▒ ▒█████▓     ░███ ▓██▓  ▓█████         
        ████ ███▓▒███ ███▓▓███ ███▒▓██▓▒███░███▒████  ███▓ ███▓▒███     ▓███ ███▒  █████▒     ░███ ▓██▓  ░████▓         
        ████████░▒███▓███▓░███▓███░▓██▓▒███░███░░███▓ ████████░▒███     ░███▓███░  ▓████  ░███░███▓███▓   ▓███░         
        ░░░░░░    ░░░░░░░░  ░░░░░  ░▒▒▒▒▒▒▒ ░░░  ░░░░ ░░░░░░    ░░░       ░░░░▒░░░░▒▒░░░   ░░░ ░░ ░░░     ▓███          
                                      ▒▓▓▓▓▒░                               ░▒▒▓▓▓▒                     ▒▓▓▓▓           
                                       ░▓████▓░                           ░▓████▓░                                      
                                         ░▓█████░                       ▒█████▓░                                        
                                           ░██████░                   ▒█████▓░                                          
                                             ░██████░               ▒█████▓░                                            
                                               ░██████░           ▒█████▓░                                              
                                                 ░██████░       ▒█████▓░                                                
                                                   ░█████▓░   ▒█████▓░                                                  
                                                     ░█████▓▒█████▓░                                                    
                                                       ░████▓███▓░                                                      
                                                        ▒██▓▒███░                                                       
                                                      ▒██████████▓░                                                     
                                                    ▒█████▓░ ▒█████▓░                                                   
                                                  ▒█████▓░     ▒█████▓░                                                 
                                                ▒█████▓░         ▒█████▓░                                               
*/

// забараняем прамы доступ
if (!class_exists('Controller')) {
	header('Refresh: 1; URL=/');
	exit('ЗАПРЫШЧАЮ!');
}

if (version_compare(VERSION, '2.3.0', '<')) {
	class ControllerModuleBusCache extends ControllerExtensionModuleBusCache {}
}

class ControllerExtensionModuleBusCache extends Controller {
	private $error = array();
	private $name_arhive = 'Buslik Cache';
	private $code = '01000024';
	private $mame = 'Буслік Кэш - "Buslik Cache"';
	private $version = '1.0.14';
	private $author = 'BuslikDrev.by';
	private $link = 'https://liveopencart.ru/buslikdrev';
	private $version_oc = 2.3;
	private $paths = array();

	public function __construct($foo) {
		parent::__construct($foo);
		if (method_exists($this->language, 'set')) {
			$this->language->set('bus_cache_version', $this->version);
		}
		if (version_compare(VERSION, '3.0.0', '>=')) {
			$this->version_oc = 3;
			$this->paths = array(
				'controller' => array(
					'bus_cache' => 'extension/module/bus_cache',
					'extension' => 'marketplace/extension',
					'modification' => 'marketplace/modification',
				),
				'language' => array(
					'bus_cache' => 'extension/module/bus_cache',
				),
				'model' => array(
					'bus_cache' => 'extension/module/bus_cache',
					'bus_cache_path' => 'model_extension_module_bus_cache',
					'module' => 'setting/module',
					'module_path' => 'model_setting_module',
					'extension' => 'setting/extension',
					'extension_path' => 'model_setting_extension',
					'modification' => 'setting/modification',
					'modification_path' => 'model_setting_modification',
					'event' => 'setting/event',
					'event_path' => 'model_setting_event',
				),
				'view' => array(
					'bus_cache' => 'extension/module/bus_cache',
				),
				'token' => 'user_token=' . $this->session->data['user_token']
			);
		} elseif (version_compare(VERSION, '2.3.0', '>=')) {
			$this->version_oc = 2.3;
			$this->paths = array(
				'controller' => array(
					'bus_cache' => 'extension/module/bus_cache',
					'extension' => 'extension/extension',
					'modification' => 'extension/modification',
				),
				'language' => array(
					'bus_cache' => 'extension/module/bus_cache',
				),
				'model' => array(
					'bus_cache' => 'extension/module/bus_cache',
					'bus_cache_path' => 'model_extension_module_bus_cache',
					'module' => 'extension/module',
					'module_path' => 'model_extension_module',
					'extension' => 'extension/extension',
					'extension_path' => 'model_extension_extension',
					'modification' => 'extension/modification',
					'modification_path' => 'model_extension_modification',
					'event' => 'extension/event',
					'event_path' => 'model_extension_event',
				),
				'view' => array(
					'bus_cache' => 'extension/module/bus_cache',
				),
				'token' => 'token=' . $this->session->data['token']
			);
		} else {
			$this->version_oc = 2;
			$this->paths = array(
				'controller' => array(
					'bus_cache' => 'module/bus_cache',
					'extension' => 'extension/module',
					'modification' => 'extension/modification',
				),
				'language' => array(
					'bus_cache' => 'module/bus_cache',
				),
				'model' => array(
					'bus_cache' => 'module/bus_cache',
					'bus_cache_path' => 'model_module_bus_cache',
					'module' => 'extension/module',
					'module_path' => 'model_extension_module',
					'extension' => 'extension/extension',
					'extension_path' => 'model_extension_extension',
					'modification' => 'extension/modification',
					'modification_path' => 'model_extension_modification',
					'event' => 'extension/event',
					'event_path' => 'model_extension_event',
				),
				'view' => array(
					'bus_cache' => 'module/bus_cache.tpl',
				),
				'token' => 'token=' . $this->session->data['token']
			);
		}
	}

	// подмена $this->config->get()
	private function configGet($name = '') {
		if (isset($this->session->data['import']) && !$name) {
			$data = $this->session->data['import'];
			unset($this->session->data['import']);
		} else {
			$data = $this->config->get('bus_cache');
		}

		if ($data) {
			if ($name) {
				if (isset($data[$name])) {
					$data = $data[$name];
				} else {
					$data = null;
				}
			}
		} else {
			$data = null;
		}

		return $data;
	}

	private function setFile($name, $value, $format = 'xml') {
		$this->deleteFile($name, $format);

		if ($value) {
			$theme = ($this->config->get('config_template') ? $this->config->get('config_template') : ($this->config->get('theme_' . str_replace('theme_', '', $this->config->get('config_theme')) . '_directory') ? $this->config->get('theme_' . str_replace('theme_', '', $this->config->get('config_theme')) . '_directory') : $this->config->get('config_theme')));

			if ($format == 'css') {
				$path = DIR_CATALOG . 'view/theme/' . $theme . '/stylesheet/bus_cache/bus_cache_';
				$name = ($name == 'library' ? false : preg_replace('/[^A-Z0-9_-]/i', '', $name));
				$format = '.' . preg_replace('/[^A-Z_]/i', '', $format);
				if (!is_dir(str_replace('/bus_cache/bus_cache_', '', $path))) {
					mkdir(str_replace('/bus_cache/bus_cache_', '', $path), 0755);
				}
				if (!is_dir(str_replace('/bus_cache_', '', $path))) {
					mkdir(str_replace('/bus_cache_', '', $path), 0755);
				}
			} elseif ($format == 'js') {
				$path = DIR_CATALOG . 'view/theme/' . $theme . '/javascript/bus_cache/bus_cache_';
				$name = ($name == 'library' ? false : preg_replace('/[^A-Z0-9_-]/i', '', $name));
				$format = '.' . preg_replace('/[^A-Z_]/i', '', $format);
				if (!is_dir(str_replace('/bus_cache/bus_cache_', '', $path))) {
					mkdir(str_replace('/bus_cache/bus_cache_', '', $path), 0755);
				}
				if (!is_dir(str_replace('/bus_cache_', '', $path))) {
					mkdir(str_replace('/bus_cache_', '', $path), 0755);
				}
			} elseif ($format == 'tpl') {
				$path = DIR_CATALOG . 'view/theme/' . $theme . '/template/' . $this->paths['controller']['bus_cache'] . '/bus_cache_';
				$name = ($name == 'library' ? false : preg_replace('/[^A-Z0-9_-]/i', '', $name));
				$format = '.' . preg_replace('/[^A-Z_]/i', '', $format);
			} elseif ($format == 'twig') {
				$path = DIR_CATALOG . 'view/theme/' . $theme . '/template/' . $this->paths['controller']['bus_cache'] . '/bus_cache_';
				$name = ($name == 'library' ? false : preg_replace('/[^A-Z0-9_-]/i', '', $name));
				$format = '.' . preg_replace('/[^A-Z_]/i', '', $format);
			} elseif (in_array($format, array('jpg', 'jpeg', 'png', 'gif', 'webp', 'svg', 'ico', 'json', 'webmanifest', 'webapp', 'appcache'))) {
				$path = DIR_IMAGE . 'catalog/bus_cache/';
				$name = ($name == 'library' ? false : preg_replace('/[^\/A-Z0-9_-]/i', '', $name));
				$format = '.' . preg_replace('/[^A-Z_]/i', '', $format);
			} else {
				$path = DIR_SYSTEM . ($name == 'library' ? 'library/' : false) . 'bus_cache.ocmod';
				$name = ($name == 'library' ? false : preg_replace('/[^A-Z0-9_-]/i', '', $name));
				$format = '.' . preg_replace('/[^A-Z_]/i', '', $format);
			}

			$file = $path . $name . $format;

			$handle = fopen($file, 'w');

			flock($handle, LOCK_EX);

			fwrite($handle, $value);

			fflush($handle);

			flock($handle, LOCK_UN);

			fclose($handle);
		}
	}

	private function deleteFile($name, $format = 'xml') {
		$theme = ($this->config->get('config_template') ? $this->config->get('config_template') : ($this->config->get('theme_' . str_replace('theme_', '', $this->config->get('config_theme')) . '_directory') ? $this->config->get('theme_' . str_replace('theme_', '', $this->config->get('config_theme')) . '_directory') : $this->config->get('config_theme')));

		if ($format == 'css') {
			$path = DIR_CATALOG . 'view/theme/' . $theme . '/stylesheet/bus_cache/bus_cache_';
		} elseif ($format == 'js') {
			$path = DIR_CATALOG . 'view/theme/' . $theme . '/javascript/bus_cache/bus_cache_';
		} elseif ($format == 'tpl') {
			$path = DIR_CATALOG . 'view/theme/' . $theme . '/template/' . $this->paths['controller']['bus_cache'] . '/bus_cache_';
		} elseif ($format == 'twig') {
			$path = DIR_CATALOG . 'view/theme/' . $theme . '/template/' . $this->paths['controller']['bus_cache'] . '/bus_cache_';
		} elseif (in_array($format, array('jpg', 'jpeg', 'png', 'gif', 'webp', 'svg', 'ico', 'json', 'webmanifest', 'webapp', 'appcache'))) {
			$path = DIR_IMAGE . 'catalog/bus_cache/';
		} else {
			$path = DIR_SYSTEM . ($name == 'library' ? 'library/' : false) . 'bus_cache.ocmod';
		}

		$file = $path . ($name == 'library' ? false : preg_replace('/[^A-Z0-9_-]/i', '', $name)) . '.' . preg_replace('/[^A-Z_]/i', '', $format);

		if (file_exists($file)) {
			unlink($file);
		}
	}

	private function copyFile($name, $newname, $format = 'xml', $newformat = 'xml_') {
		$file = $this->getFile($name, $format);
		$this->setFile($newname, $file, $newformat);
	}

	private function getFile($name = false, $format = 'xml') {
		$theme = ($this->config->get('config_template') ? $this->config->get('config_template') : ($this->config->get('theme_' . str_replace('theme_', '', $this->config->get('config_theme')) . '_directory') ? $this->config->get('theme_' . str_replace('theme_', '', $this->config->get('config_theme')) . '_directory') : $this->config->get('config_theme')));

		if ($format == 'css') {
			$path = DIR_CATALOG . 'view/theme/' . $theme . '/stylesheet/bus_cache/bus_cache_';
		} elseif ($format == 'js') {
			$path = DIR_CATALOG . 'view/theme/' . $theme . '/javascript/bus_cache/bus_cache_';
		} elseif ($format == 'tpl') {
			$path = DIR_CATALOG . 'view/theme/' . $theme . '/template/' . $this->paths['controller']['bus_cache'] . '/bus_cache_';
		} elseif ($format == 'twig') {
			$path = DIR_CATALOG . 'view/theme/' . $theme . '/template/' . $this->paths['controller']['bus_cache'] . '/bus_cache_';
		} elseif (in_array($format, array('jpg', 'jpeg', 'png', 'gif', 'webp', 'svg', 'ico', 'json', 'webmanifest', 'webapp', 'appcache'))) {
			$path = DIR_IMAGE . 'catalog/bus_cache/';
		} else {
			$path = DIR_SYSTEM . ($name == 'library' ? 'library/' : false) . 'bus_cache.ocmod';
		}

		$file = $path . ($name == 'library' ? false : preg_replace('/[^A-Z0-9_-]/i', '', $name)) . '.' . preg_replace('/[^A-Z_]/i', '', $format);

		if (file_exists($file)) {
			if (filesize($file) > 0) {
				$handle = fopen($file, 'rb');

				flock($handle, LOCK_SH);

				$data = fread($handle, filesize($file));

				flock($handle, LOCK_UN);

				fclose($handle);

				return $data;
			}
		}

		return false;
	}

	public function clear($setting = array()) {
		$this->load->language($this->paths['language']['bus_cache']);

		if (isset($this->request->post['route'])) {
			$this->request->get['route'] = $this->request->post['route'];
		}

		if (!empty($this->request->post['minify'])) {
			$this->request->get['minify'] = $this->request->post['minify'];
		} elseif (!empty($setting['minify'])) {
			$this->request->get['minify'] = $this->request->post['minify'];
		}

		if ($this->validate()) {
			if (!empty($this->request->get['minify'])) {
				if (($this->request->server['REQUEST_METHOD'] != 'POST')) {
					$this->load->model('setting/setting');

					$module_info = $this->configGet();
					$module_info['time_save'] = time();
					if (!empty($module_info['pagespeed_css_min_download'])) {
						$this->request->post['pagespeed_css_min_download'] = $module_info['pagespeed_css_min_download'];
					}
					if (!empty($module_info['pagespeed_js_min_download'])) {
						$this->request->post['pagespeed_js_min_download'] = $module_info['pagespeed_js_min_download'];
					}

					$this->model_setting_setting->editSetting('bus_cache', array('bus_cache' => $module_info));
				}

				$text = $this->deleteDir(DIR_IMAGE . 'cache/bus_cache[NAGIBATOR]');
			} else {
				// чистим всё или то, что используем
				if (1 == 0) {
					if (ini_get('apc.enabled') && function_exists('apc_clear_cache')) {
						(new Bus_Cache\apc())->flush();
						$text = "\n" . '<br>APC cache delete';
					}
					if (ini_get('apc.enabled') && function_exists('apcu_clear_cache')) {
						(new Bus_Cache\apcu())->flush();
						if (1 == 0 && function_exists('opcache_reset')) {
							opcache_reset();
						}
						$text = "\n" . '<br>APCu cache delete';
					}
					if (extension_loaded('memcache') && class_exists('Memcache') && function_exists('memcache_connect')) {
						(new Bus_Cache\mem())->flush();
						$text = "\n" . '<br>Memcache cache delete';
					}
					if (function_exists('Memcached')) {
						(new Bus_Cache\memcached())->flush();
						$text = "\n" . '<br>Memcached cache delete';
					}
					if (function_exists('Redis')) {
						(new Bus_Cache\redis())->flush();
						$text = "\n" . '<br>Redis cache delete';
					}
					$text .= $this->deleteDir(DIR_CACHE . 'buslik[NAGIBATOR]');
					$text .= $this->deleteDir(DIR_CACHE);
				} else {
					$cache_engine = $this->configGet('cache_engine');
					if ($cache_engine == 'apc' && ini_get('apc.enabled') && function_exists('apc_clear_cache')) {
						(new Bus_Cache\apc())->flush();
						$text = "\n" . '<br>APC cache delete';
					} elseif ($cache_engine == 'apcu' && ini_get('apc.enabled') && function_exists('apcu_clear_cache')) {
						(new Bus_Cache\apcu())->flush();
						if (1 == 0 && function_exists('opcache_reset')) {
							opcache_reset();
						}
						$text = "\n" . '<br>APCu cache delete';
					} elseif ($cache_engine == 'mem' && extension_loaded('memcache') && class_exists('Memcache') && function_exists('memcache_connect')) {
						(new Bus_Cache\mem())->flush();
						$text = "\n" . '<br>Memcache cache delete';
					} elseif ($cache_engine == 'memcached' && function_exists('Memcached')) {
						(new Bus_Cache\memcached())->flush();
						$text = "\n" . '<br>Memcached cache delete';
					} elseif ($cache_engine == 'redis' && function_exists('Redis')) {
						(new Bus_Cache\redis())->flush();
						$text = "\n" . '<br>Redis cache delete';
					} else {
						$text = $this->deleteDir(DIR_CACHE . '[NAGIBATOR]');
					}
				}
			}

			if (!is_dir(DIR_IMAGE . 'cache/bus_cache/download/')) {
				mkdir(DIR_IMAGE . 'cache/bus_cache/download/', 0755, true);
			}

			if (!empty($this->request->post['pagespeed_css_min_download'])) {
				$css_links = str_replace(array("\r", "\n", '&amp;'), array('ЖЫДКЭШ', 'ЖЫДКЭШ', '&'), $this->request->post['pagespeed_css_min_download']);
				$css_links = str_replace(array('ЖЫДКЭШЖЫДКЭШ'), 'ЖЫДКЭШ', $css_links);
				$css_links = explode('ЖЫДКЭШ', $css_links);
				foreach ($css_links as $link) {
					$file = DIR_IMAGE . 'cache/bus_cache/download/' . md5($link) . '.css';
					if ($link && stristr($link, '//') && !\is_file($file)) {
						$href = @get_headers($link);
						if (!empty($href[0]) && strpos($href[0], '404') === false) {
							if (!empty($this->request->server['HTTP_USER_AGENT'])) {
								$user_agent = $this->request->server['HTTP_USER_AGENT'];
							} else {
								$user_agent = 'Mozilla/5.0 (X11; Linux x86_64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/51.0.2704.103 Safari/537.36';
							}
							$context  = stream_context_create(array('http' =>
								array(
									'method'  => 'GET',
									'header'  => "Content-Type: application/x-www-form-urlencoded\r\n" . "Referer: /\r\n" . "User-Agent: " . $user_agent,
									/* 'content' => http_build_query(array(
										'family'  => 'Open+Sans:400,400i,300,700',
										'display' => 'swap'
									)) */
								)
							));
							$content = file_get_contents($link, false, $context);
							//$content = fopen($link, 'r', false, $context);
							if ($content) {
								file_put_contents($file, $content);
							}
						}
					}
				}
			}

			if (!empty($this->request->post['pagespeed_js_min_download'])) {

			}

			if (isset($this->request->post['info'])) {
				$this->request->get['info'] = $this->request->post['info'];
			}

			if (isset($this->request->get['route']) && $this->request->get['route'] == $this->paths['controller']['bus_cache'] . '/clear') {
				$this->session->data['success'] = $this->language->get('success_clear') . (!empty($this->request->get['info']) ? str_replace(DIR_CACHE, 'system/storage/cache/', $text) : '');

				if (isset($this->request->get['redirect'])) {
					$this->response->redirect($this->url->link($this->request->get['redirect'], $this->paths['token'], true));
				} else {
					$this->response->redirect($this->url->link($this->paths['controller']['bus_cache'], $this->paths['token'], true));
				}
			} else {
				return $this->language->get('success_clear') . (!empty($setting['info']) ? str_replace(DIR_CACHE, 'system/storage/cache/', $text) : '');
			}
		} else {
			if (isset($this->request->get['route']) && $this->request->get['route'] == $this->paths['controller']['bus_cache'] . '/clear') {
				$this->session->data['warning'] = $this->language->get('error_permission');
				$this->session->data['error'] = $this->language->get('error_permission');

				if (isset($this->request->get['redirect'])) {
					$this->response->redirect($this->url->link($this->request->get['redirect'], $this->paths['token'], true));
				} else {
					$this->response->redirect($this->url->link($this->paths['controller']['bus_cache'], $this->paths['token'], true));
				}
			} else {
				return $this->language->get('error_permission');
			}
		}
	}

	private function fileSizeConvert($bytes = 0) {
		$unit = array('b','kb','Mb','Gb','Tb','Pb');
		return round($bytes/pow(1024, ($i=floor(log($bytes,1024)))), 2) . ' ' . $unit[$i];
	}

	// вывод всех названий и папок в массив
	private function dirToArray($path) {
		$result = array('total' => 0, 'size' => 0);

		foreach ((is_dir($path) ? scandir($path) : array()) as $key => $file) {
			if (!in_array($file, array(".", "..", 'index.html', '.htaccess'))) {
				if (is_dir($path . DIRECTORY_SEPARATOR . $file)) {
					$f = $this->dirToArray($path . DIRECTORY_SEPARATOR . $file);
					$result['total'] += $f['total'];
					$result['size'] += $f['size'];
				} else {
					$result['total']++;
					$result['size'] += filesize($path . DIRECTORY_SEPARATOR . $file);
				}
			}
		}

		return $result;
	}

	public function index() {
		foreach ($this->load->language($this->paths['language']['bus_cache']) as $key => $lang) {
			$data[$key] = $lang;
		}

		$data['heading_title'] = $this->language->get('heading_title');
		$data['help_pagespeed_css_style'] = htmlspecialchars($this->language->get('help_pagespeed_css_style'));
		$data['help_pagespeed_js_inline_exception'] = htmlspecialchars($this->language->get('help_pagespeed_js_inline_exception'));
		$data['help_pagespeed_js_inline_event'] = htmlspecialchars($this->language->get('help_pagespeed_js_inline_event'));
		$data['help_pagespeed_js_script'] = htmlspecialchars($this->language->get('help_pagespeed_js_script'));

		//$this->load->model('customer/customer_group');

		$this->load->model('localisation/language');

		$this->load->model('setting/store');

		//$this->load->model('tool/image');

		$this->document->setTitle(strip_tags($this->language->get('heading_title')));
		//$this->document->addStyle('view/javascript/jquery/datetimepicker/bootstrap-datetimepicker.min.css');
		//$this->document->addScript('view/javascript/jquery/datetimepicker/bootstrap-datetimepicker.min.js');

		$this->update();

		//$data['customer_groups'] = $this->model_customer_customer_group->getCustomerGroups();

		$data['languages'] = $this->model_localisation_language->getLanguages();

		$language_id = $this->config->get('config_language_id');

		$server = ($this->request->server['HTTPS'] ? HTTPS_CATALOG : HTTP_CATALOG);

		$data['stores'] = $this->model_setting_store->getStores();

		$data['token'] = $this->paths['token'];

		$data['module_path'] = $this->paths['controller']['bus_cache'];

		$module_info = $this->configGet();

		if (($this->request->server['REQUEST_METHOD'] == 'POST') && $this->validate()) {
			if (isset($this->request->post['apply']) && !empty($this->request->post['apply'])) {
				$apply = $this->request->post['apply'];
				unset($this->request->post['apply']);
			} else {
				$apply = false;
			}

			$this->request->post['version'] = $this->version;
			$this->request->post['time_save'] = time();

			if (isset($this->request->post['pagespeed_css_style'])) {
				$this->setFile('replace', html_entity_decode($this->request->post['pagespeed_css_style']), 'css');

				if (!empty($this->request->post['pagespeed_css_style'])) {
					$this->request->post['pagespeed_css_style'] = true;
				}
			}

			if (isset($this->request->post['pagespeed_js_script'])) {
				$this->setFile('replace', html_entity_decode($this->request->post['pagespeed_js_script']), 'js');

				if (!empty($this->request->post['pagespeed_js_script'])) {
					$this->request->post['pagespeed_js_script'] = true;
				}
			}

			$this->clear();

			$modification = '';
			if (!empty($module_info['status']) && empty($this->request->post['status'])) {
				$modification = $this->modification(null, false, 1);
			} elseif (isset($module_info['status']) && empty($module_info['status']) && !empty($this->request->post['status'])) {
				$modification = $this->modification(null, true, 1);
			}

			$this->load->model('setting/setting');

			$this->model_setting_setting->editSetting('bus_cache', array('bus_cache' => $this->request->post));

			if ($apply) {
				$this->session->data['success'] = $this->language->get('success_setting_apply') . $modification;

				$this->response->redirect($this->url->link($this->paths['controller']['bus_cache'], $this->paths['token'], true));
			} else {
				$this->session->data['success'] = $this->language->get('success_setting_save') . $modification;

				$this->response->redirect($this->url->link($this->paths['controller']['extension'], $this->paths['token'] . '&type=module', true));
			}
		}

		if (isset($this->session->data['warning'])) {
			$data['error'] = $this->session->data['warning'];
			unset($this->session->data['warning']);
		} elseif (isset($this->error['warning'])) {
			$data['error'] = $this->error['warning'];
		} else {
			$data['error'] = '';
		}

		if (isset($this->session->data['success'])) {
			$data['success'] = $this->session->data['success'];
			unset($this->session->data['success']);
		} else {
			$data['success'] = '';
		}

		$data['breadcrumbs'] = array();

		$data['breadcrumbs'][] = array(
			'text' => $this->language->get('text_home'),
			'href' => $this->url->link('common/dashboard', $this->paths['token'], true)
		);

		if ($this->version_oc >= 2.3) {
			$data['breadcrumbs'][] = array(
				'text' => $this->language->get('text_extension'),
				'href' => $this->url->link($this->paths['controller']['extension'], $this->paths['token'], true)
			);
		}

		$data['breadcrumbs'][] = array(
			'text' => $this->language->get('text_module'),
			'href' => $this->url->link($this->paths['controller']['extension'], $this->paths['token'] . ($this->version_oc >= 2.3 ? '&type=module' : false), true)
		);

		$data['breadcrumbs'][] = array(
			'text' => $this->language->get('heading_title'),
			'href' => $this->url->link($this->paths['controller']['bus_cache'], $this->paths['token'], true)
		);

		$data['action'] = $this->url->link($this->paths['controller']['bus_cache'], $this->paths['token'], true);
		$data['clear'] = $this->url->link($this->paths['controller']['bus_cache'] . '/clear', $this->paths['token'], true);
		$data['clear_minify'] = $this->url->link($this->paths['controller']['bus_cache'] . '/clear', $this->paths['token'] . '&minify=1', true);
		if ($this->config->get('bus_app')) {
			$data['clear_pwa'] = $this->url->link(str_replace('bus_cache', 'bus_app', $this->paths['controller']['bus_cache']) . '/clear', $this->paths['token'] . '&redirect=' . $this->paths['controller']['bus_cache'], true);
		} else {
			$data['clear_pwa'] = false;
		}
		$data['cancel'] = $this->url->link($this->paths['controller']['extension'], $this->paths['token'] . ($this->version_oc >= 2.3 ? '&type=module' : false), true);

		if (isset($this->request->post['status'])) {
			$data['status'] = $this->request->post['status'];
		} elseif (isset($module_info['status'])) {
			$data['status'] = $module_info['status'];
		} else {
			$data['status'] = true;
		}

		if (isset($this->request->post['store'])) {
			$data['store'] = $this->request->post['store'];
		} elseif (isset($module_info['store'])) {
			$data['store'] = $module_info['store'];
		} else {
			$data['store'] = array(0);
		}

		if (isset($this->request->post['cache_status'])) {
			$data['cache_status'] = $this->request->post['cache_status'];
		} elseif (isset($module_info['cache_status'])) {
			$data['cache_status'] = $module_info['cache_status'];
		} else {
			$data['cache_status'] = true;
		}

		if (isset($this->request->post['cache_ses'])) {
			$data['cache_ses'] = $this->request->post['cache_ses'];
		} elseif (isset($module_info['cache_ses'])) {
			$data['cache_ses'] = $module_info['cache_ses'];
		} else {
			$data['cache_ses'] = "customer_id\r\naffiliate_id\r\nlanguage\r\ncurrency\r\nwishlist\r\ncompare";
		}

		if (isset($this->request->post['cache_onrot'])) {
			$data['cache_onrot'] = $this->request->post['cache_onrot'];
		} elseif (isset($module_info['cache_onrot'])) {
			$data['cache_onrot'] = $module_info['cache_onrot'];
		} else {
			$data['cache_onrot'] = false;
		}

		if (isset($this->request->post['cache_rot'])) {
			$data['cache_rot'] = $this->request->post['cache_rot'];
		} elseif (isset($module_info['cache_rot'])) {
			$data['cache_rot'] = $module_info['cache_rot'];
		} else {
			$data['cache_rot'] = "extension/module/bus_editor\r\nmodule/bus_editor\r\nextension/module/bus_menu/ajax\r\nmodule/bus_menu/ajax\r\naccount\r\ncart\r\ncheckout\r\ncompare\r\nwishlist\r\ncountry\r\ncaptcha\r\nsuccess\r\nnot_found\r\napi\r\najax_viewed\r\ncontact";
		}

		if (isset($this->request->post['cache_customer'])) {
			$data['cache_customer'] = $this->request->post['cache_customer'];
		} elseif (isset($module_info['cache_customer'])) {
			$data['cache_customer'] = $module_info['cache_customer'];
		} else {
			$data['cache_customer'] = false;
		}

		if (isset($this->request->post['cache_cart'])) {
			$data['cache_cart'] = $this->request->post['cache_cart'];
		} elseif (isset($module_info['cache_cart'])) {
			$data['cache_cart'] = $module_info['cache_cart'];
		} else {
			$data['cache_cart'] = false;
		}

		if (isset($this->request->post['cache_cart_count'])) {
			$data['cache_cart_count'] = $this->request->post['cache_cart_count'];
		} elseif (isset($module_info['cache_cart_count'])) {
			$data['cache_cart_count'] = $module_info['cache_cart_count'];
		} else {
			$data['cache_cart_count'] = 0;
		}

		if (isset($this->request->post['cache_oc'])) {
			$data['cache_oc'] = $this->request->post['cache_oc'];
		} elseif (isset($module_info['cache_oc'])) {
			$data['cache_oc'] = $module_info['cache_oc'];
		} else {
			$data['cache_oc'] = false;
		}

		//$data['cache_controllers'] = array();

		if (isset($this->request->post['cache_controller'])) {
			$data['cache_controller'] = $this->request->post['cache_controller'];
		} elseif (isset($module_info['cache_controller'])) {
			$data['cache_controller'] = $module_info['cache_controller'];
		} else {
			$data['cache_controller'] = false;
		}

		//$data['cache_models'] = array();

		if (isset($this->request->post['cache_model'])) {
			$data['cache_model'] = $this->request->post['cache_model'];
		} elseif (isset($module_info['cache_model'])) {
			$data['cache_model'] = $module_info['cache_model'];
		} else {
			$data['cache_model'] = false;
		}

		//https://web-creator.ru/technologies/webdev/legacy/memcached
		$data['cache_engines'] = array();
		$data['cache_engines'][] = array('code' => 'apc', 'name' => 'APC (Alternative PHP Cache)', 'status' => (is_file(DIR_SYSTEM . 'library/bus_cache/apc.php') && extension_loaded('apc') && function_exists('apc_cache_info') ? true : false));
		$data['cache_engines'][] = array('code' => 'apcu', 'name' => 'APCu (Alternative PHP Cache) not opcode', 'status' => (is_file(DIR_SYSTEM . 'library/bus_cache/apcu.php') && extension_loaded('apcu') && function_exists('apcu_cache_info') ? true : false));
		$data['cache_engines'][] = array('code' => 'buslik', 'name' => 'Буслік', 'status' => true);
		$data['cache_engines'][] = array('code' => 'file', 'name' => 'File', 'status' => (is_file(DIR_SYSTEM . 'library/bus_cache/file.php') ? true : false));
		$data['cache_engines'][] = array('code' => 'mem', 'name' => 'Memcache', 'status' => (is_file(DIR_SYSTEM . 'library/bus_cache/mem.php') && extension_loaded('memcache') && class_exists('Memcache') && function_exists('memcache_connect') ? true : false));
		$data['cache_engines'][] = array('code' => 'memcached', 'name' => 'Memcached', 'status' => (is_file(DIR_SYSTEM . 'library/bus_cache/memcached.php') && extension_loaded('memcached') ? true : false));
		$data['cache_engines'][] = array('code' => 'redis', 'name' => 'Redis', 'status' => (is_file(DIR_SYSTEM . 'library/bus_cache/redis.php') && extension_loaded('redis') && function_exists('Redis') ? true : false));

		if (isset($this->request->post['cache_engine'])) {
			$data['cache_engine'] = $this->request->post['cache_engine'];
		} elseif (isset($module_info['cache_engine'])) {
			$data['cache_engine'] = $module_info['cache_engine'];
		} else {
			$data['cache_engine'] = 'buslik';
		}

		if (isset($this->request->post['cache_expire'])) {
			$data['cache_expire'] = $this->request->post['cache_expire'];
		} elseif (isset($module_info['cache_expire'])) {
			$data['cache_expire'] = $module_info['cache_expire'];
		} else {
			$data['cache_expire'] = 3600;
		}

		if (isset($this->request->post['cache_expire_controller'])) {
			$data['cache_expire_controller'] = $this->request->post['cache_expire_controller'];
		} elseif (isset($module_info['cache_expire_controller'])) {
			$data['cache_expire_controller'] = $module_info['cache_expire_controller'];
		} else {
			$data['cache_expire_controller'] = 3600;
		}

		if (isset($this->request->post['cache_expire_model'])) {
			$data['cache_expire_model'] = $this->request->post['cache_expire_model'];
		} elseif (isset($module_info['cache_expire_model'])) {
			$data['cache_expire_model'] = $module_info['cache_expire_model'];
		} else {
			$data['cache_expire_model'] = 3600;
		}

		if (isset($this->request->post['cache_expire_all'])) {
			$data['cache_expire_all'] = $this->request->post['cache_expire_all'];
		} elseif (isset($module_info['cache_expire_all'])) {
			$data['cache_expire_all'] = $module_info['cache_expire_all'];
		} else {
			$data['cache_expire_all'] = $data['cache_expire'];
		}

		if (isset($this->request->post['pagespeed_status'])) {
			$data['pagespeed_status'] = $this->request->post['pagespeed_status'];
		} elseif (isset($module_info['pagespeed_status'])) {
			$data['pagespeed_status'] = $module_info['pagespeed_status'];
		} else {
			$data['pagespeed_status'] = true;
		}

		if (isset($this->request->post['pagespeed_onrot'])) {
			$data['pagespeed_onrot'] = $this->request->post['pagespeed_onrot'];
		} elseif (isset($module_info['pagespeed_onrot'])) {
			$data['pagespeed_onrot'] = $module_info['pagespeed_onrot'];
		} else {
			$data['pagespeed_onrot'] = false;
		}

		if (isset($this->request->post['pagespeed_rot'])) {
			$data['pagespeed_rot'] = $this->request->post['pagespeed_rot'];
		} elseif (isset($module_info['pagespeed_rot'])) {
			$data['pagespeed_rot'] = $module_info['pagespeed_rot'];
		} else {
			$data['pagespeed_rot'] = false;
		}

		if (isset($this->request->post['pagespeed_attribute_w_h'])) {
			$data['pagespeed_attribute_w_h'] = $this->request->post['pagespeed_attribute_w_h'];
		} elseif (isset($module_info['pagespeed_attribute_w_h'])) {
			$data['pagespeed_attribute_w_h'] = $module_info['pagespeed_attribute_w_h'];
		} else {
			$data['pagespeed_attribute_w_h'] = false;
		}

		if (isset($this->request->post['pagespeed_device'])) {
			$data['pagespeed_device'] = $this->request->post['pagespeed_device'];
		} elseif (isset($module_info['pagespeed_device'])) {
			$data['pagespeed_device'] = $module_info['pagespeed_device'];
		} else {
			$data['pagespeed_device'] = false;
		}

		if (isset($this->request->post['pagespeed_lazy_load_images'])) {
			$data['pagespeed_lazy_load_images'] = $this->request->post['pagespeed_lazy_load_images'];
		} elseif (isset($module_info['pagespeed_lazy_load_images'])) {
			$data['pagespeed_lazy_load_images'] = $module_info['pagespeed_lazy_load_images'];
		} else {
			$data['pagespeed_lazy_load_images'] = 1;
		}

		/* $data['pagespeed_lazy_load_htmls'] = array(
			1 => array('route')
		); */

		if (isset($this->request->post['pagespeed_lazy_load_html'])) {
			$data['pagespeed_lazy_load_html'] = $this->request->post['pagespeed_lazy_load_html'];
		} elseif (isset($module_info['pagespeed_lazy_load_html'])) {
			$data['pagespeed_lazy_load_html'] = $module_info['pagespeed_lazy_load_html'];
		} else {
			$data['pagespeed_lazy_load_html'] = false;
		}

		if (isset($this->request->post['pagespeed_replace'])) {
			$data['pagespeed_replace'] = $this->request->post['pagespeed_replace'];
		} elseif (isset($module_info['pagespeed_replace'])) {
			$data['pagespeed_replace'] = $module_info['pagespeed_replace'];
		} else {
			$data['pagespeed_replace'] = false;
		}

		if (isset($this->request->post['pagespeed_html_replace'])) {
			$data['pagespeed_html_replace'] = $this->request->post['pagespeed_html_replace'];
		} elseif (isset($module_info['pagespeed_html_replace'])) {
			$data['pagespeed_html_replace'] = $module_info['pagespeed_html_replace'];
		} else {
			$data['pagespeed_html_replace'] = $data['pagespeed_replace'];
		}

		if (isset($this->request->post['pagespeed_html_min'])) {
			$data['pagespeed_html_min'] = $this->request->post['pagespeed_html_min'];
		} elseif (isset($module_info['pagespeed_html_min'])) {
			$data['pagespeed_html_min'] = $module_info['pagespeed_html_min'];
		} else {
			$data['pagespeed_html_min'] = 2;
		}

		if (isset($this->request->post['pagespeed_css_replace'])) {
			$data['pagespeed_css_replace'] = $this->request->post['pagespeed_css_replace'];
		} elseif (isset($module_info['pagespeed_css_replace'])) {
			$data['pagespeed_css_replace'] = $module_info['pagespeed_css_replace'];
		} else {
			$data['pagespeed_css_replace'] = false;
		}

		if (isset($this->request->post['pagespeed_css_min'])) {
			$data['pagespeed_css_min'] = $this->request->post['pagespeed_css_min'];
		} elseif (isset($module_info['pagespeed_css_min'])) {
			$data['pagespeed_css_min'] = $module_info['pagespeed_css_min'];
		} else {
			$data['pagespeed_css_min'] = false;
		}

		if (isset($this->request->post['pagespeed_css_min_links'])) {
			$data['pagespeed_css_min_links'] = $this->request->post['pagespeed_css_min_links'];
		} elseif (isset($module_info['pagespeed_css_min_links'])) {
			$data['pagespeed_css_min_links'] = $module_info['pagespeed_css_min_links'];
		} else {
			$data['pagespeed_css_min_links'] = false;
		}

		if (isset($this->request->post['pagespeed_css_min_download'])) {
			$data['pagespeed_css_min_download'] = $this->request->post['pagespeed_css_min_download'];
		} elseif (isset($module_info['pagespeed_css_min_download'])) {
			$data['pagespeed_css_min_download'] = $module_info['pagespeed_css_min_download'];
		} else {
			$data['pagespeed_css_min_download'] = false;
		}

		if (isset($this->request->post['pagespeed_css_min_exception'])) {
			$data['pagespeed_css_min_exception'] = $this->request->post['pagespeed_css_min_exception'];
		} elseif (isset($module_info['pagespeed_css_min_exception'])) {
			$data['pagespeed_css_min_exception'] = $module_info['pagespeed_css_min_exception'];
		} else {
			$data['pagespeed_css_min_exception'] = false;
		}

		if (isset($this->request->post['pagespeed_css_min_font'])) {
			$data['pagespeed_css_min_font'] = $this->request->post['pagespeed_css_min_font'];
		} elseif (isset($module_info['pagespeed_css_min_font'])) {
			$data['pagespeed_css_min_font'] = $module_info['pagespeed_css_min_font'];
		} else {
			$data['pagespeed_css_min_font'] = array();
		}

		if (isset($this->request->post['pagespeed_css_min_display'])) {
			$data['pagespeed_css_min_display'] = $this->request->post['pagespeed_css_min_display'];
		} elseif (isset($module_info['pagespeed_css_min_display'])) {
			$data['pagespeed_css_min_display'] = $module_info['pagespeed_css_min_display'];
		} else {
			$data['pagespeed_css_min_display'] = false;
		}

		if (isset($this->request->post['pagespeed_css_critical'])) {
			$data['pagespeed_css_critical'] = $this->request->post['pagespeed_css_critical'];
		} elseif (isset($module_info['pagespeed_css_critical'])) {
			$data['pagespeed_css_critical'] = $module_info['pagespeed_css_critical'];
		} else {
			$data['pagespeed_css_critical'] = false;
		}

		if (isset($this->request->post['pagespeed_css_critical_time'])) {
			$data['pagespeed_css_critical_time'] = $this->request->post['pagespeed_css_critical_time'];
		} elseif (isset($module_info['pagespeed_css_critical_time'])) {
			$data['pagespeed_css_critical_time'] = $module_info['pagespeed_css_critical_time'];
		} else {
			$data['pagespeed_css_critical_time'] = 1;
		}

		if (isset($this->request->post['pagespeed_css_critical_elements'])) {
			$data['pagespeed_css_critical_elements'] = $this->request->post['pagespeed_css_critical_elements'];
		} elseif (isset($module_info['pagespeed_css_critical_elements'])) {
			$data['pagespeed_css_critical_elements'] = $module_info['pagespeed_css_critical_elements'];
		} else {
			$data['pagespeed_css_critical_elements'] = "font-face\r\nkeyframes\r\n*\r\n::after, ::before\r\n]";
		}

		if (isset($this->request->post['pagespeed_css_inline_transfer'])) {
			$data['pagespeed_css_inline_transfer'] = $this->request->post['pagespeed_css_inline_transfer'];
		} elseif (isset($module_info['pagespeed_css_inline_transfer'])) {
			$data['pagespeed_css_inline_transfer'] = $module_info['pagespeed_css_inline_transfer'];
		} else {
			$data['pagespeed_css_inline_transfer'] = 0;
		}

		if (isset($this->request->post['pagespeed_css_events'])) {
			$data['pagespeed_css_events'] = $this->request->post['pagespeed_css_events'];
		} elseif (!empty($module_info['pagespeed_css_events'])) {
			$data['pagespeed_css_events'] = $module_info['pagespeed_css_events'];
		} else {
			$data['pagespeed_css_events'] = "pagehide\r\nscroll\r\nmouseover\r\ntouchstart";
		}

		if (isset($this->request->post['pagespeed_css_style'])) {
			$data['pagespeed_css_style'] = $this->getFile('replace', 'css');
		} elseif (!empty($module_info['pagespeed_css_style'])) {
			$data['pagespeed_css_style'] = $this->getFile('replace', 'css');
		} else {
			$data['pagespeed_css_style'] = false;
		}

		if (isset($this->request->post['pagespeed_js_replace'])) {
			$data['pagespeed_js_replace'] = $this->request->post['pagespeed_js_replace'];
		} elseif (isset($module_info['pagespeed_js_replace'])) {
			$data['pagespeed_js_replace'] = $module_info['pagespeed_js_replace'];
		} else {
			$data['pagespeed_js_replace'] = false;
		}

		if (isset($this->request->post['pagespeed_js_min'])) {
			$data['pagespeed_js_min'] = $this->request->post['pagespeed_js_min'];
		} elseif (isset($module_info['pagespeed_js_min'])) {
			$data['pagespeed_js_min'] = $module_info['pagespeed_js_min'];
		} else {
			$data['pagespeed_js_min'] = false;
		}

		if (isset($this->request->post['pagespeed_js_min_links'])) {
			$data['pagespeed_js_min_links'] = $this->request->post['pagespeed_js_min_links'];
		} elseif (isset($module_info['pagespeed_js_min_links'])) {
			$data['pagespeed_js_min_links'] = $module_info['pagespeed_js_min_links'];
		} else {
			$data['pagespeed_js_min_links'] = false;
		}

		if (isset($this->request->post['pagespeed_js_min_download'])) {
			$data['pagespeed_js_min_download'] = $this->request->post['pagespeed_js_min_download'];
		} elseif (isset($module_info['pagespeed_js_min_download'])) {
			$data['pagespeed_js_min_download'] = $module_info['pagespeed_js_min_download'];
		} else {
			$data['pagespeed_js_min_download'] = false;
		}

		if (isset($this->request->post['pagespeed_js_min_exception'])) {
			$data['pagespeed_js_min_exception'] = $this->request->post['pagespeed_js_min_exception'];
		} elseif (isset($module_info['pagespeed_js_min_exception'])) {
			$data['pagespeed_js_min_exception'] = $module_info['pagespeed_js_min_exception'];
		} else {
			$data['pagespeed_js_min_exception'] = false;
		}

		if (isset($this->request->post['pagespeed_js_inline_event'])) {
			$data['pagespeed_js_inline_event'] = $this->request->post['pagespeed_js_inline_event'];
		} elseif (isset($module_info['pagespeed_js_inline_event'])) {
			$data['pagespeed_js_inline_event'] = $module_info['pagespeed_js_inline_event'];
		} else {
			$data['pagespeed_js_inline_event'] = false;
		}

		if (isset($this->request->post['pagespeed_js_inline_event_time'])) {
			$data['pagespeed_js_inline_event_time'] = $this->request->post['pagespeed_js_inline_event_time'];
		} elseif (isset($module_info['pagespeed_js_inline_event_time'])) {
			$data['pagespeed_js_inline_event_time'] = $module_info['pagespeed_js_inline_event_time'];
		} else {
			$data['pagespeed_js_inline_event_time'] = 0;
		}

		if (isset($this->request->post['pagespeed_js_inline_transfer'])) {
			$data['pagespeed_js_inline_transfer'] = $this->request->post['pagespeed_js_inline_transfer'];
		} elseif (isset($module_info['pagespeed_js_inline_transfer'])) {
			$data['pagespeed_js_inline_transfer'] = $module_info['pagespeed_js_inline_transfer'];
		} else {
			$data['pagespeed_js_inline_transfer'] = 0;
		}

		if (isset($this->request->post['pagespeed_js_inline_exception'])) {
			$data['pagespeed_js_inline_exception'] = $this->request->post['pagespeed_js_inline_exception'];
		} elseif (isset($module_info['pagespeed_js_inline_exception'])) {
			$data['pagespeed_js_inline_exception'] = $module_info['pagespeed_js_inline_exception'];
		} else {
			$data['pagespeed_js_inline_exception'] = false;
		}

		if (isset($this->request->post['pagespeed_js_events'])) {
			$data['pagespeed_js_events'] = $this->request->post['pagespeed_js_events'];
		} elseif (!empty($module_info['pagespeed_js_events'])) {
			$data['pagespeed_js_events'] = $module_info['pagespeed_js_events'];
		} else {
			$data['pagespeed_js_events'] = "pagehide\r\nscroll\r\nmouseover\r\ntouchstart";
		}

		if (isset($this->request->post['pagespeed_js_script'])) {
			$data['pagespeed_js_script'] = $this->getFile('replace', 'js');
		} elseif (!empty($module_info['pagespeed_js_script'])) {
			$data['pagespeed_js_script'] = $this->getFile('replace', 'js');
		} else {
			$data['pagespeed_js_script'] = false;
		}

		$cache = new Cache('file', 600);
		$files_cache = $cache->get('bus_cache.debug.total');

		if (empty($files_cache)) {
			$files_cache = $this->dirToArray(DIR_CACHE);

			if ($files_cache) {
				if (isset($files_cache['total'])) {
					$files_cache['total'] = $files_cache['total']+1;
				}
				if (isset($files_cache['size'])) {
					$files_cache['size'] = $files_cache['size']+22;
				}
				$cache->set('bus_cache.debug.total', $files_cache);
			}
		}

		if (isset($files_cache['total'])) {
			$data['cache_total'] = $files_cache['total'];
		} else {
			$data['cache_total'] = 0;
		}

		if (isset($files_cache['size'])) {
			$data['cache_size'] = $this->fileSizeConvert($files_cache['size']);
		} else {
			$data['cache_size'] = 0;
		}

		$data['disc_free'] = $this->fileSizeConvert(disk_free_space('.'));

		if (isset($this->request->post['debug'])) {
			$data['debug'] = $this->request->post['debug'];
		} elseif (isset($module_info['debug'])) {
			$data['debug'] = $module_info['debug'];
		} else {
			$data['debug'] = false;
		}

		$data['header'] = $this->load->controller('common/header');
		$data['column_left'] = $this->load->controller('common/column_left');
		$data['footer'] = $this->load->controller('common/footer');

		if ($this->version_oc >= 3) {
			$template_engine = $this->registry->get('config')->get('template_engine');
			$this->registry->get('config')->set('template_engine', 'template');
		}

		$template = $this->load->view($this->paths['view']['bus_cache'], $data);

		if ($this->version_oc >= 3) {
			$this->registry->get('config')->set('template_engine', $template_engine);
			$this->response->addHeader('Content-Type: text/html; charset=utf-8');
		}

		$this->response->setOutput($template);
	}

	protected function validate() {
		if (!$this->user->hasPermission('modify', $this->paths['controller']['bus_cache'])) {
			$this->error['warning'] = $this->language->get('error_permission');
		}

		return !$this->error;
	}

	// установка
	public function install() {
		// посылыаем на йух
		$this->load->language($this->paths['language']['bus_cache']);

		if ($this->version_oc >= 2.3) {
			if (!$this->user->hasPermission('modify', 'extension/extension/module')) {
				$this->error['warning'] = $this->language->get('error_permission');
			}
		} else {
			if (!$this->user->hasPermission('modify', 'extension/module')) {
				$this->error['warning'] = $this->language->get('error_permission');
			}
		}

		if (!$this->error) {
			// создаём таблицу модуля
			//$this->db->query("CREATE TABLE IF NOT EXISTS `" . DB_PREFIX . "bus_cache` (`module_id` int(11) NOT NULL AUTO_INCREMENT, `setting` text NOT NULL, PRIMARY KEY (`module_id`)) ENGINE = MyISAM DEFAULT CHARSET = utf8");
			//$this->db->query("CREATE TABLE IF NOT EXISTS `" . DB_PREFIX . "bus_cache_description` (`module_id` int(11) NOT NULL, `language_id` int(11) NOT NULL, `setting` text NOT NULL, PRIMARY KEY (`module_id`, `language_id`)) ENGINE = MyISAM DEFAULT CHARSET = utf8");
			//$this->db->query("CREATE TABLE IF NOT EXISTS `" . DB_PREFIX . "bus_cache_account` (`customer_id` int(11) NOT NULL, `setting` text NOT NULL, PRIMARY KEY (`customer_id`)) ENGINE = MyISAM DEFAULT CHARSET = utf8");

			// создаём индекс status товара, если его нет
			/* $result = $this->db->query("SHOW INDEX FROM `" . DB_PREFIX . "product` where Key_name='status'");
			if ($result->num_rows == 0) {
				$this->db->query("ALTER TABLE `" . DB_PREFIX . "product` ADD KEY status (status)");
			} */

			// включаем модификатор модуля, если заливался в БД
			/* $this->load->model($this->paths['model']['modification']);

			$code = $this->{$this->paths['model']['modification_path']}->getModificationByCode($this->code);

			if ($code) {
				$this->{$this->paths['model']['modification_path']}->enableModification($code['modification_id']);
			} */

			// удаляем модификатор модуля, если заливался в БД
			$this->load->model($this->paths['model']['modification']);

			$code = $this->{$this->paths['model']['modification_path']}->getModificationByCode($this->code);

			if ($code) {
				$this->{$this->paths['model']['modification_path']}->deleteModification($code['modification_id']);
			}

			// создаём копию из резерва и переименовываем модификатор, если заливался в system
			$file = $this->getFile('library', 'xml_');

			$this->setFile(false, $file, 'xml');

			// создаём событие
			//$this->load->model($this->paths['model']['event']); 

			//if ($this->version_oc >= 3) {
				//$code = $this->{$this->paths['model']['event_path']}->getEvent($this->name_arhive, 'catalog/view/*/after', $this->paths['controller']['bus_cache'] . '/event');

				//if (!$code) {
					//$this->{$this->paths['model']['event_path']}->addEvent($this->name_arhive, 'catalog/view/*/after', $this->paths['controller']['bus_cache'] . '/event', 1, 1001);
				//}
			//}

			// чистим кэши необходимые для модуля
			//$this->cache->delete('*');
			//$this->cache->delete('blog_category');
			//$this->cache->delete('blog_article');
			//$this->cache->delete('article');
			//$this->cache->delete('category');
			//$this->cache->delete('information');
			//$this->cache->delete('manufacturer');
			//$this->cache->delete('product');
			//$this->cache->delete('seo_pro');
			//$this->cache->delete('seo_url');
			if ($this->version_oc >= 3) {
				$this->load->controller('common/developer/theme');
				$this->load->controller('common/developer/sass');
			}

			// готовим данные для ajax
			$text_install = $this->language->get('text_install');
			$text_ocmod_clear = $this->language->get('text_ocmod_clear');
			$text_ocmod_clearlog = $this->language->get('text_ocmod_clearlog');
			$text_ocmod_refresh = $this->language->get('text_ocmod_refresh');
			$text_cache_clear = $this->language->get('text_cache_clear');

			$success_install = $this->language->get('heading_title') . $this->language->get('success_install');

			$error_install = $this->language->get('error_install');

			$url_ocmod_clear = $this->url->link($this->paths['controller']['modification'] . '/clear', $this->paths['token'], true);
			$url_ocmod_clear = str_ireplace('&amp;', '&', $url_ocmod_clear);
			$url_ocmod_clearlog = $this->url->link($this->paths['controller']['modification'] . '/clearlog', $this->paths['token'], true);
			$url_ocmod_clearlog = str_ireplace('&amp;', '&', $url_ocmod_clearlog);
			$url_ocmod_refresh = $this->url->link($this->paths['controller']['modification'] . '/refresh', $this->paths['token'], true);
			$url_ocmod_refresh = str_ireplace('&amp;', '&', $url_ocmod_refresh);

			$text = <<<HTML
<script><!--
	$('a, button, select, input').attr('disabled', true);

	verticalOffset = typeof(verticalOffset) != 'undefined' ? verticalOffset : 0;
	element = $('body');
	offset = element.offset();
	offsetTop = offset.top;
	$('html, body').animate({scrollTop: offsetTop}, 200, 'linear');

	$('.alert-success').html('<i class="fa fa-check-circle"></i> $text_install <button type="button" class="close" data-dismiss="alert">×</button>');
	setTimeout('ocmodClear()', 2000);

function ocmodClear() {
	$.ajax({
		url: '$url_ocmod_clear',
		method: 'GET',
		dataType: 'html',
		beforeSend: function() {
			$('.alert-success').html('<i class="fa fa-check-circle"></i> $text_ocmod_clear');
		},
		success: function(html) {
			if (html) {
				$('.alert-success').html('<i class="fa fa-check-circle"></i> $text_ocmod_clear <button type="button" class="close" data-dismiss="alert">×</button>');
				setTimeout('ocmodClearlog()', 2000);
			}
		},
		error: function(xhr, ajaxOptions, thrownError) {
			$('.alert-danger').html('<i class="fa fa-exclamation-circle"></i> $error_install <button type="button" class="close" data-dismiss="alert">×</button>');
		}
	});
}

function ocmodClearlog() {
	$.ajax({
		url: '$url_ocmod_clearlog',
		method: 'GET',
		dataType: 'html',
		beforeSend: function() {
			$('.alert-success').html('<i class="fa fa-check-circle"></i> $text_ocmod_clearlog');
		},
		success: function(html) {
			if (html) {
				$('.alert-success').html('<i class="fa fa-check-circle"></i> $text_ocmod_clearlog <button type="button" class="close" data-dismiss="alert">×</button>');
				setTimeout('ocmodRefresh()', 2000);
			}
		},
		error: function(xhr, ajaxOptions, thrownError) {
			$('.alert-danger').html('<i class="fa fa-exclamation-circle"></i> $error_install <button type="button" class="close" data-dismiss="alert">×</button>');
		}
	});
}

function ocmodRefresh() {
	$.ajax({
		url: '$url_ocmod_refresh',
		method: 'GET',
		dataType: 'html',
		beforeSend: function() {
			$('.alert-success').html('<i class="fa fa-check-circle"></i> $text_ocmod_refresh');
		},
		success: function(html) {
			if (html) {
				$('.alert-success').html('<i class="fa fa-check-circle"></i> $text_ocmod_refresh <button type="button" class="close" data-dismiss="alert">×</button>');
				setTimeout('cacheClear()', 2000);
			}
		},
		error: function(xhr, ajaxOptions, thrownError) {
			$('.alert-danger').html('<i class="fa fa-exclamation-circle"></i> $error_install <button type="button" class="close" data-dismiss="alert">×</button>');
		}
	});
}

function cacheClear() {
	$('.alert-success').html('<i class="fa fa-check-circle"></i> $text_cache_clear <button type="button" class="close" data-dismiss="alert">×</button>');
	setTimeout(successModule, 2000);
}

function successModule() {
	$('.alert-success').html('<i class="fa fa-check-circle"></i> $success_install <button type="button" class="close" data-dismiss="alert">×</button>');
	$('a, button, select, input').removeAttr('disabled');
}
//--></script>
HTML;

			if ($this->version_oc >= 2.3) {
				$this->response->addHeader('Content-Type: text/html; charset=utf-8');
				$this->response->setOutput($text);
				echo $this->response->getOutput();
			} else {
				$this->session->data['success'] = $text;

				$this->response->redirect($this->url->link($this->paths['controller']['extension'], $this->paths['token'], true));
			}
		} else {
			echo $this->error['warning'];
		}
	}

	// удаление
	public function uninstall() {
		// посылыаем на йух
		$this->load->language($this->paths['language']['bus_cache']);

		if ($this->version_oc >= 2.3) {
			if (!$this->user->hasPermission('modify', 'extension/extension/module')) {
				$this->error['warning'] = $this->language->get('error_permission');
			}
		} else {
			if (!$this->user->hasPermission('modify', 'extension/module')) {
				$this->error['warning'] = $this->language->get('error_permission');
			}
		}

		if (!$this->error) {
			// Очищаем таблицу модуля
			//$this->db->query("DELETE FROM " . DB_PREFIX . "setting WHERE `code`='bus_cache'");
			//$this->db->query("TRUNCATE TABLE `" . DB_PREFIX . "bus_cache`");
			//$this->db->query("TRUNCATE TABLE `" . DB_PREFIX . "bus_cache_description`");

			// выключаем модификатор модуля
			/* $this->load->model($this->paths['model']['modification']);

			$code = $this->{$this->paths['model']['modification_path']}->getModificationByCode($this->code);

			if ($code) {
				$this->{$this->paths['model']['modification_path']}->disableModification($code['modification_id']);
			} */

			// удаляем копию модификатора созданную из резерва, если заливался в system
			$this->deleteFile(false, 'xml');

			// удаляем событие
			//$this->load->model($this->paths['model']['event']); 

			//if ($this->version_oc >= 3) {
				//$code = $this->{$this->paths['model']['event_path']}->getEvent($this->name_arhive, 'catalog/view/*/after', $this->paths['controller']['bus_cache'] . '/event');

				//if ($code) {
					//$this->{$this->paths['model']['event_path']}->deleteEvent($this->name_arhive);
				//}
			//}

			// чистим кэши необходимые для модуля
			//$this->cache->delete('*');
			//$this->cache->delete('blog_category');
			//$this->cache->delete('blog_article');
			//$this->cache->delete('article');
			//$this->cache->delete('category');
			//$this->cache->delete('information');
			//$this->cache->delete('manufacturer');
			//$this->cache->delete('product');
			//$this->cache->delete('seo_pro');
			//$this->cache->delete('seo_url');
			if ($this->version_oc >= 3) {
				$this->load->controller('common/developer/theme');
				$this->load->controller('common/developer/sass');
			}

			// готовим данные для ajax
			$text_uninstall = $this->language->get('text_uninstall');
			$text_uninstall_files = $this->language->get('text_uninstall_files');
			$text_ocmod_clear = $this->language->get('text_ocmod_clear');
			$text_ocmod_clearlog = $this->language->get('text_ocmod_clearlog');
			$text_ocmod_refresh = $this->language->get('text_ocmod_refresh');
			$text_cache_clear = $this->language->get('text_cache_clear');

			$button_files_clear = $this->language->get('button_files_clear');

			$success_uninstall = $this->language->get('heading_title') . $this->language->get('success_uninstall');

			$error_uninstall = $this->language->get('error_uninstall');

			$url_uninstall_files = $this->url->link($this->paths['controller']['bus_cache'] . '/uninstallFiles', $this->paths['token'], true);
			$url_uninstall_files = str_ireplace('&amp;', '&', $url_uninstall_files);
			$url_ocmod_clear = $this->url->link($this->paths['controller']['modification'] . '/clear', $this->paths['token'], true);
			$url_ocmod_clear = str_ireplace('&amp;', '&', $url_ocmod_clear);
			$url_ocmod_clearlog = $this->url->link($this->paths['controller']['modification'] . '/clearlog', $this->paths['token'], true);
			$url_ocmod_clearlog = str_ireplace('&amp;', '&', $url_ocmod_clearlog);
			$url_ocmod_refresh = $this->url->link($this->paths['controller']['modification'] . '/refresh', $this->paths['token'], true);
			$url_ocmod_refresh = str_ireplace('&amp;', '&', $url_ocmod_refresh);

			$text = <<<HTML
<script><!--
	$('a, button, select, input').attr('disabled', true);

	verticalOffset = typeof(verticalOffset) != 'undefined' ? verticalOffset : 0;
	element = $('body');
	offset = element.offset();
	offsetTop = offset.top;
	$('html, body').animate({scrollTop: offsetTop}, 200, 'linear');

	$('.alert-success').html('<i class="fa fa-check-circle"></i> $text_uninstall <button type="button" class="close" data-dismiss="alert">×</button>');
	setTimeout('ocmodClear()', 2000);

function ocmodClear() {
	$.ajax({
		url: '$url_ocmod_clear',
		method: 'GET',
		dataType: 'html',
		beforeSend: function() {
			$('.alert-success').html('<i class="fa fa-check-circle"></i> $text_ocmod_clear');
		},
		success: function(html) {
			if (html) {
				$('.alert-success').html('<i class="fa fa-check-circle"></i> $text_ocmod_clear <button type="button" class="close" data-dismiss="alert">×</button>');
				setTimeout('ocmodClearlog()', 2000);
			}
		},
		error: function(xhr, ajaxOptions, thrownError) {
			$('.alert-danger').html('<i class="fa fa-exclamation-circle"></i> $error_uninstall <button type="button" class="close" data-dismiss="alert">×</button>');
		}
	});
}

function ocmodClearlog() {
	$.ajax({
		url: '$url_ocmod_clearlog',
		method: 'GET',
		dataType: 'html',
		beforeSend: function() {
			$('.alert-success').html('<i class="fa fa-check-circle"></i> $text_ocmod_clearlog');
		},
		success: function(html) {
			if (html) {
				$('.alert-success').html('<i class="fa fa-check-circle"></i> $text_ocmod_clearlog <button type="button" class="close" data-dismiss="alert">×</button>');
				setTimeout('ocmodRefresh()', 2000);
			}
		},
		error: function(xhr, ajaxOptions, thrownError) {
			$('.alert-danger').html('<i class="fa fa-exclamation-circle"></i> $error_uninstall <button type="button" class="close" data-dismiss="alert">×</button>');
		}
	});
}

function ocmodRefresh() {
	$.ajax({
		url: '$url_ocmod_refresh',
		method: 'GET',
		dataType: 'html',
		beforeSend: function() {
			$('.alert-success').html('<i class="fa fa-check-circle"></i> $text_ocmod_refresh');
		},
		success: function(html) {
			if (html) {
				$('.alert-success').html('<i class="fa fa-check-circle"></i> $text_ocmod_refresh <button type="button" class="close" data-dismiss="alert">×</button>');
				setTimeout('cacheClear()', 2000);
			}
		},
		error: function(xhr, ajaxOptions, thrownError) {
			$('.alert-danger').html('<i class="fa fa-exclamation-circle"></i> $error_uninstall <button type="button" class="close" data-dismiss="alert">×</button>');
		}
	});
}
function cacheClear() {
	$('.alert-success').html('<i class="fa fa-check-circle"></i> $text_cache_clear <button type="button" class="close" data-dismiss="alert">×</button>');
	setTimeout(successModule, 2000);
}

function successModule() {
	$('.alert-success').html('<i class="fa fa-check-circle"></i> $success_uninstall <button type="button" class="close" data-dismiss="alert">×</button>');
	$('.alert-success').after('<a type="button" onclick="uninstallFiles();" class="btn btn-info alert" style="width:100%;" data-dismiss="alert"><i class="fa fa-trash-o"></i> $button_files_clear</a>');
	$('a, button, select, input').removeAttr('disabled');
}

function uninstallFiles() {
	$.ajax({
		url: '$url_uninstall_files',
		method: 'GET',
		dataType: 'json',
		beforeSend: function() {
			$('.alert-success').html('<i class="fa fa-check-circle"></i> $text_uninstall_files');
		},
		success: function(html) {
			$('button[onclick="uninstallFiles();"]').hide();
			if (html) {
				$('.alert-success').html('<i class="fa fa-check-circle"></i> ' + html + ' =( <button type="button" class="close" data-dismiss="alert">×</button>');
			}
		},
		error: function(xhr, ajaxOptions, thrownError) {
			if (xhr) {
				$('.alert-danger').html('<i class="fa fa-check-circle"></i> ' + thrownError + ' ' + xhr.statusText + ' ' + xhr.responseText + ' =( <button type="button" class="close" data-dismiss="alert">×</button>');
			} else {
				$('.alert-danger').html('<i class="fa fa-exclamation-circle"></i> $error_uninstall <button type="button" class="close" data-dismiss="alert">×</button>');
			}
		}
	});
}
//--></script>
HTML;

			if ($this->version_oc >= 2.3) {
				$this->response->addHeader('Content-Type: text/html; charset=utf-8');
				$this->response->setOutput($text);
				echo $this->response->getOutput();
			} else {
				$this->session->data['success'] = $text;

				$this->response->redirect($this->url->link($this->paths['controller']['extension'], $this->paths['token'], true));
			}
		} else {
			echo $this->error['warning'];
		}
	}

	// удаление файлов модуля
	public function uninstallFiles() {
		$this->load->language($this->paths['language']['bus_cache']);

		// посылыаем на йух
		if ($this->version_oc >= 2.3) {
			if (!$this->user->hasPermission('modify', 'extension/extension/module') || !$this->user->hasPermission('modify', $this->paths['controller']['bus_cache'])) {
				$this->error['warning'] = $this->language->get('error_permission');
			}
		} else {
			if (!$this->user->hasPermission('modify', 'extension/module') || !$this->user->hasPermission('modify', $this->paths['controller']['bus_cache'])) {
				$this->error['warning'] = $this->language->get('error_permission');
			}
		}

		if (!$this->error) {
			// удаляем права администратора
			$this->load->model('user/user_group');

			foreach ($this->model_user_user_group->getUserGroups() as $result) {
				if ($this->version_oc >= 4) {
					$this->model_user_user_group->removePermission($result['user_group_id'], 'access', $this->paths['controller']['bus_cache']);
					$this->model_user_user_group->removePermission($result['user_group_id'], 'modify', $this->paths['controller']['bus_cache']);
				} else {
					$users = array();
					$users[0]['user_group_id'] = $result['user_group_id'];
					$users[0]['type'] = 'access';
					$users[0]['route'] = $this->paths['controller']['bus_cache'];
					$users[1]['user_group_id'] = $result['user_group_id'];
					$users[1]['type'] = 'modify';
					$users[1]['route'] = $this->paths['controller']['bus_cache'];

					foreach ($users as $user) {
						$user_group_query = $this->db->query("SELECT DISTINCT * FROM " . DB_PREFIX . "user_group WHERE user_group_id = '" . (int)$user['user_group_id'] . "'");

						if ($user_group_query->num_rows) {
							$data = json_decode($user_group_query->row['permission'], true);

							if (isset($data[$user['type']])) {
								$data[$user['type']] = array_diff($data[$user['type']], array($user['route']));
							}

							$this->db->query("UPDATE " . DB_PREFIX . "user_group SET permission = '" . $this->db->escape(json_encode($data)) . "' WHERE user_group_id = '" . (int)$user['user_group_id'] . "'");
						}
					}
				}
			}

			// удаляем таблицу модуля
			//$this->db->query("DROP TABLE IF EXISTS `" . DB_PREFIX . "bus_cache`");
			//$this->db->query("DROP TABLE IF EXISTS `" . DB_PREFIX . "bus_cache_description`");
			//$this->db->query("DROP TABLE IF EXISTS `" . DB_PREFIX . "bus_cache_account`");

			// удаляем индекс status товара
			/* $result = $this->db->query("SHOW INDEX FROM `" . DB_PREFIX . "product` where Key_name='status'");
			if ($result->num_rows > 0) {
				$this->db->query("ALTER TABLE `" . DB_PREFIX . "product` DROP INDEX status");
			} */

			// удаляем модуль из БД списка установленных модулей
			if ($this->version_oc >= 3) {
				$this->load->model($this->paths['model']['extension']);

				$results = $this->{$this->paths['model']['extension_path']}->getExtensionInstalls(0, 1000);

				foreach ($results as $result) {
					if (stristr($result['filename'], $this->name_arhive)) {
						$this->{$this->paths['model']['extension_path']}->deleteExtensionInstall($result['extension_install_id']);
						$paths = $this->{$this->paths['model']['extension_path']}->getExtensionPathsByExtensionInstallId($result['extension_install_id']);

						foreach ($paths as $path) {
							$this->{$this->paths['model']['extension_path']}->deleteExtensionPath($path['extension_path_id']);
						}
					}
				}
			}

			// удаляем модификатор модуля, если заливался в БД
			$this->load->model($this->paths['model']['modification']);

			$code = $this->{$this->paths['model']['modification_path']}->getModificationByCode($this->code);

			if ($code) {
				$this->{$this->paths['model']['modification_path']}->deleteModification($code['modification_id']);
			}

			// удаляем событие
			//$this->load->model($this->paths['model']['event']); 

			//if ($this->version_oc >= 3) {
				//$code = $this->{$this->paths['model']['event_path']}->getEvent($this->name_arhive, 'catalog/view/*/after', $this->paths['controller']['bus_cache'] . '/event');

				//if ($code) {
					//$this->{$this->paths['model']['event_path']}->deleteEvent($this->name_arhive);
				//}
			//}

			// готовим данные для php
			$db_paths = array(
				//DB_PREFIX . 'bus_cache_geo',
			);

			$module_paths = array(
				// 2.0 - 2.2 OpenCart
				DIR_APPLICATION . 'controller/module/bus_cache.php',
				//DIR_APPLICATION . 'model/module/bus_cache.php',
				DIR_APPLICATION . 'view/template/module/bus_cache',
				//DIR_CATALOG . 'controller/module/bus_cache.php',
				//DIR_CATALOG . 'model/module/bus_cache.php',
				// 2.3 - 3.1 OpenCart
				DIR_APPLICATION . 'controller/extension/module/bus_cache.php',
				//DIR_APPLICATION . 'model/extension/module/bus_cache.php',
				DIR_APPLICATION . 'view/template/extension/module/bus_cache',
				//DIR_CATALOG . 'controller/extension/module/bus_cache.php',
				//DIR_CATALOG . 'model/extension/module/bus_cache.php',
				//DIR_IMAGE . 'catalog/bus_cache[NAGIBATOR]',
				//DIR_LOGS . 'bus_cache',
				DIR_SYSTEM . 'library/bus_cache[NAGIBATOR]',
				DIR_SYSTEM . 'library/bus_cache.ocmod.xml_',
				DIR_SYSTEM . 'bus_cache.ocmod.xml',
			);

			// проверяем и удаляем со всех языковых файлов
			foreach (glob(DIR_APPLICATION . 'language/*') as $path) {
				$module_paths[] = $path . '/module/bus_cache[NAGIBATOR]';
				$module_paths[] = $path . '/extension/module/bus_cache[NAGIBATOR]';
			}

			/* foreach (glob(DIR_CATALOG . 'language/*') as $path) {
				$module_paths[] = $path . '/module/bus_cache[NAGIBATOR]';
				$module_paths[] = $path . '/extension/module/bus_cache[NAGIBATOR]';
			} */

			// проверяем и удаляем со всех тем
			foreach (glob(DIR_CATALOG . 'view/theme/*') as $path) {
				$module_paths[] = $path . '/stylesheet/bus_cache[NAGIBATOR]';
				$module_paths[] = $path . '/javascript/bus_cache[NAGIBATOR]';
				$module_paths[] = $path . '/javascript';
				$module_paths[] = $path . '/template/module/bus_cache[NAGIBATOR]';
				$module_paths[] = $path . '/template/extension/module/bus_cache[NAGIBATOR]';
			}

			$text = '------------------- Start: ' . date($this->language->get('datetime_format')) . ' ' . $this->language->get('text_uninstall_files_log') . ' ' . strip_tags($this->language->get('heading_title')) . ' -------------------';
			foreach ($db_paths as $path) {
				$text .= "\n" . '<br>' . $this->language->get('success_uninstall_data_base') . $path;
			}
			if ($code) {
				$text .= "\n" . '<br>' . $this->language->get('success_uninstall_modification') . $this->name . ' (id: ' . $this->code . ')';
			}
			foreach ($module_paths as $path) {
				$text .= $this->deleteDir($path);
			}
			$text .= "\n" . '<br>------------------- Stop: ' . date($this->language->get('datetime_format')) . ' ' . $this->language->get('text_uninstall_files_log') . ' ' . strip_tags($this->language->get('heading_title')) . ' -------------------' . "\n";

			// Log
			$handle = fopen(DIR_LOGS . 'ocmod.log', 'w+');

			flock($handle, LOCK_EX);

			fwrite($handle, strip_tags(str_replace(array(DIR_APPLICATION, DIR_CATALOG, DIR_IMAGE, DIR_SYSTEM), array(basename(DIR_APPLICATION) . '/', basename(DIR_CATALOG) . '/', basename(DIR_IMAGE) . '/', basename(DIR_SYSTEM) . '/'), $text)));

			fflush($handle);

			flock($handle, LOCK_UN);

			fclose($handle);

			//$ocmod = new Log('ocmod.log');
			//$ocmod->write($text);

			$this->response->addHeader('Content-Type: application/json');
			$this->response->setOutput(json_encode($text, JSON_HEX_AMP));
		} else {
			$this->response->addHeader('Content-Type: application/json');
			$this->response->setOutput(json_encode($this->error['warning'], JSON_HEX_AMP));
		}
	}

	private function deleteDir($dirname, $nagibator_all = false) {
		$this->load->language($this->paths['language']['bus_cache']);

		$text = false;
		$nagibator = false;

		// мягко нагибаем
		if (strpos($dirname, '[NAGIBATOR]') !== false) {
			$dirname = str_replace('[NAGIBATOR]', '', $dirname);
			$nagibator = true;
		}

		$files = glob($dirname . '*', GLOB_NOSORT);

		if ($files) {
			foreach ($files as $dirname) {
				if (file_exists($dirname)) {
					if (is_dir($dirname)) {
						$dir_del = true;

						// нагибаем по иерархии
						if ($nagibator || $nagibator_all) {
							$text .= $this->deleteDir($dirname . DIRECTORY_SEPARATOR, true);
						}

						// проверяем пустая-ли папка
						$dir = opendir($dirname);
						while (($filename = readdir($dir)) !== false) {
							if (!in_array($filename, array(".", ".."))) {
								$dir_del = false;
							}
						}
						closedir($dir);

						// удаляем пустую папку
						if ($dir_del) {
							rmdir($dirname);
							$text .= "\n" . '<br>' . $this->language->get('success_uninstall_folder') . $dirname;
						}
					} else {
						$filename = basename($dirname);
						// удаляем файлы кроме index.html и .htaccess или все при явном нагибании
						if ($nagibator_all || !in_array($filename, array('index.html', '.htaccess'))) {
							@unlink($dirname);
							$text .= "\n" . '<br>' . $this->language->get('success_uninstall_file') . $dirname;
						}
					}
				}
			}
		}

		return $text;
	}

	private function update() {
		$version = $this->configGet('version');
		if ($this->validate() && ($this->request->server['REQUEST_METHOD'] != 'POST') && $version && version_compare($this->version, $version, '>')) {
			if (version_compare('1.1.1', $version, '>')) {

			}

			$this->clear();
			$this->session->data['success'] = $this->modification($this->language->get('heading_title') . $this->language->get('success_update'), true, 500);
		}
	}

	private function modification($message = false, $data = true, $speed = 2000) {
		// посылыаем на йух
		if ($this->version_oc >= 2.3) {
			if (!$this->user->hasPermission('modify', 'extension/extension/module')) {
				$this->error['warning'] = $this->language->get('error_permission');
			}
		} else {
			if (!$this->user->hasPermission('modify', 'extension/module')) {
				$this->error['warning'] = $this->language->get('error_permission');
			}
		}

		if (!$this->error) {
			$file = $this->getFile(false, 'xml');

			if ($data && $file) {
				$this->deleteFile(false, 'xml');
				if ($this->getFile('library', 'xml_')) {
					$this->setFile(false, $this->getFile('library', 'xml_'), 'xml');
				}
			} elseif ($data && !$file) {
				$this->setFile(false, $this->getFile('library', 'xml_'), 'xml');
			} elseif (!$data) {
				$this->deleteFile(false, 'xml');
			}

			// удаляем модификатор модуля, если заливался в БД
			/* $this->load->model($this->paths['model']['modification']);

			$code = $this->{$this->paths['model']['modification_path']}->getModificationByCode($this->code);

			if ($code) {
				$this->{$this->paths['model']['modification_path']}->deleteModification($code['modification_id']);
			} */

			// чистим кэши необходимые для модуля
			//$this->cache->delete('*');
			//$this->cache->delete('blog_category');
			//$this->cache->delete('blog_article');
			//$this->cache->delete('article');
			//$this->cache->delete('category');
			//$this->cache->delete('information');
			//$this->cache->delete('manufacturer');
			//$this->cache->delete('product');
			//$this->cache->delete('seo_pro');
			//$this->cache->delete('seo_url');
			if ($this->version_oc >= 3) {
				$this->load->controller('common/developer/theme');
				//$this->load->controller('common/developer/sass');
			}

			// готовим данные для ajax
			$text_ocmod_clear = $this->language->get('text_ocmod_clear');
			$text_ocmod_clearlog = $this->language->get('text_ocmod_clearlog');
			$text_ocmod_refresh = $this->language->get('text_ocmod_refresh');

			if (isset($this->session->data['apply'])) {
				$success = $this->language->get('success_setting_apply') . ' ' . $message;
				unset($this->session->data['apply']);
			} else {
				$success = $this->language->get('success_setting_save') . ' ' . $message;
			}

			$error_uninstall = $this->language->get('error_uninstall');

			$url_ocmod_clear = $this->url->link($this->paths['controller']['modification'] . '/clear', $this->paths['token'], true);
			$url_ocmod_clear = str_ireplace('&amp;', '&', $url_ocmod_clear);
			$url_ocmod_clearlog = $this->url->link($this->paths['controller']['modification'] . '/clearlog', $this->paths['token'], true);
			$url_ocmod_clearlog = str_ireplace('&amp;', '&', $url_ocmod_clearlog);
			$url_ocmod_refresh = $this->url->link($this->paths['controller']['modification'] . '/refresh', $this->paths['token'], true);
			$url_ocmod_refresh = str_ireplace('&amp;', '&', $url_ocmod_refresh);

			$text = <<<HTML
<script><!--
	$('a, button, select, input').attr('disabled', true);

	verticalOffset = typeof(verticalOffset) != 'undefined' ? verticalOffset : 0;
	element = $('body');
	offset = element.offset();
	offsetTop = offset.top;
	$('html, body').animate({scrollTop: offsetTop}, 200, 'linear');

	ocmodClear();

function ocmodClear() {
	$.ajax({
		url: '$url_ocmod_clear',
		method: 'GET',
		dataType: 'html',
		beforeSend: function() {
			$('.alert-success').html('<i class="fa fa-check-circle"></i> $text_ocmod_clear');
		},
		success: function(html) {
			if (html) {
				$('.alert-success').html('<i class="fa fa-check-circle"></i> $text_ocmod_clear <button type="button" class="close" data-dismiss="alert">×</button>');
				setTimeout(ocmodClearlog, $speed);
			}
		},
		error: function(xhr, ajaxOptions, thrownError) {
			$('.alert-danger').html('<i class="fa fa-exclamation-circle"></i> $error_uninstall <button type="button" class="close" data-dismiss="alert">×</button>');
		}
	});
}

function ocmodClearlog() {
	$.ajax({
		url: '$url_ocmod_clearlog',
		method: 'GET',
		dataType: 'html',
		beforeSend: function() {
			$('.alert-success').html('<i class="fa fa-check-circle"></i> $text_ocmod_clearlog');
		},
		success: function(html) {
			if (html) {
				$('.alert-success').html('<i class="fa fa-check-circle"></i> $text_ocmod_clearlog <button type="button" class="close" data-dismiss="alert">×</button>');
				setTimeout(ocmodRefresh, $speed);
			}
		},
		error: function(xhr, ajaxOptions, thrownError) {
			$('.alert-danger').html('<i class="fa fa-exclamation-circle"></i> $error_uninstall <button type="button" class="close" data-dismiss="alert">×</button>');
		}
	});
}

function ocmodRefresh() {
	$.ajax({
		url: '$url_ocmod_refresh',
		method: 'GET',
		dataType: 'html',
		beforeSend: function() {
			$('.alert-success').html('<i class="fa fa-check-circle"></i> $text_ocmod_refresh');
		},
		success: function(html) {
			if (html) {
				$('.alert-success').html('<i class="fa fa-check-circle"></i> $text_ocmod_refresh <button type="button" class="close" data-dismiss="alert">×</button>');
				setTimeout(successModule, $speed);
			}
		},
		error: function(xhr, ajaxOptions, thrownError) {
			$('.alert-danger').html('<i class="fa fa-exclamation-circle"></i> $error_uninstall <button type="button" class="close" data-dismiss="alert">×</button>');
		}
	});
}

function successModule() {
	$('.alert-success').html('<i class="fa fa-check-circle"></i> $success <button type="button" class="close" data-dismiss="alert">×</button>');
	$('a, button, select, input').removeAttr('disabled');
}
//--></script>
HTML;

			return $text;
		}
	}
}