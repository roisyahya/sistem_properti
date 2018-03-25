<?php

	class M_cicilan_um extends CI_Model {

		function __construct(){
        parent::__construct();
   		 }

		var $table='cicilan_um';

	
    public function add_cicilan($data) {
		$this->db->insert($this->table,$data);
		return $this->db->insert_id();
	}

    public function get_cicilan() {



    $id = $this->uri->segment(4);
    $query = $this->db->query("SELECT * FROM cicilan_um WHERE id_pembayaran= '$id'");
    return $query->result();
    }

   

}

	

