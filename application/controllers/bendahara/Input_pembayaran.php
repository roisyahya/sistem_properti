<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Input_pembayaran extends CI_Controller {

	public function __construct() {
		parent::__construct();
		$this->load->model(array('bendahara/M_pembayaran','developer/M_tanah_efektif'));
		$this->load->helper(array('url','text','form'));
	}

	

	public function add_pembayaran() {
		$data = array(
			'id_pembayaran'=>$this->input->post('id_pembayaran'),
			'id_tanah_efektif'=>$this->input->post('id_tanah_efektif'),
			'nama_pembeli'=>$this->input->post('nama_pembeli'),
			'tgl_bayar'=>$this->input->post('tgl_bayar'),
			'booking_fee'=>$this->input->post('booking_fee'),
			'uang_muka'=>$this->input->post('uang_muka'),
			'status_um'=>$this->input->post('status_um'),
			'diskon'=>$this->input->post('diskon'),
			'penambahan_um'=>$this->input->post('penambahan_um'),
			'kelebihan_tanah'=>$this->input->post('kelebihan_tanah'),		
			'lokasi_strategis'=>$this->input->post('lokasi_strategis'),		
			'mkr'=>$this->input->post('mkr'),		
			'sertifikat'=>$this->input->post('sertifikat'),		
			'status_sertifikat'=>$this->input->post('status_sertifikat'),		
			'imb'=>$this->input->post('imb'),		
			'status_imb'=>$this->input->post('status_imb'),		
			'listrik'=>$this->input->post('listrik'),		
			'status_listrik'=>$this->input->post('status_listrik'),		
			'bestek'=>$this->input->post('bestek'),		
			'status_bestek'=>$this->input->post('status_bestek'),		
			
			
		);

	$insert = $this->M_pembayaran->add_pembayaran($data);

	

	$id['id_tanah_efektif'] = $this->input->post('id_tanah_efektif');
    $data = array(                
      
      'status'=> "Booked",
      
                      
    );

    $this->M_tanah_efektif->update_status_tanah('tanah_efektif',$data,$id);
    redirect('bendahara/unit_terjual');

	}	

	//Proses Edit
	public function edit_pembayaran() {
		$data = array(
			
			'id_tanah_efektif'=>$this->input->post('id_tanah_efektif'),
			'nama_pembeli'=>$this->input->post('nama_pembeli'),
			'tgl_bayar'=>$this->input->post('tgl_bayar'),
			'booking_fee'=>$this->input->post('booking_fee'),
			'uang_muka'=>$this->input->post('uang_muka'),
			'status_um'=>$this->input->post('status_um'),
			'diskon'=>$this->input->post('diskon'),
			'penambahan_um'=>$this->input->post('penambahan_um'),
			'kelebihan_tanah'=>$this->input->post('kelebihan_tanah'),		
			'lokasi_strategis'=>$this->input->post('lokasi_strategis'),		
			'mkr'=>$this->input->post('mkr'),		
			'sertifikat'=>$this->input->post('sertifikat'),		
			'status_sertifikat'=>$this->input->post('status_sertifikat'),		
			'imb'=>$this->input->post('imb'),		
			'status_imb'=>$this->input->post('status_imb'),		
			'listrik'=>$this->input->post('listrik'),		
			'status_listrik'=>$this->input->post('status_listrik'),		
			'bestek'=>$this->input->post('bestek'),		
			'status_bestek'=>$this->input->post('status_bestek'),	
			);

		$edit = $this->M_pembayaran->proses_edit(array('id_pembayaran'=> $this->input->post('id_pembayaran')), $data);

	$id['id_tanah_efektif'] = $this->input->post('id_tanah_efektif');

	$status_um = $this->input->post('status_um');
	$status_sertifikat = $this->input->post('status_sertifikat');
	$status_imb = $this->input->post('status_imb');
	$status_listrik = $this->input->post('status_listrik');
	$status_bestek = $this->input->post('status_bestek');

	if ($status_um=="Lunas" AND $status_sertifikat=="Sudah diterima" AND $status_imb=="Sudah diterima" AND $status_listrik=="Sudah diterima"
		AND $status_bestek=="Sudah diterima") {

	


    $data = array(                
      
      'status'=> "Lunas",
      
                      
    );

    $this->M_tanah_efektif->update_status_tanah('tanah_efektif',$data,$id);
}

		redirect('bendahara/daftar_pemesanan');
	}

}
