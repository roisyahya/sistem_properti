<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Pendapatan_penjualan extends CI_Controller {

	public function __construct() {
		parent::__construct();
		$this->load->model('bendahara/M_pembayaran');
		$this->load->helper(array('url','text','form'));
	}

	
	public function index()
	{
		//chek_session();
		$data['pendapatan_penjualan'] = $this->M_pembayaran->get_pembayaran();
		$this->load->view('bendahara/template/header');
		$this->load->view('bendahara/template/sidebar');
		$this->load->view('bendahara/pendapatan_penjualan', $data);
		$this->load->view('bendahara/template/footer');
	}
}
