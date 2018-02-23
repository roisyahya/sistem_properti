<?php

	class M_akun extends CI_Model {

		function __construct(){
        parent::__construct();
   		 }

		var $table='user';

	public function add_akun($data) {
		$this->db->insert($this->table,$data);
		return $this->db->insert_id();
	}

	public function get_akun() {
	$query = $this->db->query("SELECT * FROM user WHERE jabatan='Developer' ");
	return $query->result();
	}

	public function get_akun_all() {
	$query = $this->db->query("SELECT * FROM user");
	return $query->result();
	}



	public function get_id_akun($id) {
		$this->db->from($this->table);
		$this->db->where('id_user',$id);
		$query = $this->db->get();
		return $query->row();
	}

	
	public function update_akun($where,$data) {
		$this->db->update($this->table, $data, $where);
		return $this->db->affected_rows();
	}
	

	public function delete_akun($id) {
		$this->db->where('id_user',$id);
		$this->db->delete($this->table);
	}
}

	

