<?php

	class M_konstruksi extends CI_Model {

		function __construct(){
        parent::__construct();
   		 }

		var $table='rab_konstruksi';

	public function add_konstruksi($data) {
		$this->db->insert($this->table,$data);
		return $this->db->insert_id();
	}

	public function get_konstruksi() {
	$this->db->from('rab_konstruksi');
	$query = $this->db->get();
	return $query->result();
	}

	public function get_id_konstruksi($id) {
		$this->db->from($this->table);
		$this->db->where('id_konstruksi',$id);
		$query = $this->db->get();
		return $query->row();
	}

	public function update_konstruksi($where,$data) {
		$this->db->update($this->table, $data, $where);
		return $this->db->affected_rows();
	}
	

	public function delete_konstruksi($id) {
		$this->db->where('id_konstruksi',$id);
		$this->db->delete($this->table);
	} 




}

	

