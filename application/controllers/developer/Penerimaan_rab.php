<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Penerimaan_rab extends CI_Controller {

	public function __construct() {
		parent::__construct();
		$this->load->model('developer/M_detail_tanah');
		$this->load->helper(array('url','text','form'));
	}

	
	public function index()
	{
		//chek_session();
		$data['data_rab'] = $this->M_detail_tanah->get_detail_tanah();
		$this->load->view('developer/template/header');
		$this->load->view('developer/template/sidebar');
		$this->load->view('developer/data_penerimaan_rab', $data);
		$this->load->view('developer/template/footer');
	}

	public function detail_penerimaan_rab(){

		$data['konstruksi'] = $this->M_detail_tanah->getEditData_konstruksi();
		$data['penerimaan'] = $this->M_detail_tanah->getEditData_penerimaan();

        $this->load->view('developer/template/header');
		$this->load->view('developer/template/sidebar');
		$this->load->view('developer/detail_penerimaan_rab',$data);
		$this->load->view('developer/template/footer');

    }

	
}
