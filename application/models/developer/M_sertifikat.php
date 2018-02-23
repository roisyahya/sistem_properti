<?php

	class M_sertifikat extends CI_Model {

		function __construct(){
        parent::__construct();
   		 }

		var $table='sertifikat_tanah';

	public function add_sertifikat($data) {
		$this->db->insert($this->table,$data);
		return $this->db->insert_id();
	}

	public function get_sertifikat() {
	$this->db->from('sertifikat_tanah');
	$query = $this->db->get();
	return $query->result();
	}

	public function get_id_sertifikat($id) {
		$this->db->from($this->table);
		$this->db->where('id_sertifikat',$id);
		$query = $this->db->get();
		return $query->row();
	}

	public function update_sertifikat($where,$data) {
		$this->db->update($this->table, $data, $where);
		return $this->db->affected_rows();
	}
	

	public function delete_sertifikat($id) {
		$this->db->where('id_sertifikat',$id);
		$this->db->delete($this->table);
	} 




}

	

