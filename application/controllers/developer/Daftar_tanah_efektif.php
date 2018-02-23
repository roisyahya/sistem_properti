<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Daftar_tanah_efektif extends CI_Controller {

	public function __construct() {
		parent::__construct();
		$this->load->model(array('developer/M_pemakaian_tanah','developer/M_tanah_efektif'));
		$this->load->helper(array('url','text','form'));
	}

	
	public function index()
	{
		//chek_session();
		$data['tanah_efektif'] = $this->M_pemakaian_tanah->get_pemakaian();
		$this->load->view('developer/template/header');
		$this->load->view('developer/template/sidebar');
		$this->load->view('developer/daftar_tanah_efektif', $data);
		$this->load->view('developer/template/footer');
	}

	public function detail_tanah_efektif(){

		
		$data['detail_tanah_efektif'] = $this->M_tanah_efektif->getEditData();

        $this->load->view('developer/template/header');
		$this->load->view('developer/template/sidebar');
		$this->load->view('developer/tanah_efektif',$data);
		$this->load->view('developer/template/footer');

    }

}