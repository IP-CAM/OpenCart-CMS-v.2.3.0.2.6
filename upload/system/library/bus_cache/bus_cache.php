<?php
// *   Аўтар: "БуслікДрэў" ( https://buslikdrev.by/ )
// *   © 2016-2022; BuslikDrev - Усе правы захаваныя.
// *   Спецыяльна для сайта: "OpenCart.pro" ( https://opencart.pro/ )

namespace Bus_Cache;
class Bus_Cache {
	private $registry;
	private $fileType = array(
		'woff'  => array('type' => 'font/woff', 'as' => 'font'),
		'woff2' => array('type' => 'font/woff2', 'as' => 'font'),
		//'eot'   => array('type' => 'application/x-font-opentype', 'as' => 'font'),
		//'eot'   => array('type' => 'application/vnd.ms-fontobject', 'as' => 'font'),
		'otf'   => array('type' => 'application/x-font-truetype', 'as' => 'font'),
		'ttf'   => array('type' => 'application/x-font-truetype', 'as' => 'font'),
		'svg'   => array('type' => 'image/svg+xml', 'as' => 'image'),
		'svgz'  => array('type' => 'image/svg+xml', 'as' => 'image'),
		'png'   => array('type' => 'image/png', 'as' => 'image'),
		'jpg'   => array('type' => 'image/jpeg', 'as' => 'image'),
		'jpeg'  => array('type' => 'image/jpeg', 'as' => 'image'),
		'gif'   => array('type' => 'image/gif', 'as' => 'image'),
		'webp'  => array('type' => 'image/webp', 'as' => 'image'),
		'bmp'   => array('type' => 'image/bmp', 'as' => 'image'),
		'ico'   => array('type' => 'image/x-icon', 'as' => 'image'),
		'mp3'   => array('type' => 'audio/mp3', 'as' => 'audio'),
		'mp4'   => array('type' => 'video/mp4', 'as' => 'video'),
		'webm'  => array('type' => 'video/webm', 'as' => 'video'),
		'css'   => array('type' => 'text/css', 'as' => 'style'),
		'js'    => array('type' => 'text/javascript', 'as' => 'script'),
		//'html'  => array('type' => 'text/html', 'as' => 'document'),
		//'xml'   => array('type' => 'text/xml', 'as' => 'document'),
		//'json'  => array('type' => 'text/plain', 'as' => 'xhr'),
		
	);
	private $outputTransfer = array(
		'css' => array('', '', '', ''),
		'css_inline' => array('', '', '', ''),
		'js' => array('', '', '', ''),
		'js_inline' => array('', '', '', ''),
	);
	private $output = '';
	private $getDebugSpeed = '';
	private $getDebugTime = 0;

	//private function start() {}
	//public function output() {}
	//private function realUrlCSS() {}
	//private function minCSS() {}
	//private function minJS() {}
	//private function minHTML() {}
	//private function setDebugSpeed() {}

	public function __construct($registry = false, $cache_timer = 0) {
		if ($registry) {
			$this->registry = $registry;
			$this->start($cache_timer);
		}
	}

