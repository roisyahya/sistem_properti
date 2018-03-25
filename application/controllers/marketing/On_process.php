<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class On_process extends CI_Controller {

	public function __construct() {
		parent::__construct();
		$this->load->model(array('marketing/M_on_process','bendahara/M_pembayaran'));
		$this->load->helper(array('url','text','form'));
	}

	
	public function index()
	{
		//chek_session();
		$data['on_process'] = $this->M_on_process->get_on_process();
		$this->load->view('marketing/template/header');
		$this->load->view('marketing/template/sidebar');
		$this->load->view('marketing/on_process', $data);
		$this->load->view('marketing/template/footer');
	}

	public function ajax_edit($id) {
	$data = $this->M_on_process->get_id_on_process($id);
	echo json_encode($data);

	}

	public function detail_on_process()
	{


		$data=array(
			
			'id_pembayaran'=>$this->M_pembayaran->get_id_pembayaran(),
			
			);

		$data['on_process'] = $this->M_on_process->get_on_process();


		$this->load->view('marketing/template/header');
		$this->load->view('marketing/template/sidebar');
		$this->load->view('marketing/detail_on_process',$data);
		$this->load->view('marketing/template/footer');
	}

	public function delete_unit_terjual($id) {
		$this->M_on_process->delete_unit_terjual($id);
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
