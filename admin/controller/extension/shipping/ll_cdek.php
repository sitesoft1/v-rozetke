<?php
/**
 * @author    p0v1n0m <p0v1n0m@gmail.com>
 * @license   Commercial
 * @link      https://github.com/p0v1n0m
 */
class ControllerExtensionShippingLLcdek extends Controller {
	private $t = 'shipping_ll_cdek';
	private $m = 'll_cdek';
	private $version = '2.3.1';
	private $email = 'p0v1n0m@gmail.com';
	private $site = 'https://p0v1n0m.ru';
	private $module_docs = 'https://opencartforum.com/files/file/7168-dostavka-sdek/';
	private $delivery = 'https://www.cdek.ru';
	private $api_docs = 'https://confluence.cdek.ru/pages/viewpage.action?pageId=15616129';
	private $services = [
		['code' => '2', 'name' => 'СТРАХОВАНИЕ'],
		['code' => '3', 'name' => 'ДОСТАВКА В ВЫХОДНОЙ ДЕНЬ'],
		['code' => '5', 'name' => 'ТЯЖЕЛЫЙ ГРУЗ'],
		['code' => '6', 'name' => 'НЕГАБАРИТНЫЙ ГРУЗ'],
		['code' => '7', 'name' => 'ОПАСНЫЙ ГРУЗ'],
		['code' => '8', 'name' => 'ОЖИДАНИЕ БОЛЕЕ 15 МИН. У ОТПРАВИТЕЛЯ'],
		['code' => '9', 'name' => 'ОЖИДАНИЕ БОЛЕЕ 15 МИН. У ПОЛУЧАТЕЛЯ'],
		['code' => '10', 'name' => 'ХРАНЕНИЕ НА СКЛАДЕ'],
		['code' => '13', 'name' => 'ПРОЧЕЕ'],
		['code' => '14', 'name' => 'УДАЛЕННЫЙ РАЙОН'],
		['code' => '15', 'name' => 'ПОВТОРНАЯ ПОЕЗДКА'],
		['code' => '16', 'name' => 'ЗАБОР В ГОРОДЕ ОТПРАВИТЕЛЕ'],
		['code' => '17', 'name' => 'ДОСТАВКА В ГОРОДЕ ПОЛУЧАТЕЛЕ'],
		['code' => '20', 'name' => 'ПЕНЯ'],
		['code' => '23', 'name' => 'ОБРЕШЕТКА ГРУЗА'],
		['code' => '24', 'name' => 'УПАКОВКА 1'],
		['code' => '25', 'name' => 'УПАКОВКА 2'],
		['code' => '26', 'name' => 'АРЕНДА КУРЬЕРА'],
		['code' => '27', 'name' => 'СМС УВЕДОМЛЕНИЕ'],
		['code' => '30', 'name' => 'ПРИМЕРКА НА ДОМУ'],
		['code' => '32', 'name' => 'СКАН ДОКУМЕНТОВ'],
		['code' => '33', 'name' => 'ПОДЪЕМ НА ЭТАЖ РУЧНОЙ'],
		['code' => '34', 'name' => 'ПОДЪЕМ НА ЭТАЖ ЛИФТОМ'],
		['code' => '35', 'name' => 'ПРОЗВОН'],
		['code' => '36', 'name' => 'ЧАСТИЧНАЯ ДОСТАВКА'],
		['code' => '37', 'name' => 'ОСМОТР ВЛОЖЕНИЯ'],
		['code' => '40', 'name' => 'ТЕПЛОВОЙ РЕЖИМ'],
		['code' => '41', 'name' => 'ВОЗВРАТ ДОКУМЕНТОВ'],
		['code' => '42', 'name' => 'АГЕНТСКОЕ ВОЗНАГРАЖДЕНИЕ'],
		['code' => '48', 'name' => 'Реверс'],
	];
	private $variants = [
		['code' => '136', 'name' => 'Посылка склад-склад'],
		['code' => '137', 'name' => 'Посылка склад-дверь'],
		['code' => '138', 'name' => 'Посылка дверь-склад'],
		['code' => '139', 'name' => 'Посылка дверь-дверь'],
		['code' => '233', 'name' => 'Экономичная посылка склад-дверь'],
		['code' => '234', 'name' => 'Экономичная посылка склад-склад'],
		['code' => '291', 'name' => 'CDEK Express склад-склад'],
		['code' => '293', 'name' => 'CDEK Express дверь-дверь'],
		['code' => '294', 'name' => 'CDEK Express склад-дверь'],
		['code' => '295', 'name' => 'CDEK Express дверь-склад'],
		['code' => '243', 'name' => 'Китайский экспресс склад-склад'],
		['code' => '245', 'name' => 'Китайский экспресс дверь-дверь'],
		['code' => '246', 'name' => 'Китайский экспресс склад-дверь'],
		['code' => '247', 'name' => 'Китайский экспресс дверь-склад'],
		['code' => '1', 'name' => 'Экспресс лайт дверь-дверь'],
		['code' => '3', 'name' => 'Супер-экспресс до 18 дверь-дверь'],
		['code' => '5', 'name' => 'Экономичный экспресс склад-склад'],
		['code' => '10', 'name' => 'Экспресс лайт склад-склад'],
		['code' => '11', 'name' => 'Экспресс лайт склад-дверь'],
		['code' => '12', 'name' => 'Экспресс лайт дверь-склад'],
		['code' => '15', 'name' => 'Экспресс тяжеловесы склад-склад'],
		['code' => '16', 'name' => 'Экспресс тяжеловесы склад-дверь'],
		['code' => '17', 'name' => 'Экспресс тяжеловесы дверь-склад'],
		['code' => '18', 'name' => 'Экспресс тяжеловесы дверь-дверь'],
		['code' => '57', 'name' => 'Супер-экспресс до 9 дверь-дверь'],
		['code' => '58', 'name' => 'Супер-экспресс до 10 дверь-дверь'],
		['code' => '59', 'name' => 'Супер-экспресс до 12 дверь-дверь'],
		['code' => '60', 'name' => 'Супер-экспресс до 14 дверь-дверь'],
		['code' => '61', 'name' => 'Супер-экспресс до 16 дверь-дверь'],
		['code' => '62', 'name' => 'Магистральный экспресс склад-склад'],
		['code' => '63', 'name' => 'Магистральный супер-экспресс склад-склад'],
	];
	private $variants_map = ['136', '138', '234', '291', '295', '243', '247', '5', '10', '12', '15', '17', '62', '63'];
	private $controls = [
		'geolocationControl',
		'searchControl',
		'routeButtonControl',
		'trafficControl',
		'typeSelector',
		'fullscreenControl',
		'zoomControl',
		'rulerControl',
	];
	private $error = [];

