<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Buku_model extends CI_Model {
    public function __construct() {
        parent::__construct();
    }
    
    public function getBook() {
        return array(
            array('judul' => 'Belajar Framework CI',
                  'pengarang' => 'Budi Raharjo',
                  'penerbit' => 'Informatika'
                 ),
            array('judul' => 'Mahir Android Dalam Semalam',
                  'pengarang' => 'Muh.Arifin',
                  'penerbit' => 'Andi Offset'
                 )
        );
    }
}