	private function start($cache_timer = 0) {
		// загрузка данных
		$this->config = $this->registry->get('config');
		$store_id = (int)$this->config->get('config_store_id');
		$setting = $this->config->get('bus_cache');
		if (empty($setting['status']) || !isset($setting['store'][$store_id])) {
			return false;
		}
		$this->request = $this->registry->get('request');
		$server = (!empty($this->request->server['HTTPS']) ? $this->config->get('config_ssl') : $this->config->get('config_url'));
		$language_id = (int)$this->config->get('config_language_id');
		$customer_group_id = (int)$this->config->get('config_customer_group_id');
		$maintenance = (int)$this->config->get('config_maintenance');
		$setting_default = array(
			'config_logo'                    => $this->config->get('config_logo'),
			'theme'                          => ($this->config->get('config_template') ? $this->config->get('config_template') : ($this->config->get('theme_' . str_replace('theme_', '', $this->config->get('config_theme')) . '_directory') ? $this->config->get('theme_' . str_replace('theme_', '', $this->config->get('config_theme')) . '_directory') : $this->config->get('config_theme'))),
			'route'                          => false,
			'keyword'                        => false,

			'status'                         => false,
			'cache_status'                   => false,
			'cache_ses'                      => false,
			'cache_onrot'                    => false,
			'cache_rot'                      => false,
			'cache_customer'                 => false,
			'cache_oc'                       => false,
			'cache_engine'                   => false,
			'cache_expire'                   => false,
			'cache_device'                   => false,
			'pagespeed_status'               => false,
			'pagespeed_rot'                  => false,
			'pagespeed_preload_logo'         => false,
			'pagespeed_attribute_w_h'        => false,
			'pagespeed_lazy_load'            => false,
			'pagespeed_replace'              => false,
			'pagespeed_html_min'             => false,
			'pagespeed_css_min'              => false,
			'pagespeed_css_min_links'        => false,
			'pagespeed_css_min_download'     => false,
			'pagespeed_css_min_exception'    => false,
			'pagespeed_css_min_font'         => false,
			'pagespeed_css_min_display'      => false,
			'pagespeed_css_critical'         => false,
			'pagespeed_css_inline_transfer'  => false,
			'pagespeed_css_events'           => false,
			'pagespeed_css_style'            => false,
			'pagespeed_js_min'               => false,
			'pagespeed_js_min_download'      => false,
			'pagespeed_js_min_exception'     => false,
			'pagespeed_js_inline_event'      => false,
			'pagespeed_js_inline_event_time' => false,
			'pagespeed_js_inline_transfer'   => false,
			'pagespeed_js_events'            => false,
			'pagespeed_js_script'            => false,
			'debug'                          => false,
		);

		if (is_array($setting)) {
			foreach ($setting as $key => $result) {
				$setting_default[$key] = $result;
			}
		}
		$setting = $setting_default;

		// остальные данные
		$this->session = $this->registry->get('session');
		$this->db = $this->registry->get('db');
		$this->response = $this->registry->get('response');
		$this->cart = $this->registry->get('cart');
		$this->customer = $this->registry->get('customer');
		$this->affiliate = $this->registry->get('affiliate');

		// время загрузки страницы с кэшем и без
		$cache_time = (float)$cache_timer;
		if (version_compare(phpversion(), '5.4.0', '>=') && isset($this->request->server['REQUEST_TIME_FLOAT'])) {
			$cache_timer = (float)str_replace(',', '.', $this->request->server['REQUEST_TIME_FLOAT']);
		} else {
			if (defined('BUS_CACHE_TIMER')) {
				$cache_timer = (float)BUS_CACHE_TIMER;
			}
		}

		if ($setting['cache_status'] || $setting['cache_oc']) {
			$bus_cache = new \Cache('Bus_Cache\\' . $setting['cache_engine'], $setting['cache_expire']);
		}
		if ($setting['cache_oc']) {
			$this->registry->set('cache', $bus_cache);
		}

		// debug режим
		if ($setting['debug']) {
			ini_set('display_errors', 1);
			ini_set('display_startup_errors', 1);
			ini_set('error_reporting', 1);
			ini_set('error_reporting', E_ALL);
		}

		// условие работы кэша и debug режима
		if (version_compare(VERSION, '2.2.0', '<')) {
			$user = new \User($this->registry);
		} else {
			$user = new \Cart\User($this->registry);
		}
		if ($user->isLogged()) {
			if (!$setting['debug']) {
				$setting['cache_status'] = false;
			}
		} else {
			$setting['debug'] = false;
		}

		if ($setting['cache_status']) {
			if (!$setting['cache_customer'] && $this->customer->isLogged()) {
				$setting['cache_status'] = false;
			}
			if (!$setting['cache_customer'] && method_exists($this->affiliate, 'isLogged') && $this->affiliate->isLogged()) {
				$setting['cache_status'] = false;
			}
		}

		// отключаем кэш, если товаров в корзине много
		$cart = $this->cart->getProducts();
		if (count($cart) > 10) {
			$setting['cache_status'] = false;
		}

		if (!$maintenance) {
			//$setting['cache_status'] = false;
		}

		// условие обработки роута и keyword
		if ($setting['cache_status'] || $setting['pagespeed_status']) {
			if (isset($this->request->get['_route_'])) {
				$route = $this->request->get['_route_'];
				$keyword = utf8_strtolower(basename($route));
				$str = strstr($keyword, '.', true);
				if ($str) {
					$keyword = $str;
				}
				$setting['keyword'] = $keyword;

				if (version_compare(VERSION, '3.0.0', '>')) {
					$query = $this->db->query("SELECT * FROM " . DB_PREFIX . "seo_url WHERE `store_id` = '" . $store_id . "' AND `language_id` = '" . $language_id . "' AND `keyword` = '" . $this->db->escape($keyword) . "' LIMIT 1");
				} else {
					$query = $this->db->query("SELECT * FROM " . DB_PREFIX . "url_alias WHERE `keyword` = '" . $this->db->escape($keyword) . "' LIMIT 1");
				}

				if ($query->num_rows && $query->row['query']) {
					$route = $query->row['query'];
				}
			} elseif (isset($this->request->get['route'])) {
				$route = $this->request->get['route'];
			} elseif (isset($this->request->post['route'])) {
				$route = $this->request->post['route'];
			} else {
				$route = 'common/home';
			}
			if ($route) {
				$route = utf8_strtolower($route);
			}

			$setting['route'] = $route;
		}

		// параметры работы кэша
		if ($setting['cache_onrot'] && $setting['cache_status']) {
			$setting['cache_status'] = false;
			$setting['cache_rot'] = false;
			$rot_exceptions = str_replace(array("\r", "\n", ';', ' '), ',', $setting['cache_onrot']);
			$rot_exceptions = str_replace(',,', ',', $rot_exceptions);
			$rot_exceptions = explode(',', $rot_exceptions);

			foreach ($rot_exceptions as $exception) {
				$exception = utf8_strtolower($exception);
				if ($exception && strpos($route, $exception) !== false || $setting['keyword'] && strpos($exception, $setting['keyword']) !== false) {
					$setting['cache_status'] = true;
				}
			}
		}

		// параметры исключения из кэша
		if ($setting['cache_rot'] && $setting['cache_status']) {
			$rot_exceptions = str_replace(array("\r", "\n", ';', ' '), ',', $setting['cache_rot']);
			$rot_exceptions = str_replace(',,', ',', $rot_exceptions);
			$rot_exceptions = explode(',', $rot_exceptions);

			foreach ($rot_exceptions as $exception) {
				$exception = utf8_strtolower($exception);
				if ($exception && strpos($route, $exception) !== false || $setting['keyword'] && strpos($exception, $setting['keyword']) !== false) {
					$setting['cache_status'] = false;
				}
			}
		}

		// параметры исключения из оптимизации
		if ($setting['pagespeed_rot'] && $setting['pagespeed_status']) {
			$rot_exceptions = str_replace(array("\r", "\n", ';', ' '), ',', $setting['pagespeed_rot']);
			$rot_exceptions = str_replace(',,', ',', $rot_exceptions);
			$rot_exceptions = explode(',', $rot_exceptions);

			foreach ($rot_exceptions as $exception) {
				$exception = utf8_strtolower($exception);
				if ($exception && strpos($route, $exception) !== false || $setting['keyword'] && strpos($exception, $setting['keyword']) !== false) {
					$setting['pagespeed_status'] = false;
				}
			}
		}

		// cache
		if ($setting['cache_status']) {
			// разнообразие кэша по категориям и производителям
			$url = explode('=', $route);

			if ($url[0] == 'path' || $url[0] == 'category_id' || $url[0] == 'manufacturer_id') {
				$category_id = explode('_', (string)$url[1]);
				$category_id = (int)array_pop($category_id);
				if ($url[0] == 'manufacturer_id') {
					$category_id = 'man' . $category_id;
				} else {
					$category_id = 'cat' . $category_id;
				}
			} else {
				$category_id = 0;
			}

			// определение мобильных устройств
			$device = 'desktop';

			if ($setting['cache_device'] && isset($this->request->server['HTTP_USER_AGENT'])) {
				$ua = $this->request->server['HTTP_USER_AGENT'];
				/* if (preg_match('/GoogleTV|SmartTV|Internet.TV|NetCast|NETTV|AppleTV|boxee|Kylo|Roku|DLNADOC|CE\-HTML/i', $ua)) {
					$device = 'tablet';
				} elseif (preg_match('/Xbox|PLAYSTATION.3|Wii/i', $ua)) {
					$device = 'tablet';
				} elseif (preg_match('/iP(a|ro)d/i', $ua) || preg_match('/tablet/i', $ua) && !preg_match('/RX-34/i', $ua) || preg_match('/FOLIO/i', $ua)) {
					$device = 'tablet';
				} elseif (preg_match('/Linux/i', $ua) && preg_match('/Android/i', $ua) && !preg_match('/Fennec|mobi|HTC.Magic|HTCX06HT|Nexus.One|SC-02B|fone.945/i', $ua)) {
					$device = 'tablet';
				} elseif (preg_match('/Kindle/i', $ua) || preg_match('/Mac.OS/i', $ua) && preg_match('/Silk/i', $ua)) {
					$device = 'tablet';
				} elseif (preg_match('/GT-P10|SC-01C|SHW-M180S|SGH-T849|SCH-I800|SHW-M180L|SPH-P100|SGH-I987|zt180|HTC(.Flyer|\_Flyer)|Sprint.ATP51|ViewPad7|pandigital(sprnova|nova)|Ideos.S7|Dell.Streak.7|Advent.Vega|A101IT|A70BHT|MID7015|Next2|nook/i', $ua) || preg_match('/MB511/i', $ua) && preg_match('/RUTEM/i', $ua)) {
					$device = 'tablet';
				} else */if (preg_match('/BOLT|Fennec|Iris|Maemo|Minimo|Mobi|mowser|NetFront|Novarra|Prism|RX-34|Skyfire|Tear|XV6875|XV6975|Google.Wireless.Transcoder/i', $ua)) {
					$device = 'mobile';
				} elseif (preg_match('/Opera/i', $ua) && preg_match('/Windows.NT.5/i', $ua) && preg_match('/HTC|Xda|Mini|Vario|SAMSUNG\-GT\-i8000|SAMSUNG\-SGH\-i9/i', $ua)) {
					$device = 'mobile';
				} /* elseif (preg_match('/Windows.(NT|XP|ME|9)/', $ua) && !preg_match('/Phone/i', $ua) || preg_match('/Win(9|.9|NT)/i', $ua)) {
					$device = 'desktop';
				} elseif (preg_match('/Macintosh|PowerPC/i', $ua) && !preg_match('/Silk/i', $ua)) {
					$device = 'desktop';
				} elseif (preg_match('/Linux/i', $ua) && preg_match('/X11/i', $ua)) {
					$device = 'desktop';
				} elseif (preg_match('/Solaris|SunOS|BSD/i', $ua)) {
					$device = 'desktop';
				} elseif (preg_match('/Bot|Crawler|Spider|Yahoo|ia_archiver|Covario-IDS|findlinks|DataparkSearch|larbin|Mediapartners-Google|NG-Search|Snappy|Teoma|Jeeves|TinEye/i', $ua) && !preg_match('/Mobile/i', $ua)) {
					$device = 'desktop';
				} */

				if (preg_match('/Chrome-Lighthouse/i', $ua)) {
					//$device = 'pagespeed';
				}
			}

			$this->registry->set('bus_cache_device', $device);

			// данные сессии
			$ses_exceptions = str_replace(array("\r", "\n", ';', ' '), ',', $setting['cache_ses']);
			$ses_exceptions = str_replace(',,', ',', $ses_exceptions);
			$ses_exceptions = explode(',', $ses_exceptions);

			$session = array();

			foreach ($ses_exceptions as $exception) {
				$exception = explode('|', $exception);

				if (isset($this->session->data[$exception[0]])) {
					$session[$exception[0]] = $this->session->data[$exception[0]];

					if (isset($exception[1]) && isset($this->session->data[$exception[0]][$exception[1]])) {
						$session[$exception[0]] = array();
						$session[$exception[0]][$exception[1]] = $this->session->data[$exception[0]][$exception[1]];

						if (isset($exception[2]) && isset($this->session->data[$exception[0]][$exception[1]][$exception[2]])) {
							$session[$exception[0]][$exception[1]] = array();
							$session[$exception[0]][$exception[1]][$exception[2]] = $this->session->data[$exception[0]][$exception[1]][$exception[2]];

							if (isset($exception[3]) && isset($this->session->data[$exception[0]][$exception[1]][$exception[2]][$exception[3]])) {
								$session[$exception[0]][$exception[1]][$exception[2]] = array();
								$session[$exception[0]][$exception[1]][$exception[2]][$exception[3]] = $this->session->data[$exception[0]][$exception[1]][$exception[2]][$exception[3]];

								if (isset($exception[4]) && isset($this->session->data[$exception[0]][$exception[1]][$exception[2]][$exception[3]][$exception[4]])) {
									$session[$exception[0]][$exception[1]][$exception[2]][$exception[3]] = array();
									$session[$exception[0]][$exception[1]][$exception[2]][$exception[3]][$exception[4]] = $this->session->data[$exception[0]][$exception[1]][$exception[2]][$exception[3]][$exception[4]];

									if (isset($exception[5]) && isset($this->session->data[$exception[0]][$exception[1]][$exception[2]][$exception[3]][$exception[4]][$exception[5]])) {
										$session[$exception[0]][$exception[1]][$exception[2]][$exception[3]][$exception[4]] = array();
										$session[$exception[0]][$exception[1]][$exception[2]][$exception[3]][$exception[4]][$exception[5]] = $this->session->data[$exception[0]][$exception[1]][$exception[2]][$exception[3]][$exception[4]][$exception[5]];
									}
								}
							}
						}
					}
				}
			}

			unset($session['user_id'], $session['token'], $session['user_token']);

			// данные поддержки images
			if (isset($this->request->server['HTTP_ACCEPT']) && stripos($this->request->server['HTTP_ACCEPT'], 'image/webp') !== false) {
				$img = 'webp';
			} else {
				$img = 'img';
			}

			// загружаем кэш
			if ($setting['cache_engine'] == 'buslik') {
				$cache_dir = 'buslik/' . md5($setting['debug'] . $maintenance . $store_id . $language_id . $customer_group_id . $device . $img . $category_id . http_build_query(array($session, $cart))) . '/';
				$cache_name = $cache_dir . md5($this->request->server['REQUEST_URI'] . http_build_query(array($this->request->get, $this->request->post)));

				if (!is_dir(DIR_CACHE . $cache_dir)) {
					mkdir(DIR_CACHE . $cache_dir, 0755, true);
				}

				$files = glob(DIR_CACHE . $cache_name . '*', GLOB_NOSORT|GLOB_BRACE);

				if ($files) {
					foreach ($files as $file) {
						$time = substr(strrchr($file, '.'), 1);

						if ($time < time()) {
							if (file_exists($file)) {
								unlink($file);
							}
						}
					}

					if (file_exists($files[0])) {
						$cache_data = json_decode(file_get_contents($files[0]), true);
					} else {
						$cache_data =  false;
					}
				} else {
					$cache_data =  false;
				}
			} else {
				$cache_name = 'buslik.' . md5($setting['debug'] . $maintenance . $store_id . $language_id . $customer_group_id . $device . $img . $category_id . http_build_query(array($session, $cart, $this->request->server['REQUEST_URI'], $this->request->get, $this->request->post)));
				$cache_data = $bus_cache->get($cache_name);
			}

			// обрабатываем и выводим кэш
			if (!empty($cache_data['output'])) {
				if (!headers_sent()) {
					foreach ($cache_data['headers'] as $header) {
						header($header, true);
					}
				}

				// debug режим
				if ($setting['debug']) {
					if (!empty($cache_data['debug_times'])) {
						$this->getDebugSpeed .= $cache_data['debug_times'];
					}

					if (isset($cache_time)) {
						$this->setDebugSpeed(array('cache_time_status' => round(microtime(true) - $cache_time, 3)));
					}

					if (isset($cache_timer)) {
						$this->setDebugSpeed(array('cache_timer_status' => round(microtime(true) - $cache_timer, 3)));
					}

					$cache_data['output'] = str_replace('<body', $this->getDebugSpeed . '<body', $cache_data['output']);
				}

				echo $cache_data['output'];
				exit;
			}
		}

		// отправка данных
		if ($setting['cache_oc'] || $setting['cache_status'] || $setting['pagespeed_status']) {
			$data = $setting;
			$data['status'] = true;
			$data['cache_time'] = (microtime(true) - $cache_time);
			$data['cache_timer'] = $cache_timer;
			$data['HTTP_HOST'] = $this->request->server['HTTP_HOST'];
			$data['server'] = $server;
			if ($setting['cache_status']) {
				$data['cache_device'] = (function_exists('DOMDocument') ? $device : false);
				$data['cache_name'] = $cache_name;
			}
			$this->response->setBuslikCache($data);
		}
	}

