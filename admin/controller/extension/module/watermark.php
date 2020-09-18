<?php
class ControllerExtensionModuleWatermark extends Controller {
	private $error = array();

	public function index() {
		$this->load->language('extension/module/watermark');

		$this->document->setTitle($this->language->get('heading_title'));

		$this->load->model('extension/module/watermark');
		$this->load->model('setting/setting');

		if (($this->request->server['REQUEST_METHOD'] == 'POST') && $this->validate()) {
			//We need image size
            if (true || is_file(DIR_IMAGE . $this->request->post['module_watermark_image'])){
                $info = getimagesize(DIR_IMAGE . $this->request->post['module_watermark_image']);
            } else {
                $info = [0,0];
                $this->request->post['module_watermark_image'] = '';
            }
            $this->request->post['module_watermark_size_x'] = $info[0];
            $this->request->post['module_watermark_size_y'] = $info[1];

			$this->model_setting_setting->editSetting('module_watermark', $this->request->post);

			$this->session->data['success'] = $this->language->get('text_success');

			$this->response->redirect($this->url->link('marketplace/extension', 'user_token=' . $this->session->data['user_token'] . '&type=module', true));
		}

		if (isset($this->error['warning'])) {
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

		$data['heading_title'] = $this->language->get('heading_title_for_oc');

		$data['breadcrumbs'] = array();

		$data['breadcrumbs'][] = array(
			'text' => $this->language->get('text_home'),
			'href' => $this->url->link('common/dashboard', 'user_token=' . $this->session->data['user_token'], true)
		);

		$data['breadcrumbs'][] = array(
			'text' => $this->language->get('text_extension'),
			'href' => $this->url->link('marketplace/extension', 'user_token=' . $this->session->data['user_token'] . '&type=module', true)
		);

		$data['breadcrumbs'][] = array(
			'text' => $this->language->get('heading_title'),
			'href' => $this->url->link('extension/module/watermark', 'user_token=' . $this->session->data['user_token'], true)
		);

		$data['action'] = $this->url->link('extension/module/watermark', 'user_token=' . $this->session->data['user_token'], true);
		$data['clear'] = $this->url->link('extension/module/watermark/clear', 'user_token=' . $this->session->data['user_token'], true);
		$data['cancel'] = $this->url->link('marketplace/extension', 'user_token=' . $this->session->data['user_token'] . '&type=module', true);

		$data += $this->model_setting_setting->getSetting('module_watermark');

		$this->load->model('tool/image');
		$data['placeholder'] = $this->model_tool_image->resize('no_image.png', 100, 100);
		if ($data['module_watermark_image']) {
			$data['thumb'] = $this->model_tool_image->resize($data['module_watermark_image'], 100, 100);
		} else {
			$data['thumb'] = $data['placeholder'];
		}

		$data['header'] = $this->load->controller('common/header');
		$data['column_left'] = $this->load->controller('common/column_left');
		$data['footer'] = $this->load->controller('common/footer');

		$this->response->setOutput($this->load->view('extension/module/watermark', $data));
	}

	public function clear() {
		$this->load->language('extension/module/watermark');

		$this->load->model('setting/modification');

		if ($this->validate()) {
			$files = array();

			// Make path into an array
			$path = array(DIR_IMAGE . 'cache/*');

			// While the path array is still populated keep looping through
			while (count($path) != 0) {
				$next = array_shift($path);

				foreach (glob($next) as $file) {
					// If directory add to path array
					if (is_dir($file)) {
						$path[] = $file . '/*';
					}

					// Add the file to the files to be deleted array
					$files[] = $file;
				}
			}

			// Reverse sort the file array
			rsort($files);

			// Clear all modification files
			foreach ($files as $file) {
				if ($file != DIR_IMAGE . 'cache/index.html') {
					// If file just delete
					if (is_file($file)) {
						unlink($file);

					// If directory use the remove directory function
					} elseif (is_dir($file)) {
						rmdir($file);
					}
				}
			}

			$this->session->data['success'] = $this->language->get('text_clear_success');

			$url = '';

			$this->response->redirect($this->url->link('extension/module/watermark', 'user_token=' . $this->session->data['user_token'] . $url, true));
		}
	}

    public function install() {

        $this->load->model('extension/module/watermark');
        $this->model_extension_module_watermark->install();

    }

    public function uninstall() {

        $this->load->model('extension/module/watermark');
        $this->model_extension_module_watermark->uninstall();

    }

	protected function validate() {
		if (!$this->user->hasPermission('modify', 'extension/module/watermark')) {
			$this->error['warning'] = $this->language->get('error_permission');
		}

		return !$this->error;
	}
}