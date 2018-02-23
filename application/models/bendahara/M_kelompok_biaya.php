<?php

	class M_kelompok_biaya extends CI_Model {

		function __construct(){
        parent::__construct();
   		 }

		var $table='kel_biaya';

	public function add_kelompok_biaya($data) {
		$this->db->insert($this->table,$data);
		return $this->db->insert_id();
	}

	public function get_kelompok_biaya() {
	$this->db->from('kel_biaya');
	$query = $this->db->get();
	return $query->result();
	}


	public function get_id_kelompok_biaya($id) {
		$this->db->from($this->table);
		$this->db->where('id_kel_biaya',$id);
		$query = $this->db->get();
		return $query->row();
	}

	public function update_kelompok_biaya($where,$data) {
		$this->db->update($this->table, $data, $where);
		return $this->db->affected_rows();
	}
	

	public function delete_kelompok_biaya($id) {
		$this->db->where('id_kel_biaya',$id);
		$this->db->delete($this->table);
	} 


	function getEditData(){

        $id = $this->uri->segment(4);
        
        
       $this->db->select('*');
        $this->db->from('sub_biaya1');
        $this->db->where('id_kel_biaya', $id);
        $query = $this->db->get();
        return $query->result();
    }

    function getEditData_biaya2(){

        $id = $this->uri->segment(4);
        
        
       $this->db->select('*');
        $this->db->from('sub_biaya2');
        $this->db->where('id_sub_biaya1', $id);
        $query = $this->db->get();
        return $query->result();
    }
}



	

