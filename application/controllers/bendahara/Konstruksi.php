<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Konstruksi extends CI_Controller {

	public function __construct() {
		parent::__construct();
		$this->load->model('bendahara/M_konstruksi');
		$this->load->helper(array('url','text','form'));
	}

	
	public function index()
	{
		//chek_session();
		$data['konstruksi'] = $this->M_konstruksi->get_konstruksi();
		$this->load->view('bendahara/template/header');
		$this->load->view('bendahara/template/sidebar');
		$this->load->view('bendahara/konstruksi', $data);
		$this->load->view('bendahara/template/footer');
	}

	public function add_konstruksi() {

		$this->_validate();

		$data = array(
			'id_wilayah'=>$this->input->post('id_wilayah'),
			'type'=>$this->input->post('type'),
			'luas'=>$this->input->post('luas'),
			'luas_tanah'=>$this->input->post('luas_tanah'),
			'unit'=>$this->input->post('unit'),
			'harga_meter'=>$this->input->post('harga_meter'),
			'harga'=>$this->input->post('harga'),
			'total'=>$this->input->post('unit') * $this->input->post('harga'),
			'laba_diharap'=>$this->input->post('laba_diharap'),
			'ppn'=>$this->input->post('ppn'),
			'bphtb'=>$this->input->post('bphtb'),
			'pph'=>$this->input->post('pph'),
					
			
		);

	$insert = $this->M_konstruksi->add_konstruksi($data);

	echo json_encode(array("status"=>true));
	}

	public function ajax_edit($id) {
	$data = $this->M_konstruksi->get_id_konstruksi($id);
	echo json_encode($data);

	}

	public function edit_konstruksi() {

		$this->_validate();
		
		$data = array(
			
			'id_konstruksi'=>$this->input->post('id_konstruksi'),
			'id_wilayah'=>$this->input->post('id_wilayah'),
			'type'=>$this->input->post('type'),
			'luas'=>$this->input->post('luas'),
			'luas_tanah'=>$this->input->post('luas_tanah'),
			'unit'=>$this->input->post('unit'),
			'harga_meter'=>$this->input->post('harga_meter'),
			'harga'=>$this->input->post('harga'),
			'total'=>$this->input->post('unit') * $this->input->post('harga'),
			'laba_diharap'=>$this->input->post('laba_diharap'),
			'ppn'=>$this->input->post('ppn'),
			'bphtb'=>$this->input->post('bphtb'),
			'pph'=>$this->input->post('pph'),
			
			);

		$this->M_konstruksi->update_konstruksi(array('id_konstruksi'=> $this->input->post('id_konstruksi')), $data);
		echo json_encode(array("status" => TRUE));
	}

	public function delete_konstruksi($id) {
		$this->M_konstruksi->delete_konstruksi($id);
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

		if($this->input->post('type') == '')
		{
			$data['inputerror'][] = 'type';
			$data['error_string'][] = 'Tipe harus diisi';
			$data['status'] = FALSE;
		}

		if($this->input->post('luas') == '')
		{
			$data['inputerror'][] = 'luas';
			$data['error_string'][] = 'Luas bangunan harus diisi';
			$data['status'] = FALSE;
		}

		if($this->input->post('luas_tanah') == '')
		{
			$data['inputerror'][] = 'luas_tanah';
			$data['error_string'][] = 'Luas tanah harus diisi';
			$data['status'] = FALSE;
		}

		if($this->input->post('unit') == '')
		{
			$data['inputerror'][] = 'unit';
			$data['error_string'][] = 'Unit harus diisi';
			$data['status'] = FALSE;
		}


		if($this->input->post('harga_meter') == '')
		{
			$data['inputerror'][] = 'harga_meter';
			$data['error_string'][] = 'Harga per harus diisi';
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
