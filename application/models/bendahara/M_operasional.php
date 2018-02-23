<?php

	class M_operasional extends CI_Model {

		function __construct(){
        parent::__construct();
   		 }

		var $table='rab_operasional';

	public function add_operasional($data) {
		$this->db->insert($this->table,$data);
		return $this->db->insert_id();
	}

	public function get_operasional() {
	$this->db->from('rab_operasional');
	$query = $this->db->get();
	return $query->result();
	}

	public function get_id_operasional($id) {
		$this->db->from($this->table);
		$this->db->where('id_operasional',$id);
		$query = $this->db->get();
		return $query->row();
	}

	public function update_operasional($where,$data) {
		$this->db->update($this->table, $data, $where);
		return $this->db->affected_rows();
	}
	

	public function delete_operasional($id) {
		$this->db->where('id_operasional',$id);
		$this->db->delete($this->table);
	} 




}

	

