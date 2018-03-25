<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Market_terjual extends CI_Controller {

	public function __construct()
	{
		parent::__construct();
		$this->load->model('marketing/M_market_terjual');
	}

	public function index()
	{
		$this->load->helper('url');



		$this->load->view('marketing/template/header');
		$this->load->view('marketing/template/sidebar');
		$this->load->view('marketing/market_terjual');
		$this->load->view('marketing/footer/footer_market_terjual');
		
	}

	public function ajax_list()
	{
		$this->load->helper('url');

		$list = $this->M_market_terjual->get_datatables();
		$data = array();
		$no = $_POST['start'];
		foreach ($list as $operasioanl) {
			$no++;
			$row = array();
			$row[] = $no;
			$row[] = $operasioanl->nama_pembeli;
			$row[] = $operasioanl->nama_unit;
			$row[] = $operasioanl->blok;
			$row[] = $operasioanl->luas_bangunan;
			$row[] = $operasioanl->luas_tanah;
			$row[] = $operasioanl->keterangan;
			
			
			$data[] = $row;
		}

		$output = array(
						"draw" => $_POST['draw'],
						"recordsTotal" => $this->M_market_terjual->count_all(),
						"recordsFiltered" => $this->M_market_terjual->count_filtered(),
						"data" => $data,
				);
		//output to json format
		echo json_encode($output);
	}

	public function ajax_edit($id)
	{
		$data = $this->M_market_terjual->get_by_id($id);
		
		echo json_encode($data);
	}

	

}