	public function output($output = '', $setting = array()) {
		if (!$output || !$setting) {
			return $output;
		}
		$setting_default = array(
			'headers'                        => array(),
			'server'                         => (!empty($_SERVER['HTTPS']) ? (defined(HTTPS_SERVER) ? HTTPS_SERVER : false) : (defined(HTTP_SERVER) ? HTTP_SERVER : false)),
			'config_logo'                    => false,
			'theme'                          => false,
			'route'                          => false,
			'keyword'                        => false,
			'styles'                         => array(),
			'styles_after'                   => array(),
			'scripts'                        => array(),
			'scripts_after'                  => array(),

			'status'                         => false,
			'cache_status'                   => false,
			'cache_ses'                      => false,
			'cache_onrot'                    => false,
			'cache_rot'                      => false,
			'cache_customer'                 => false,
			'cache_oc'                       => false,
			'cache_engine'                   => false,
			'cache_expire'                   => false,
			'cache_device'                   => false,
			'pagespeed_status'               => false,
			'pagespeed_rot'                  => false,
			'pagespeed_preload_logo'         => false,
			'pagespeed_attribute_w_h'        => false,
			'pagespeed_lazy_load'            => false,
			'pagespeed_replace'              => false,
			'pagespeed_html_min'             => false,
			'pagespeed_css_min'              => false,
			'pagespeed_css_min_links'        => false,
			'pagespeed_css_min_download'     => false,
			'pagespeed_css_min_exception'    => false,
			'pagespeed_css_min_font'         => false,
			'pagespeed_css_min_display'      => false,
			'pagespeed_css_critical'         => false,
			'pagespeed_css_inline_transfer'  => false,
			'pagespeed_css_events'           => false,
			'pagespeed_css_style'            => false,
			'pagespeed_js_min'               => false,
			'pagespeed_js_min_download'      => false,
			'pagespeed_js_min_exception'     => false,
			'pagespeed_js_inline_event'      => false,
			'pagespeed_js_inline_event_time' => false,
			'pagespeed_js_inline_transfer'   => false,
			'pagespeed_js_events'            => false,
			'pagespeed_js_script'            => false,
			'debug'                          => false,
		);
		if (is_array($setting)) {
			foreach ($setting as $key => $result) {
				$setting_default[$key] = $result;
			}
		}
		$setting = $setting_default;

		if ($setting['status']) {
			$cache_time = microtime(true);

			if (stripos($output, '<!DOCTYPE html>') === false) {
				$setting['pagespeed_status'] = false;
			}

			// pagespeed
			if ($setting['pagespeed_status']) {
				// подгружаем лого
				if ($setting['pagespeed_preload_logo'] && \is_file(DIR_IMAGE . $setting['config_logo'])) {
					$output = str_ireplace('<base', '<link href="' . $setting['server'] . 'image/' . $setting['config_logo'] . '" rel="preload" as="image" />' . PHP_EOL . '	<base', $output);
				}

				// проставляем атрибуты на изображения
				if ($setting['pagespeed_attribute_w_h']) {
					$output = preg_replace('!<img(.*?)-(\d{1,5})x(\d{1,5})(.[^\"\d]*?)"!', '<img$1-$2x$3$4" width="$2" height="$3"', $output);
				}

				// подгружаем изображения
				if ($setting['pagespeed_lazy_load'] == 1) {
					$output = str_ireplace(array(' loading="lazy"', ' decoding="async"'), '', $output);
					$output = preg_replace('!<img([^>]*)src=([^>]*)>!ix', '<img loading="lazy"$1src=$2>', $output);
					$output = str_replace('<iframe', '<iframe loading="lazy"', $output);
					$output = str_replace('("<img loading="lazy"', '("<img', $output);
				} elseif ($setting['pagespeed_lazy_load'] == 2) {
					$output = str_ireplace('<base', '<noscript><style type="text/css">body img[loading="lazy"]{display:none !important}</style></noscript><style type="text/css">body img[loading="lazy"]{opacity:0}</style><script src="' . $setting['server'] . 'catalog/view/theme/default/javascript/bus_cache/bus_loading_lazy.js?v=0.8.0" type="text/javascript" async></script>' . PHP_EOL . '	<base', $output);
					$output = str_ireplace(array(' loading="lazy"', ' decoding="async"'), '', $output);
					$output = preg_replace('!<img([^>]*)src=([^>]*)>!ix', '<img loading="lazy"$1data-src=$2><noscript><img$1src=$2></noscript>', $output);
					$output = str_replace('("<img loading="lazy"', '("<img', $output);
					$output = preg_replace('!<iframe([^>]*)src=([^>]*)>!ix', '<iframe loading="lazy"$1data-src=$2><noscript><iframe$1src=$2></noscript>', $output);
				}

				// сжимаем стили
				if ($setting['pagespeed_css_min']) {
					if ($setting['debug']) {
						$this->getDebugTime = microtime(true);
					}

					$styles = $setting['styles'];
					$styles_replace = '';
					$setting['styles'] = array();
					$setting['styles_after'] = array();

					if ($setting['pagespeed_css_min_links']) {
						$css_links = str_replace(array("\r", "\n", '&amp;'), array('ЖЫДКЭШ', 'ЖЫДКЭШ', '&'), $setting['pagespeed_css_min_links']);
						$css_links = str_replace(array('ЖЫДКЭШЖЫДКЭШ'), 'ЖЫДКЭШ', $css_links);
						$css_links = explode('ЖЫДКЭШ', $css_links);
						foreach ($css_links as $style) {
							if (substr($style, 0, 1) != ';') {
								$st = explode('|', $style);
								$style = array();
								$style['href'] = $st[0];
								$style['attribute'] = 'type="text/css" rel="preload" media="screen" as="style"';
								if (isset($st[1])) {
									$style['attribute'] = $st[1];
									unset($st[1]);
								}

								$styles_replace .= ($styles_replace ? '|' : false) . preg_quote($style['href'], '~');
								if (in_array($style['href'] . '|after', $css_links)) {
									$setting['styles_after'][] = array(
										'href'      => $style['href'],
										'attribute' => $style['attribute']
									);
								} else {
									$setting['styles'][] = array(
										'href'      => $style['href'],
										'attribute' => $style['attribute']
									);
								}
							}
						}
					}

					if ($styles) {
						$css_links = str_replace(array("\r", "\n", '&amp;'), array('ЖЫДКЭШ', 'ЖЫДКЭШ', '&'), $setting['pagespeed_css_min_exception']);
						$css_links = str_replace(array('ЖЫДКЭШЖЫДКЭШ'), 'ЖЫДКЭШ', $css_links);
						$css_links = explode('ЖЫДКЭШ', $css_links);
						foreach ($styles as $style) {
							$href = strstr($style['href'], '?', true);
							if (!$href) {
								$href = $style['href'];
							}
							if (!in_array($href, $css_links) || in_array(';' . $href, $css_links)) {
								$styles_replace .= ($styles_replace ? '|' : false) . preg_quote($style['href'], '~');
								if (in_array($href . '|after', $css_links) || in_array($style['href'] . '|after', $css_links)) {
									$setting['styles_after'][] = array(
										'href'      => $style['href'],
										'attribute' => 'type="text/css" rel="preload ' . $style['rel'] . '" media="' . $style['media'] . '" as="style" '
									);
								} else {
									$setting['styles'][] = array(
										'href'      => $style['href'],
										'attribute' => 'type="text/css" rel="preload ' . $style['rel'] . '" media="' . $style['media'] . '" as="style" '
									);
								}
							}
						}
					}

					if ($styles_replace) {
						$output = preg_replace('~<link(.[^>]*?)href="(' . $styles_replace . ')([^>]*?)>~iS', '', $output);
					}
				}

				if ($setting['styles'] && is_array($setting['styles']) && $setting['pagespeed_css_min']) {
					$real_url = true;
					$css = array(
						'name' => '',
						'content' => '',
						'styles' => array(),
					);

					foreach($setting['styles'] as $style)  {
						$her = strstr($style['href'], '//');
						if (!$her || $her && $setting['HTTP_HOST'] && strpos($style['href'], $setting['HTTP_HOST']) !== false) {
							$href = explode('?', str_replace(array('..', 'http://' . $setting['HTTP_HOST'] . '/', 'http://' . $setting['HTTP_HOST'] . '/', '//' . $setting['HTTP_HOST'] . '/'), '', $style['href']));
							$href = $href[0];
							$file = str_replace(basename(DIR_APPLICATION) . '/', '', DIR_APPLICATION) . $href;
						} else {
							$href = md5($style['href']) . '.css';
							$file = DIR_IMAGE . 'cache/bus_cache/download/' . $href;
							$href = basename(DIR_IMAGE) . '/cache/bus_cache/download/' . $href;
						}
						if (\is_file($file)) {
							$file = file_get_contents($file);
							$css['name'] .= ($css['name'] ? '|' : false) . $href;
							$css['content'] .=  '/* ' . $href . ' */' . PHP_EOL;
							if (!$real_url) {
								$file = $this->realUrlCSS($file, $setting['server'], $href);
								foreach ($file['styles'] as $style) {
									$css['styles'][] = $style;
								}
								$css['content'] .= $file['content'];
							} else {
								$css['content'] .= $file;
							}
						}
					}

					if ($css['name'] && $css['content']) {
						$name_md = md5($css['name']) . '.css';
						$file = DIR_IMAGE . 'cache/bus_cache/' . $name_md;
						if (!\is_file($file)) {
							if (!is_dir(DIR_IMAGE . 'cache/bus_cache/')) {
								mkdir(DIR_IMAGE . 'cache/bus_cache/', 0755);
							}
							if ($real_url) {
								$real_url = $this->realUrlCSS($css['content'], $setting['server'], $css['name']);
								$css['content'] = $real_url['content'];
								$css['styles'] = $real_url['styles'];
							}
							if ($setting['pagespeed_css_min_display']) {
								$css['content'] = str_replace(array('@font-face{', '@font-face {'), '@font-face{font-display:' . $setting['pagespeed_css_min_display'] . ';', $css['content']);
							}
							if ($setting['pagespeed_css_min'] > 1) {
								$css['content'] = $this->minCSS($css['content'], $setting['pagespeed_css_min']);
							}
							if ($css['styles']) {
								file_put_contents($file . '.json', json_encode($css['styles']));
							}
							file_put_contents($file, $css['content']);
						}

						if (!$css['styles'] && \is_file($file . '.json')) {
							$css['styles'] = json_decode(file_get_contents($file . '.json'), true);
						}

						$setting['styles'] = array();
						if (isset($css['styles'])) {
							$css_links = str_replace(array("\r", "\n", '&amp;'), array('ЖЫДКЭШ', 'ЖЫДКЭШ', '&'), $setting['pagespeed_css_min_font']);
							$css_links = str_replace(array('ЖЫДКЭШЖЫДКЭШ'), 'ЖЫДКЭШ', $css_links);
							$css_links = explode('ЖЫДКЭШ', $css_links);

							foreach ($css['styles'] as $result) {
								if (!$result['domain'] && in_array($result['href'], $css_links) && !in_array(';' . $result['href'], $css_links)) {
									$href = strstr($result['href'], '?', true);
									if (!$href) {
										$href = $result['href'];
									}
									$extension = pathinfo($href, PATHINFO_EXTENSION);
									if (isset($this->fileType[$extension]['as'])) {
										$key = md5($result['href']);
										$setting['styles'][$key . 1] = array(
											'href'      => $result['href'],
											'attribute' => 'type="' . $this->fileType[$extension]['type'] . '" ' . 'rel="preload" ' . 'as="' . $this->fileType[$extension]['as'] . '" ' . 'crossorigin="anonymous"'
										);
									}
								} elseif ($result['domain']) {
									$key = md5($result['domain']);
									$setting['styles'][$key . 1] = array(
										'href'      => $result['domain'],
										'attribute' => ' rel="preconnect" crossorigin="anonymous"'
									);
									$setting['styles'][$key . 2] = array(
										'href'      => $result['domain'],
										'attribute' => 'rel="dns-prefetch"'
									);
								}
							}

							foreach ($css_links as $href) {
								if (substr($href, 0, 1) != ';') {
									$href2 = strstr($href, '?', true);
									if (!$href2) {
										$href2 = $href;
									}
									$extension = pathinfo($href2, PATHINFO_EXTENSION);
									if (isset($this->fileType[$extension]['as'])) {
										$key = md5($href);
										if ($this->fileType[$extension]['as'] == 'image') {
											$setting['styles'][$key . 1] = array(
												'href'      => $href,
												'attribute' => 'type="' . $this->fileType[$extension]['type'] . '" rel="preload" as="' . $this->fileType[$extension]['as'] . '"'
											);
										} else {
											$setting['styles'][$key . 1] = array(
												'href'      => $href,
												'attribute' => 'type="' . $this->fileType[$extension]['type'] . '" rel="preload" as="' . $this->fileType[$extension]['as'] . '" crossorigin="anonymous"'
											);
										}
									} else {
										if ($setting['server'] && strpos($href, $setting['server']) === false) {
											$domain = parse_url($href, PHP_URL_HOST);
											if ($domain) {
												$domain = 'https://' . $domain . '/';
												$key = md5($domain);
												$setting['styles'][$key . 1] = array(
													'href'      => $domain,
													'attribute' => 'rel="preconnect" crossorigin="anonymous"'
												);
												$setting['styles'][$key . 2] = array(
													'href'      => $domain,
													'attribute' => 'rel="dns-prefetch"'
												);
											}
										}
									}
								}
							}
						}
						$setting['styles'][] = array(
							'href'      => $setting['server'] . 'image/cache/bus_cache/' . $name_md . '?time=' . $setting['time_save'],
							'attribute' => 'type="text/css" rel="stylesheet preload" media="screen" as="style"'
						);

						foreach ($setting['styles'] as $style) {
							//$output = str_replace('<base', '<link href="' . $style['href'] . '" ' . $style['attribute'] . ' />' . PHP_EOL . '	<base', $output);
							$this->outputTransfer['css'][1] .= '<link href="' . $style['href'] . '" ' . $style['attribute'] . ' />' . PHP_EOL;
						}
					}

					if ($setting['debug']) {
						$this->setDebugSpeed(array('styles_time' => round(microtime(true) - $this->getDebugTime, 3)));
					}
				}

				// сжимаем скрипты
				if ($setting['pagespeed_js_min']) {
					if ($setting['debug']) {
						$this->getDebugTime = microtime(true);
					}

					$scripts = $setting['scripts'];
					$scripts_replace = '';
					$setting['scripts'] = array();
					$setting['scripts_after'] = array();

					if ($setting['pagespeed_js_min_links']) {
						$js_links = str_replace(array("\r", "\n", '&amp;'), array('ЖЫДКЭШ', 'ЖЫДКЭШ', '&'), $setting['pagespeed_js_min_links']);
						$js_links = str_replace(array('ЖЫДКЭШЖЫДКЭШ'), 'ЖЫДКЭШ', $js_links);
						$js_links = explode('ЖЫДКЭШ', $js_links);
						foreach ($js_links as $script) {
							if (substr($script, 0, 1) != ';') {
								$sc = explode('|', $script);
								$script = array();
								$script['href'] = $sc[0];
								$script['attribute'] = 'type="text/css" rel="preload" media="screen" as="style"';
								if (isset($sc[1])) {
									$script['attribute'] = $sc[1];
									unset($sc[1]);
								}

								$scripts_replace .= ($scripts_replace ? '|' : false) . preg_quote($script['href'], '~');
								if (in_array($script['href'] . '|after', $js_links)) {
									$setting['scripts_after'][] = array(
										'href'      => $script['href'],
										'attribute' => 'type="text/javascript" '
									);
								} else {
									$setting['scripts'][] = array(
										'href'      => $script['href'],
										'attribute' => 'type="text/javascript" '
									);
								}
							}
						}
					}

					if ($scripts) {
						$js_links = str_replace(array("\r", "\n", '&amp;'), array('ЖЫДКЭШ', 'ЖЫДКЭШ', '&'), $setting['pagespeed_js_min_exception']);
						$js_links = str_replace(array('ЖЫДКЭШЖЫДКЭШ'), 'ЖЫДКЭШ', $js_links);
						$js_links = explode('ЖЫДКЭШ', $js_links);
						foreach ($scripts as $script) {
							$href = strstr($script, '?', true);
							if (!$href) {
								$href = $script;
							}
							if (!in_array($href, $js_links) || in_array(';' . $href, $js_links)) {
								$scripts_replace .= ($scripts_replace ? '|' : false) . preg_quote($script, '~');
								if (in_array($href . '|after', $js_links) || in_array($script . '|after', $js_links)) {
									$setting['scripts_after'][] = array(
										'href'      => $script,
										'attribute' => 'type="text/javascript" '
									);
								} else {
									$setting['scripts'][] = array(
										'href'      => $script,
										'attribute' => 'type="text/javascript" '
									);
								}
							}
						}
					}

					if ($scripts_replace) {
						$output = preg_replace('~<link(.[^>]*?)href="(' . $scripts_replace . ')([^>]*?)>~i', '', $output);
						$output = preg_replace('~<script(.[^>]*?)src="(' . $scripts_replace . ')([^>]*?)></script>~i', '', $output);
					}
				}

				if ($setting['scripts'] && is_array($setting['scripts']) && $setting['pagespeed_js_min']) {
					$js = array(
						'name' => '',
						'content' => '',
						'styles' => array(),
					);

					foreach($setting['scripts'] as $script)  {
						$her = strstr($script['href'], '//');
						if (!$her || $her && $setting['HTTP_HOST'] && strpos($script['href'], $setting['HTTP_HOST']) !== false) {
							$href = explode('?', str_replace(array('..', 'http://' . $setting['HTTP_HOST'] . '/', 'http://' . $setting['HTTP_HOST'] . '/', '//' . $setting['HTTP_HOST'] . '/'), '', $script['href']));
							$href = $href[0];
							$file = str_replace(basename(DIR_APPLICATION) . '/', '', DIR_APPLICATION) . $href;
						} else {
							$href = md5($script['href']) . '.js';
							$file = DIR_IMAGE . 'cache/bus_cache/download/' . $href;
							$href = basename(DIR_IMAGE) . '/cache/bus_cache/download/' . $href;
						}
						if (\is_file($file)) {
							$file = file_get_contents($file);
							$js['name'] .= ($js['name'] ? '|' : false) . $href;
							$js['content'] .=  '/* ' . $href . ' */' . PHP_EOL;
							if (1 == 0) {
								$file = $this->realUrlCSS($file, $setting['server'], $href);
								foreach ($file['styles'] as $style) {
									$js['styles'][] = $style;
								}
								$js['content'] .= $file['content'];
							} else {
								$js['content'] .= $file;
							}
						}
					}

					if ($js['name'] && $js['content']) {
						$js['name_md'] = md5($js['name']) . '.js';
						$file = DIR_IMAGE . 'cache/bus_cache/' . $js['name_md'];
						if (!\is_file($file)) {
							if (!is_dir(DIR_IMAGE . 'cache/bus_cache/')) {
								mkdir(DIR_IMAGE . 'cache/bus_cache/', 0755);
							}
							if (1 == 0) {
								$real_url = $this->realUrlCSS($js['content'], $setting['server'], $js['name']);
								$js['content'] = $real_url['content'];
								$js['styles'] = $real_url['styles'];
							}
							if ($setting['pagespeed_js_min'] > 1) {
								$js['content'] = $this->minJS($js['content'], $setting['pagespeed_js_min']);
							}
							file_put_contents($file, $js['content']);
						}

						$setting['scripts_preload'] = array();
						$setting['scripts_preload'][] = array(
							'href'      => $setting['server'] . 'image/cache/bus_cache/' . $js['name_md'] . '?time=' . $setting['time_save'],
							'attribute' => 'rel="preload" as="script" '
						);
						//$output = str_ireplace('<base', '<link href="' . $setting['scripts_preload'][0]['href'] . '" ' . $setting['scripts_preload'][0]['attribute'] . ' />' . PHP_EOL . '<base', $output);
						$this->outputTransfer['css'][1] .= '<link href="' . $setting['scripts_preload'][0]['href'] . '" ' . $setting['scripts_preload'][0]['attribute'] . ' />' . PHP_EOL;

						$setting['scripts'] = array();
						$setting['scripts'][] = array(
							'href'      => $setting['server'] . 'image/cache/bus_cache/' . $js['name_md'] . '?time=' . $setting['time_save'],
							'attribute' => 'type="text/javascript"'
						);

						foreach ($setting['scripts'] as $script) {
							//$output = str_replace('<base', '<script src="' . $script['href'] . '" ' . $script['attribute'] . '></script>' . PHP_EOL . '	<base', $output);
							$this->outputTransfer['js'][1] .= '<script src="' . $script['href'] . '" ' . $script['attribute'] . '></script>' . PHP_EOL;
						}
					}

					if ($setting['debug']) {
						$this->setDebugSpeed(array('scripts_time' => round(microtime(true) - $this->getDebugTime, 3)));
					}
				}

				// проталкиваем скрипты и стили для server-push
				if (!empty($name_md) && !empty($js['name_md'])) {
					$setting['headers'][] = 'Link: <' . $setting['server'] . 'image/cache/bus_cache/' . $name_md . '?time=' . $setting['time_save'] . '>; rel=preload; as=style' . (!empty($js['name_md']) ? ', <' . $setting['server'] . 'image/cache/bus_cache/' . $js['name_md'] . '?time=' . $setting['time_save'] . '>; rel=preload; as=script' : false);
				}

				// Добавляем свои стили
				if ($setting['pagespeed_css_style'] && $setting['theme'] && \is_file(DIR_TEMPLATE . $setting['theme'] . '/stylesheet/bus_cache/bus_cache_replace.css')) {
					$this->outputTransfer['css'][1] .= '<link href="' . $setting['server'] . 'catalog/view/theme/' . $setting['theme'] . '/stylesheet/bus_cache/bus_cache_replace.css" type="text/css" rel="stylesheet preload" media="screen" as="style" />' . PHP_EOL;
				}

				// Добавляем свои скрипты
				if ($setting['pagespeed_js_script'] && $setting['theme'] && \is_file(DIR_TEMPLATE . $setting['theme'] . '/javascript/bus_cache/bus_cache_replace.js')) {
					$this->outputTransfer['css'][1] .= '<link href="' . $setting['server'] . 'catalog/view/theme/' . $setting['theme'] . '/javascript/bus_cache/bus_cache_replace.js" rel="preload" as="script" />' . PHP_EOL;
					$this->outputTransfer['js'][1] .= '<script src="' . $setting['server'] . 'catalog/view/theme/' . $setting['theme'] . '/javascript/bus_cache/bus_cache_replace.js" type="text/javascript"></script>' . PHP_EOL;
				}

				// Обработка inline кода
				if ($setting['debug']) {
					$this->getDebugTime = microtime(true);
				}

				$inline = array(
					'route'        => $setting['route'],
					'keyword'      => $setting['keyword'],

					'css_transfer' => $setting['pagespeed_css_inline_transfer'],
					'js_transfer'  => $setting['pagespeed_js_inline_transfer'],
					'js_event'     => array(),
					'js_inline_exception' => '',
				);

				if ($setting['pagespeed_js_inline_event']) {
					$inline['js_event'] = str_replace(array("\r", "\n", '&amp;'), array('ЖЫДКЭШ', 'ЖЫДКЭШ', '&'), html_entity_decode($setting['pagespeed_js_inline_event']));
					$inline['js_event'] = str_replace(array('ЖЫДКЭШЖЫДКЭШ'), 'ЖЫДКЭШ', $inline['js_event']);
					$inline['js_event'] = explode('ЖЫДКЭШ', $inline['js_event']);
				}

				// фикс - исключение из перемещения inline js
				$setting['pagespeed_js_inline_exception'] = "#|.push(arguments)";

				if ($setting['pagespeed_js_inline_exception']) {
					$inline['js_inline_exception'] = str_replace(array("\r", "\n", '&amp;'), array('ЖЫДКЭШ', 'ЖЫДКЭШ', '&'), html_entity_decode($setting['pagespeed_js_inline_exception']));
					$inline['js_inline_exception'] = str_replace(array('ЖЫДКЭШЖЫДКЭШ'), 'ЖЫДКЭШ', $inline['js_inline_exception']);
					$inline['js_inline_exception'] = explode('ЖЫДКЭШ', $inline['js_inline_exception']);
				}

				/* $output = preg_replace_callback('~<script(.[^>]*?)?>(.*?)</script>~is', function ($matches) use ($inline) { */
				$output = preg_replace_callback('~(?:<!--[\s]*){0,}<script([^>]*?){0,}>(.*?)</script>(?:[\s]*-->){0,}~iSsu', function ($matches) use ($inline) {
					$js_inline_event = '';
					$js_inline_exception = '';

					foreach ($inline['js_event'] as $result) {
						if (stripos($matches[0], substr(strstr($result, '|'), 1)) !== false) {
							$result = explode('|', $result);
							$result[0] = utf8_strtolower($result[0]);
							if ($result[0] == '#' || $result[0] && strpos($inline['route'], $result[0]) !== false || $inline['keyword'] && strpos($result[0], $inline['keyword']) !== false) {
								$js_inline_event = $result[1];
							}
						}
					}

					foreach ($inline['js_inline_exception'] as $result) {
						if (stripos($matches[0], substr(strstr($result, '|'), 1)) !== false) {
							$result = explode('|', $result);
							$result[0] = utf8_strtolower($result[0]);
							if ($result[0] == '#' || $result[0] && strpos($inline['route'], $result[0]) !== false || $inline['keyword'] && strpos($result[0], $inline['keyword']) !== false) {
								$js_inline_exception = $result[1];
							}
						}
					}

					if ($js_inline_event) {
						//$this->outputTransfer['css_inline'][1] .= $matches[0];
						//$matches[0] = str_replace(array('//-->', '-->'), '', $matches[0]);
						$matches[0] = preg_replace('~(<script[^>]*?>)(?:[\s\r\n]*<!--|<!--){0,}(.*?)(?=' . preg_quote($js_inline_event, '~') . ')(.*?)(?://-->[\s\r\n]*|-->[\s\r\n]*|//-->|-->){0,}(</script>)~is', '$1' . PHP_EOL . 'window.addEventListener(\'busCache\', function() {$2$3});' . PHP_EOL . '$4', $matches[0]);
						//$this->outputTransfer['css_inline'][1] .= $matches[0];
					}

					// перемещаем inline
					if (substr($matches[0], 0, 7) == '<script' && !preg_match('~<script([^>]*?)src=([^>]*?)>~i', $matches[0])) {
						if ($inline['js_transfer'] && !$js_inline_exception) {
							$this->outputTransfer['js_inline'][$inline['js_transfer']] .= $matches[0];
							return;
						}
					}

					return $matches[0];
				}, $output);

				$output = preg_replace_callback('~(?:<!--[\s]*){0,}(?:<noscript>[\s]*){0,}<style([^>]*?){0,}>(.*?)</style>(?:[\s]*</noscript>){0,}(?:[\s]*-->){0,}~iSsu', function ($matches) use ($inline) {
					// перемещаем inline стили
					if (substr($matches[0], 0, 6) == '<style') {
						if ($inline['css_transfer']) {
							$this->outputTransfer['css_inline'][$inline['css_transfer']] .= $matches[0];
							return;
						}
					}

					return $matches[0];
				}, $output);

				if ($setting['debug']) {
					$this->setDebugSpeed(array('name' => 'Время обработки css и js inline кода: ' . round(microtime(true) - $this->getDebugTime, 3), 'output' => $output));
				}

				// откладываем загрузку скриптов и стилей
				$html = "<script type=\"text/javascript\">
var busCache = {
	'timeinterval':false,
	'status':false,
	'start':function(busAppSetting) {
		if (busCache.status == false) {
			busCache.status = true;
			document.removeEventListener('DOMContentLoaded', busCache.start, {once:true, passive:true});";

			$js_links = str_replace(array("\r", "\n", '&amp;'), array('ЖЫДКЭШ', 'ЖЫДКЭШ', '&'), $setting['pagespeed_js_events']);
			$js_links = str_replace(array('ЖЫДКЭШЖЫДКЭШ'), 'ЖЫДКЭШ', $js_links);
			$js_links = explode('ЖЫДКЭШ', $js_links);
			foreach ($js_links as $result) {
				$html .= PHP_EOL . "window.removeEventListener('" . $result . "', busCache.start, {once:true, passive:true});";
			}

			$html .= PHP_EOL . "//clearInterval(busCache.timeinterval);
		} else {
			console.log('bus_cache уже работает!');
			return 'bus_cache уже работает!';
		}

		if (typeof window.CustomEvent !== 'function') {
			window.CustomEvent = function(event, params) {
				params = params || {bubbles:false, cancelable:false, detail:null};

				var evt = document.createEvent('CustomEvent');
				evt.initCustomEvent(event, params.bubbles, params.cancelable, params.detail);

				return evt;
			};
		}

		var element = new CustomEvent('busCache', {bubbles: true});
		document.dispatchEvent(element);
	},
	'ajax':function(url, setting) {
		if (typeof setting['metod'] === 'undefined') {
			setting['metod'] = 'GET';
		}
		if (typeof setting['responseType'] === 'undefined') {
			setting['responseType'] = 'json';
		}
		if (typeof setting['dataType'] === 'undefined') {
			setting['dataType'] = 'text';
		}
		if (typeof setting['data'] === 'undefined') {
			setting['data'] = '';
		}
		if (typeof setting['async'] === 'undefined') {
			setting['async'] = true;
		}
		if (typeof setting['user'] === 'undefined') {
			setting['user'] = null;
		}
		if (typeof setting['password'] === 'undefined') {
			setting['password'] = null;
		}
		if (typeof setting['success'] === 'undefined') {
			setting['success'] = function(json) {};
		}
		if (typeof setting['error'] === 'undefined') {
			setting['error'] = function(error) {};
		}
		var datanew = null;
		if (setting['data']) {
			if (setting['dataType'] == 'json') {
				datanew = JSON.stringify(setting['data']);
			} else {
				if (typeof FormData !== 'undefined') {
					datanew = new FormData();
					if (typeof setting['data'] == 'object') {
						for (var i in setting['data']) {
							if (typeof setting['data'][i] == 'object') {
								for (var i2 in setting['data'][i]) {
									if (typeof setting['data'][i][i2] == 'object') {
										for (var i3 in setting['data'][i][i2]) {
											datanew.append(i + '[' + i2 + ']' + '[' + i3 + ']', setting['data'][i][i2][i3]);
										}
									} else {
										datanew.append(i + '[' + i2 + ']', setting['data'][i][i2]);
									}
								}
							} else {
								datanew.append(i, setting['data'][i]);
							}
						}
					} else {
						datanew = setting['data'];
					}
				} else {
					datanew = [];
					if (typeof setting['data'] == 'object') {
						for (var i in setting['data']) {
							if (typeof setting['data'][i] == 'object') {
								for (var i2 in setting['data'][i]) {
									if (typeof setting['data'][i][i2] == 'object') {
										for (var i3 in setting['data'][i][i2]) {
											datanew.push(encodeURIComponent(i) + '[' + encodeURIComponent(i2) + ']' + '[' + encodeURIComponent(i3) + ']=' + encodeURIComponent(setting['data'][i][i2][i3]));
										}
									} else {
										datanew.push(encodeURIComponent(i) + '[' + encodeURIComponent(i2) + ']=' + encodeURIComponent(setting['data'][i][i2]));
									}
								}
							} else {
								datanew.push(encodeURIComponent(i) + '=' + encodeURIComponent(setting['data'][i]));
							}
						}
					} else {
						datanew = setting['data'];
					}

					datanew = datanew.join('&').replace(/%20/g, '+');
				}
			}
		}

		var xhr = new XMLHttpRequest();
		xhr.open(setting['metod'], url, setting['async'], setting['user'], setting['password']);
		xhr.setRequestHeader('X-Requested-With', 'XMLHttpRequest');
		if (typeof FormData === 'undefined') {
			if (setting['dataType'] == 'json') {
				xhr.setRequestHeader('Content-type', 'application/json;charset=UTF-8');
			} else if (setting['dataType'] == 'text') {
				xhr.setRequestHeader('Content-type', 'application/x-www-form-urlencoded; charset=UTF-8');
			}
		}
		if (setting['responseType']) {
			xhr.responseType = setting['responseType']; //\"text\" – строка,\"arraybuffer\", \"blob\", \"document\", \"json\" – JSON (парсится автоматически).
		}
		if (busApp.setting['debug'] == 1) {
			console.log('xhr data: ', datanew);
		}
		xhr.send(datanew);
		xhr.onload = function(oEvent) {
			if (xhr.status == 200) {
				return setting['success'](xhr.response, xhr);
			} else {
				var ajaxOptions = setting;
				var thrownError = false;
				return setting['error'](xhr, ajaxOptions, thrownError);
			}
		};

		//return xhr;
	}
};

var busCacheInline = {};

window.addEventListener('load', function() {";
				foreach ($js_links as $result) {
					$html .= PHP_EOL . "window.addEventListener('" . $result . "', busCache.start, {once:true, passive:true});";
				}

				if ($setting['pagespeed_js_inline_event_time']) {
					$html .= PHP_EOL . "setTimeout(busCache.start, " . (int)$setting['pagespeed_js_inline_event_time'] . ");";
				}

				$html .= PHP_EOL . "	//busCache.timeinterval = setInterval(busCache.start, 3000);
}, {once:true, passive:true});";

				if ($setting['scripts_after'] || $setting['styles_after']) {
					$html .= PHP_EOL . "busCacheInline['after'] = function() {";

					foreach ($setting['styles_after'] as $script) {
						$html .= "
	var s = document.createElement('link');
	s.type = 'text/css';
	s.href = '" . $script['href'] . "';
	s.rel = 'stylesheet';
	var ss = document.getElementsByTagName('script')[0];
	ss.parentNode.insertBefore(s, ss);";
					}

					foreach ($setting['scripts_after'] as $script) {
						$html .= "
	var s = document.createElement('script');
	s.async = true;
	s.type = 'text/javascript';
	s.src = '" . $script['href'] . "';
	var ss = document.getElementsByTagName('script')[0];
	ss.parentNode.insertBefore(s, ss);";
					}

					$html .= PHP_EOL . "};

if ('busCache' in window) {
	window.addEventListener('busCache', function() {
		busCacheInline['after']();
	});
} else {
	busCacheInline['after']();
}";
				}

				$html .= PHP_EOL . "</script>";

				$this->outputTransfer['js_inline'][1] .= $html;

				// устанавливаем код
				if ($setting['debug']) {
					$this->getDebugTime = microtime(true);
				}

				foreach ($this->outputTransfer as $key => $result) {
					if ($this->outputTransfer[$key][1]) {
						if ($key == 'js_inline') {
							$output = str_replace('</head>', $this->outputTransfer[$key][1] . PHP_EOL . '</head>', $output);
						} else {
							$output = str_replace('<base', $this->outputTransfer[$key][1] . PHP_EOL . '<base', $output);
						}
					}
					if ($this->outputTransfer[$key][2]) {
						$output = str_replace('</body>', $this->outputTransfer[$key][2] . PHP_EOL . '</body>', $output);
					}
					if ($this->outputTransfer[$key][3]) {
						//$this->output = str_replace('</body>', $this->outputTransfer[$key][3] . PHP_EOL . '</body>', $this->output);
						//return;
					}
				}

				if ($setting['debug']) {
					$this->setDebugSpeed(array(
						'name'           => 'Время перемещения кода: ' . round(microtime(true) - $this->getDebugTime, 3),
						'str_replace'    => array('pattern1' => '', 'pattern2' => ''),
						'str_ireplace'   => array('pattern1' => '', 'pattern2' => ''),
						'preg_replace'   => array('pattern1' => '', 'pattern2' => ''),
						'preg_match_all' => array('pattern1' => '', 'pattern2' => ''),
						'limit'          => 1,
						'output'         => $output
					));
				}

				// замена на странице
				if ($setting['pagespeed_replace']) {
					$pagespeed_replace = str_replace(array("\r", "\n"), array('ЖЫДКЭШ', 'ЖЫДКЭШ'), html_entity_decode($setting['pagespeed_replace']));
					$pagespeed_replace = str_replace(array('ЖЫДКЭШЖЫДКЭШ'), 'ЖЫДКЭШ', $pagespeed_replace);
					$pagespeed_replace = explode('ЖЫДКЭШ', $pagespeed_replace);
					$pagespeed_replace_before = array();
					$pagespeed_replace_after = array();

					foreach ($pagespeed_replace as $replace) {
						if (substr($replace, 0, 1) != ';') {
							$replace = explode('|', $replace);
							$replace[0] = utf8_strtolower($replace[0]);
							if ($replace[0] == '#' || $replace[0] && strpos($route, $replace[0]) !== false || $setting['keyword'] && strpos($replace[0], $setting['keyword']) !== false) {
								if (isset($replace[1]) && isset($replace[2])) {
									$pagespeed_replace_before[] = $replace[1];
									$pagespeed_replace_after[] = $replace[2];
								}
							}
						}
					}

					if ($pagespeed_replace_before && $pagespeed_replace_after) {
						$output = str_replace($pagespeed_replace_before, $pagespeed_replace_after, $output);
					}
				}

				// сжимаем страницу
				if ($setting['pagespeed_html_min']) {
					if ($setting['debug']) {
						$this->getDebugTime = microtime(true);
					}

					$output = $this->minHTML($output, $setting['pagespeed_html_min']);

					if ($setting['debug']) {
						$this->setDebugSpeed(array('html_time' => round(microtime(true) - $this->getDebugTime, 3)));
					}
				}
			}

			if ($setting['cache_status']) {
				if ($setting['cache_device'] == 'mobile' || $setting['cache_device'] == 'pagespeed') {
					/* $element = $html->getElementById('column-left');
					if ($element) {
						$element->parentNode->removeChild($element);
					}
					$element = $html->getElementById('column-right');
					if ($element) {
						$element->parentNode->removeChild($element);
					} */
					if ($setting['cache_device'] == 'pagespeed') {
						$html = new DOMDocument;
						$html->validateOnParse = true;
						@$html->loadHTML($output);
						$elements = $html->getElementsByTagName('i');
						if ($elements) {
							foreach ($elements as $element) {
								$element->parentNode->removeChild($element);
							}
						}
						$elements = $html->getElementsByTagName('script');
						if ($elements) {
							foreach ($elements as $element) {
								$element->textContent = '';
							}
							/* foreach ($elements as $element) {
								$element->parentNode->removeChild($element);
							} */
						}
					}
					//$output = $html->saveHTML();
					//$output = html_entity_decode($output);
				}

				if ($setting['debug']) {
					if (isset($setting['cache_time'])) {
						$this->setDebugSpeed(array('cache_time' => round(microtime(true) - $cache_time + $setting['cache_time'], 3)));
					}

					if (isset($setting['cache_timer'])) {
						$this->setDebugSpeed(array('cache_timer' => round(microtime(true) - $setting['cache_timer'], 3)));
					}
				}

				$cache_data = array(
					'headers'     => $setting['headers'],
					'output'      => $output,
					'debug_times' => $this->getDebugSpeed
				);

				if ($setting['cache_engine'] == 'buslik') {
					file_put_contents(DIR_CACHE . $setting['cache_name'] . '.' . (time() + $setting['cache_expire']), json_encode($cache_data));
				} else {
					$cache = new \Cache('Bus_Cache\\' . $setting['cache_engine'], $setting['cache_expire']);
					$cache->set($setting['cache_name'], $cache_data);
				}
			}

			// debug режим
			if ($setting['debug']) {
				$output = str_ireplace('<body', $this->getDebugSpeed . '<body', $output);
			}
		}

		return $output;
	}

