<?php

	class M_jumlah_unit extends CI_Model {

		function __construct(){
        parent::__construct();
   		 }

		var $table='rab_jumlah_unit';

	public function add_jumlah_unit($data) {
		$this->db->insert($this->table,$data);
		return $this->db->insert_id();
	}

	public function get_jumlah_unit() {
	$this->db->from('rab_jumlah_unit');
	$query = $this->db->get();
	return $query->result();
	}

	public function get_id_jumlah_unit($id) {
		$this->db->from($this->table);
		$this->db->where('id_jumlah_unit',$id);
		$query = $this->db->get();
		return $query->row();
	}

	public function update_jumlah_unit($where,$data) {
		$this->db->update($this->table, $data, $where);
		return $this->db->affected_rows();
	}
	

	public function delete_jumlah_unit($id) {
		$this->db->where('id_jumlah_unit',$id);
		$this->db->delete($this->table);
	} 




}

	

