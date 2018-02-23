<?php
class M_login extends CI_Model{
    
    
    
    function login($username,$password,$jabatan)
    {
        $chek=  $this->db->get_where('user',array('username'=>$username,'password'=> $password,'jabatan'=>$jabatan));
        if($chek->num_rows()>0){
            return 1;
        }
        else{
            return 0;
        }
    }
    
    
    }