<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Login extends CI_Controller {

	public function __construct() {
		parent::__construct();
		$this->load->model('M_login');
	}

	
	public function index()
	{
		$this->load->view('login');

		if(isset($_POST['submit'])){
            
            // proses login disini
            $username  =   $this->input->post('username');
            $password  =   $this->input->post('password');
            $jabatan   =   $this->input->post('jabatan');
            $hasil     =   $this->M_login->login($username,$password,$jabatan);
            


           if($hasil==1 && $jabatan=='Developer')
            {
                // update last login
                
                $this->session->set_userdata(array('status_login'=>'oke','username'=>$username,'jabatan'=>'Developer'));
                redirect('developer/dashboard');
            }

           
           else if ($hasil==1 && $jabatan=='Bendahara')
            {
                // update last login
                
                $this->session->set_userdata(array('status_login'=>'oke_bendahara','username'=>$username,'jabatan'=>'Bendahara'));
                
                redirect('bendahara/dashboard');
            }

             else if ($hasil==1 && $jabatan=='Proyek')
            {
                // update last login
                
                $this->session->set_userdata(array('status_login'=>'oke_proyek','username'=>$username,'jabatan'=>'Proyek'));
                redirect('proyek/dashboard');
            }


             else if ($hasil==1 && $jabatan=='Marketing')
            {
                // update last login
                
                $this->session->set_userdata(array('status_login'=>'oke_marketing','username'=>$username,'jabatan'=>'Marketing'));
                redirect('marketing/dashboard');
            }


            else{
            	$this->session->set_flashdata("pesan_gagal", "<div class=\"col-md-12\"><div class=\"alert alert-success\">Maaf, Username / Password Salah!!</div></div>");
                redirect('login');
            }

                        
		}

        


	}


    function logout()
    {
    $this->session->sess_destroy();
    redirect('login');
    }

	
}
