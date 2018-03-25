<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Drop_ditempat extends CI_Controller {

	public function __construct()
	{
		parent::__construct();
		$this->load->model('proyek/M_drop_ditempat');
	}

	public function index()
	{
		$this->load->helper('url');



		$this->load->view('proyek/template/header');
		$this->load->view('proyek/template/sidebar');
		$this->load->view('proyek/drop_ditempat');
		$this->load->view('proyek/footer/footer_drop');
		
	}

	public function ajax_list()
	{
		$this->load->helper('url');

		$list = $this->M_drop_ditempat->get_datatables();
		$data = array();
		$no = $_POST['start'];
		foreach ($list as $operasioanl) {
			$no++;
			$row = array();
			$row[] = $no;
			$row[] = $operasioanl->nama_proyek;
			$row[] = date('d/m/Y', strtotime($operasioanl->tgl_masuk));
			$row[] = $operasioanl->nama_barang;
			$row[] = $operasioanl->jumlah_barang; $row[] = $operasioanl->satuan;
			
			$row[] = $operasioanl->status;
			
			$row[] = '<a class="btn btn-sm btn-info" href="javascript:void(0)" title="Edit" onclick="edit_operasional('."'".$operasioanl->id_drop."'".')"><i class="glyphicon glyphicon-sign info"></i> Detail</a>
				<a class="btn btn-sm btn-warning" href="javascript:void(0)" title="Edit" onclick="edit_status('."'".$operasioanl->id_drop."'".')"><i class="glyphicon glyphicon-sign info"></i> Status</a>';


			$data[] = $row;
		}

		$output = array(
						"draw" => $_POST['draw'],
						"recordsTotal" => $this->M_drop_ditempat->count_all(),
						"recordsFiltered" => $this->M_drop_ditempat->count_filtered(),
						"data" => $data,
				);
		//output to json format
		echo json_encode($output);
	}

	public function ajax_edit($id)
	{
		$data = $this->M_drop_ditempat->get_by_id($id);
		
		echo json_encode($data);
	}

	public function ajax_add()
	{
		//$this->_validate();
		
		$data = array(
				
				'id_pemakaian' => $this->input->post('id_pemakaian'),
				'surat_jalan' => $this->input->post('surat_jalan'),
				'tgl_masuk' => $this->input->post('tgl_masuk'),
				'jam' => $this->input->post('jam'),
				'no_polisi' => $this->input->post('no_polisi'),
				'supplier' => $this->input->post('supplier'),
				'sopir' => $this->input->post('sopir'),
				'nama_barang' => $this->input->post('nama_barang'),
				'jumlah_barang' => $this->input->post('jumlah_barang'),
				'satuan' => $this->input->post('satuan'),
				'barang_rusak' => $this->input->post('barang_rusak'),
				'jenis_pembelian' => $this->input->post('jenis_pembelian'),
				'status' => 'Belum diisi',
			);

		

		$insert = $this->M_drop_ditempat->save($data);

		echo json_encode(array("status" => TRUE));
	}

	public function ajax_update()
	{
		//$this->_validate();
		$data = array(
				
				'status' => $this->input->post('status'),
			);

		
		$this->M_drop_ditempat->update(array('id_drop' => $this->input->post('id_drop')), $data);
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
