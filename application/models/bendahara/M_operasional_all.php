<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class M_operasional_all extends CI_Model {

	var $table = 'operasional';
	var $column_order = array('no_trans','tgl_trans','kel_biaya','sub_biaya1','sub_biaya2','keterangan','bukti','nilai','tgl_bayar','metode_bayar','jumlah_bayar','bank','no_rekening',null); //set column field database for datatable orderable
	var $column_search = array('no_trans','tgl_trans','kel_biaya','sub_biaya1','sub_biaya2','keterangan','bukti','nilai','tgl_bayar','metode_bayar','jumlah_bayar','bank','no_rekening'); //set column field database for datatable searchable just firstname , lastname , address are searchable
	var $order = array('id_operasional' => 'desc'); // default order 

	public function __construct()
	{
		parent::__construct();
		$this->load->database();
	}

	private function _get_datatables_query()
	{
		
		

		$this->db->select('*');
        $this->db->from('operasional');
        $this->db->where('jenis_operasional="kantor"');


		$i = 0;
	
		foreach ($this->column_search as $item) // loop column 
		{
			if($_POST['search']['value']) // if datatable send POST for search
			{
				
				if($i===0) // first loop
				{
					$this->db->group_start(); // open bracket. query Where with OR clause better with bracket. because maybe can combine with other WHERE with AND.
					$this->db->like($item, $_POST['search']['value']);
				}
				else
				{
					$this->db->or_like($item, $_POST['search']['value']);
				}

				if(count($this->column_search) - 1 == $i) //last loop
					$this->db->group_end(); //close bracket
			}
			$i++;
		}
		
		if(isset($_POST['order'])) // here order processing
		{
			$this->db->order_by($this->column_order[$_POST['order']['0']['column']], $_POST['order']['0']['dir']);
		} 
		else if(isset($this->order))
		{
			$order = $this->order;
			$this->db->order_by(key($order), $order[key($order)]);
		}
	}

	function get_datatables()
	{
		$this->_get_datatables_query();
		if($_POST['length'] != -1)
		$this->db->limit($_POST['length'], $_POST['start']);
		$query = $this->db->get();
		return $query->result();
	}


	private function _get_datatables_query_proyek()
	{
		
		

		$this->db->select('*');
        $this->db->from('operasional');
        $this->db->where('jenis_operasional="proyek"');


		$i = 0;
	
		foreach ($this->column_search as $item) // loop column 
		{
			if($_POST['search']['value']) // if datatable send POST for search
			{
				
				if($i===0) // first loop
				{
					$this->db->group_start(); // open bracket. query Where with OR clause better with bracket. because maybe can combine with other WHERE with AND.
					$this->db->like($item, $_POST['search']['value']);
				}
				else
				{
					$this->db->or_like($item, $_POST['search']['value']);
				}

				if(count($this->column_search) - 1 == $i) //last loop
					$this->db->group_end(); //close bracket
			}
			$i++;
		}
		
		if(isset($_POST['order'])) // here order processing
		{
			$this->db->order_by($this->column_order[$_POST['order']['0']['column']], $_POST['order']['0']['dir']);
		} 
		else if(isset($this->order))
		{
			$order = $this->order;
			$this->db->order_by(key($order), $order[key($order)]);
		}
	}

	function get_datatables_proyek()
	{
		$this->_get_datatables_query_proyek();
		if($_POST['length'] != -1)
		$this->db->limit($_POST['length'], $_POST['start']);
		$query = $this->db->get();
		return $query->result();
	}


	private function _get_datatables_query_marketing()
	{
		
		

		$this->db->select('*');
        $this->db->from('operasional');
        $this->db->where('jenis_operasional="marketing"');


		$i = 0;
	
		foreach ($this->column_search as $item) // loop column 
		{
			if($_POST['search']['value']) // if datatable send POST for search
			{
				
				if($i===0) // first loop
				{
					$this->db->group_start(); // open bracket. query Where with OR clause better with bracket. because maybe can combine with other WHERE with AND.
					$this->db->like($item, $_POST['search']['value']);
				}
				else
				{
					$this->db->or_like($item, $_POST['search']['value']);
				}

				if(count($this->column_search) - 1 == $i) //last loop
					$this->db->group_end(); //close bracket
			}
			$i++;
		}
		
		if(isset($_POST['order'])) // here order processing
		{
			$this->db->order_by($this->column_order[$_POST['order']['0']['column']], $_POST['order']['0']['dir']);
		} 
		else if(isset($this->order))
		{
			$order = $this->order;
			$this->db->order_by(key($order), $order[key($order)]);
		}
	}

	function get_datatables_marketing()
	{
		$this->_get_datatables_query_marketing();
		if($_POST['length'] != -1)
		$this->db->limit($_POST['length'], $_POST['start']);
		$query = $this->db->get();
		return $query->result();
	}


	private function _get_datatables_query_tanah_mentah()
	{
		
		

		$this->db->select('*');
        $this->db->from('operasional');
        $this->db->where('jenis_operasional= "tanah_mentah"');


		$i = 0;
	
		foreach ($this->column_search as $item) // loop column 
		{
			if($_POST['search']['value']) // if datatable send POST for search
			{
				
				if($i===0) // first loop
				{
					$this->db->group_start(); // open bracket. query Where with OR clause better with bracket. because maybe can combine with other WHERE with AND.
					$this->db->like($item, $_POST['search']['value']);
				}
				else
				{
					$this->db->or_like($item, $_POST['search']['value']);
				}

				if(count($this->column_search) - 1 == $i) //last loop
					$this->db->group_end(); //close bracket
			}
			$i++;
		}
		
		if(isset($_POST['order'])) // here order processing
		{
			$this->db->order_by($this->column_order[$_POST['order']['0']['column']], $_POST['order']['0']['dir']);
		} 
		else if(isset($this->order))
		{
			$order = $this->order;
			$this->db->order_by(key($order), $order[key($order)]);
		}
	}

	function get_datatables_mentah()
	{
		$this->_get_datatables_query_tanah_mentah();
		if($_POST['length'] != -1)
		$this->db->limit($_POST['length'], $_POST['start']);
		$query = $this->db->get();
		return $query->result();
	}


	private function _get_datatables_query_tanah_matang()
	{
		
		

		$this->db->select('*');
        $this->db->from('operasional');
        $this->db->where('jenis_operasional= "tanah_matang"');


		$i = 0;
	
		foreach ($this->column_search as $item) // loop column 
		{
			if($_POST['search']['value']) // if datatable send POST for search
			{
				
				if($i===0) // first loop
				{
					$this->db->group_start(); // open bracket. query Where with OR clause better with bracket. because maybe can combine with other WHERE with AND.
					$this->db->like($item, $_POST['search']['value']);
				}
				else
				{
					$this->db->or_like($item, $_POST['search']['value']);
				}

				if(count($this->column_search) - 1 == $i) //last loop
					$this->db->group_end(); //close bracket
			}
			$i++;
		}
		
		if(isset($_POST['order'])) // here order processing
		{
			$this->db->order_by($this->column_order[$_POST['order']['0']['column']], $_POST['order']['0']['dir']);
		} 
		else if(isset($this->order))
		{
			$order = $this->order;
			$this->db->order_by(key($order), $order[key($order)]);
		}
	}

	function get_datatables_matang()
	{
		$this->_get_datatables_query_tanah_matang();
		if($_POST['length'] != -1)
		$this->db->limit($_POST['length'], $_POST['start']);
		$query = $this->db->get();
		return $query->result();
	}


	private function _get_datatables_query_tanah_efektif()
	{
		
		

		$this->db->select('*');
        $this->db->from('operasional');
        $this->db->where('jenis_operasional= "tanah_efektif"');


		$i = 0;
	
		foreach ($this->column_search as $item) // loop column 
		{
			if($_POST['search']['value']) // if datatable send POST for search
			{
				
				if($i===0) // first loop
				{
					$this->db->group_start(); // open bracket. query Where with OR clause better with bracket. because maybe can combine with other WHERE with AND.
					$this->db->like($item, $_POST['search']['value']);
				}
				else
				{
					$this->db->or_like($item, $_POST['search']['value']);
				}

				if(count($this->column_search) - 1 == $i) //last loop
					$this->db->group_end(); //close bracket
			}
			$i++;
		}
		
		if(isset($_POST['order'])) // here order processing
		{
			$this->db->order_by($this->column_order[$_POST['order']['0']['column']], $_POST['order']['0']['dir']);
		} 
		else if(isset($this->order))
		{
			$order = $this->order;
			$this->db->order_by(key($order), $order[key($order)]);
		}
	}

	function get_datatables_efektif()
	{
		$this->_get_datatables_query_tanah_efektif();
		if($_POST['length'] != -1)
		$this->db->limit($_POST['length'], $_POST['start']);
		$query = $this->db->get();
		return $query->result();
	}


	public function get_operasional() {
	$this->db->from('operasional');
	$query = $this->db->get();
	return $query->result();
	}

	function count_filtered()
	{
		$this->_get_datatables_query();
		$query = $this->db->get();
		return $query->num_rows();
	}

	public function count_all()
	{
		$this->db->from($this->table);
		return $this->db->count_all_results();
	}

	public function get_by_id($id)
	{
		$this->db->from($this->table);
		$this->db->where('id_operasional',$id);
		$query = $this->db->get();

		return $query->row();
	}

	public function save($data)
	{
		$this->db->insert($this->table, $data);
		return $this->db->insert_id();
	}

	public function update($where, $data)
	{
		$this->db->update($this->table, $data, $where);
		return $this->db->affected_rows();
	}

	public function delete_by_id($id)
	{
		$this->db->where('id', $id);
		$this->db->delete($this->table);
	}

	public function get_no_trans_kantor(){
			$th_sek = date('Y');
			$th = substr($th_sek,-2);
			


			$array = array(1=>"I","III","III","IV","V","VI","VII","VIII","IX","X","XI","XII");
			$bulan = $array[date('n')];
			
            $q = $this->db->query("select MAX(LEFT(no_trans,3)) as kd_max from operasional");
            $kd = "";
            if($q->num_rows()>0){
                foreach($q->result() as $k){
                    $tmp = ((int)$k->kd_max)+1;
                    $kd = sprintf("%03s", $tmp);
                }
            }else{
                $kd = "1";
            }
            return "".$kd."-KNTR-".$bulan."-".$th."";
    }


    public function get_no_trans_proyek(){
			$th_sek = date('Y');
			$th = substr($th_sek,-2);
			


			$array = array(1=>"I","III","III","IV","V","VI","VII","VIII","IX","X","XI","XII");
			$bulan = $array[date('n')];
			
            $q = $this->db->query("select MAX(LEFT(no_trans,3)) as kd_max from operasional where jenis_operasional='proyek'");
            $kd = "";
            if($q->num_rows()>0){
                foreach($q->result() as $k){
                    $tmp = ((int)$k->kd_max)+1;
                    $kd = sprintf("%03s", $tmp);
                }
            }else{
                $kd = "1";
            }
            return "".$kd."-PRYK-".$bulan."-".$th."";
    }


    public function get_no_trans_marketing(){
			$th_sek = date('Y');
			$th = substr($th_sek,-2);
			


			$array = array(1=>"I","III","III","IV","V","VI","VII","VIII","IX","X","XI","XII");
			$bulan = $array[date('n')];
			
            $q = $this->db->query("select MAX(LEFT(no_trans,3)) as kd_max from operasional where jenis_operasional='marketing'");
            $kd = "";
            if($q->num_rows()>0){
                foreach($q->result() as $k){
                    $tmp = ((int)$k->kd_max)+1;
                    $kd = sprintf("%03s", $tmp);
                }
            }else{
                $kd = "1";
            }
            return "".$kd."-MRKT-".$bulan."-".$th."";
    }

     public function get_no_trans_tanah_mentah(){
			$th_sek = date('Y');
			$th = substr($th_sek,-2);
			


			$array = array(1=>"I","III","III","IV","V","VI","VII","VIII","IX","X","XI","XII");
			$bulan = $array[date('n')];
			
            $q = $this->db->query("select MAX(LEFT(no_trans,3)) as kd_max from operasional where jenis_operasional='tanah_mentah'");
            $kd = "";
            if($q->num_rows()>0){
                foreach($q->result() as $k){
                    $tmp = ((int)$k->kd_max)+1;
                    $kd = sprintf("%03s", $tmp);
                }
            }else{
                $kd = "1";
            }
            return "".$kd."-MNTH-".$bulan."-".$th."";
    }

    public function get_no_trans_tanah_matang(){
			$th_sek = date('Y');
			$th = substr($th_sek,-2);
			


			$array = array(1=>"I","III","III","IV","V","VI","VII","VIII","IX","X","XI","XII");
			$bulan = $array[date('n')];
			
            $q = $this->db->query("select MAX(LEFT(no_trans,3)) as kd_max from operasional where jenis_operasional='tanah_matang'");
            $kd = "";
            if($q->num_rows()>0){
                foreach($q->result() as $k){
                    $tmp = ((int)$k->kd_max)+1;
                    $kd = sprintf("%03s", $tmp);
                }
            }else{
                $kd = "1";
            }
            return "".$kd."-MTNG-".$bulan."-".$th."";
    }

    public function get_no_trans_tanah_efektif(){
			$th_sek = date('Y');
			$th = substr($th_sek,-2);
			


			$array = array(1=>"I","III","III","IV","V","VI","VII","VIII","IX","X","XI","XII");
			$bulan = $array[date('n')];
			
            $q = $this->db->query("select MAX(LEFT(no_trans,3)) as kd_max from operasional where jenis_operasional='tanah_efektif'");
            $kd = "";
            if($q->num_rows()>0){
                foreach($q->result() as $k){
                    $tmp = ((int)$k->kd_max)+1;
                    $kd = sprintf("%03s", $tmp);
                }
            }else{
                $kd = "1";
            }
            return "".$kd."-EFKT-".$bulan."-".$th."";
    }


}
