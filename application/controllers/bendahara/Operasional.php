<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Operasional extends CI_Controller {

	public function __construct() {
		parent::__construct();
		$this->load->model('bendahara/M_operasional');
		$this->load->helper(array('url','text','form'));
	}

	
	public function index()
	{
		//chek_session();
		$data['operasional'] = $this->M_operasional->get_operasional();
		$this->load->view('bendahara/template/header');
		$this->load->view('bendahara/template/sidebar');
		$this->load->view('bendahara/operasional', $data);
		$this->load->view('bendahara/template/footer');
	}

	public function add_operasional() {

		$this->_validate();

		$data = array(
			'id_wilayah'=>$this->input->post('id_wilayah'),
			'keterangan'=>$this->input->post('keterangan'),
			'total'=>$this->input->post('total'),
					
			
		);

	$insert = $this->M_operasional->add_operasional($data);

	echo json_encode(array("status"=>true));
	}

	public function ajax_edit($id) {
	$data = $this->M_operasional->get_id_operasional($id);
	echo json_encode($data);

	}

	public function edit_operasional() {

		$this->_validate();
		
		$data = array(
			
			'id_operasional'=>$this->input->post('id_operasional'),
			'id_wilayah'=>$this->input->post('id_wilayah'),
			'keterangan'=>$this->input->post('keterangan'),
			'total'=>$this->input->post('total'),
					
			);

		$this->M_operasional->update_operasional(array('id_operasional'=> $this->input->post('id_operasional')), $data);
		echo json_encode(array("status" => TRUE));
	}

	public function delete_operasional($id) {
		$this->M_operasional->delete_operasional($id);
		echo json_encode(array("status" => TRUE));

	}

	private function _validate()
	{
		$data = array();
		$data['error_string'] = array();
		$data['inputerror'] = array();
		$data['status'] = TRUE;

		if($this->input->post('id_wilayah') == '')
		{
			$data['inputerror'][] = 'id_wilayah';
			$data['error_string'][] = 'Id Wilayah harus diisi';
			$data['status'] = FALSE;
		}

		if($this->input->post('keterangan') == '')
		{
			$data['inputerror'][] = 'keterangan';
			$data['error_string'][] = 'Keterangan harus diisi';
			$data['status'] = FALSE;
		}

	

		if($this->input->post('total') == '')
		{
			$data['inputerror'][] = 'total';
			$data['error_string'][] = 'Total harus diisi';
			$data['status'] = FALSE;
		}

		

		
		if($data['status'] === FALSE)
		{
			echo json_encode($data);
			exit();
		}
}
}
