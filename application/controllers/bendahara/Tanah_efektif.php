<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Tanah_efektif extends CI_Controller {

	public function __construct()
	{
		parent::__construct();
		$this->load->model('bendahara/M_operasional_all');
	}

	public function index()
	{
		$this->load->helper('url');

		$data=array(
			
			'no_trans'=>$this->M_operasional_all->get_no_trans_tanah_efektif(),
			
			);

		$data['tanah_efektif'] = $this->M_operasional_all->get_operasional();

		$this->load->view('bendahara/template/header');
		$this->load->view('bendahara/template/sidebar');
		$this->load->view('bendahara/tanah_efektif', $data);
		$this->load->view('bendahara/template/footer_tanah_efektif');
		
	}

	public function ajax_list()
	{
		$this->load->helper('url');

		$list = $this->M_operasional_all->get_datatables_efektif();
		$data = array();
		$no = $_POST['start'];
		foreach ($list as $operasioanl) {
			$no++;
			$row = array();
			$row[] = $no;
			$row[] = $operasioanl->no_trans;
			$row[] = date('d/m/Y', strtotime($operasioanl->tgl_trans));
			$row[] = $operasioanl->kel_biaya;
			$row[] = number_format($operasioanl->nilai,0,",",".");
			$row[] = number_format($operasioanl->jumlah_bayar,0,",",".");
			
			
			$row[] = '<a class="btn btn-sm btn-info" href="javascript:void(0)" title="Edit" onclick="edit_operasional('."'".$operasioanl->id_operasional."'".')"><i class="glyphicon glyphicon-sign info"></i> Detail</a>';
		
			$data[] = $row;
		}

		$output = array(
						"draw" => $_POST['draw'],
						"recordsTotal" => $this->M_operasional_all->count_all(),
						"recordsFiltered" => $this->M_operasional_all->count_filtered(),
						"data" => $data,
				);
		//output to json format
		echo json_encode($output);
	}


	public function ajax_edit($id)
	{
		$data = $this->M_operasional_all->get_by_id($id);
		
		echo json_encode($data);
	}

	public function ajax_add()
	{
		//$this->_validate();
		
		$data = array(
				'jenis_operasional' => 'tanah_efektif',
				'no_trans' => $this->input->post('no_trans'),
				'tgl_trans' => $this->input->post('tgl_trans'),
				'kel_biaya' => $this->input->post('kel_biaya'),
				'sub_biaya1' => $this->input->post('sub_biaya1'),
				'sub_biaya2' => $this->input->post('sub_biaya2'),
				'keterangan' => $this->input->post('keterangan'),
				'bukti' => $this->input->post('bukti'),
				'nilai' => $this->input->post('nilai'),
				'tgl_bayar' => $this->input->post('tgl_bayar'),
				'metode_bayar' => $this->input->post('metode_bayar'),
				'jumlah_bayar' => $this->input->post('jumlah_bayar'),
				'bank' => $this->input->post('bank'),
				'no_rekening' => $this->input->post('no_rekening'),
			);

		

		$insert = $this->M_operasional_all->save($data);

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