	public function index() {
		$this->load->language('extension/shipping/' . $this->m);

		$this->document->setTitle($this->language->get('heading_title'));

		$this->load->model('setting/setting');

		if (($this->request->server['REQUEST_METHOD'] == 'POST') && $this->validate()) {
			if (isset($this->request->post[$this->t . '_license']) &&
				isset($this->request->server['HTTP_HOST']) &&
				(base64_encode(hash_hmac('sha256',$this->request->server['HTTP_HOST'].$this->t,M_PI,true)) == $this->request->post[$this->t . '_license'] || base64_encode(hash_hmac('sha256',$this->request->server['HTTP_HOST'].$this->m,M_PI,true)) == $this->request->post[$this->t . '_license'])
			) {
				$this->model_setting_setting->editSetting($this->t, $this->request->post);

				$this->session->data['success'] = $this->language->get('text_success');

				$this->response->redirect($this->url->link('extension/shipping/' . $this->m, 'user_token=' . $this->session->data['user_token'], true));
			} else {
				$this->load->model('setting/extension');

				$this->model_setting_extension->uninstall('shipping', $this->t);

				$this->session->data['warning'] = $this->language->get('error_license');

				$this->response->redirect($this->url->link('marketplace/extension', 'user_token=' . $this->session->data['user_token'] . '&type=shipping', true));
			}
		}

		if (isset($this->session->data['warning'])) {
			$data['error_warning'] = $this->session->data['warning'];

			unset($this->session->data['warning']);
		} elseif (isset($this->error['warning'])) {
			$data['error_warning'] = $this->error['warning'];
		} else {
			$data['error_warning'] = '';
		}

		if (isset($this->session->data['success'])) {
			$data['success'] = $this->session->data['success'];

			unset($this->session->data['success']);
		} else {
			$data['success'] = '';
		}

		$data['breadcrumbs'] = [];

		$data['breadcrumbs'][] = [
			'text' => $this->language->get('text_home'),
			'href' => $this->url->link('common/dashboard', 'user_token=' . $this->session->data['user_token'], true),
		];

		$data['breadcrumbs'][] = [
			'text' => $this->language->get('text_extension'),
			'href' => $this->url->link('marketplace/extension', 'user_token=' . $this->session->data['user_token'] . '&type=shipping', true),
		];

		$data['breadcrumbs'][] = [
			'text' => $this->language->get('heading_title'),
			'href' => $this->url->link('extension/shipping/' . $this->m, 'user_token=' . $this->session->data['user_token'], true),
		];

		$data['action'] = $this->url->link('extension/shipping/' . $this->m, 'user_token=' . $this->session->data['user_token'], true);
		$data['cancel'] = $this->url->link('marketplace/extension', 'user_token=' . $this->session->data['user_token'] . '&type=shipping', true);

		if (isset($this->request->post[$this->t . '_title'])) {
			$data[$this->t . '_title'] = $this->request->post[$this->t . '_title'];
		} elseif ($this->config->has($this->t . '_title')) {
			$data[$this->t . '_title'] = $this->config->get($this->t . '_title');
		} else {
			$data[$this->t . '_title'] = 'СДЭК';
		}

		if (isset($this->request->post[$this->t . '_sort_order'])) {
			$data[$this->t . '_sort_order'] = $this->request->post[$this->t . '_sort_order'];
		} else {
			$data[$this->t . '_sort_order'] = $this->config->get($this->t . '_sort_order');
		}

		$this->load->model('localisation/weight_class');

		$data['weight_classes'] = $this->model_localisation_weight_class->getWeightClasses();

		if (isset($this->request->post[$this->t . '_weight_class_id'])) {
			$data[$this->t . '_weight_class_id'] = $this->request->post[$this->t . '_weight_class_id'];
		} else {
			$data[$this->t . '_weight_class_id'] = $this->config->get($this->t . '_weight_class_id');
		}

		if (isset($this->request->post[$this->t . '_default_weight'])) {
			$data[$this->t . '_default_weight'] = $this->request->post[$this->t . '_default_weight'];
		} elseif ($this->config->has($this->t . '_default_weight')) {
			$data[$this->t . '_default_weight'] = $this->config->get($this->t . '_default_weight');
		} else {
			$data[$this->t . '_default_weight'] = 1;
		}

		$this->load->model('localisation/length_class');

		$data['length_classes'] = $this->model_localisation_length_class->getLengthClasses();

		if (isset($this->request->post[$this->t . '_length_class_id'])) {
			$data[$this->t . '_length_class_id'] = $this->request->post[$this->t . '_length_class_id'];
		} else {
			$data[$this->t . '_length_class_id'] = $this->config->get($this->t . '_length_class_id');
		}

		if (isset($this->request->post[$this->t . '_default_length'])) {
			$data[$this->t . '_default_length'] = $this->request->post[$this->t . '_default_length'];
		} elseif ($this->config->has($this->t . '_default_length')) {
			$data[$this->t . '_default_length'] = $this->config->get($this->t . '_default_length');
		} else {
			$data[$this->t . '_default_length'] = 10;
		}

		if (isset($this->request->post[$this->t . '_default_width'])) {
			$data[$this->t . '_default_width'] = $this->request->post[$this->t . '_default_width'];
		} elseif ($this->config->has($this->t . '_default_width')) {
			$data[$this->t . '_default_width'] = $this->config->get($this->t . '_default_width');
		} else {
			$data[$this->t . '_default_width'] = 10;
		}

		if (isset($this->request->post[$this->t . '_default_height'])) {
			$data[$this->t . '_default_height'] = $this->request->post[$this->t . '_default_height'];
		} elseif ($this->config->has($this->t . '_default_height')) {
			$data[$this->t . '_default_height'] = $this->config->get($this->t . '_default_height');
		} else {
			$data[$this->t . '_default_height'] = 10;
		}

		if (isset($this->request->post[$this->t . '_calc_type'])) {
			$data[$this->t . '_calc_type'] = $this->request->post[$this->t . '_calc_type'];
		} else {
			$data[$this->t . '_calc_type'] = $this->config->get($this->t . '_calc_type');
		}

		if (isset($this->request->post[$this->t . '_custom_sizes'])) {
			$data[$this->t . '_custom_sizes'] = $this->request->post[$this->t . '_custom_sizes'];
		} else {
			$data[$this->t . '_custom_sizes'] = $this->config->get($this->t . '_custom_sizes');
		}

		if (isset($this->request->post[$this->t . '_min_weight'])) {
			$data[$this->t . '_min_weight'] = $this->request->post[$this->t . '_min_weight'];
		} else {
			$data[$this->t . '_min_weight'] = $this->config->get($this->t . '_min_weight');
		}

		if (isset($this->request->post[$this->t . '_max_weight'])) {
			$data[$this->t . '_max_weight'] = $this->request->post[$this->t . '_max_weight'];
		} else {
			$data[$this->t . '_max_weight'] = $this->config->get($this->t . '_max_weight');
		}

		if (isset($this->request->post[$this->t . '_min_total'])) {
			$data[$this->t . '_min_total'] = $this->request->post[$this->t . '_min_total'];
		} else {
			$data[$this->t . '_min_total'] = $this->config->get($this->t . '_min_total');
		}

		if (isset($this->request->post[$this->t . '_max_total'])) {
			$data[$this->t . '_max_total'] = $this->request->post[$this->t . '_max_total'];
		} else {
			$data[$this->t . '_max_total'] = $this->config->get($this->t . '_max_total');
		}

		$this->load->model('localisation/tax_class');

		$data['tax_classes'] = $this->model_localisation_tax_class->getTaxClasses();

		if (isset($this->request->post[$this->t . '_tax_class_id'])) {
			$data[$this->t . '_tax_class_id'] = $this->request->post[$this->t . '_tax_class_id'];
		} else {
			$data[$this->t . '_tax_class_id'] = $this->config->get($this->t . '_tax_class_id');
		}

		$this->load->model('localisation/geo_zone');

		$data['geo_zones'] = $this->model_localisation_geo_zone->getGeoZones();

		if (isset($this->request->post[$this->t . '_geo_zone_id'])) {
			$data[$this->t . '_geo_zone_id'] = $this->request->post[$this->t . '_geo_zone_id'];
		} elseif ($this->config->has($this->t . '_geo_zone_id')) {
			$data[$this->t . '_geo_zone_id'] = $this->config->get($this->t . '_geo_zone_id');
		} else {
			$data[$this->t . '_geo_zone_id'] = [];
		}

		if (isset($this->request->post[$this->t . '_status'])) {
			$data[$this->t . '_status'] = $this->request->post[$this->t . '_status'];
		} else {
			$data[$this->t . '_status'] = $this->config->get($this->t . '_status');
		}

		if (isset($this->request->post[$this->t . '_api_login'])) {
			$data[$this->t . '_api_login'] = $this->request->post[$this->t . '_api_login'];
		} else {
			$data[$this->t . '_api_login'] = $this->config->get($this->t . '_api_login');
		}

		if (isset($this->request->post[$this->t . '_api_key'])) {
			$data[$this->t . '_api_key'] = $this->request->post[$this->t . '_api_key'];
		} else {
			$data[$this->t . '_api_key'] = $this->config->get($this->t . '_api_key');
		}

		$this->load->model('extension/shipping/' . $this->m);

		$data['countries'] = $this->{'model_extension_shipping_' . $this->m}->getCountries();

		if (isset($this->request->post[$this->t . '_pickup_countries'])) {
			$data[$this->t . '_pickup_countries'] = $this->request->post[$this->t . '_pickup_countries'];
		} elseif ($this->config->has($this->t . '_pickup_countries')) {
			$data[$this->t . '_pickup_countries'] = $this->config->get($this->t . '_pickup_countries');
		} else {
			$data[$this->t . '_pickup_countries'] = [];
		}

		if (isset($this->request->post[$this->t . '_pickup_regions'])) {
			$data[$this->t . '_pickup_regions'] = $this->request->post[$this->t . '_pickup_regions'];
		} elseif ($this->config->has($this->t . '_pickup_regions')) {
			$data[$this->t . '_pickup_regions'] = $this->config->get($this->t . '_pickup_regions');
		} else {
			$data[$this->t . '_pickup_regions'] = [];
		}

		if (isset($this->request->post[$this->t . '_pickup_cities'])) {
			$data[$this->t . '_pickup_cities'] = $this->request->post[$this->t . '_pickup_cities'];
		} elseif ($this->config->has($this->t . '_pickup_cities')) {
			$data[$this->t . '_pickup_cities'] = $this->config->get($this->t . '_pickup_cities');
		} else {
			$data[$this->t . '_pickup_cities'] = [];
		}

		$this->load->model('localisation/currency');

		$data['currencies'] = $this->model_localisation_currency->getCurrencies();

		if (isset($this->request->post[$this->t . '_currency'])) {
			$data[$this->t . '_currency'] = $this->request->post[$this->t . '_currency'];
		} elseif ($this->config->has($this->t . '_currency')) {
			$data[$this->t . '_currency'] = $this->config->get($this->t . '_currency');
		} else {
			$data[$this->t . '_currency'] = 'RUB';
		}

		if (isset($this->request->post[$this->t . '_consider'])) {
			$data[$this->t . '_consider'] = $this->request->post[$this->t . '_consider'];
		} else {
			$data[$this->t . '_consider'] = $this->config->get($this->t . '_consider');
		}

		$data['payments'] = [];

		$this->load->model('setting/extension');

		$payments = $this->model_setting_extension->getInstalled('payment');

		$files = glob(DIR_APPLICATION . 'controller/{extension/payment,payment}/*.php', GLOB_BRACE);

		if ($files) {
			foreach ($files as $file) {
				$payment = basename($file, '.php');

				$this->load->language('extension/payment/' . $payment);

				if (in_array($payment, $payments)) {
					$data['payments'][] = [
						'code' => $payment,
						'name' => $this->language->get('heading_title'),
					];
				}
			}

			$this->load->language('extension/shipping/' . $this->m);
		}

		if (!$this->filterit) {
			$filterit_payments = isset($this->config->get('filterit_payment')['created']) ? $this->config->get('filterit_payment')['created'] : [];

			foreach ($filterit_payments as $code => $info) {
				$data['payments'][] = [
					'code' => $code,
					'name' => !empty($info['title'][$this->config->get('config_admin_language')]) ? $info['title'][$this->config->get('config_admin_language')] : $code,
				];
			}
		}

		if (isset($this->request->post[$this->t . '_cod'])) {
			$data[$this->t . '_cod'] = $this->request->post[$this->t . '_cod'];
		} elseif ($this->config->has($this->t . '_cod')) {
			$data[$this->t . '_cod'] = $this->config->get($this->t . '_cod');
		} else {
			$data[$this->t . '_cod'] = [];
		}

		$data['services'] = $this->services;

		if (isset($this->request->post[$this->t . '_services'])) {
			$data[$this->t . '_services'] = $this->request->post[$this->t . '_services'];
		} elseif ($this->config->has($this->t . '_services')) {
			$data[$this->t . '_services'] = $this->config->get($this->t . '_services');
		} else {
			$data[$this->t . '_services'] = [];
		}

		if (isset($this->request->post[$this->t . '_test'])) {
			$data[$this->t . '_test'] = $this->request->post[$this->t . '_test'];
		} else {
			$data[$this->t . '_test'] = $this->config->get($this->t . '_test');
		}

		if (isset($this->request->post[$this->t . '_cache'])) {
			$data[$this->t . '_cache'] = $this->request->post[$this->t . '_cache'];
		} else {
			$data[$this->t . '_cache'] = $this->config->get($this->t . '_cache');
		}

		if (isset($this->request->post[$this->t . '_timeout'])) {
			$data[$this->t . '_timeout'] = $this->request->post[$this->t . '_timeout'];
		} elseif ($this->config->has($this->t . '_timeout') && is_numeric($this->config->get($this->t . '_timeout'))) {
			$data[$this->t . '_timeout'] = $this->config->get($this->t . '_timeout');
		} else {
			$data[$this->t . '_timeout'] = 10;
		}

		$data['variants'] = $this->variants;
		$data['variants_map'] = $this->variants_map;

		foreach ($data['variants'] as $key => $variant) {
			if (isset($this->request->post[$this->t . '_status_' . $variant['code']])) {
				$data[$this->t . '_status_' . $variant['code']] = $this->request->post[$this->t . '_status_' . $variant['code']];
			} else {
				$data[$this->t . '_status_' . $variant['code']] = $this->config->get($this->t . '_status_' . $variant['code']);
			}

			if (isset($this->request->post[$this->t . '_list_' . $variant['code']])) {
				$data[$this->t . '_list_' . $variant['code']] = $this->request->post[$this->t . '_list_' . $variant['code']];
			} else {
				$data[$this->t . '_list_' . $variant['code']] = $this->config->get($this->t . '_list_' . $variant['code']);
			}

			if (isset($this->request->post[$this->t . '_quote_title_' . $variant['code']])) {
				$data[$this->t . '_quote_title_' . $variant['code']] = $this->request->post[$this->t . '_quote_title_' . $variant['code']];
			} elseif ($this->config->has($this->t . '_quote_title_' . $variant['code'])) {
				$data[$this->t . '_quote_title_' . $variant['code']] = $this->config->get($this->t . '_quote_title_' . $variant['code']);
			} else {
				$data[$this->t . '_quote_title_' . $variant['code']] = '{{logo}} ' . $variant['name'] . ' из {{from_city}} в {{to_city}} ({{days}})';
			}

			if (isset($this->request->post[$this->t . '_sort_order_' . $variant['code']])) {
				$data[$this->t . '_sort_order_' . $variant['code']] = $this->request->post[$this->t . '_sort_order_' . $variant['code']];
			} else {
				$data[$this->t . '_sort_order_' . $variant['code']] = $this->config->get($this->t . '_sort_order_' . $variant['code']);
			}

			if (isset($this->request->post[$this->t . '_add_day_' . $variant['code']])) {
				$data[$this->t . '_add_day_' . $variant['code']] = $this->request->post[$this->t . '_add_day_' . $variant['code']];
			} else {
				$data[$this->t . '_add_day_' . $variant['code']] = $this->config->get($this->t . '_add_day_' . $variant['code']);
			}

			if (isset($this->request->post[$this->t . '_geo_zone_id_' . $variant['code']])) {
				$data[$this->t . '_geo_zone_id_' . $variant['code']] = $this->request->post[$this->t . '_geo_zone_id_' . $variant['code']];
			} elseif ($this->config->has($this->t . '_geo_zone_id_' . $variant['code'])) {
				$data[$this->t . '_geo_zone_id_' . $variant['code']] = $this->config->get($this->t . '_geo_zone_id_' . $variant['code']);
			} else {
				$data[$this->t . '_geo_zone_id_' . $variant['code']] = [];
			}

			if (isset($this->request->post[$this->t . '_exclude_city_' . $variant['code']])) {
				$data[$this->t . '_exclude_city_' . $variant['code']] = $this->request->post[$this->t . '_exclude_city_' . $variant['code']];
			} else {
				$data[$this->t . '_exclude_city_' . $variant['code']] = $this->config->get($this->t . '_exclude_city_' . $variant['code']);
			}

			if (isset($this->request->post[$this->t . '_costs_' . $variant['code']])) {
				$data[$this->t . '_costs_' . $variant['code']] = $this->request->post[$this->t . '_costs_' . $variant['code']];
			} elseif ($this->config->has($this->t . '_costs_' . $variant['code'])) {
				$data[$this->t . '_costs_' . $variant['code']] = $this->config->get($this->t . '_costs_' . $variant['code']);
			} else {
				$data[$this->t . '_costs_' . $variant['code']] = [];
			}
		}

		if (isset($this->request->post[$this->t . '_admin_status'])) {
			$data[$this->t . '_admin_status'] = $this->request->post[$this->t . '_admin_status'];
		} elseif ($this->config->has($this->t . '_admin_status')) {
			$data[$this->t . '_admin_status'] = $this->config->get($this->t . '_admin_status');
		} else {
			foreach ($data['variants'] as $variant) {
				$data[$this->t . '_admin_status'][] = $variant['code'];
			}
		}

		if (isset($this->request->post[$this->t . '_map_status'])) {
			$data[$this->t . '_map_status'] = $this->request->post[$this->t . '_map_status'];
		} elseif ($this->config->has($this->t . '_map_status')) {
			$data[$this->t . '_map_status'] = $this->config->get($this->t . '_map_status');
		} else {
			$data[$this->t . '_map_status'] = 1;
		}

		if (isset($this->request->post[$this->t . '_map_type'])) {
			$data[$this->t . '_map_type'] = $this->request->post[$this->t . '_map_type'];
		} else {
			$data[$this->t . '_map_type'] = $this->config->get($this->t . '_map_type');
		}

		if (isset($this->request->post[$this->t . '_map_key'])) {
			$data[$this->t . '_map_key'] = $this->request->post[$this->t . '_map_key'];
		} elseif ($this->config->has($this->t . '_map_key')) {
			$data[$this->t . '_map_key'] = $this->config->get($this->t . '_map_key');
		} else {
			$data[$this->t . '_map_key'] = '52213c4c-d0f8-44e8-bfde-5bed0d30cc25';
		}

		foreach ($this->controls as $control) {
			$data[$this->t . '_map_controls'][] = [
				'code' => $control,
				'name' => $this->language->get('text_' . $control),
			];
		}

		if (isset($this->request->post[$this->t . '_map_control'])) {
			$data[$this->t . '_map_control'] = $this->request->post[$this->t . '_map_control'];
		} elseif ($this->config->has($this->t . '_map_control')) {
			$data[$this->t . '_map_control'] = $this->config->get($this->t . '_map_control');
		} else {
			$data[$this->t . '_map_control'] = [];
		}

		if (isset($this->request->post[$this->t . '_cap_status'])) {
			$data[$this->t . '_cap_status'] = $this->request->post[$this->t . '_cap_status'];
		} else {
			$data[$this->t . '_cap_status'] = $this->config->get($this->t . '_cap_status');
		}

		if (isset($this->request->post[$this->t . '_cap_title'])) {
			$data[$this->t . '_cap_title'] = $this->request->post[$this->t . '_cap_title'];
		} else {
			$data[$this->t . '_cap_title'] = $this->config->get($this->t . '_cap_title');
		}

		if (isset($this->request->post[$this->t . '_cap_cost'])) {
			$data[$this->t . '_cap_cost'] = $this->request->post[$this->t . '_cap_cost'];
		} else {
			$data[$this->t . '_cap_cost'] = $this->config->get($this->t . '_cap_cost');
		}

		$data['total_countries'] = $this->{'model_extension_shipping_' . $this->m}->getTotalCountries();
		$data['total_regions'] = $this->{'model_extension_shipping_' . $this->m}->getTotalRegions();
		$data['total_cities'] = $this->{'model_extension_shipping_' . $this->m}->getTotalCities();
		$data['total_pvzs'] = $this->{'model_extension_shipping_' . $this->m}->getTotalPvzs();

		if (isset($this->request->post[$this->t . '_logging'])) {
			$data[$this->t . '_logging'] = $this->request->post[$this->t . '_logging'];
		} else {
			$data[$this->t . '_logging'] = $this->config->get($this->t . '_logging');
		}

		if (isset($this->request->post[$this->t . '_email'])) {
			$data[$this->t . '_email'] = $this->request->post[$this->t . '_email'];
		} else {
			$data[$this->t . '_email'] = $this->config->get($this->t . '_email');
		}

		if (isset($this->request->post[$this->t . '_notify'])) {
			$data[$this->t . '_notify'] = $this->request->post[$this->t . '_notify'];
		} elseif ($this->config->has($this->t . '_notify')) {
			$data[$this->t . '_notify'] = $this->config->get($this->t . '_notify');
		} else {
			$data[$this->t . '_notify'] = [];
		}

		if (isset($this->request->post[$this->t . '_license'])) {
			$data[$this->t . '_license'] = $this->request->post[$this->t . '_license'];
		} else {
			$data[$this->t . '_license'] = $this->config->get($this->t . '_license');
		}

		$data['m'] = $this->m;
		$data['version'] = $this->version;
		$data['email'] = $this->email;
		$data['site'] = $this->site;
		$data['module_docs'] = $this->module_docs;
		$data['delivery'] = $this->delivery;
		$data['api_docs'] = $this->api_docs;
		$data['user_token'] = $this->session->data['user_token'];
		$data['host'] = isset($this->request->server['HTTP_HOST']) ? $this->request->server['HTTP_HOST'] : '';

		$data['header'] = $this->load->controller('common/header');
		$data['column_left'] = $this->load->controller('common/column_left');
		$data['footer'] = $this->load->controller('common/footer');

		if (version_compare(VERSION, '3.1', '>=')) {
			$this->response->setOutput($this->load->view('extension/shipping/' . $this->m, $data));
		} else {
			$this->response->setOutput($this->load->view('extension/shipping/' . $this->m . '_3_0', $data));
		}
	}

