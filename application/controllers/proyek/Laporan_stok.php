<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Laporan_stok extends CI_Controller {

    public function __construct()
    {
        parent::__construct();
        $this->load->model('proyek/M_barang_masuk');
    }

    public function index()
    {
        $this->load->helper('url');



        $this->load->view('proyek/template/header');
        $this->load->view('proyek/template/sidebar');
        $this->load->view('proyek/laporan_stok');
        $this->load->view('proyek/footer/footer_laporan_stok');
        
    }

    public function ajax_list()
    {
        $this->load->helper('url');

        $list = $this->M_barang_masuk->get_datatables();
        $data = array();
        $no = $_POST['start'];
        foreach ($list as $operasioanl) {
            $no++;
            $row = array();
            $row[] = $no;
            $row[] = date('d/m/Y', strtotime($operasioanl->tgl_masuk));
            $row[] = $operasioanl->surat_jalan;
            $row[] = $operasioanl->nama_barang;
            $row[] = $operasioanl->jumlah_barang;
            $row[] = $operasioanl->barang_rusak;
            $row[] = $operasioanl->jml_terima;
            $row[] = $operasioanl->sisa_bm;
            $row[] = $operasioanl->satuan;
            $row[] = $operasioanl->status;
        
            $data[] = $row;
        }

        $output = array(
                        "draw" => $_POST['draw'],
                        "recordsTotal" => $this->M_barang_masuk->count_all(),
                        "recordsFiltered" => $this->M_barang_masuk->count_filtered(),
                        "data" => $data,
                );
        //output to json format
        echo json_encode($output);
    }

    public function laporan_stok() {
        if ($_POST['submit'] == "Cari") 
        {
        $tanggal_awal=  $this->input->post('tgl_awal');
        $tanggal_akhir=  $this->input->post('tgl_akhir');
        $data['stok']=  $this->M_barang_masuk->laporan_periode($tanggal_awal,$tanggal_akhir);
        $this->load->view('proyek/template/header');
        $this->load->view('proyek/template/sidebar');
        $this->load->view('proyek/hasil', $data);
        $this->load->view('proyek/template/footer');
            
        } else if($_POST['submit'] == "PDF") {
          $this->load->library('pdf');
        $pdf=new FPDF('L','cm','A4');
        $pdf->AddPage();


        $pdf->SetFont('Times','B',16);
        //$pdf->Image('https://upload.wikimedia.org/wikipedia/commons/thumb/a/a7/Logo_kemenperin.png/220px-Logo_kemenperin.png',5,0.8,2,2); // pemanggilan logo 
        $pdf->SetX(3); 
        $pdf->MultiCell(24,0.5,'PT ENGGANG PROPERTINDO SAKTI',0,'C');
        $pdf->SetFont('Times','B',13);
        $pdf->SetX(3); 
        
        $pdf->MultiCell(24,0.5,'Purwajaya, Parapatan, Purwadadi, Subang',0,'C'); 
        $pdf->SetFont('Times','B',8); 
        $pdf->SetX(3); 
        $pdf->MultiCell(24,0.5,'website : www.enggangpropertindosakti.com email : mail@enggangpropertindosakti.com',0,'C'); 
        $pdf->Line(1,3.1,29,3.1); 
        $pdf->SetLineWidth(0.1); 
        $pdf->Line(1,3.2,29,3.2);
        $pdf->SetLineWidth(0);
        $pdf->Ln();

        $pdf->MultiCell(24,0.5,'',0,'C'); 
        $pdf->SetFont('Times','B',9); 
        $pdf->SetX(3); 


        $tanggal_awal=  $this->input->post('tgl_awal');
        $tanggal_akhir=  $this->input->post('tgl_akhir');
        $tgl_awal = date('d F Y', strtotime($tanggal_awal));
        $tgl_akhir = date('d F Y', strtotime($tanggal_akhir));
        $data =  $this->M_barang_masuk->laporan_periode($tanggal_awal,$tanggal_akhir);

        $pdf->SetFont('Times','B',13);
        $pdf->SetX(3); 
        $pdf->MultiCell(24,0.5,'LAPORAN DATA STOK BARANG MASUK PERIODE TANGGAL '.$tgl_awal.' SAMPAI TANGGAL '.$tgl_akhir.'',0,'C'); 

        $pdf->SetFont('Times','B',12);
        $pdf->Cell(29,0.5,'','',1,'C');
        $pdf->Cell(1.5,0.5, 'No',1,0,'C');
        $pdf->Cell(3.5,0.5, 'Surat Jalan',1,0,'C');
        $pdf->Cell(3,0.5,'Tgl Masuk',1,0,'C');
        $pdf->Cell(6,0.5, 'Nama Barang',1,0,'C');
        $pdf->Cell(2,0.5, 'Diterima',1,0,'C');
        $pdf->Cell(2,0.5, 'Rusak',1,0,'C');
        $pdf->Cell(2,0.5, 'Layak',1,0,'C');
        $pdf->Cell(2,0.5, 'Stok',1,0,'C');
        $pdf->Cell(2,0.5, 'Satuan',1,0,'C');
        $pdf->Cell(3.5,0.5, 'Supplier',1,0,'C');



       

        // tampilkan dari database
        $pdf->SetFont('Arial','','L');
       

        

        $no=1;
        
        foreach ($data->result() as $r)
        {
            $tanggal = $r->tgl_masuk;
            $tgl = date('d/m/Y', strtotime($tanggal));

            $pdf->SetFont('Times','',12);
            $pdf->Cell(29,0.5,'','',1,'C');
            $pdf->Cell(1.5,0.5, $no++ ,1,0,'C');
            $pdf->Cell(3.5,0.5, $r->surat_jalan ,1,0,'C');
            $pdf->Cell(3,0.5,$tgl,1,0,'C');
            $pdf->Cell(6,0.5, $r->nama_barang,1,0,'C');
            $pdf->Cell(2,0.5, $r->jumlah_barang,1,0,'C');
            $pdf->Cell(2,0.5, $r->barang_rusak,1,0,'C');
            $pdf->Cell(2,0.5, $r->jml_terima,1,0,'C');
            $pdf->Cell(2,0.5, $r->sisa_bm,1,0,'C');
            $pdf->Cell(2,0.5, $r->satuan,1,0,'C');
            $pdf->Cell(3.5,0.5, $r->supplier,1,0,'C');
           
        }
    
        // end
        
        $pdf->Output();
    }

    else if($_POST['submit'] == "Excel") {

        header("Content-type=appalication/vnd.ms-excel");
        header("content-disposition:attachment;filename=laporantransaksi.xls");
         $tanggal_awal=  $this->input->post('tgl_awal');
        $tanggal_akhir=  $this->input->post('tgl_akhir');
        $data['stok']=  $this->M_barang_masuk->laporan_periode($tanggal_awal,$tanggal_akhir);
        $this->load->view('proyek/laporan_excel',$data);

    }


    else if($_POST['submit'] == "Sekarang") {
          $this->load->library('pdf');
        $pdf=new FPDF('L','cm','A4');
        $pdf->AddPage();


        $pdf->SetFont('Times','B',16);
        //$pdf->Image('https://upload.wikimedia.org/wikipedia/commons/thumb/a/a7/Logo_kemenperin.png/220px-Logo_kemenperin.png',5,0.8,2,2); // pemanggilan logo 
        $pdf->SetX(3); 
        $pdf->MultiCell(24,0.5,'PT ENGGANG PROPERTINDO SAKTI',0,'C');
        $pdf->SetFont('Times','B',13);
        $pdf->SetX(3); 
        
        $pdf->MultiCell(24,0.5,'Purwajaya, Parapatan, Purwadadi, Subang',0,'C'); 
        $pdf->SetFont('Times','B',8); 
        $pdf->SetX(3); 
        $pdf->MultiCell(24,0.5,'website : www.enggangpropertindosakti.com email : mail@enggangpropertindosakti.com',0,'C'); 
        $pdf->Line(1,3.1,29,3.1); 
        $pdf->SetLineWidth(0.1); 
        $pdf->Line(1,3.2,29,3.2);
        $pdf->SetLineWidth(0);
        $pdf->Ln();

        $pdf->MultiCell(24,0.5,'',0,'C'); 
        $pdf->SetFont('Times','B',9); 
        $pdf->SetX(3); 

        $sekarang = date_default_timezone_set("Asia/Jakarta");
        $sekarang =   date("d/m/Y h:i:s");
        
        $data =  $this->M_barang_masuk->stok_sekarang();

        $pdf->SetFont('Times','B',13);
        $pdf->SetX(3); 
        $pdf->MultiCell(24,0.5,'LAPORAN DATA STOK BARANG TERSEDIA PERIODE TANGGAL '.$sekarang.' ',0,'C'); 

        $pdf->SetFont('Times','B',12);
        $pdf->Cell(29,0.5,'','',1,'C');
        $pdf->Cell(1.5,0.5, 'No',1,0,'C');
        $pdf->Cell(3.5,0.5, 'Surat Jalan',1,0,'C');
        $pdf->Cell(3,0.5,'Tgl Masuk',1,0,'C');
        $pdf->Cell(6,0.5, 'Nama Barang',1,0,'C');
        $pdf->Cell(2,0.5, 'Diterima',1,0,'C');
        $pdf->Cell(2,0.5, 'Rusak',1,0,'C');
        $pdf->Cell(2,0.5, 'Layak',1,0,'C');
        $pdf->Cell(2,0.5, 'Stok',1,0,'C');
        $pdf->Cell(2,0.5, 'Satuan',1,0,'C');
        $pdf->Cell(3.5,0.5, 'Supplier',1,0,'C');



       

        // tampilkan dari database
        $pdf->SetFont('Arial','','L');
       

        

        $no=1;
        
        foreach ($data->result() as $r)
        {
            $tanggal = $r->tgl_masuk;
            $tgl = date('d/m/Y', strtotime($tanggal));

            $pdf->SetFont('Times','',12);
            $pdf->Cell(29,0.5,'','',1,'C');
            $pdf->Cell(1.5,0.5, $no++ ,1,0,'C');
            $pdf->Cell(3.5,0.5, $r->surat_jalan ,1,0,'C');
            $pdf->Cell(3,0.5,$tgl,1,0,'C');
            $pdf->Cell(6,0.5, $r->nama_barang,1,0,'C');
            $pdf->Cell(2,0.5, $r->jumlah_barang,1,0,'C');
            $pdf->Cell(2,0.5, $r->barang_rusak,1,0,'C');
            $pdf->Cell(2,0.5, $r->jml_terima,1,0,'C');
            $pdf->Cell(2,0.5, $r->sisa_bm,1,0,'C');
            $pdf->Cell(2,0.5, $r->satuan,1,0,'C');
            $pdf->Cell(3.5,0.5, $r->supplier,1,0,'C');
           
        }
    
        // end
        
        $pdf->Output();
    }
        }
    

}
