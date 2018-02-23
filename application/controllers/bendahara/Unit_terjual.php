<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Unit_terjual extends CI_Controller {

	public function __construct() {
		parent::__construct();
		$this->load->model(array('bendahara/M_pembayaran','developer/M_tanah_efektif'));
		$this->load->helper(array('url','text','form'));
	}

	
	public function index()
	{
		//chek_session();
		$data['unit_terjual'] = $this->M_tanah_efektif->get_unit_terjual();
		$this->load->view('bendahara/template/header');
		$this->load->view('bendahara/template/sidebar');
		$this->load->view('bendahara/unit_terjual', $data);
		$this->load->view('bendahara/template/footer');
	}

	public function input_pembayaran()
	{


		$data=array(
			
			'id_pembayaran'=>$this->M_pembayaran->get_id_pembayaran(),
			
			);

		$data['id_tanah_efektif'] = $this->M_tanah_efektif->get_id();


		$this->load->view('bendahara/template/header');
		$this->load->view('bendahara/template/sidebar');
		$this->load->view('bendahara/input_pembayaran',$data);
		$this->load->view('bendahara/template/footer');
	}

	public function add_unit_terjual() {

		$this->_validate();

		$data = array(
			'id_sub_kontraktor'=>$this->input->post('id_sub_kontraktor'),
			'id_wilayah'=>$this->input->post('id_wilayah'),
			'nama_sub'=>$this->input->post('nama_sub'),
			'total'=>$this->input->post('total'),
			'keterangan'=>$this->input->post('keterangan'),
					
			
		);

	$insert = $this->M_unit_terjual->add_unit_terjual($data);

	echo json_encode(array("status"=>true));
	}

	public function ajax_edit($id) {
	$data = $this->M_unit_terjual->get_id_unit_terjual($id);
	echo json_encode($data);

	}

	public function edit_unit_terjual() {

		$this->_validate();
		
		$data = array(
			
			
			'id_wilayah'=>$this->input->post('id_wilayah'),
			'nama_sub'=>$this->input->post('nama_sub'),
			'total'=>$this->input->post('total'),
			'keterangan'=>$this->input->post('keterangan'),
					
					
			
			);

		$this->M_unit_terjual->update_unit_terjual(array('id_sub_kontraktor'=> $this->input->post('id_sub_kontraktor')), $data);
		echo json_encode(array("status" => TRUE));
	}

	public function delete_unit_terjual($id) {
		$this->M_unit_terjual->delete_unit_terjual($id);
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

		if($this->input->post('nama_sub') == '')
		{
			$data['inputerror'][] = 'nama_sub';
			$data['error_string'][] = 'Nama unit_terjual harus diisi';
			$data['status'] = FALSE;
		}

		if($this->input->post('total') == '')
		{
			$data['inputerror'][] = 'total';
			$data['error_string'][] = 'Total unit_terjual harus diisi';
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
