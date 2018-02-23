<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Profile extends CI_Controller {

	public function __construct() {
		parent::__construct();
		$this->load->model('developer/M_akun');
		$this->load->helper(array('url','text','form'));
	}

	
	public function index()
	{

		//chek_session();
		$data['akun'] = $this->M_akun->get_akun_all();

		$this->load->view('developer/template/header');		
		$this->load->view('developer/template/sidebar');
		$this->load->view('developer/profile',$data);
		$this->load->view('developer/template/footer');
		
	}



	public function add_akun() {
		$this->_validate();
		$data = array(
			
			'username'=>$this->input->post('username'),
			'password'=>$this->input->post('password'),
			'nama'=>$this->input->post('nama'),
			'jabatan'=>$this->input->post('jabatan'),
			'telpon'=>$this->input->post('telpon'),
			
		);


		if(!empty($_FILES['photo']['name']))
		{
			$upload = $this->_do_upload();
			$data['photo'] = $upload;
		}

	$insert = $this->M_akun->add_akun($data);

	

	echo json_encode(array("status"=>true));
	}

	private function _do_upload()
	{
		$config['upload_path']          = 'upload/';
        $config['allowed_types']        = 'gif|jpg|png';
        $config['max_size']             = 100; //set max size allowed in Kilobyte
        $config['max_width']            = 1000; // set max width image allowed
        $config['max_height']           = 1000; // set max height allowed
        $config['file_name']            = round(microtime(true) * 1000); //just milisecond timestamp fot unique name

        $this->load->library('upload', $config);

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
	$data = $this->M_akun->get_id_akun($id);
	echo json_encode($data);

	}

	
	public function edit_akun() {
		$this->_validate();
		$data = array(
			'id_user'=>$this->input->post('id_user'),
			'username'=>$this->input->post('username'),
			'password'=>$this->input->post('password'),
			'nama'=>$this->input->post('nama'),
			'jabatan'=>$this->input->post('jabatan'),
			'telpon'=>$this->input->post('telpon'),
			

			);

		if($this->input->post('remove_photo')) // Jika saat edit, ceklis di centang maka foto akan dihapus
		{
			if(file_exists('upload/'.$this->input->post('remove_photo')) && $this->input->post('remove_photo'))
				unlink('upload/'.$this->input->post('remove_photo'));
			$data['photo'] = '';
		}

		if(!empty($_FILES['photo']['name']))
		{
			$upload = $this->_do_upload();
			
			
			$person = $this->M_akun->get_id_akun($this->input->post('id_user'));
			if(file_exists('upload/'.$person->photo) && $person->photo)
				unlink('upload/'.$person->photo);

			$data['photo'] = $upload;
		}

		$this->M_akun->update_akun(array('id_user'=> $this->input->post('id_user')), $data);
		echo json_encode(array("status" => TRUE));
	}


	public function delete_akun($id) {
		$this->M_akun->delete_akun($id);
		echo json_encode(array("status" => TRUE));

	}

	private function _validate()
	{
		$data = array();
		$data['error_string'] = array();
		$data['inputerror'] = array();
		$data['status'] = TRUE;

		if($this->input->post('username') == '')
		{
			$data['inputerror'][] = 'username';
			$data['error_string'][] = 'Username harus diisi';
			$data['status'] = FALSE;
		}

		if($this->input->post('password') == '')
		{
			$data['inputerror'][] = 'password';
			$data['error_string'][] = 'Password harus diisi';
			$data['status'] = FALSE;
		}

		if($this->input->post('nama') == '')
		{
			$data['inputerror'][] = 'nama';
			$data['error_string'][] = 'Nama lengkap harus diisi';
			$data['status'] = FALSE;
		}

		

		if($this->input->post('jabatan') == '')
		{
			$data['inputerror'][] = 'jabatan';
			$data['error_string'][] = 'Jabatan harus diisi';
			$data['status'] = FALSE;
		}

		if($this->input->post('telpon') == '')
		{
			$data['inputerror'][] = 'telpon';
			$data['error_string'][] = 'Nomor telepon harus diisi';
			$data['status'] = FALSE;
		}



		
		if($data['status'] === FALSE)
		{
			echo json_encode($data);
			exit();
		}
}

}
