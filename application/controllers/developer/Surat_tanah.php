<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Surat_tanah extends CI_Controller {

	public function __construct() {
		parent::__construct();
		$this->load->model('developer/M_sertifikat');
		$this->load->helper(array('url','text','form'));
	}

	
	public function index()
	{
		//chek_session();
		$data['sertifikat_tanah'] = $this->M_sertifikat->get_sertifikat();
		$this->load->view('developer/template/header');
		$this->load->view('developer/template/sidebar');
		$this->load->view('developer/sertifikat_tanah', $data);
		$this->load->view('developer/template/footer');
	}

	public function add_sertifikat() {

		$this->_validate();

		$data = array(
			'id_wilayah'=>$this->input->post('id_wilayah'),
			'nama_sertifikat'=>$this->input->post('nama_sertifikat'),
			
			
					
			
		);


		if(!empty($_FILES['berkas']['name']))
		{
			$upload = $this->_do_upload();
			$data['photo'] = $upload;
		}

	$insert = $this->M_sertifikat->add_sertifikat($data);

	

	echo json_encode(array("status"=>true));
	}

	private function _do_upload()
	{
		$config['upload_path']          = 'upload/sertifikat/';
        $config['allowed_types']        = 'gif|jpg|png';
        $config['max_size']             = 500; //set max size allowed in Kilobyte
        $config['max_width']            = 1000; // set max width image allowed
        $config['max_height']           = 1000; // set max height allowed
        $config['file_name']            = round(microtime(true) * 1000); //just milisecond timestamp fot unique name

        $this->load->library('upload/', $config);

        if(!$this->upload->do_upload('photo')) //upload and validate
        {
            $data['inputerror'][] = 'photo';
			$data['error_string'][] = 'Upload error: '.$this->upload->display_errors('',''); //show ajax error
			$data['status'] = FALSE;
			echo json_encode($data);
			exit();
		}
		return $this->upload->data('file_name');
	}

	public function ajax_edit($id) {
	$data = $this->M_sertifikat->get_id_sertifikat($id);
	echo json_encode($data);

	}

	public function edit_serifikat() {

		$this->_validate();
		
		$data = array(
			
			'id_sertifikat'=>$this->input->post('id_sertifikat'),
			'id_wilayah'=>$this->input->post('id_wilayah'),
			'nama_sertifikat'=>$this->input->post('nama_sertifikat'),
			
			
			);

		if($this->input->post('remove_photo')) // Jika saat edit, ceklis di centang maka foto akan dihapus
		{
			if(file_exists('upload/sertifikat/'.$this->input->post('remove_photo')) && $this->input->post('remove_photo'))
				unlink('upload/sertifikat/'.$this->input->post('remove_photo'));
			$data['photo'] = '';
		}

		if(!empty($_FILES['photo']['name']))
		{
			$upload = $this->_do_upload();
			
			
			$person = $this->M_sertifikat->get_id_sertifikat($this->input->post('id_sertifikat'));
			if(file_exists('upload/sertifikat/'.$person->photo) && $person->photo)
				unlink('upload/sertifikat/'.$person->photo);

			$data['photo'] = $upload;
		}

		$this->M_akun->update_akun(array('id_sertifikat'=> $this->input->post('id_sertifikat')), $data);
		echo json_encode(array("status" => TRUE));
	}

	

	public function delete_sertifikat($id) {
		$this->M_sertifikat->delete_sertifikat($id);
		echo json_encode(array("status" => TRUE));

	}

	private function _validate()
	{
		$data = array();
		$data['error_string'] = array();
		$data['inputerror'] = array();
		$data['status'] = TRUE;

		if($this->input->post('id_wilayah') == '')
		{
			$data['inputerror'][] = 'id_wilayah';
			$data['error_string'][] = 'Nama wilayah harus diisi';
			$data['status'] = FALSE;
		}

		if($this->input->post('nama_sertifikat') == '')
		{
			$data['inputerror'][] = 'nama_sertifikat';
			$data['error_string'][] = 'Nama berkas harus diisi';
			$data['status'] = FALSE;
		}

		
		

		
		if($data['status'] === FALSE)
		{
			echo json_encode($data);
			exit();
		}
}
}
