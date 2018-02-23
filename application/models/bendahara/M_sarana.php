<?php

	class M_sarana extends CI_Model {

		function __construct(){
        parent::__construct();
   		 }

		var $table='rab_sarana';

	public function add_sarana($data) {
		$this->db->insert($this->table,$data);
		return $this->db->insert_id();
	}

	public function get_sarana() {
	$this->db->from('rab_sarana');
	$query = $this->db->get();
	return $query->result();
	}

	public function get_id_sarana($id) {
		$this->db->from($this->table);
		$this->db->where('id_sarana',$id);
		$query = $this->db->get();
		return $query->row();
	}

	public function update_sarana($where,$data) {
		$this->db->update($this->table, $data, $where);
		return $this->db->affected_rows();
	}
	

	public function delete_sarana($id) {
		$this->db->where('id_sarana',$id);
		$this->db->delete($this->table);
	} 




}

	

