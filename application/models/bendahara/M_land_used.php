<?php

	class M_land_used extends CI_Model {

		function __construct(){
        parent::__construct();
   		 }

		var $table='rab_land_used';

	public function add_land_used($data) {
		$this->db->insert($this->table,$data);
		return $this->db->insert_id();
	}

	public function get_land_used() {
	$this->db->from('rab_land_used');
	$query = $this->db->get();
	return $query->result();
	}

	public function get_id_land_used($id) {
		$this->db->from($this->table);
		$this->db->where('id_rab_land_used',$id);
		$query = $this->db->get();
		return $query->row();
	}

	public function update_land_used($where,$data) {
		$this->db->update($this->table, $data, $where);
		return $this->db->affected_rows();
	}
	

	public function delete_land_used($id) {
		$this->db->where('id_rab_land_used',$id);
		$this->db->delete($this->table);
	} 




}

	

