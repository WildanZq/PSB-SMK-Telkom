<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Psb extends CI_Controller {

	public function __construct() {
		parent::__construct();
		$this->load->model('psb_model');
	}

	public function index() {
		//menentukan nama view yg akan ditampilkan
		$data['main_view'] = 'psb_view';

        //load view
        $this->load->view('psb_template', $data);
	}

	public function simpan() {
		if ($this->input->post('submit')) {
			$this->form_validation->set_rules('nama', 'Nama', 'trim|required');
			$this->form_validation->set_rules('alamat', 'Alamat', 'trim|required');
			$this->form_validation->set_rules('telp', 'No.Telp', 'trim|required|numeric');
			$this->form_validation->set_rules('asal_smp', 'Asal SMP', 'trim|required');

			if ($this->form_validation->run() == TRUE) {

				$config['upload_path'] = './uploads/';
				$config['allowed_types'] = 'gif|jpg|png';
				$config['max_size'] = '2000';

				$this->load->library('upload', $config);
				if ($this->upload->do_upload('foto')) {
					if ($this->psb_model->insert($this->upload->data()) == TRUE) {

						$data['notif'] = 'Pendaftaran berhasil';
						$data['main_view'] = 'psb_view';
						$this->load->view('psb_template', $data);
					} else {

						$data['notif'] = 'Pendaftaran gagal';
						$data['main_view'] = 'psb_view';
						$this->load->view('psb_template', $data);
					}
				} else {
					$data['notif'] = $this->upload->display_errors();
					$data['main_view'] = 'psb_view';
					$this->load->view('psb_template', $data);
				}
			} else {

				$data['notif'] = validation_errors();
				$data['main_view'] = 'psb_view';
				$this->load->view('psb_template', $data);
			}
		}
	}

}

/* End of file psb.php */
/* Location: ./application/controllers/psb.php */
