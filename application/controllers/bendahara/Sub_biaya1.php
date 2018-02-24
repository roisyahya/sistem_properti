<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Sub_biaya1 extends CI_Controller {

	public function __construct() {
		parent::__construct();
		$this->load->model('bendahara/M_sub_biaya1');
		$this->load->helper(array('url','text','form'));
	}


	public function add_sub_biaya1() {

		$this->_validate();

		$data = array(
			'id_kel_biaya'=>$this->input->post('id_kel_biaya'),
			'kode_account1'=>$this->input->post('kode_account1'),
			'keterangan'=>$this->input->post('keterangan'),
			'jenis'=>'kantor',
		);

	$insert = $this->M_sub_biaya1->add_sub_biaya1($data);

	echo json_encode(array("status"=>true));
	}

	
	
	public function ajax_edit($id) {
	$data = $this->M_sub_biaya1->get_id_sub_biaya1($id);
	echo json_encode($data);

	}

	public function edit_sub_biaya1() {

		$this->_validate();
		
		$data = array(
			
			'kode_account1'=>$this->input->post('kode_account1'),
			'keterangan'=>$this->input->post('keterangan'),
			
			);

		$this->M_sub_biaya1->update_sub_biaya1(array('id_sub_biaya1'=> $this->input->post('id_sub_biaya1')), $data);
		echo json_encode(array("status" => TRUE));
	}

	public function delete_sub_biaya1($id) {
		$this->M_sub_biaya1->delete_sub_biaya1($id);
		echo json_encode(array("status" => TRUE));

	}

	// INput Sub Biaya 1

	public function sub_biaya1()
	{


		$data['sub_biaya1'] = $this->M_kelompok_biaya->getEditData();

		$this->load->view('bendahara/template/header');
		$this->load->view('bendahara/template/sidebar');
		$this->load->view('bendahara/sub_biaya1',$data);
		$this->load->view('bendahara/template/footer');
	}


	private function _validate()
	{
		$data = array();
		$data['error_string'] = array();
		$data['inputerror'] = array();
		$data['status'] = TRUE;

		if($this->input->post('kode_account1') == '')
		{
			$data['inputerror'][] = 'kode_account1';
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