	public function getRegions() {
		if ($this->validate() && isset($this->request->get['country_id']) && $this->request->get['country_id'] > 0) {
			$this->load->model('extension/shipping/' . $this->m);

			$json = $this->{'model_extension_shipping_' . $this->m}->getRegions($this->request->get['country_id']);

			$this->response->addHeader('Content-Type: application/json');
			$this->response->setOutput(json_encode($json));
		}
	}

	public function getCities() {
		if ($this->validate() && isset($this->request->get['region_id']) && $this->request->get['region_id'] > 0) {
			$this->load->model('extension/shipping/' . $this->m);

			$json = $this->{'model_extension_shipping_' . $this->m}->getCities($this->request->get['region_id']);

			$this->response->addHeader('Content-Type: application/json');
			$this->response->setOutput(json_encode($json));
		}
	}

	public function updateData() {
		if ($this->validate() && isset($this->request->post['current']) && isset($this->request->post['type'])) {
			$this->load->language('extension/shipping/' . $this->m);
			$this->load->model('extension/shipping/' . $this->m);

			if ($this->request->post['type'] > 0) {
				$pvzs = $this->{'model_extension_shipping_' . $this->m}->getApiPvzs();

				$total = count($pvzs);
				$current = (int)$this->request->post['current'];
				$next = $current + 100;

				if ($current > $total) {
					$json['finish'] = sprintf($this->language->get('text_success_update_pvz'), $total, $total);
					$json['type'] = 1;
				} elseif ($total > 0) {
					foreach ($pvzs as $key => $pvz) {
						if ($key >= $current && $key < $next) {
							$this->{'model_extension_shipping_' . $this->m}->updatePvz($pvz);
						}
					}

					$json['success'] = sprintf($this->language->get('text_success_updating_pvz'), $next, $total);
					$json['current'] = $next;
					$json['total'] = $total;
					$json['type'] = 1;
				} else {
					$json['error'] = $this->language->get('error_update_empty');
				}
			} else {
				if ($this->request->post['current'] == 1) {
					$this->{'model_extension_shipping_' . $this->m}->clearPvz();
				}

				$total = $this->{'model_extension_shipping_' . $this->m}->getTotalCountries();
				$current = (int)$this->request->post['current'];
				$next = $current + 1;

				if ($current >= $total) {
					$json['finish'] = sprintf($this->language->get('text_success_update'), $total, $total);
					$json['type'] = 0;
				} elseif ($total > 0) {
					$country = $this->{'model_extension_shipping_' . $this->m}->getCountry($next);
					$id = $country['id'];
					$name = $country['CountryName'];
					$file = DIR_SYSTEM . 'library/ll/cdek/data/' . $id . '.json';

					if (is_file($file)) {
						$data = json_decode(file_get_contents($file), true);

						if (!empty($data)) {
							foreach ($data as $item) {
								$this->{'model_extension_shipping_' . $this->m}->updateCity($item, $id);
							}
						}

						$json['success'] = sprintf($this->language->get('text_success_updating'), $next, $total, $name);
						$json['current'] = $next;
						$json['total'] = $total;
						$json['type'] = 0;
					} else {
						$json['error'] = sprintf($this->language->get('error_update_nothing'), $name);
					}
				} else {
					$json['error'] = $this->language->get('error_update_table');
				}
			}

			$this->response->addHeader('Content-Type: application/json');
			$this->response->setOutput(json_encode($json));
		}
	}

