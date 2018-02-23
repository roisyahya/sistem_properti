<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Pemakaian_tanah extends CI_Controller {

	public function __construct() {
		parent::__construct();
		$this->load->model(array('developer/M_pemakaian_tanah','developer/M_detail_tanah'));
		$this->load->helper(array('url','text','form'));
	}

	
	public function index()
	{
		//chek_session();
		$data['pemakaian_tanah'] = $this->M_pemakaian_tanah->get_pemakaian();
		$this->load->view('developer/template/header');
		$this->load->view('developer/template/sidebar');
		$this->load->view('developer/pemakaian_tanah', $data);
		$this->load->view('developer/template/footer');
	}

	public function add_pemakaian() {

		$this->_validate();
		$id = $this->input->post('id_wilayah');
		$dipakai = $this->input->post('luas_dipakai');

		$data = array(
			'id_wilayah'=>$id,
			'nama_proyek'=>$this->input->post('nama_proyek'),
			'luas_dipakai'=>$dipakai,
			'luas_sisa_dipakai'=>$dipakai,
					
			
		);

	$insert = $this->M_pemakaian_tanah->add_pemakaian($data);

	





	echo json_encode(array("status"=>true));
	}

	public function ajax_edit($id) {
	$data = $this->M_pemakaian_tanah->get_id_pemakaian($id);
	echo json_encode($data);

	}

	public function edit_pemakaian() {

		$this->_validate();
	  $id=$this->input->post('id_pemakaian');
	  $luas=$this->input->post('luas_dipakai');
	  $total_semua = $this->db->query("SELECT sum(luas_tanah) AS total_semua FROM tanah_efektif WHERE id_pemakaian='$id'")->row_array();
      $hasil =  $total_semua['total_semua'];
		
		$data = array(
			
			'id_pemakaian'=>$this->input->post('id_pemakaian'),
			'id_wilayah'=>$this->input->post('id_wilayah'),
			'nama_proyek'=>$this->input->post('nama_proyek'),
			'luas_dipakai'=>$this->input->post('luas_dipakai'),
			'luas_sisa_dipakai'=>$luas - $hasil,
					
			
			);

		$this->M_pemakaian_tanah->update_pemakaian(array('id_pemakaian'=> $this->input->post('id_pemakaian')), $data);
		echo json_encode(array("status" => TRUE));
	}

	public function delete_pemakaian($id) {
		$this->M_pemakaian_tanah->delete_pemakaian($id);
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

		if($this->input->post('nama_proyek') == '')
		{
			$data['inputerror'][] = 'nama_proyek';
			$data['error_string'][] = 'Nama proyek tanah harus diisi';
			$data['status'] = FALSE;
		}

		if($this->input->post('luas_dipakai') == '')
		{
			$data['inputerror'][] = 'luas_dipakai';
			$data['error_string'][] = 'Luas tanah dipakai harus diisi';
			$data['status'] = FALSE;
		}

		
		if($data['status'] === FALSE)
		{
			echo json_encode($data);
			exit();
		}
}
}