	private function realUrlCSS($content, $server, $name) {
		$styles = array();
		$dir = str_replace(basename(DIR_APPLICATION) . '/', '', DIR_APPLICATION);

		if (preg_match_all('/\b(' . str_replace('\|', '|', preg_quote($name, '/')) . '|\burl\(.[^\(\)]*?\))/S', $content, $matches)) {
			if (isset($matches[0])) {
				$css = '';
				$css_path = '';
				if (strpos($name, '|') === false) {
					$css = $name;
					$css_path = str_replace(basename($name), '', $name);
				}
				foreach ($matches[0] as $result) {
					if ($result) {
						if (strpos($result, '.css') !== false && strpos($result, '.css)') === false) {
							$css = $result;
							$css_path = str_replace(basename($result), '', $result);
						} else {
							$domain = false;
							$href = rtrim(str_replace(array('url(', '\'', '"'), '', $result), ')');
							$hach = strstr($href, '?');
							if (!$hach) {
								$hach = strstr($href, '#');
							}
							if (strpos($href, '//') === false) {
								$href = preg_replace('/[\?|\#].*/', '', $href);
								$href_new = ltrim(str_replace(array(realpath($dir), $dir, '\\'), array('', '', '/'), realpath($dir . $css_path . $href)), '/');
								$content = str_replace($href . $hach, $server . $href_new . $hach, $content);
								$href = $server . $href_new;
							} else {
								if (strpos($href, str_replace('https', '', $server)) === false) {
									$domain = parse_url($href, PHP_URL_HOST);
									if ($domain) {
										$domain = parse_url($href, PHP_URL_SCHEME) . '://' . $domain . '/';
									}
								}
							}

							$styles[] = array(
								'css'       => $css,
								'href'      => $href . $hach,
								'domain'    => $domain,
							);
						}
					}
				}
			}
		}

		return array(
			'styles'  => $styles,
			'content' => $content
		);
	}

