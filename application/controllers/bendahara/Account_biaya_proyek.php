<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Account_biaya_proyek extends CI_Controller {

	public function __construct() {
		parent::__construct();
		$this->load->model('bendahara/M_kelompok_biaya');
		$this->load->helper(array('url','text','form'));
	}

	
	public function index()
	{
		//chek_session();
		$data['kelompok_biaya'] = $this->M_kelompok_biaya->get_kelompok_biaya_proyek();
		$this->load->view('bendahara/template/header');
		$this->load->view('bendahara/template/sidebar');
		$this->load->view('bendahara/account_biaya_proyek', $data);
		$this->load->view('bendahara/template/footer');
	}

	public function add_account_biaya_proyek() {

		$this->_validate();

		$data = array(
			'kode_account'=>$this->input->post('kode_account'),
			'keterangan'=>$this->input->post('keterangan'),
			'jenis'=>'proyek',
		);

	$insert = $this->M_kelompok_biaya->add_kelompok_biaya($data);

	echo json_encode(array("status"=>true));
	}


	
	
	public function ajax_edit($id) {
	$data = $this->M_kelompok_biaya->get_id_kelompok_biaya($id);
	echo json_encode($data);

	}

	public function edit_account_biaya_proyek() {

		$this->_validate();
		
		$data = array(
			
			'kode_account'=>$this->input->post('kode_account'),
			'keterangan'=>$this->input->post('keterangan'),
			
			);

		$this->M_kelompok_biaya->update_kelompok_biaya(array('id_kel_biaya'=> $this->input->post('id_kel_biaya')), $data);
		echo json_encode(array("status" => TRUE));
	}

	public function delete_account_biaya_proyek($id) {
		$this->M_kelompok_biaya->delete_kelompok_biaya($id);
		echo json_encode(array("status" => TRUE));

	}

	// INput Sub Biaya 1

	public function sub_biaya1_proyek()
	{


		$data['sub_biaya1'] = $this->M_kelompok_biaya->getEditData();

		$this->load->view('bendahara/template/header');
		$this->load->view('bendahara/template/sidebar');
		$this->load->view('bendahara/sub_biaya1_proyek',$data);
		$this->load->view('bendahara/template/footer');
	}

	public function sub_biaya2_proyek()
	{


		$data['sub_biaya2_proyek'] = $this->M_kelompok_biaya->getEditData_biaya2();

		$this->load->view('bendahara/template/header');
		$this->load->view('bendahara/template/sidebar');
		$this->load->view('bendahara/sub_biaya2_proyek',$data);
		$this->load->view('bendahara/template/footer');
	}


	private function _validate()
	{
		$data = array();
		$data['error_string'] = array();
		$data['inputerror'] = array();
		$data['status'] = TRUE;

		if($this->input->post('kode_account') == '')
		{
			$data['inputerror'][] = 'kode_account';
			$data['error_string'][] = 'Kode Account harus diisi';
			$data['status'] = FALSE;
		}

		if($this->input->post('keterangan') == '')
		{
			$data['inputerror'][] = 'keterangan';
			$data['error_string'][] = 'Keterangan harus diisi';
			$data['status'] = FALSE;
		}

		
		if($data['status'] === FALSE)
		{
			echo json_encode($data);
			exit();
		}
}
}
