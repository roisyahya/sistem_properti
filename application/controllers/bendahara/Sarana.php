<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Sarana extends CI_Controller {

	public function __construct() {
		parent::__construct();
		$this->load->model('bendahara/M_sarana');
		$this->load->helper(array('url','text','form'));
	}

	
	public function index()
	{
		//chek_session();
		$data['sarana'] = $this->M_sarana->get_sarana();
		$this->load->view('bendahara/template/header');
		$this->load->view('bendahara/template/sidebar');
		$this->load->view('bendahara/sarana', $data);
		$this->load->view('bendahara/template/footer');
	}

	public function add_sarana() {

		$this->_validate();

		$data = array(
			'id_wilayah'=>$this->input->post('id_wilayah'),
			'keterangan'=>$this->input->post('keterangan'),
			'kuantitas'=>$this->input->post('kuantitas'),
			'harga'=>$this->input->post('harga'),
			'total'=>$this->input->post('kuantitas') * $this->input->post('harga') ,
					
			
		);

	$insert = $this->M_sarana->add_sarana($data);

	echo json_encode(array("status"=>true));
	}

	public function ajax_edit($id) {
	$data = $this->M_sarana->get_id_sarana($id);
	echo json_encode($data);

	}

	public function edit_sarana() {

		$this->_validate();
		
		$data = array(
			
			'id_sarana'=>$this->input->post('id_sarana'),
			'id_wilayah'=>$this->input->post('id_wilayah'),
			'keterangan'=>$this->input->post('keterangan'),
			'kuantitas'=>$this->input->post('kuantitas'),
			'harga'=>$this->input->post('harga'),
			'total'=>$this->input->post('kuantitas') * $this->input->post('harga') ,
					
					
			
			);

		$this->M_sarana->update_sarana(array('id_sarana'=> $this->input->post('id_sarana')), $data);
		echo json_encode(array("status" => TRUE));
	}

	public function delete_sarana($id) {
		$this->M_sarana->delete_sarana($id);
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

		if($this->input->post('kuantitas') == '')
		{
			$data['inputerror'][] = 'kuantitas';
			$data['error_string'][] = 'Kuantitas harus diisi';
			$data['status'] = FALSE;
		}

		if($this->input->post('harga') == '')
		{
			$data['inputerror'][] = 'harga';
			$data['error_string'][] = 'Harga harus diisi';
			$data['status'] = FALSE;
		}

		

		
		if($data['status'] === FALSE)
		{
			echo json_encode($data);
			exit();
		}
}
}
