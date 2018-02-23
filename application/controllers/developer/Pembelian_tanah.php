<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Pembelian_tanah extends CI_Controller {

	public function __construct() {
		parent::__construct();
		$this->load->model(array('developer/M_pembelian_tanah','developer/M_detail_tanah'));
		$this->load->helper(array('url','text','form'));
	}

	
	public function index()
	{
		//chek_session();
		$data['pembelian_tanah'] = $this->M_pembelian_tanah->get_pembelian();
		$this->load->view('developer/template/header');
		$this->load->view('developer/template/sidebar');
		$this->load->view('developer/pembelian_tanah', $data);
		$this->load->view('developer/template/footer');
	}

	public function add_pembelian() {

		$this->_validate();
		$id = $this->input->post('id_wilayah');

		

		$data = array(
			'id_wilayah'=>$this->input->post('id_wilayah'),
			'pemilik'=>$this->input->post('pemilik'),
			'luas'=>$this->input->post('luas'),
			'harga_beli'=>$this->input->post('harga_beli'),
					
			
		);

	$insert = $this->M_pembelian_tanah->add_pembelian($data);


	echo json_encode(array("status"=>true));
	}

	public function ajax_edit($id) {
	$data = $this->M_pembelian_tanah->get_id_pembelian($id);
	echo json_encode($data);

	}

	public function edit_pembelian() {

		$this->_validate();
		
		$data = array(
			
			'id_pembelian'=>$this->input->post('id_pembelian'),
			'id_wilayah'=>$this->input->post('id_wilayah'),'pemilik'=>$this->input->post('pemilik'),
			'luas'=>$this->input->post('luas'),
			'harga_beli'=>$this->input->post('harga_beli'),
					
			
			);

		$this->M_pembelian_tanah->update_pembelian(array('id_pembelian'=> $this->input->post('id_pembelian')), $data);
		echo json_encode(array("status" => TRUE));
	}

	public function delete_pembelian($id) {
		//Cari agar id wilayah terdeteksi
		
	$delete = $this->M_pembelian_tanah->delete_pembelian($id);

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
			$data['error_string'][] = 'Wilayah tanah harus diisi';
			$data['status'] = FALSE;
		}

		if($this->input->post('pemilik') == '')
		{
			$data['inputerror'][] = 'pemilik';
			$data['error_string'][] = 'Pemilik tanah harus diisi';
			$data['status'] = FALSE;
		}

		if($this->input->post('luas') == '')
		{
			$data['inputerror'][] = 'luas';
			$data['error_string'][] = 'Luas tanah harus diisi';
			$data['status'] = FALSE;
		}

		if($this->input->post('harga_beli') == '')
		{
			$data['inputerror'][] = 'harga_beli';
			$data['error_string'][] = 'Harga beli tanah harus diisi';
			$data['status'] = FALSE;
		}

		

		
		if($data['status'] === FALSE)
		{
			echo json_encode($data);
			exit();
		}
}
}
