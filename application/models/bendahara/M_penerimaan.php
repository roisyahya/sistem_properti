<?php

	class M_penerimaan extends CI_Model {

		function __construct(){
        parent::__construct();
   		 }

		var $table='rab_penerimaan';

	public function add_penerimaan($data) {
		$this->db->insert($this->table,$data);
		return $this->db->insert_id();
	}

	public function get_penerimaan() {
	$this->db->from('rab_penerimaan');
	$query = $this->db->get();
	return $query->result();
	}

	public function get_id_penerimaan($id) {
		$this->db->from($this->table);
		$this->db->where('id_penerimaan',$id);
		$query = $this->db->get();
		return $query->row();
	}

	public function update_penerimaan($where,$data) {
		$this->db->update($this->table, $data, $where);
		return $this->db->affected_rows();
	}
	

	public function delete_penerimaan($id) {
		$this->db->where('id_penerimaan',$id);
		$this->db->delete($this->table);
	} 




}

	