	private function minCSS($output, $level) {
		if ($level > 1) {
			$do = array('if (', ') {', '" + "', "' + '", "\0", "\r", "\x0B");
			$posle = array('if(', '){', '"+"', "'+'", "", "", "");

			if ($level > 2) {
				$do[] = "\r";
				$do[] = "\n";
				$do[] = '	';
				$do[] = '  ';

				$posle[] = '';
				$posle[] = '';
				$posle[] = '';
				$posle[] = ' ';
			}

			$output = str_replace($do, $posle, $output);

			// нестабильное сжатие
			if ($level > 3) {
				$output = preg_replace('/(?:(?:\/\*[^*]*\*+([^\/][^*]*\*+)*\/))/S', '', $output);
			}

			if ($level > 4) {
				//$output = str_replace(array("\n\n\n", "\n\n", "{\n", ",\n", ";\n", "}\n}", "}\n)", "}\nif"), array("\n", "\n", '{', ',', ';', "}}", "})", "}if"), $output);
				//$output = preg_replace('/(?:;(.[\s\h]*?)(\r|\n){1}|}(.[\s\h]*?)})/', '', $output);
			}
		}

		return $output;
	}

	private function minJS($output, $level) {
		if ($level > 1) {
			$do = array('if (', ') {', '" + "', "' + '", "\0", "\r", "\x0B");
			$posle = array('if(', '){', '"+"', "'+'", "", "", "");

			if ($level > 2) {
				$do[] = "\r";
				$do[] = "\n\n";
				$do[] = '	';
				$do[] = '  ';

				$posle[] = '';
				$posle[] = "\n";
				$posle[] = '';
				$posle[] = '';
			}

			$output = str_replace($do, $posle, $output);

			// нестабильное сжатие
			if ($level > 3) {
				$output = preg_replace('/(?:(?:(\n|\s){1}\/\/[^\n]*)|(?:\/\*[^*]*\*+([^\/][^*]*\*+)*\/))/S', '', $output);
			}

			if ($level > 4) {
				$output = str_replace(array("\n\n\n", "\n\n", "{\n", ",\n", ";\n", "}\n}", "}\n)", "}\nif"), array("\n", "\n", '{', ',', ';', "}}", "})", "}if"), $output);
				//$output = preg_replace('/(?:;(.[\s\h]*?)(\r|\n){1}|}(.[\s\h]*?)})/', '', $output);
			}
		}

		return $output;
	}

