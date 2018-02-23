<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Penerimaan extends CI_Controller {

	public function __construct() {
		parent::__construct();
		$this->load->model('bendahara/M_penerimaan');
		$this->load->helper(array('url','text','form'));
	}

	
	public function index()
	{
		//chek_session();
		$data['penerimaan'] = $this->M_penerimaan->get_penerimaan();
		$this->load->view('bendahara/template/header');
		$this->load->view('bendahara/template/sidebar');
		$this->load->view('bendahara/penerimaan', $data);
		$this->load->view('bendahara/template/footer');
	}

	public function add_penerimaan() {

		$this->_validate();

		$data = array(
			'id_wilayah'=>$this->input->post('id_wilayah'),
			'type'=>$this->input->post('type'),
			'luas_bangunan'=>$this->input->post('luas_bangunan'),
			'luas_tanah'=>$this->input->post('luas_tanah'),
			'unit'=>$this->input->post('unit'),
			'harga'=>$this->input->post('harga'),
			'total'=>$this->input->post('unit') * $this->input->post('harga') ,
					
			
		);

	$insert = $this->M_penerimaan->add_penerimaan($data);

	echo json_encode(array("status"=>true));
	}

	public function ajax_edit($id) {
	$data = $this->M_penerimaan->get_id_penerimaan($id);
	echo json_encode($data);

	}

	public function edit_penerimaan() {

		$this->_validate();
		
		$data = array(
			
			'id_penerimaan'=>$this->input->post('id_penerimaan'),
			'id_wilayah'=>$this->input->post('id_wilayah'),
			'type'=>$this->input->post('type'),
			'luas_bangunan'=>$this->input->post('luas_bangunan'),
			'luas_tanah'=>$this->input->post('luas_tanah'),
			'unit'=>$this->input->post('unit'),
			'harga'=>$this->input->post('harga'),
			'total'=>$this->input->post('unit') * $this->input->post('harga') ,
			
			);

		$this->M_penerimaan->update_penerimaan(array('id_penerimaan'=> $this->input->post('id_penerimaan')), $data);
		echo json_encode(array("status" => TRUE));
	}

	public function delete_penerimaan($id) {
		$this->M_penerimaan->delete_penerimaan($id);
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

		if($this->input->post('luas_bangunan') == '')
		{
			$data['inputerror'][] = 'luas_bangunan';
			$data['error_string'][] = 'Luas Bangunan harus diisi';
			$data['status'] = FALSE;
		}

		if($this->input->post('luas_tanah') == '')
		{
			$data['inputerror'][] = 'luas_tanah';
			$data['error_string'][] = 'Luas Tanah harus diisi';
			$data['status'] = FALSE;
		}

		if($this->input->post('unit') == '')
		{
			$data['inputerror'][] = 'unit';
			$data['error_string'][] = 'Jumlah Unit harus diisi';
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
