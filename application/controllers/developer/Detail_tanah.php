<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Detail_tanah extends CI_Controller {

	public function __construct() {
		parent::__construct();
		$this->load->model('developer/M_detail_tanah');
		$this->load->helper(array('url','text','form'));
	}

	
	public function index()
	{
		//chek_session();
		$data['detail_tanah'] = $this->M_detail_tanah->get_detail_tanah();
		$this->load->view('developer/template/header');
		$this->load->view('developer/template/sidebar');
		$this->load->view('developer/detail_tanah', $data);
		$this->load->view('developer/template/footer');
	}

	public function add_detail() {

		$this->_validate();


	  

		$data = array(
			'nama_tanah'=>$this->input->post('nama_tanah'),
			'lokasi'=>$this->input->post('lokasi'),
			'jenis'=>$this->input->post('jenis'),
			'luas_sisa'=>0,
					
			
		);

	$insert = $this->M_detail_tanah->add_detail_tanah($data);

	echo json_encode(array("status"=>true));
	}

	public function ajax_edit($id) {
	$data = $this->M_detail_tanah->get_id_detail_tanah($id);
	echo json_encode($data);

	}

	public function edit_detail() {

		$this->_validate();
		
		$data = array(
			
			'id_wilayah'=>$this->input->post('id_wilayah'),
			'nama_tanah'=>$this->input->post('nama_tanah'),
			'lokasi'=>$this->input->post('lokasi'),
			'jenis'=>$this->input->post('jenis'),
			
			);

		$this->M_detail_tanah->update_detail_tanah(array('id_wilayah'=> $this->input->post('id_wilayah')), $data);
		echo json_encode(array("status" => TRUE));
	}

	public function delete_detail($id) {
		$this->M_detail_tanah->delete_detail_tanah($id);
		echo json_encode(array("status" => TRUE));

	}

	private function _validate()
	{
		$data = array();
		$data['error_string'] = array();
		$data['inputerror'] = array();
		$data['status'] = TRUE;

		if($this->input->post('nama_tanah') == '')
		{
			$data['inputerror'][] = 'nama_tanah';
			$data['error_string'][] = 'Nama tanah harus diisi';
			$data['status'] = FALSE;
		}

		if($this->input->post('lokasi') == '')
		{
			$data['inputerror'][] = 'lokasi';
			$data['error_string'][] = 'Lokasi tanah harus diisi';
			$data['status'] = FALSE;
		}

		

		if($this->input->post('jenis') == '')
		{
			$data['inputerror'][] = 'jenis';
			$data['error_string'][] = 'Jenis tanah harus diisi';
			$data['status'] = FALSE;
		}

		

		
		if($data['status'] === FALSE)
		{
			echo json_encode($data);
			exit();
		}
}

	
}
