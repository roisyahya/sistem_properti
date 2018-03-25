<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Daftar_pemesanan extends CI_Controller {

	public function __construct() {
		parent::__construct();
		$this->load->model(array('bendahara/M_pembayaran','bendahara/M_cicilan_um'));
		$this->load->helper(array('url','text','form'));
	}

	
	public function index()
	{
		//chek_session();
		$data['daftar_pembayaran'] = $this->M_pembayaran->get_pembayaran();
		$this->load->view('bendahara/template/header');
		$this->load->view('bendahara/template/sidebar');
		$this->load->view('bendahara/daftar_pembayaran', $data);
		$this->load->view('bendahara/template/footer');
	}

	public function edit_pembayaran()
	{

	
		$data['edit_pembayaran'] = $this->M_pembayaran->get_edit_pembayaran();
		$data['cicilan_um'] = $this->M_cicilan_um->get_cicilan();

		
		$this->load->view('bendahara/template/header');
		$this->load->view('bendahara/template/sidebar');
		$this->load->view('bendahara/edit_pembayaran',$data);
		$this->load->view('bendahara/template/footer');
	}

}