<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Barang_keluar extends CI_Controller {

	public function __construct()
	{
		parent::__construct();
		$this->load->model('proyek/M_barang_keluar');
	}

	public function index()
	{
		$this->load->helper('url');



		$this->load->view('proyek/template/header');
		$this->load->view('proyek/template/sidebar');
		$this->load->view('proyek/barang_keluar');
		$this->load->view('proyek/footer/footer_barang_keluar');
		
	}

	public function ajax_list()
	{
		$this->load->helper('url');

		$list = $this->M_barang_keluar->get_datatables();
		$data = array();
		$no = $_POST['start'];
		foreach ($list as $operasioanl) {
			$no++;
			$row = array();
			$row[] = $no;
			$row[] = date('d/m/Y', strtotime($operasioanl->tgl_keluar));
			$row[] = $operasioanl->nama_barang;
			$row[] = $operasioanl->nama_proyek;
			$row[] = $operasioanl->jumlah_keluar;
			$row[] = $operasioanl->sisa_bm;
			$row[] = $operasioanl->satuan;
			
			
			$data[] = $row;
		}

		$output = array(
						"draw" => $_POST['draw'],
						"recordsTotal" => $this->M_barang_keluar->count_all(),
						"recordsFiltered" => $this->M_barang_keluar->count_filtered(),
						"data" => $data,
				);
		//output to json format
		echo json_encode($output);
	}

	public function ajax_edit($id)
	{
		$data = $this->M_barang_keluar->get_by_id($id);
		
		echo json_encode($data);
	}

	public function ajax_add()
	{
		//$this->_validate();
		
		$data = array(
				
				'id_barang_masuk' => $this->input->post('id_barang_masuk'),
				'id_pemakaian' => $this->input->post('id_pemakaian'),
				'tgl_keluar' => $this->input->post('tgl_keluar'),
				'jumlah_keluar' => $this->input->post('jumlah_keluar'),
				
			);

		

		$insert = $this->M_barang_keluar->save($data);

		echo json_encode(array("status" => TRUE));
	}

	public function ajax_update()
	{
		//$this->_validate();
		$data = array(
				
				'status' => $this->input->post('status'),
			);

		
		$this->M_barang_keluar->update(array('id_barang_keluar' => $this->input->post('id_barang_keluar')), $data);
		echo json_encode(array("status" => TRUE));
	}

	

	private function _validate()
	{
		$data = array();
		$data['error_string'] = array();
		$data['inputerror'] = array();
		$data['status'] = TRUE;

		if($this->input->post('firstName') == '')
		{
			$data['inputerror'][] = 'firstName';
			$data['error_string'][] = 'First name is required';
			$data['status'] = FALSE;
		}

		if($this->input->post('lastName') == '')
		{
			$data['inputerror'][] = 'lastName';
			$data['error_string'][] = 'Last name is required';
			$data['status'] = FALSE;
		}

		if($this->input->post('dob') == '')
		{
			$data['inputerror'][] = 'dob';
			$data['error_string'][] = 'Date of Birth is required';
			$data['status'] = FALSE;
		}

		if($this->input->post('gender') == '')
		{
			$data['inputerror'][] = 'gender';
			$data['error_string'][] = 'Please select gender';
			$data['status'] = FALSE;
		}

		if($this->input->post('address') == '')
		{
			$data['inputerror'][] = 'address';
			$data['error_string'][] = 'Addess is required';
			$data['status'] = FALSE;
		}

		if($data['status'] === FALSE)
		{
			echo json_encode($data);
			exit();
		}
	}

}
