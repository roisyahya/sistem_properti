<?php

	class M_on_process extends CI_Model {

		function __construct(){
        parent::__construct();
   		 }

		var $table='pembayaran';

	public function add_on_process($data) {
		$this->db->insert($this->table,$data);
		return $this->db->insert_id();
	}

	public function get_on_process() {
	
	$qry = $this->db->query("SELECT * FROM user WHERE username='".$this->session->username."'")->row_array(); 
	$id = $qry['id_user'];
	$this->db->select('*');
	$this->db->join('tanah_efektif', 'tanah_efektif.id_tanah_efektif = pembayaran.id_tanah_efektif');
	$this->db->join('cicilan_um', 'cicilan_um.id_pembayaran = pembayaran.id_pembayaran');
	
	$this->db->from('pembayaran');
	$this->db->where('id_user =', $id);
	$this->db->where('status_um', 'Angsuran');
	
	$query = $this->db->get();
	return $query->result();
	}

	public function get_id_on_process($id) {
		$this->db->from($this->table);
		$this->db->where('id_pembayaran',$id);
		$query = $this->db->get();
		return $query->row();
	}

	public function update_on_process($where,$data) {
		$this->db->update($this->table, $data, $where);
		return $this->db->affected_rows();
	}
	

	

}

	