	private function minHTML($output, $level) {
		// нестабильное сжатие
		$output = preg_replace('/(?:(?:(\n|\s){1}\/\/(?!-->)[^\n]*)|(?:\/\*(?:[^*]|(?:\*+[^*\/]))*\*+\/)|(?:[^>]\s|^)<!--(?!<!)[^\[>][\s\S]*?-->)/S', '', $output);

		if ($level > 1) {
			$do = array('if (', ') {', '" + "', "' + '", "\0", "\r", "\x0B");
			$posle = array('if(', '){', '"+"', "'+'", "", "", "");

			if ($level > 2) {
				//$do[] = "\n";
				//$do[] = "><!--";
				//$do[] = "//--><";
				//$do[] = '>  <div';
				//$do[] = '  ';

				//$posle[] = '';
				//$posle[] = "><!--\n";
				//$posle[] = "\n//--><";
				//$posle[] = '> <div';
				//$posle[] = ' ';
			}

			$output = str_replace($do, $posle, $output);
		}

		if ($level > 3) {
			$output = preg_replace('/>[^\>\<\d\w][\t\n\s\h\r]*?</S', '> <', $output);
		}

		if ($level > 4) {
			$output = preg_replace("/[\s]{2,}+/", '', $output);
			$output = preg_replace("/>[\s]{1,2}<div/", '><div', $output);
			$output = preg_replace("/>[\s]{1,2}<\/div/", '></div', $output);
		}

		return $output;
	}

