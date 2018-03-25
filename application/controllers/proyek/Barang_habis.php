<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Barang_habis extends CI_Controller {

	public function __construct()
	{
		parent::__construct();
		$this->load->model('proyek/M_barang_habis');
	}

	public function index()
	{
		$this->load->helper('url');



		$this->load->view('proyek/template/header');
		$this->load->view('proyek/template/sidebar');
		$this->load->view('proyek/barang_habis');
		$this->load->view('proyek/footer/footer_barang_habis');
		
	}

	public function ajax_list()
	{
		$this->load->helper('url');

		$list = $this->M_barang_habis->get_datatables();
		$data = array();
		$no = $_POST['start'];
		foreach ($list as $operasioanl) {
			$no++;
			$row = array();
			$row[] = $no;
			$row[] = date('d/m/Y', strtotime($operasioanl->tgl_masuk));
			$row[] = $operasioanl->nama_barang;
			$row[] = $operasioanl->jumlah_barang;
			$row[] = $operasioanl->barang_rusak;
			$row[] = $operasioanl->jml_terima;
			$row[] = $operasioanl->sisa_bm;
			$row[] = $operasioanl->satuan;
			$row[] = $operasioanl->status;
			
			$row[] = '<a class="btn btn-sm btn-info" href="javascript:void(0)" title="Edit" onclick="edit_operasional('."'".$operasioanl->id_barang_masuk."'".')"><i class="glyphicon glyphicon-sign info"></i> Detail</a>
				<a class="btn btn-sm btn-warning" href="javascript:void(0)" title="Edit" onclick="edit_status('."'".$operasioanl->id_barang_masuk."'".')"><i class="glyphicon glyphicon-sign info"></i> Status</a>';


			$data[] = $row;
		}

		$output = array(
						"draw" => $_POST['draw'],
						"recordsTotal" => $this->M_barang_habis->count_all(),
						"recordsFiltered" => $this->M_barang_habis->count_filtered(),
						"data" => $data,
				);
		//output to json format
		echo json_encode($output);
	}

	public function ajax_edit($id)
	{
		$data = $this->M_barang_habis->get_by_id($id);
		
		echo json_encode($data);
	}

	public function ajax_add()
	{
		//$this->_validate();
		
		$data = array(
				'jenis_bm' => 'gudang',
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
				'jml_terima' => $this->input->post('jumlah_barang') - $this->input->post('barang_rusak'),
				'sisa_bm' => $this->input->post('jumlah_barang') - $this->input->post('barang_rusak'),
			);

		

		$insert = $this->M_barang_habis->save($data);

		echo json_encode(array("status" => TRUE));
	}

	

}
