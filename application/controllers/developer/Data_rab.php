<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Data_rab extends CI_Controller {

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
		$this->load->view('developer/data_rab', $data);
		$this->load->view('developer/template/footer');
	}

	public function detail_rab(){

		$data['data_rab'] = $this->M_detail_tanah->getEditData();
		$data['jml_unit'] = $this->M_detail_tanah->getEditData_jml_unit();
		$data['pematangan'] = $this->M_detail_tanah->getEditData_pematangan();
		$data['sarana'] = $this->M_detail_tanah->getEditData_sarana();
		$data['prasarana'] = $this->M_detail_tanah->getEditData_prasarana();
		$data['konstruksi'] = $this->M_detail_tanah->getEditData_konstruksi();
		$data['operasional'] = $this->M_detail_tanah->getEditData_operasional();
		$data['penerimaan'] = $this->M_detail_tanah->getEditData_penerimaan();

        $this->load->view('developer/template/header');
		$this->load->view('developer/template/sidebar');
		$this->load->view('developer/detail_rab',$data);
		$this->load->view('developer/template/footer');

    }

	
}
