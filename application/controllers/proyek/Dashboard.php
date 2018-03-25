<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Dashboard extends CI_Controller {
public function __construct() {
		parent::__construct();
		//$this->load->model(array('penerima/M_pelanggan','penerima/M_sample'));
		$this->load->helper(array('url','text','form'));
	}

	
	public function index()
	{
		//chek_session();
			
		$this->load->view('proyek/template/header');
		$this->load->view('proyek/template/sidebar');
		$this->load->view('proyek/dashboard');
		$this->load->view('proyek/template/footer');
	}

	
}
