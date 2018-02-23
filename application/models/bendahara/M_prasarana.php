<?php

	class M_prasarana extends CI_Model {

		function __construct(){
        parent::__construct();
   		 }

		var $table='rab_prasarana';

	public function add_prasarana($data) {
		$this->db->insert($this->table,$data);
		return $this->db->insert_id();
	}

	public function get_prasarana() {
	$this->db->from('rab_prasarana');
	$query = $this->db->get();
	return $query->result();
	}

	public function get_id_prasarana($id) {
		$this->db->from($this->table);
		$this->db->where('id_prasarana',$id);
		$query = $this->db->get();
		return $query->row();
	}

	public function update_prasarana($where,$data) {
		$this->db->update($this->table, $data, $where);
		return $this->db->affected_rows();
	}
	

	public function delete_prasarana($id) {
		$this->db->where('id_prasarana',$id);
		$this->db->delete($this->table);
	} 




}

	

