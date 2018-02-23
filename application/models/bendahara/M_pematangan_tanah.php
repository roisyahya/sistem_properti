<?php

	class M_pematangan_tanah extends CI_Model {

		function __construct(){
        parent::__construct();
   		 }

		var $table='rab_pematangan_tanah';

	public function add_pematangan_tanah($data) {
		$this->db->insert($this->table,$data);
		return $this->db->insert_id();
	}

	public function get_pematangan_tanah() {
	$this->db->from('rab_pematangan_tanah');
	$query = $this->db->get();
	return $query->result();
	}

	public function get_id_pematangan_tanah($id) {
		$this->db->from($this->table);
		$this->db->where('id_pematangan_tanah',$id);
		$query = $this->db->get();
		return $query->row();
	}

	public function update_pematangan_tanah($where,$data) {
		$this->db->update($this->table, $data, $where);
		return $this->db->affected_rows();
	}
	

	public function delete_pematangan_tanah($id) {
		$this->db->where('id_pematangan_tanah',$id);
		$this->db->delete($this->table);
	} 




}

	

