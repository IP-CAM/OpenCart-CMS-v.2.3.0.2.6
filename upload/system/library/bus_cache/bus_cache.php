<?php
// *   Аўтар: "БуслікДрэў" ( https://buslikdrev.by/ )
// *   © 2016-2021; BuslikDrev - Усе правы захаваныя.
// *   Спецыяльна для сайта: "OpenCart.pro" ( https://opencart.pro/ )

namespace Bus_Cache;
class Bus_Cache {
	private $registry;

	public function __construct($registry = false, $cache_timer = 0) {
		if ($registry) {
			$this->registry = $registry;
			$this->start($cache_timer);
		}
	}

	private function start($cache_timer = 0) {
		// загрузка данных
		$this->session = $this->registry->get('session');
		$this->config = $this->registry->get('config');
		$this->request = $this->registry->get('request');
		$this->db = $this->registry->get('db');
		$this->response = $this->registry->get('response');
		$this->cart = $this->registry->get('cart');
		$this->customer = $this->registry->get('customer');
		$this->affiliate = $this->registry->get('affiliate');
		$server = (!empty($this->request->server['HTTPS']) ? $this->config->get('config_ssl') : $this->config->get('config_url'));
		$store_id = (int)$this->config->get('config_store_id');
		$language_id = (int)$this->config->get('config_language_id');
		$customer_group_id = (int)$this->config->get('config_customer_group_id');
		$maintenance = (int)$this->config->get('config_maintenance');
		$setting = $this->config->get('bus_cache');
		if (!isset($setting['store'][$store_id])) {
			return false;
		}
		$setting['config_logo'] = $this->config->get('config_logo');
		$setting['status'] = (!empty($setting['status']) ? true : false);
		$setting['cache_status'] = (!empty($setting['cache_status']) ? true : false);
		$setting['cache_onrot'] = (!empty($setting['cache_onrot']) ? $setting['cache_onrot'] : false);
		$setting['cache_rot'] = (!empty($setting['cache_rot']) ? $setting['cache_rot'] : false);
		$setting['pagespeed_status'] = (!empty($setting['pagespeed_status']) ? true : false);
		$setting['pagespeed_rot'] = (!empty($setting['pagespeed_rot']) ? $setting['pagespeed_rot'] : false);

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

		// данные корзины
		/* if (version_compare(VERSION, '2.2.0', '<')) {
			$cart = new \Cart($this->registry);
		} else {
			$cart = new \Cart\Cart($this->registry);
		} */
		$cart = (int)$this->cart->hasProducts();
		if ($cart) {
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
		}

		// параметры исключения из кэша
		if ($setting['cache_rot'] && !$setting['cache_onrot'] && $setting['cache_status']) {
			$rot_exceptions = str_replace(array("\r", "\n", ';', ' '), ',', $setting['cache_rot']);
			$rot_exceptions = str_replace(',,', ',', $rot_exceptions);
			$rot_exceptions = explode(',', $rot_exceptions);

			foreach ($rot_exceptions as $exception) {
				$exception = utf8_strtolower($exception);
				if (strrpos($route, $exception) !== false || isset($keyword) && strrpos($exception, $keyword) !== false) {
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
				if (strrpos($route, $exception) !== false || isset($keyword) && strrpos($exception, $keyword) !== false) {
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
				if (isset($this->session->data[$exception])) {
					$session[$exception] = $this->session->data[$exception];
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

				$files = glob(DIR_CACHE . $cache_name . '*');

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
				if ($setting['debug']) {
					$cache_data['html_time'] = microtime(true);
				}

				if ($setting['pagespeed_html_min']) {
					$cache_data['output'] = $this->minHTML($cache_data['output'], $setting['pagespeed_html_min']);
				}

				if ($setting['debug']) {
					$cache_data['html_time'] = round(microtime(true) - $cache_data['html_time'], 3);
				}

				if (!headers_sent()) {
					foreach ($cache_data['headers'] as $header) {
						header($header, true);
					}
				}

				// debug режим
				if ($setting['debug']) {
					$debug = '';

					if (isset($cache_data['styles_time'])) {
						$debug .= 'Время сжатия CSS: ' . $cache_data['styles_time'] . ' сек. или ' . ($cache_data['styles_time'] * 1000) . ' мс.<br>';
					}
					if (isset($cache_data['scripts_time'])) {
						$debug .= 'Время сжатия JS: ' . $cache_data['scripts_time'] . ' сек. или ' . ($cache_data['scripts_time'] * 1000) . ' мс.<br>';
					}
					if (isset($cache_data['html_time'])) {
						$debug .= 'Время сжатия HTML: ' . $cache_data['html_time'] . ' сек. или ' . ($cache_data['html_time'] * 1000) . ' мс.<br>';
					}
					if (isset($cache_time)) {
						$debug .= 'Время работы Буслік Cache с кэшем примерно: ' . round(microtime(true) - $cache_time, 3) . ' сек. или ' . (round(microtime(true) - $cache_time, 3) * 1000) . ' мс.<br>';
					}
					if (isset($cache_data['cache_time'])) {
						$debug .= 'Время работы Буслік Cache без кэша примерно: ' . $cache_data['cache_time'] . ' сек. или ' . $cache_data['cache_time'] * 1000 . ' мс.<br>';
					}
					if (isset($cache_timer)) {
						$debug .= 'Время загрузки страницы с кэшем примерно: ' . round(microtime(true) - $cache_timer, 3) . ' сек. или ' . (round(microtime(true) - $cache_timer, 3) * 1000) . ' мс.<br>';
					}
					if (isset($cache_data['cache_timer'])) {
						$debug .= 'Время загрузки страницы без кэша примерно: ' . $cache_data['cache_timer'] . ' сек. или ' . ($cache_data['cache_timer'] * 1000) . ' мс.<br>';
					}

					if ($debug) {
						$cache_data['output'] = str_replace('</head>', '</head>' . $debug, $cache_data['output']);
					}
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
		if (!empty($setting['status'])) {
			$cache_time = microtime(true);
			if (empty($setting['headers'])) {
				$setting['headers'] = array();
			}
			if (!isset($setting['styles_time'])) {
				$setting['styles_time'] = 0;
			}
			if (!isset($setting['scripts_time'])) {
				$setting['scripts_time'] = 0;
			}
			if (!isset($setting['server'])) {
				$setting['server'] = (!empty($_SERVER['HTTPS']) ? 'https' : 'http') . '://' . $_SERVER['HTTP_HOST'] . '/';
			}

			if (!empty($setting['pagespeed_status']) && stripos($output, '<!DOCTYPE html>') === false) {
				$setting['pagespeed_status'] = false;
			}

			// pagespeed
			if (!empty($setting['pagespeed_status'])) {
				if ($setting['pagespeed_preload_logo'] && is_file(DIR_IMAGE . $setting['config_logo'])) {
					$output = str_ireplace('</head>', '<link href="' . $setting['server'] . 'image/' . $setting['config_logo'] . '" rel="preload" as="image" />' . "\r\n" . '</head>', $output);
				}

				if ($setting['pagespeed_attribute_w_h']) {
					$output = preg_replace('!<img(.*?)-(\d{1,5})x(\d{1,5})(.[^\"\d]*?)"!', '<img$1-$2x$3$4" width="$2" height="$3"', $output);
				}

				if ($setting['pagespeed_lazy_load'] == 1) {
					$output = str_ireplace(array(' loading="lazy"', ' decoding="async"'), '', $output);
					$output = preg_replace('!<img([^>]*)src=([^>]*)>!ix', '<img$1loading="lazy" src=$2>', $output);
				} elseif ($setting['pagespeed_lazy_load'] == 2) {
					$output = str_ireplace('<head>', '<head>' . "\r\n" . '<noscript><style type="text/css">body img[bus-loading="lazy"]{display:none !important}</style></noscript><style type="text/css">body img[bus-loading="lazy"]{opacity:0}</style><script src="' . $setting['server'] . 'catalog/view/theme/default/javascript/bus_cache/bus_loading_lazy.js?v=0.8.0" type="text/javascript" async></script>', $output);
					$output = preg_replace('!<img([^>]*)src=([^>]*)>!ix', '<img$1bus-loading="lazy" data-src=$2><noscript><img$1src=$2></noscript>', $output);
				}

				if ($setting['debug']) {
					$setting['scripts_time'] = microtime(true);
				} else {
					$setting['scripts_time'] = null;
				}

				if ($setting['pagespeed_js_min']) {
					$scripts = !empty($setting['scripts']) ? $setting['scripts'] : array();
					$scripts_replace = '';
					$setting['scripts'] = array();

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
								}

								$scripts_replace .= ($scripts_replace ? '|' : false) . preg_quote($script['href'], '~');
								$setting['scripts'][] = array(
									'href'      => $script['href'],
									'attribute' => $script['attribute']
								);
							}
						}
					}

					foreach ($scripts as $script) {
						$scripts_replace .= ($scripts_replace ? '|' : false) . preg_quote($script, '~');
						$setting['scripts'][] = array(
							'href'      => $script,
							'attribute' => 'type="text/javascript" '
						);
					}

					if ($scripts_replace) {
						$output = preg_replace('~<script(.[^>]*?)src="(' . $scripts_replace . ')"(.[^>]*?)></script>~i', '', $output);
					}
				}

				if (!empty($setting['scripts']) && is_array($setting['scripts']) && $setting['pagespeed_js_min']) {
					$js = array(
						'name' => '',
						'content' => '',
						'styles' => array(),
					);

					foreach($setting['scripts'] as $script)  {
						$href = explode('?', str_replace(array('..', 'http://' . $setting['HTTP_HOST'] . '/', 'http://' . $setting['HTTP_HOST'] . '/', '//' . $setting['HTTP_HOST'] . '/'), '', $script['href']));
						$file = str_replace(basename(DIR_APPLICATION) . '/', '', DIR_APPLICATION) . $href[0];
						if (\is_file($file)) {
							$file = file_get_contents($file);
							$js['name'] .= ($js['name'] ? '|' : false) . $href[0];
							$js['content'] .=  '/* ' . $href[0] . ' */' . "\r\n";
							if (1 == 0) {
								$file = $this->realUrl($file, $setting['server'], $href[0]);
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
						if (!\is_file($file) || $setting['debug']) {
							if (!is_dir(DIR_IMAGE . 'cache/bus_cache/')) {
								mkdir(DIR_IMAGE . 'cache/bus_cache/', 0755);
							}
							if (1 == 0) {
								$file = $this->realUrl($js['content'], $setting['server'], $js['name']);
								$js['content'] = $file['content'];
								$js['styles'] = $file['styles'];
							}
							if ($setting['pagespeed_js_min'] > 1) {
								$js['content'] = $this->minJS($js['content'], $setting['pagespeed_js_min']);
							}
							file_put_contents($file, $js['content']);
						}

						/* $setting['scripts_preload'] = array();
						$setting['scripts_preload'][] = array(
							'href'      => $setting['server'] . 'image/cache/bus_cache/' . $js['name_md'] . '?time=' . $setting['time_save'],
							'attribute' => 'rel="preload" as="script" '
						); */
						//$output = str_ireplace('</head>', '<link href="' . $setting['scripts_preload'][0]['href'] . '" ' . $setting['scripts_preload'][0]['attribute'] . ' />' . "\r\n" . '</head>', $output);

						$setting['scripts'] = array();
						$setting['scripts'][] = array(
							'href'      => $setting['server'] . 'image/cache/bus_cache/' . $js['name_md'] . '?time=' . $setting['time_save'],
							'attribute' => 'type="text/javascript" '
						);

						foreach ($setting['scripts'] as $script) {
							$output = str_ireplace('<head>', '<head>' . "\r\n" . '<script src="' . $script['href'] . '" ' . $script['attribute'] . ' ></script>', $output);
						}
					}
				}

				if ($setting['debug']) {
					$setting['scripts_time'] = round(microtime(true) - $setting['scripts_time'], 3);
				}

				if ($setting['debug']) {
					$setting['styles_time'] = microtime(true);
				} else {
					$setting['styles_time'] = null;
				}

				if ($setting['pagespeed_css_min']) {
					$styles = !empty($setting['styles']) ? $setting['styles'] : array();
					$styles_replace = '';
					$setting['styles'] = array();

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
								}

								$styles_replace .= ($styles_replace ? '|' : false) . preg_quote($style['href'], '~');
								$setting['styles'][] = array(
									'href'      => $style['href'],
									'attribute' => $style['attribute']
								);
							}
						}
					}

					foreach ($styles as $style) {
						$styles_replace .= ($styles_replace ? '|' : false) . preg_quote($style['href'], '~');
						$setting['styles'][] = array(
							'href'      => $style['href'],
							'attribute' => 'type="text/css" rel="preload ' . $style['rel'] . '" media="' . $style['media'] . '" as="style" '
						);
					}

					if ($styles_replace) {
						$output = preg_replace('~<link(.[^>]*?)href="(' . $styles_replace . ')"(.[^>]*?)>~i', '', $output);
					}
				}

				if (!empty($setting['styles']) && is_array($setting['styles']) && $setting['pagespeed_css_min']) {
					$css = array(
						'name' => '',
						'content' => '',
						'styles' => array(),
					);

					foreach($setting['styles'] as $style)  {
						$href = explode('?', str_replace(array('..', 'http://' . $setting['HTTP_HOST'] . '/', 'http://' . $setting['HTTP_HOST'] . '/', '//' . $setting['HTTP_HOST'] . '/'), '', $style['href']));
						$file = str_replace(basename(DIR_APPLICATION) . '/', '', DIR_APPLICATION) . $href[0];
						if (\is_file($file)) {
							$file = file_get_contents($file);
							$css['name'] .= ($css['name'] ? '|' : false) . $href[0];
							$css['content'] .=  '/* ' . $href[0] . ' */' . "\r\n";
							if (1 == 1) {
								$file = $this->realUrl($file, $setting['server'], $href[0]);
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
						if (!\is_file($file) || $setting['debug']) {
							if (!is_dir(DIR_IMAGE . 'cache/bus_cache/')) {
								mkdir(DIR_IMAGE . 'cache/bus_cache/', 0755);
							}
							if (1 == 0) {
								$file = $this->realUrl($css['content'], $setting['server'], $css['name']);
								$css['content'] = $file['content'];
								$css['styles'] = $file['styles'];
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
							foreach ($css['styles'] as $result) {
								if ($result['extension'] == 'woff2') {
									$setting['styles'][] = array(
										'href'      => $result['href'] . '?tume=' . $setting['time_save'],
										'attribute' => ($result['type'] ? 'type="' . $result['type'] . '" ' : false) . 'rel="preload" media="screen" ' . ($result['as'] ? 'as="' . $result['as'] . '" ' : false) . 'crossorigin="anonymous"'
									);
								}
							}
						}
						$setting['styles'][] = array(
							'href'      => $setting['server'] . 'image/cache/bus_cache/' . $name_md . '?time=' . $setting['time_save'],
							'attribute' => 'type="text/css" rel="stylesheet preload" media="screen" as="style"'
						);

						foreach ($setting['styles'] as $style) {
							$output = str_ireplace('<head>', '<head>' . "\r\n" . '<link href="' . $style['href'] . '" ' . $style['attribute'] . ' />', $output);
						}
					}
				}

				if ($setting['debug']) {
					$setting['styles_time'] = round(microtime(true) - $setting['styles_time'], 3);
				}

				$html = "<script type=\"text/javascript\">
var busCache = {
	'timeinterval':false,
	'status':false,
	'start':function(busAppSetting) {
		if (busCache.status == false) {
			busCache.status = true;
			document.removeEventListener('DOMContentLoaded', busCache.start, {once:true, passive:true});
			document.removeEventListener('visibilitychange', busCache.start, {once:true, passive:true});
			window.removeEventListener('load', busCache.start, {once:true, passive:true});
			window.removeEventListener('pagehide', busCache.start, {once:true, passive:true});
			window.removeEventListener('scroll', busCache.start, {once:true, passive:true});
			window.removeEventListener('mouseover', busCache.start, {once:true, passive:true});
			window.removeEventListener('touchstart', busCache.start, {once:true, passive:true});
			//clearInterval(busCache.timeinterval);
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
	}
}
var busCacheInline = {};

window.addEventListener('load', function() {
	window.addEventListener('pagehide', busCache.start, {once:true, passive:true});
	window.addEventListener('scroll', busCache.start, {once:true, passive:true});
	window.addEventListener('mouseover', busCache.start, {once:true, passive:true});
	window.addEventListener('touchstart', busCache.start, {once:true, passive:true});
	//setTimeout(busCache.start, 2000);
	//busCache.timeinterval = setInterval(busCache.start, 3000);
}, {once:true, passive:true});";

				if (!empty($setting['scripts_after']) || !empty($setting['styles_after'])) {
					$html .= "busCacheInline['after'] = function() {";

					if (!empty($setting['styles_after'])) {
						foreach ($setting['styles_after'] as $script) {
							$html .= "
	var s = document.createElement('link');
	s.type = 'text/css';
	s.href = '" . $script['href'] . "';
	s.rel = 'stylesheet';
	var ss = document.getElementsByTagName('script')[0];
	ss.parentNode.insertBefore(s, ss);";
						}
					}

					if (!empty($setting['scripts_after'])) {
						foreach ($setting['scripts_after'] as $script) {
							$html .= "
	var s = document.createElement('script');
	s.type = 'text/javascript';
	s.src = '" . $script['href'] . "';
	var ss = document.getElementsByTagName('script')[0];
	ss.parentNode.insertBefore(s, ss);";
						}
					}

					$html .= "};

if ('busCache' in window) {
	window.addEventListener('busCache', function() {
		busCacheInline['after']();
	});
} else {
	busCacheInline['after']();
}";
				}

				$html .= "</script>" . "\r\n" . '</head>';

				$output = str_ireplace('</head>', $html, $output);
			}

			if (!empty($setting['cache_status'])) {
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

				$cache_data = array(
					'headers'      => $setting['headers'],
					'output'       => $output,
					//'styles'       => $setting['styles'],
					'styles_time'  => $setting['styles_time'],
					//'scripts'      => $setting['scripts'],
					'scripts_time' => $setting['scripts_time'],
					'cache_time'   => round((microtime(true) - $cache_time + $setting['cache_time']), 3),
					'cache_timer'  => round((microtime(true) - $setting['cache_timer']), 3)
				);

				if ($setting['cache_engine'] == 'buslik') {
					file_put_contents(DIR_CACHE . $setting['cache_name'] . '.' . (time() + $setting['cache_expire']), json_encode($cache_data));
				} else {
					$cache = new \Cache('Bus_Cache\\' . $setting['cache_engine'], $setting['cache_expire']);
					$cache->set($setting['cache_name'], $cache_data);
				}
			} else {
				// pagespeed
				if (!empty($setting['pagespeed_status'])) {
					if ($setting['debug']) {
						$setting['html_time'] = microtime(true);
					}

					if ($setting['pagespeed_html_min']) {
						$output = $this->minHTML($output, $setting['pagespeed_html_min']);
					}

					if ($setting['debug']) {
						$setting['html_time'] = round(microtime(true) - $setting['html_time'], 3);
					}
				}
			}

			// debug режим
			if ($setting['debug']) {
				$debug = '';

				if (isset($setting['styles_time'])) {
					$debug .= 'Время сжатия CSS: ' . $setting['styles_time'] . ' сек. или ' . ($setting['styles_time'] * 1000) . ' мс.<br>';
				}
				if (isset($setting['scripts_time'])) {
					$debug .= 'Время сжатия JS: ' . $setting['scripts_time'] . ' сек. или ' . ($setting['scripts_time'] * 1000) . ' мс.<br>';
				}
				if (isset($setting['html_time'])) {
					$debug .= 'Время сжатия HTML: ' . $setting['html_time'] . ' сек. или ' . ($setting['html_time'] * 1000) . ' мс.<br>';
				}
				if (isset($setting['cache_time'])) {
					$debug .= 'Время работы Буслік Cache без кэша примерно: ' . round((microtime(true) - $cache_time + $setting['cache_time']), 3) . ' сек. или ' . round((microtime(true) - $cache_time + $setting['cache_time']), 3) * 1000 . ' мс.<br>';
				}
				if (isset($setting['cache_timer'])) {
					$debug .= 'Время загрузки страницы без кэша примерно: ' . round((microtime(true) - $setting['cache_timer']), 3) . ' сек. или ' . round((microtime(true) - $setting['cache_timer']), 3) * 1000 . ' мс.<br>';
				}

				if ($debug) {
					$output = str_replace('</head>', '</head>' . $debug, $output);
				}
			}
		}

		return $output;
	}

	private function realUrl($content, $server, $name) {
		$styles = array();
		$dir = str_replace(basename(DIR_APPLICATION) . '/', '', DIR_APPLICATION);
		$style_type = array();
		$style_type['woff'] = array('type' => 'font/woff', 'as' => 'font');
		$style_type['woff2'] = array('type' => 'font/woff2', 'as' => 'font');
		$style_type['eot'] = array('type' => 'font/eot', 'as' => 'font');
		$style_type['ttf'] = array('type' => 'font/ttf', 'as' => 'font');
		$style_type['svg'] = array('type' => 'image/svg+xml', 'as' => 'image');
		$style_type['svgz'] = array('type' => 'image/svgz+xml', 'as' => 'image');
		$style_type['png'] = array('type' => 'image/png', 'as' => 'image');
		$style_type['jpg'] = array('type' => 'image/jpeg', 'as' => 'image');
		$style_type['jpeg'] = array('type' => 'image/jpeg', 'as' => 'image');
		$style_type['gif'] = array('type' => 'image/gif', 'as' => 'image');
		$style_type['webp'] = array('type' => 'image/webp', 'as' => 'image');
		$style_type['css'] = array('type' => 'text/css', 'as' => 'style');
		$style_type['js'] = array('type' => 'text/javascript', 'as' => 'script');

		if (preg_match_all('/(?:' . str_replace('\|', '|', preg_quote($name, '/')) . '|url\(.[^\(\)]*?\))/', $content, $matches)) {
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
							$href = rtrim(str_replace(array('url(', '\'', '"'), '', $result), ')');
							if (strpos($href, '//') === false) {
								$hach = strstr($href, '?');
								if (!$hach) {
									$hach = strstr($href, '#');
								}
								$href = preg_replace('/[\?|\#].*/', '', $href);
								$href_new = ltrim(str_replace(array(realpath($dir), '\\'), array('', '/'), realpath($dir . $css_path . $href)), '/');
								$content = str_replace($href . $hach, $server . $href_new . $hach, $content);
								$href = $href_new;
							}

							$extension = pathinfo($href, PATHINFO_EXTENSION);
							$styles[] = array(
								'css'       => $css,
								'href'      => $href,
								'type'      => (isset($style_type[$extension]) ? $style_type[$extension]['type'] : false),
								'as'        => (isset($style_type[$extension]) ? $style_type[$extension]['as'] : false),
								'extension' => $extension
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
		$output = preg_replace('/(?:(?:(\n|\s){1}\/\/(?!-->)[^\n]*)|(?:\/\*(?:[^*]|(?:\*+[^*\/]))*\*+\/)|<!--(?!-->)(.[^\[\]]*?)-->)/', '', $output);

		if ($level > 1) {
			$do = array('if (', ') {', '" + "', "' + '");
			$posle = array('if(', '){', '"+"', "'+'");

			if ($level > 2) {
				$do[] = "\n";
				$do[] = '	';
				$do[] = '  ';

				$posle[] = "";
				$posle[] = '';
				$posle[] = ' ';
			}

			$output = str_replace($do, $posle, $output);
		}

		if ($level > 3) {
			$output = preg_replace('/>(.[^\>\<][\s\h]*?)</', '><', $output);
		}

		return $output;
	}
}
