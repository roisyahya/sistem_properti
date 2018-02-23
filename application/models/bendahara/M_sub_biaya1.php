<?php

	class M_sub_biaya1 extends CI_Model {

		function __construct(){
        parent::__construct();
   		 }

		var $table='sub_biaya1';

	public function add_sub_biaya1($data) {
		$this->db->insert($this->table,$data);
		return $this->db->insert_id();
	}



	public function get_id_sub_biaya1($id) {
		$this->db->from($this->table);
		$this->db->where('id_sub_biaya1',$id);
		$query = $this->db->get();
		return $query->row();
	}

	public function update_sub_biaya1($where,$data) {
		$this->db->update($this->table, $data, $where);
		return $this->db->affected_rows();
	}
	

	public function delete_sub_biaya1($id) {
		$this->db->where('id_sub_biaya1',$id);
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
}



	

