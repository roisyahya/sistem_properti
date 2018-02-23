<?php

	class M_pembelian_tanah extends CI_Model {

		function __construct(){
        parent::__construct();
   		 }

		var $table='pembelian_tanah';

	public function add_pembelian($data) {
		$this->db->insert($this->table,$data);
		return $this->db->insert_id();
	}

	public function get_pembelian() {
	$this->db->from('pembelian_tanah');
	$query = $this->db->get();
	return $query->result();
	}

	public function get_id_pembelian($id) {
		$this->db->from($this->table);
		$this->db->where('id_pembelian',$id);
		$query = $this->db->get();
		return $query->row();
	}

	public function update_pembelian($where,$data) {
		$this->db->update($this->table, $data, $where);
		return $this->db->affected_rows();
	}
	

	public function delete_pembelian($id) {
		$this->db->where('id_pembelian',$id);             
		$this->db->delete($this->table);
	} 

	function getEditData(){

        $id = $this->uri->segment(4);
        
        
       $this->db->select('*');
        $this->db->from('pembelian_tanah');
        $this->db->where('id_wilayah', $id);
        $query = $this->db->get();
        return $query->result();
    }


}

	

