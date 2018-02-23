<?php

	class M_subkontraktor extends CI_Model {

		function __construct(){
        parent::__construct();
   		 }

		var $table='sub_kontraktor';

	public function add_subkontraktor($data) {
		$this->db->insert($this->table,$data);
		return $this->db->insert_id();
	}

	public function get_subkontraktor() {
	$this->db->from('sub_kontraktor');
	$query = $this->db->get();
	return $query->result();
	}

	public function get_id_subkontraktor($id) {
		$this->db->from($this->table);
		$this->db->where('id_sub_kontraktor',$id);
		$query = $this->db->get();
		return $query->row();
	}

	public function update_subkontraktor($where,$data) {
		$this->db->update($this->table, $data, $where);
		return $this->db->affected_rows();
	}
	

	public function delete_subkontraktor($id) {
		$this->db->where('id_sub_kontraktor',$id);
		$this->db->delete($this->table);
	} 




}

	

