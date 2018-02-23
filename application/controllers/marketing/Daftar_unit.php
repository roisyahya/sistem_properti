<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Daftar_unit extends CI_Controller {

	public function __construct() {
		parent::__construct();
		$this->load->model(array('developer/M_tanah_efektif','developer/M_detail_tanah'));
		$this->load->helper(array('url','text','form'));
	}

	public function index(){

		
		$data['detail_tanah_efektif'] = $this->M_tanah_efektif->get_tanah_efektif();

        $this->load->view('marketing/template/header');
		$this->load->view('marketing/template/sidebar');
		$this->load->view('marketing/tanah_efektif',$data);
		$this->load->view('marketing/template/footer');

    }
	
	
	public function add_tanah_efektif() {

		$this->_validate();
	
		$data = array(
			'id_pemakaian'=>$this->input->post('id_pemakaian'),
			'nama_unit'=>$this->input->post('nama_unit'),
			'blok'=>$this->input->post('blok'),
			'nomor'=>$this->input->post('nomor'),
			'luas_bangunan'=>$this->input->post('luas_bangunan'),
			'luas_tanah'=>$this->input->post('luas_tanah'),
			'status'=>'Tersedia',
			'keterangan'=>$this->input->post('keterangan'),					
			
		);

	$insert = $this->M_tanah_efektif->add_tanah_efektif($data);
	echo json_encode(array("status"=>true));
	}


	public function ajax_edit($id) {
	$data = $this->M_tanah_efektif->get_id_tanah_efektif($id);
	echo json_encode($data);

	}

	public function edit_tanah_efektif() {

	$this->_validate();
	  
	
	$data = array(

			'id_pemakaian'=>$this->input->post('id_pemakaian'),
			'nama_unit'=>$this->input->post('nama_unit'),
			'blok'=>$this->input->post('blok'),
			'nomor'=>$this->input->post('nomor'),
			'luas_bangunan'=>$this->input->post('luas_bangunan'),
			'luas_tanah'=>$this->input->post('luas_tanah'),
			'status'=>'Tersedia',
			'keterangan'=>$this->input->post('keterangan'),		
					
			
			);

		$this->M_tanah_efektif->update_tanah_efektif(array('id_tanah_efektif'=> $this->input->post('id_tanah_efektif')), $data);
		echo json_encode(array("status" => TRUE));
	}

	public function delete_tanah_efektif($id) {
		$this->M_tanah_efektif->delete_tanah_efektif($id);
		echo json_encode(array("status" => TRUE));

	}

	private function _validate()
	{
		$data = array();
		$data['error_string'] = array();
		$data['inputerror'] = array();
		$data['status'] = TRUE;

		if($this->input->post('id_pemakaian') == '')
		{

			$data['inputerror'][] = 'id_pemakaian';
			$data['error_string'][] = 'Id Pemakaian harus diisi';
			$data['status'] = FALSE;
		}

		if($this->input->post('nama_unit') == '')
		{
			$data['inputerror'][] = 'nama_unit';
			$data['error_string'][] = 'Nama unit harus diisi';
			$data['status'] = FALSE;
		}

		if($this->input->post('blok') == '')
		{
			$data['inputerror'][] = 'blok';
			$data['error_string'][] = 'Blok harus diisi';
			$data['status'] = FALSE;
		}

		if($this->input->post('nomor') == '')
		{
			$data['inputerror'][] = 'nomor';
			$data['error_string'][] = 'Nomor rumah harus diisi';
			$data['status'] = FALSE;
		}

		if($this->input->post('luas_bangunan') == '')
		{
			$data['inputerror'][] = 'luas_bangunan';
			$data['error_string'][] = 'Luas bangunan harus diisi';
			$data['status'] = FALSE;
		}

		if($this->input->post('luas_tanah') == '')
		{
			$data['inputerror'][] = 'luas_tanah';
			$data['error_string'][] = 'Luas tanah harus diisi';
			$data['status'] = FALSE;
		}

		
		if($data['status'] === FALSE)
		{
			echo json_encode($data);
			exit();
		}
}
}
