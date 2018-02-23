<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Daftar_pemakaian extends CI_Controller {

	public function __construct() {
		parent::__construct();
		$this->load->model(array('developer/M_pemakaian_tanah','developer/M_detail_tanah'));
		$this->load->helper(array('url','text','form'));
	}

	
	public function index()
	{
		//chek_session();
		$data['daftar_pemakaian'] = $this->M_detail_tanah->get_detail_tanah();
		$this->load->view('developer/template/header');
		$this->load->view('developer/template/sidebar');
		$this->load->view('developer/daftar_pemakaian', $data);
		$this->load->view('developer/template/footer');
	}

	public function detail_pemakaian(){

		
		$data['detail_pemakaian'] = $this->M_pemakaian_tanah->getEditData();

        $this->load->view('developer/template/header');
		$this->load->view('developer/template/sidebar');
		$this->load->view('developer/pemakaian_tanah',$data);
		$this->load->view('developer/template/footer');

    }

}