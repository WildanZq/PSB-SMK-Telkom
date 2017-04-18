<?php
defined('BASEPATH') OR exit('No direct script access allowed');

/**
 *
 */
class psb_admin_model extends CI_Model
{

  function __construct()
  {
    parent::__construct();
  }

  public function get_data_pendaftar() {
		return $this->db->order_by('id', 'ASC')->get('tb_pendaftar')->result();
	}

  public function get_detil($id) {
    return $this->db->get_where('tb_pendaftar',array('id'=>$id));
  }

  public function cek_user()
  {
    $username = $this->input->post('username');
    $password = $this->input->post('password');

    $query = $this->db->where('username',$username)
                      ->where('password',md5($password))
                      ->get('admin');

    if ($query->num_rows() > 0) {
      $data = array('username' => $username, 'logged_in' => TRUE );
      $this->session->set_userdata($data);

      return TRUE;
    } else {
      return FALSE;
    }
  }

  public function delete($id) {
    return $this->db->delete('tb_pendaftar', array('id'=>$id));
  }
}
