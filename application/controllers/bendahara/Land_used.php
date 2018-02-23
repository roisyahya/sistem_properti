<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Land_used extends CI_Controller {

	public function __construct() {
		parent::__construct();
		$this->load->model('bendahara/M_land_used');
		$this->load->helper(array('url','text','form'));
	}

	
	public function index()
	{
		//chek_session();
		$data['land_used'] = $this->M_land_used->get_land_used();
		$this->load->view('bendahara/template/header');
		$this->load->view('bendahara/template/sidebar');
		$this->load->view('bendahara/land_used', $data);
		$this->load->view('bendahara/template/footer');
	}

	public function add_land_used() {

		$this->_validate();

		$data = array(
			'id_wilayah'=>$this->input->post('id_wilayah'),
			'land_used'=>$this->input->post('land_used'),
			'per_luas_tanah'=>$this->input->post('per_luas_tanah'),
			'luas'=>$this->input->post('luas'),
			'per_luas_tanah_1'=>$this->input->post('per_luas_tanah_1'),
			'luas1'=>$this->input->post('luas1'),
					
			
		);

	$insert = $this->M_land_used->add_land_used($data);

	echo json_encode(array("status"=>true));
	}

	public function ajax_edit($id) {
	$data = $this->M_land_used->get_id_land_used($id);
	echo json_encode($data);

	}

	public function edit_land_used() {

		$this->_validate();
		
		$data = array(
			
			'id_rab_land_used'=>$this->input->post('id_rab_land_used'),
			'id_wilayah'=>$this->input->post('id_wilayah'),
			'land_used'=>$this->input->post('land_used'),
			'per_luas_tanah'=>$this->input->post('per_luas_tanah'),
			'luas'=>$this->input->post('luas'),
			'per_luas_tanah_1'=>$this->input->post('per_luas_tanah_1'),
			'luas1'=>$this->input->post('luas1'),
			
			);

		$this->M_land_used->update_land_used(array('id_rab_land_used'=> $this->input->post('id_rab_land_used')), $data);
		echo json_encode(array("status" => TRUE));
	}

	public function delete_land_used($id) {
		$this->M_land_used->delete_land_used($id);
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

		if($this->input->post('land_used') == '')
		{
			$data['inputerror'][] = 'land_used';
			$data['error_string'][] = 'land Used tanah harus diisi';
			$data['status'] = FALSE;
		}

		if($this->input->post('per_luas_tanah') == '')
		{
			$data['inputerror'][] = 'per_luas_tanah';
			$data['error_string'][] = 'Presentase luas tanah harus diisi';
			$data['status'] = FALSE;
		}

		if($this->input->post('luas') == '')
		{
			$data['inputerror'][] = 'luas';
			$data['error_string'][] = 'Luas tanah harus diisi';
			$data['status'] = FALSE;
		}

		if($this->input->post('per_luas_tanah_1') == '')
		{
			$data['inputerror'][] = 'per_luas_tanah_1';
			$data['error_string'][] = 'Presentase luas tanah harus diisi';
			$data['status'] = FALSE;
		}

		if($this->input->post('luas1') == '')
		{
			$data['inputerror'][] = 'luas1';
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
