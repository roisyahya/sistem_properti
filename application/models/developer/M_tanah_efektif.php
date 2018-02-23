<?php

	class M_tanah_efektif extends CI_Model {

		function __construct(){
        parent::__construct();
   		 }

		var $tbl='tanah_efektif';

	public function add_tanah_efektif($data) {
		$this->db->insert($this->tbl,$data);
		return $this->db->insert_id();
	}

	public function get_tanah_efektif() {
	$this->db->from('tanah_efektif');
	$query = $this->db->get();
	return $query->result();
	}

	public function get_unit_terjual() {
	
	$query = $this->db->query("SELECT * FROM user,tanah_efektif WHERE user.id_user=tanah_efektif.id_user
		AND status='Keep'
		");
	return $query->result();
	}

	public function get_id_tanah_efektif($id) {
		$this->db->from($this->tbl);
		$this->db->where('id_tanah_efektif',$id);
		$query = $this->db->get();
		return $query->row();
	}

	public function update_tanah_efektif($where,$data) {
		$this->db->update($this->tbl, $data, $where);
		return $this->db->affected_rows();
	}

	public function update_status_tanah($tbl,$data,$field_key)
    {
        $this->db->update($tbl,$data,$field_key);
    }
	

	public function delete_tanah_efektif($id) {
		$this->db->where('id_tanah_efektif',$id);
		$this->db->delete($this->tbl);
	} 

	function getEditData(){

        $id = $this->uri->segment(4);
        
        
       $this->db->select('*');
        $this->db->from('tanah_efektif');
        $this->db->where('id_pemakaian', $id);
        $query = $this->db->get();
        return $query->result();
    }

    function get_id(){

        $id = $this->uri->segment(4);
        
        
       $this->db->select('*');
        $this->db->from('tanah_efektif');
        $this->db->where('id_tanah_efektif', $id);
        $query = $this->db->get();
        return $query->result();
    }



}

	

