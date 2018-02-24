<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Sub_biaya2_marketing extends CI_Controller {

	public function __construct() {
		parent::__construct();
		$this->load->model('bendahara/M_sub_biaya2');
		$this->load->helper(array('url','text','form'));
	}


	public function add_sub_biaya2() {

		$this->_validate();

		$data = array(
			'id_sub_biaya1'=>$this->input->post('id_sub_biaya1'),
			'kode_account2'=>$this->input->post('kode_account2'),
			'keterangan'=>$this->input->post('keterangan'),
			'jenis'=>'marketing',
		);

	$insert = $this->M_sub_biaya2->add_sub_biaya2($data);

	echo json_encode(array("status"=>true));
	}

	
	
	public function ajax_edit($id) {
	$data = $this->M_sub_biaya2->get_id_sub_biaya2($id);
	echo json_encode($data);

	}

	public function edit_sub_biaya2() {

		$this->_validate();
		
		$data = array(
			
			'kode_account2'=>$this->input->post('kode_account2'),
			'keterangan'=>$this->input->post('keterangan'),
			'jenis'=>'marketing',
			
			);

		$this->M_sub_biaya2->update_sub_biaya2(array('id_sub_biaya2'=> $this->input->post('id_sub_biaya2')), $data);
		echo json_encode(array("status" => TRUE));
	}

	public function delete_sub_biaya2($id) {
		$this->M_sub_biaya2->delete_sub_biaya2($id);
		echo json_encode(array("status" => TRUE));

	}

	// INput Sub Biaya 1

	public function sub_biaya2()
	{


		$data['sub_biaya2'] = $this->M_kelompok_biaya->getEditData();

		$this->load->view('bendahara/template/header');
		$this->load->view('bendahara/template/sidebar');
		$this->load->view('bendahara/sub_biaya2',$data);
		$this->load->view('bendahara/template/footer');
	}


	private function _validate()
	{
		$data = array();
		$data['error_string'] = array();
		$data['inputerror'] = array();
		$data['status'] = TRUE;

		if($this->input->post('kode_account2') == '')
		{
			$data['inputerror'][] = 'kode_account2';
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
