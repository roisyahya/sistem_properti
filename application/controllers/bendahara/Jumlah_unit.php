<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Jumlah_unit extends CI_Controller {

	public function __construct() {
		parent::__construct();
		$this->load->model('bendahara/M_jumlah_unit');
		$this->load->helper(array('url','text','form'));
	}

	
	public function index()
	{
		//chek_session();
		$data['jumlah_unit'] = $this->M_jumlah_unit->get_jumlah_unit();
		$this->load->view('bendahara/template/header');
		$this->load->view('bendahara/template/sidebar');
		$this->load->view('bendahara/jumlah_unit', $data);
		$this->load->view('bendahara/template/footer');
	}

	public function add_jumlah_unit() {

		$this->_validate();

		$data = array(
			'id_wilayah'=>$this->input->post('id_wilayah'),
			'type'=>$this->input->post('type'),
			'persen_tanah'=>$this->input->post('persen_tanah'),
			'luas'=>$this->input->post('luas'),
			'tanah'=>$this->input->post('tanah'),
			'jumlah'=>$this->input->post('jumlah'),
					
			
		);

	$insert = $this->M_jumlah_unit->add_jumlah_unit($data);

	echo json_encode(array("status"=>true));
	}

	public function ajax_edit($id) {
	$data = $this->M_jumlah_unit->get_id_jumlah_unit($id);
	echo json_encode($data);

	}

	public function edit_jumlah_unit() {

		$this->_validate();
		
		$data = array(
			
			'id_jumlah_unit'=>$this->input->post('id_jumlah_unit'),
			'id_wilayah'=>$this->input->post('id_wilayah'),
			'type'=>$this->input->post('type'),
			'persen_tanah'=>$this->input->post('persen_tanah'),
			'luas'=>$this->input->post('luas'),
			'tanah'=>$this->input->post('tanah'),
			'jumlah'=>$this->input->post('jumlah'),
					
			
			);

		$this->M_jumlah_unit->update_jumlah_unit(array('id_jumlah_unit'=> $this->input->post('id_jumlah_unit')), $data);
		echo json_encode(array("status" => TRUE));
	}

	public function delete_jumlah_unit($id) {
		$this->M_jumlah_unit->delete_jumlah_unit($id);
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

		if($this->input->post('persen_tanah') == '')
		{
			$data['inputerror'][] = 'persen_tanah';
			$data['error_string'][] = 'Presentase luas tanah harus diisi';
			$data['status'] = FALSE;
		}

		if($this->input->post('luas') == '')
		{
			$data['inputerror'][] = 'luas';
			$data['error_string'][] = 'Luas tanah harus diisi';
			$data['status'] = FALSE;
		}

		if($this->input->post('tanah') == '')
		{
			$data['inputerror'][] = 'tanah';
			$data['error_string'][] = 'Tanah luas harus diisi';
			$data['status'] = FALSE;
		}

		if($this->input->post('jumlah') == '')
		{
			$data['inputerror'][] = 'jumlah';
			$data['error_string'][] = 'Jumlah tanah harus diisi';
			$data['status'] = FALSE;
		}

		

		
		if($data['status'] === FALSE)
		{
			echo json_encode($data);
			exit();
		}
}
}
