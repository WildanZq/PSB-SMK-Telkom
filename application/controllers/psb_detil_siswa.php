<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Psb_admin extends CI_Controller {

	public function __construct()
	{
		parent::__construct();
	}

	public function index()
	{
		
	}

	public function data_siswa() {
		$data['main_view'] = 'psb_detil_siswa_view';

		$this->load->view('psb_template', $data);
	}

}

/* End of file psb_admin.php */
/* Location: ./application/controllers/psb_admin.php */