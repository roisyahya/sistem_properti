<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Pematangan_tanah extends CI_Controller {

	public function __construct() {
		parent::__construct();
		$this->load->model('bendahara/M_pematangan_tanah');
		$this->load->helper(array('url','text','form'));
	}

	
	public function index()
	{
		//chek_session();
		$data['pematangan_tanah'] = $this->M_pematangan_tanah->get_pematangan_tanah();
		$this->load->view('bendahara/template/header');
		$this->load->view('bendahara/template/sidebar');
		$this->load->view('bendahara/pematangan_tanah', $data);
		$this->load->view('bendahara/template/footer');
	}

	public function add_pematangan_tanah() {

		$this->_validate();

		$data = array(
			'id_wilayah'=>$this->input->post('id_wilayah'),
			'keterangan'=>$this->input->post('keterangan'),
			'kuantitas'=>$this->input->post('kuantitas'),
			'harga'=>$this->input->post('harga'),
			'total'=>$this->input->post('kuantitas') * $this->input->post('harga') ,
					
			
		);

	$insert = $this->M_pematangan_tanah->add_pematangan_tanah($data);

	echo json_encode(array("status"=>true));
	}

	public function ajax_edit($id) {
	$data = $this->M_pematangan_tanah->get_id_pematangan_tanah($id);
	echo json_encode($data);

	}

	public function edit_pematangan_tanah() {

		$this->_validate();
		
		$data = array(
			
			'id_pematangan_tanah'=>$this->input->post('id_pematangan_tanah'),
			'id_wilayah'=>$this->input->post('id_wilayah'),
			'keterangan'=>$this->input->post('keterangan'),
			'kuantitas'=>$this->input->post('kuantitas'),
			'harga'=>$this->input->post('harga'),
			'total'=>$this->input->post('kuantitas') * $this->input->post('harga') ,
					
					
			
			);

		$this->M_pematangan_tanah->update_pematangan_tanah(array('id_pematangan_tanah'=> $this->input->post('id_pematangan_tanah')), $data);
		echo json_encode(array("status" => TRUE));
	}

	public function delete_pematangan_tanah($id) {
		$this->M_pematangan_tanah->delete_pematangan_tanah($id);
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
