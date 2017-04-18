<?php
defined('BASEPATH') OR exit('No direct script access allowed');

/**
 *
 */
class psb_model extends CI_Model {

  function __construct()
  {
    parent::__construct();
  }

  public function insert($foto)
  {
    $data = array('id' => NULL,
                  'nama' => $this->input->post('nama'),
                  'alamat' => $this->input->post('alamat'),
                  'asal_smp' => $this->input->post('asal_smp'),
                  'no_telp' => $this->input->post('telp'),
                  'foto' => $foto['file_name']
                );

    //insert data
    $this->db->insert('tb_pendaftar', $data);
    //cek keberhasilan insert data
    if ($this->db->affected_rows() > 0) {
      return TRUE;
    } else {
      return FALSE;
    }
  }
}

?>
