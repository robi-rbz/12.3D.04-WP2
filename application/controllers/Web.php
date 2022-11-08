<?php
defined('BASEPATH') OR exit ('No Direct Script access allowed');
class Web extends CI_Controller{
    function __construct()
    {
        parent::__construct();
        $this->load->helper('url');
        $this->load->model('m_data');
        $this->load->library('form_validation');
    }
    public function index(){
        $data['judul']="Halaman Home";

        $this->load->view('v_header',$data);
        $this->load->view('v_index',$data);
        $this->load->view('v_footer',$data);
    }
    public function about(){
        $data['judul']="Halaman About";

        $this->load->view('v_header',$data);
        $this->load->view('v_about',$data);
        $this->load->view('v_footer',$data);
    }
    public function bio(){
       // $data['bio']=$this->m_data->ambil_data()->result();
        $data=array(
            'judul'=>"Halaman Data",
            'bio'=>$this->m_data->ambil_data()->result()
        );

        $this->load->view('v_header',$data);
        $this->load->view('v_data',$data);
        $this->load->view('v_footer',$data);
    }
    public function create()
    {
        $data=array(
            'judul'=>"Tambah Data",
        );
        $this->load->view('v_header',$data);
        $this->load->view('v_create',$data);
        $this->load->view('v_footer',$data);
    }
    public function save()
    {
        $this->form_validation->set_rules('nama','Nama','required');
		$this->form_validation->set_rules('jenis_kelamin','Jenis Kelamin','required');
		$this->form_validation->set_rules('alamat','Alamat','required');
        $this->form_validation->set_rules('pekerjaan','Pekerjaan','required');

        if ($this->form_validation->run()==true) {
            $data['nama'] = $this->input->post('nama');
			$data['jk'] = $this->input->post('jenis_kelamin');
            $data['alamat'] = $this->input->post('alamat');
			$data['pekerjaan'] = $this->input->post('pekerjaan');
			$this->m_data->save($data);
			redirect('web/bio');
        }else {
            $this->load->view('v_header');
            $this->load->view('v_create');
            $this->load->view('v_footer');
        }
		
    }
}