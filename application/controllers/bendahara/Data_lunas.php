<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Data_lunas extends CI_Controller {

	public function __construct() {
		parent::__construct();
		$this->load->model(array('bendahara/M_pembayaran','bendahara/M_cicilan_um'));
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

	
		$data['edit_pembayaran'] = $this->M_pembayaran->get_edit_pembayaran();
		$data['cicilan_um'] = $this->M_cicilan_um->get_cicilan();

		
		$this->load->view('bendahara/template/header');
		$this->load->view('bendahara/template/sidebar');
		$this->load->view('bendahara/detail_lunas',$data);
		$this->load->view('bendahara/template/footer');
	}

}