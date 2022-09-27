<?php
defined('BASEPATH') OR exit ('No Direct Script access allowed');
class Web extends CI_Controller{
    function __construct()
    {
        parent::__construct();
        $this->load->helper('url');
    }
    public function index(){
        $data['judul']="Halaman Judul";
        $this->load->view('v_index',$data);
    }
}