<?php

	class M_pembayaran extends CI_Model {

		function __construct(){
        parent::__construct();
   		 }

		var $table='pembayaran';

	public function get_id_pembayaran(){
			$th_sek = date('Y');
			$th = substr($th_sek,-2);
			


			$array = array(1=>"I","III","III","IV","V","VI","VII","VIII","IX","X","XI","XII");
			$bulan = $array[date('n')];
			
            $q = $this->db->query("select MAX(LEFT(id_pembayaran,3)) as kd_max from pembayaran");
            $kd = "";
            if($q->num_rows()>0){
                foreach($q->result() as $k){
                    $tmp = ((int)$k->kd_max)+1;
                    $kd = sprintf("%03s", $tmp);
                }
            }else{
                $kd = "1";
            }
            return "".$kd."-Pembayaran-".$bulan."-".$th."";
    }

    public function add_pembayaran($data) {
		$this->db->insert($this->table,$data);
		return $this->db->insert_id();
	}

   

	public function get_pembayaran() {
	
	$query = $this->db->query("SELECT * FROM pembayaran,tanah_efektif WHERE pembayaran.id_tanah_efektif = tanah_efektif.id_tanah_efektif
        AND status='Booked'");
	return $query->result();
	}

    public function get_pembayaran_lunas() {
    
    $query = $this->db->query("SELECT * FROM pembayaran,tanah_efektif WHERE pembayaran.id_tanah_efektif = tanah_efektif.id_tanah_efektif
        AND status_um='Lunas'");
    return $query->result();
    }

	//Menagkap ID di URI
	public function get_edit_pembayaran(){

        $id = $this->uri->segment(4);
        
        $this->db->select('*');
        $this->db->from('pembayaran');
        $this->db->where('id_pembayaran', $id);
        $query = $this->db->get();
        return $query->result();

    }

    //Proses Edit
  //   public function proses_edit($where,$data) {
  //   	$this->db->update($this->table, $data, $where);
		// return $this->db->affected_rows();
  //   }

    public function proses_edit($table,$data,$field_key)
    {
        $this->db->update($table,$data,$field_key);
    }

    

    public function delete_pembayaran($id) {
		$this->db->where('id_pembayaran',$id);
		$this->db->delete($this->table);
	} 



	

	

}

	

