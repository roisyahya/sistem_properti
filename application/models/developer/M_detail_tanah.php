<?php

	class M_detail_tanah extends CI_Model {

		function __construct(){
        parent::__construct();
   		 }

		var $table='detail_tanah';

	public function add_detail_tanah($data) {
		$this->db->insert($this->table,$data);
		return $this->db->insert_id();
	}

	public function get_detail_tanah() {
	$this->db->from('detail_tanah');
	$query = $this->db->get();
	return $query->result();
	}

	public function get_id_detail_tanah($id) {
		$this->db->from($this->table);
		$this->db->where('id_wilayah',$id);
		$query = $this->db->get();
		return $query->row();
	}

	public function update_detail_tanah($where,$data) {
		$this->db->update($this->table, $data, $where);
		return $this->db->affected_rows();
	}
	

	public function delete_detail_tanah($id) {
		$this->db->where('id_wilayah',$id);
		$this->db->delete($this->table);
	} 

	function getEditData(){

        $id = $this->uri->segment(4);
        
        
       $this->db->select('*');
        $this->db->from('rab_land_used');
        $this->db->where('id_wilayah', $id);
        $query = $this->db->get();
        return $query->result();
    }

    function getEditData_jml_unit(){

        $id = $this->uri->segment(4);
        
        
       $this->db->select('*');
        $this->db->from('rab_jumlah_unit');
        $this->db->where('id_wilayah', $id);
        $query = $this->db->get();
        return $query->result();
    }

     function getEditData_pematangan(){

        $id = $this->uri->segment(4);
        
        
       $this->db->select('*');
        $this->db->from('rab_pematangan_tanah');
        $this->db->where('id_wilayah', $id);
        $query = $this->db->get();
        return $query->result();
    }

     function getEditData_sarana(){

        $id = $this->uri->segment(4);
        
        
       $this->db->select('*');
        $this->db->from('rab_sarana');
        $this->db->where('id_wilayah', $id);
        $query = $this->db->get();
        return $query->result();
    }

    function getEditData_prasarana(){

        $id = $this->uri->segment(4);
        
        
       $this->db->select('*');
        $this->db->from('rab_prasarana');
        $this->db->where('id_wilayah', $id);
        $query = $this->db->get();
        return $query->result();
    }


    function getEditData_konstruksi(){

        $id = $this->uri->segment(4);
        
        
       $this->db->select('*');
        $this->db->from('rab_konstruksi');
        $this->db->where('id_wilayah', $id);
        $query = $this->db->get();
        return $query->result();
    }

     function getEditData_operasional(){

        $id = $this->uri->segment(4);
        
        
       $this->db->select('*');
        $this->db->from('rab_operasional');
        $this->db->where('id_wilayah', $id);
        $query = $this->db->get();
        return $query->result();
    }

     function getEditData_penerimaan(){

        $id = $this->uri->segment(4);
        
        
       $this->db->select('*');
        $this->db->from('rab_penerimaan');
        $this->db->where('id_wilayah', $id);
        $query = $this->db->get();
        return $query->result();
    }


}

	

