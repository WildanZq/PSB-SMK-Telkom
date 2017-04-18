<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class psb_admin extends CI_Controller {

	public function __construct()
	{
		parent::__construct();
		$this->load->model('psb_admin_model');
	}

	public function index()
	{
		if ($this->session->userdata('logged_in') == TRUE) {
			redirect(base_url('index.php/psb_admin/data_siswa'));
		} else {
			$this->load->view('psb_login_view');
		}
	}

	public function login() {
		if ($this->input->post('submit')) {
			$this->form_validation->set_rules('username', 'Username', 'trim|required');
			$this->form_validation->set_rules('password', 'Password', 'trim|required');

			if ($this->form_validation->run() == TRUE) {
				if ($this->psb_admin_model->cek_user() == TRUE) {
					redirect(base_url('index.php/psb_admin/data_siswa'));
				} else {
					$data['notif'] = 'Login Gagal';
					$this->load->view('psb_login_view', $data);
				}
			} else {
				$data['notif'] = validation_errors();
				$this->load->view('psb_login_view', $data);
			}
		}
	}

	public function logout()
	{
		$data = array('username' => '', 'logged_in' => TRUE);
		$this->session->sess_destroy();
		redirect('psb_admin');
	}

	public function data_siswa() {
		if ($this->session->userdata('logged_in') == TRUE) {
			$data['main_view'] = 'psb_data_siswa_view';
			$data['pendaftar'] = $this->psb_admin_model->get_data_pendaftar();
			$this->load->view('psb_template', $data);
		} else {
			redirect('psb_admin');
		}
	}

	public function hapus($id) {
		if ($this->session->userdata('logged_in') == TRUE) {
			if ($this->psb_admin_model->delete($id) == TRUE) {
				$this->session->set_flashdata('notif', 'Hapus Data Berhasil');
				redirect('psb_admin/data_siswa');
			} else {
				$this->session->set_flashdata('notif','Hapus Data Gagal');
				redirect('psb_admin/data_siswa');
			}
		}else {
			redirect('psb_admin');
		}
	}

	public function detil_siswa($id) {
		if ($this->session->userdata('logged_in') == TRUE) {
			$data['main_view'] = 'psb_detil_siswa_view';
			$data['tampil'] = $this->psb_admin_model->get_detil($id)->result_object();
			$this->load->view('psb_template', $data);
		}else {
			redirect('psb_admin');
		}
	}

}

/* End of file psb_admin.php */
/* Location: ./application/controllers/psb_admin.php */