	public function getRegionsTable() {
		if ($this->validate() && isset($this->request->get['country_id']) && $this->request->get['country_id'] > 0) {
			$this->load->model('extension/shipping/' . $this->m);
			$this->load->model('localisation/zone');

			$json['regions'] = $this->{'model_extension_shipping_' . $this->m}->getRegionsToZones($this->request->get['country_id']);
			$country = $this->{'model_extension_shipping_' . $this->m}->getCountry($this->request->get['country_id']);
			$json['zones'] = $this->model_localisation_zone->getZonesByCountryId($country['country_id']);

			$this->response->addHeader('Content-Type: application/json');
			$this->response->setOutput(json_encode($json));
		}
	}

	public function updateRegionToZone() {
		$this->load->language('extension/shipping/' . $this->m);

		if ($this->validate() && isset($this->request->get[$this->t . '_regions']) && !empty($this->request->get[$this->t . '_regions'])) {
			$this->load->model('extension/shipping/' . $this->m);

			foreach ($this->request->get[$this->t . '_regions'] as $region_id => $values) {
				$region_check = $this->{'model_extension_shipping_' . $this->m}->getRegionById($region_id);

				if ($region_check) {
					$this->{'model_extension_shipping_' . $this->m}->updateRegionToZone($region_id, $values);
				}
			}

			$json['success'] = $this->language->get('text_success_matching');
		} else {
			$json['error'] = $this->language->get('error_permission');
		}

		$this->response->addHeader('Content-Type: application/json');
		$this->response->setOutput(json_encode($json));
	}

	protected function validate() {
		if (!$this->user->hasPermission('modify', 'extension/shipping/' . $this->m)) {
			$this->error['warning'] = $this->language->get('error_permission');
		}

		return !$this->error;
	}

	public function install() {
		$this->load->model('setting/event');
		$this->model_setting_event->addEvent($this->m . '_checkout_js', 'catalog/controller/common/header/before', 'extension/shipping/' . $this->m . '/addCheckoutJs');

		$this->load->model('extension/shipping/' . $this->m);
		$this->{'model_extension_shipping_' . $this->m}->install();
	}

	public function uninstall() {
		$this->load->model('setting/event');
		$this->model_setting_event->deleteEvent($this->m . '_checkout_js');

		$this->load->model('extension/shipping/' . $this->m);
		$this->{'model_extension_shipping_' . $this->m}->uninstall();
	}
}
