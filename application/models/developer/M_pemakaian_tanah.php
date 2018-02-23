<?php

	class M_pemakaian_tanah extends CI_Model {

		function __construct(){
        parent::__construct();
   		 }

		var $table='pemakaian_tanah';

	public function add_pemakaian($data) {
		$this->db->insert($this->table,$data);
		return $this->db->insert_id();
	}

	public function get_pemakaian() {
	$this->db->from('pemakaian_tanah');
	$query = $this->db->get();
	return $query->result();
	}

	public function get_id_pemakaian($id) {
		$this->db->from($this->table);
		$this->db->where('id_pemakaian',$id);
		$query = $this->db->get();
		return $query->row();
	}

	public function update_pemakaian($where,$data) {
		$this->db->update($this->table, $data, $where);
		return $this->db->affected_rows();
	}
	

	public function delete_pemakaian($id) {
		$this->db->where('id_pemakaian',$id);
		$this->db->delete($this->table);
	} 

	function getEditData(){

        $id = $this->uri->segment(4);
        
        
       $this->db->select('*');
        $this->db->from('pemakaian_tanah');
        $this->db->where('id_wilayah', $id);
        $query = $this->db->get();
        return $query->result();
    }




}

	