	private function setDebugSpeed($data = array()) {
		$data_default = array(
			'name'               => '',
			'str_replace'        => array('pattern1' => '', 'pattern2' => ''),
			'str_ireplace'       => array('pattern1' => '', 'pattern2' => ''),
			'preg_replace'       => array('pattern1' => '', 'pattern2' => ''),
			'preg_match_all'     => array('pattern1' => '', 'pattern2' => ''),
			'styles_time'        => -1,
			'scripts_time'       => -1,
			'html_time'          => -1,
			'cache_time'         => -1,
			'cache_timer'        => -1,
			'cache_time_status'  => -1,
			'cache_timer_status' => -1,
			'limit'              => 1000,
			'output'             => ''
		);

		foreach ($data as $key => $result) {
			if (is_array($result)) {
				foreach ($result as $key2 => $result2) {
					if (is_array($result2)) {
						foreach ($result2 as $key3 => $result3) {
							if (isset($data_default[$key][$key2][$key3])) {
								$data_default[$key][$key2][$key3] = $result3;
							}
						}
					} else {
						if (isset($data_default[$key][$key2])) {
							$data_default[$key][$key2] = $result2;
						}
					}
				}
			} else {
				if (isset($data_default[$key])) {
					$data_default[$key] = $result;
				}
			}
		}

		$data = $data_default;
		$message = '';
		if ($data['name']) {
			$message = $data['name'] . '<br>';
		}

		if ($data['str_replace']['pattern1']) {
			$time = microtime(true);
			foreach (range(0, $data['limit']) as $res) {
				str_replace($data['str_replace']['pattern1'], $data['str_replace']['pattern2'], $data['output']);
			}
			$time = round(microtime(true) - $time, 3);
			$message .= 'str_replace: ' . $time . ' сек. или ' . ($time * 1000) . ' мс.<br>';
		}

		if ($data['str_ireplace']['pattern1']) {
			$time = microtime(true);
			foreach (range(0, $data['limit']) as $res) {
				str_ireplace($data['str_ireplace']['pattern1'], $data['str_ireplace']['pattern2'], $data['output']);
			}
			$time = round(microtime(true) - $time, 3);
			$message .= 'str_ireplace: ' . $time . ' сек. или ' . ($time * 1000) . ' мс.<br>';
		}

		if ($data['preg_replace']['pattern1']) {
			$time = microtime(true);
			foreach (range(0, $data['limit']) as $res) {
				preg_replace($data['preg_replace']['pattern1'], $data['preg_replace']['pattern2'], $data['output']);
			}
			$time = round(microtime(true) - $time, 3);
			$message .= 'preg_replace: ' . $time . ' сек. или ' . ($time * 1000) . ' мс.<br>';
		}

		if ($data['preg_match_all']['pattern1']) {
			$time = microtime(true);
			foreach (range(0, $data['limit']) as $res) {
				preg_match_all($data['preg_match_all']['pattern1'], $data['output']);
			}
			$time = round(microtime(true) - $time, 3);
			$message .= 'preg_match_all: ' . $time . ' сек. или ' . ($time * 1000) . ' мс.<br>';
		}

		if ($data['styles_time'] >= 0) {
			$message .= 'Время сжатия CSS: ' . $data['styles_time'] . ' сек. или ' . ($data['styles_time'] * 1000) . ' мс.<br>';
		}

		if ($data['scripts_time'] >= 0) {
			$message .= 'Время сжатия JS: ' . $data['scripts_time'] . ' сек. или ' . ($data['scripts_time'] * 1000) . ' мс.<br>';
		}

		if ($data['html_time'] >= 0) {
			$message .= 'Время сжатия HTML: ' . $data['html_time'] . ' сек. или ' . ($data['html_time'] * 1000) . ' мс.<br>';
		}

		if ($data['cache_time'] >= 0) {
			$message .= 'Время работы Буслік Cache без кэша примерно: ' . $data['cache_time'] . ' сек. или ' . ($data['cache_time'] * 1000) . ' мс.<br>';
		}

		if ($data['cache_timer'] >= 0) {
			$message .= 'Время загрузки страницы без кэша примерно: ' . $data['cache_timer'] . ' сек. или ' . ($data['cache_timer'] * 1000) . ' мс.<br>';
		}

		if ($data['cache_time_status'] >= 0) {
			$message .= 'Время работы Буслік Cache с кэшем примерно: ' . $data['cache_time_status'] . ' сек. или ' . ($data['cache_time_status'] * 1000) . ' мс.<br>';
		}

		if ($data['cache_timer_status'] >= 0) {
			$message .= 'Время загрузки страницы с кэшем примерно: ' . $data['cache_timer_status'] . ' сек. или ' . ($data['cache_timer_status'] * 1000) . ' мс.<br>';
		}

		$this->getDebugSpeed .= $message;
	}
}
