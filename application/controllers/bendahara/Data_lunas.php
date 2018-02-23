<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Data_lunas extends CI_Controller {

	public function __construct() {
		parent::__construct();
		$this->load->model('bendahara/M_pembayaran');
		$this->load->helper(array('url','text','form'));
	}

	
	public function index()
	{
		//chek_session();
		$data['data_lunas'] = $this->M_pembayaran->get_pembayaran_lunas();
		$this->load->view('bendahara/template/header');
		$this->load->view('bendahara/template/sidebar');
		$this->load->view('bendahara/data_lunas', $data);
		$this->load->view('bendahara/template/footer');
	}

	public function detail_lunas()
	{

	
		$data['detail_lunas'] = $this->M_pembayaran->get_edit_pembayaran();

		
		$this->load->view('bendahara/template/header');
		$this->load->view('bendahara/template/sidebar');
		$this->load->view('bendahara/detail_lunas',$data);
		$this->load->view('bendahara/template/footer');
	}

}