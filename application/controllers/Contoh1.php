<?php
class Contoh1 extends CI_Controller
{

    public function index()
	{
		$data['kampus']="di Kampus BSI";
		$this->load->view('contoh',$data);
	}
}