<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Daftar_unit extends CI_Controller {

	public function __construct() {
		parent::__construct();
		$this->load->model(array('developer/M_pemakaian_tanah','developer/M_detail_tanah'));
		$this->load->helper(array('url','text','form'));
	}

	
	public function index()
	{
		//chek_session();
		$data['daftar_unit'] = $this->M_detail_tanah->get_detail_tanah();
		$this->load->view('proyek/template/header');
		$this->load->view('proyek/template/sidebar');
		$this->load->view('proyek/daftar_unit', $data);
		$this->load->view('proyek/template/footer');
	}

	public function detail_unit(){

		
		$data['detail_unit'] = $this->M_pemakaian_tanah->getEditData();

        $this->load->view('proyek/template/header');
		$this->load->view('proyek/template/sidebar');
		$this->load->view('proyek/detail_unit',$data);
		$this->load->view('proyek/template/footer');

    }

}