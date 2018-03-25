
<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <h1>
        Data Barang Drop di tempat Proyek PT ENGGANG PROPERTINDO SAKTI
        
      </h1>
      <ol class="breadcrumb">
        <li><a href="#"><i class="fa fa-dashboard"></i> Home</a></li>
        <li><a href="#">Data Drop ditempat</a></li>
      </ol>
    </section>

<section class="content">
      <div class="row">
        <div class="col-xs-12">

<div class="box">

  <br>

  <button class="btn btn-success" onclick="tambah_operasional()"><i class="glyphicon glyphicon-plus">Tambah</i></button>      
  <a href="<?php echo base_url('proyek/drop_ditempat');?>"><button class="btn btn-success"><i class="glyphicon glyphicon-refresh">Refresh</i></button></a>
  <br>
  <br>
           

            <!-- /.box-header -->
            <div class="box-body">
              <table id="table" class="table table-bordered table-striped">
                <thead>
                <tr>
                  <th>No</th>
                  <th>Lokasi Drop</th>
                  <th>Tgl Masuk</th>
                  <th>Nama Barang</th>
                  <th>Jml Barang</th>
                  <th>Satuan</th>
                  <th>Status Pembayaran</th>
                  <th>Aksi</th>
                </tr>
                </thead>
                <tbody>
    </tbody>

      <tfoot>
        

              </table>
            </div>
            <!-- /.box-body -->
          </div>
          <!-- /.box -->
        </div>
        <!-- /.col -->
      </div>
      <!-- /.row -->
    </section>
    <!-- /.content -->
  </div>





  

  <div class="modal fade" id="modal_form_edit_status" role="dialog">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
        <h4 class="modal-title"></h4>
      </div>
      <div class="modal-body form">
        <div class="tab-content">
        <!--biodata -->
        <div class="tab-pane active" id="data"> <br>
        
        <form action="#" id="form_edit_status" class="form-horizontal">
          <table class="table table-hover">
            

            <input type="hidden" name="id_drop" class="form-control">
           
            <tr>
            <td>Status</td>
            <td>:</td>
            <td colspan=2>
                <select class="form-control" name="status">
            <option value="">--Pilih kategori--</option>
            <option value="Belum Bayar">Belum Bayar</option>
            <option value="Sudah Bayar">Sudah Bayar</option>
            </select>

            </td>
            </tr>

            

            </table>
           </div>
        </form>

        <div class="modal-footer">
        <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
        <button type="button" onclick="save_status()" class="btn btn-primary">Save</button>
      </div>

      </div>
        
      </div>
     
    </div><!-- /.modal-content -->
  </div><!-- /.modal-dialog -->
</div><!-- /.modal -->

<div class="modal fade" id="modal_form_edit" role="dialog">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
        <h4 class="modal-title"></h4>
      </div>
      <div class="modal-body form">

         <ul class="nav nav-tabs">
        <!-- Untuk Semua Tab.. pastikan a href=”#nama_id” sama dengan nama id di “Tap Pane” dibawah-->
        <li class="active"><a href="#data_edit" data-toggle="tab">Data Administrasi Barang</a></li> <!-- Untuk Tab pertama berikan li class=”active” agar pertama kali halaman di load tab langsung active-->
        <li><a href="#metode_edit" data-toggle="tab">Detail Barang</a></li>
        
        </ul>
        <!-- Tab panes, ini content dari tab di atas -->
        <div class="tab-content">
        <!--biodata -->
        <div class="tab-pane active" id="data_edit"> <br>
        
        <form action="#" id="form_edit" class="form-horizontal">
          <table class="table table-hover">
            <th colspan="3"> MASUKKAN DATA OPERASIONAL</th>

            <input type="hidden" name="id_drop" class="form-control">
            
            
            <tr>
            <td>Surat Jalan</td>
            <td>:</td>
            
            <td colspan=2><input type="text" name="surat_jalan" class="form-control" id="" readonly> </td>
              
            </td>
            </tr>

            <tr>
            <td>Tanggal Masuk</td>
            <td>:</td>
              <td colspan=2><input type="text" name="tgl_masuk" class="form-control" id="" readonly> </td>
            </tr>

             <tr>
            <td>Jam</td>
            <td>:</td>
              <td colspan=2><input type="text" name="jam" class="form-control" id="" readonly> </td>
            
            </tr>

            <tr>
            <td>Nomor Polisi</td>
            <td>:</td>
            
              <td colspan=2><input type="text" name="no_polisi" class="form-control" id="" readonly> </td>
            
            </tr>

            <tr>
            <td>Nama Supplier</td>
            <td>:</td>
            <td colspan=2><input type="text" name="supplier" class="form-control" id="" readonly> </td>
            </tr>

            <tr>
            <td>Nama Sopir</td>
            <td>:</td>
            <td colspan=2><input type="text" name="sopir" class="form-control" id="" readonly> </td>
            </tr>

            
            </table>

              </div>

           <div class="tab-pane" id="metode_edit">
           
           <table class="table table-hover">
            <th colspan="3"> MASUKKAN DETAIL BARANG</th>
            
            <tr>
            <td>Nama Barang</td>
            <td>:</td>
            
            <td colspan=2><input type="text" name="nama_barang" class="form-control" id="" readonly> </td>

            
            </td>
            </tr>

            <tr>
            <td>Jumlah Barang</td>
            <td>:</td>
            <td colspan=2><input type="text" name="jumlah_barang" class="form-control" id="" readonly> </td>
            </tr>
            
            <tr>
            <td>Satuan</td>
            <td>:</td>
            <td colspan=2><input type="text" name="satuan" class="form-control" id="" readonly> </td>
            </tr>

            <tr>
            <td>Barang Rusak</td>
            <td>:</td>
            <td colspan=2><input type="text" name="barang_rusak" class="form-control" id="" readonly> </td>
            </tr>

            <tr>
            <td>Jenis Pembelian</td>
            <td>:</td>
            <td colspan=2><input type="text" name="jenis_pembelian" class="form-control" id="" readonly> </td>
            </tr>

            

            </table>
           </div>
        </form>

        <div class="modal-footer">
        <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
        <button type="button" onclick="save()" class="btn btn-primary">Save</button>
      </div>

      </div>
        
      </div>
     
    </div><!-- /.modal-content -->
  </div><!-- /.modal-dialog -->
</div><!-- /.modal -->



<div class="modal fade" id="modal_form" role="dialog">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
        <h4 class="modal-title"></h4>
      </div>
      <div class="modal-body form">

         <ul class="nav nav-tabs">
        <!-- Untuk Semua Tab.. pastikan a href=”#nama_id” sama dengan nama id di “Tap Pane” dibawah-->
        <li class="active"><a href="#data1" data-toggle="tab">Data Administrasi Barang</a></li> <!-- Untuk Tab pertama berikan li class=”active” agar pertama kali halaman di load tab langsung active-->
        <li><a href="#metode1" data-toggle="tab">Detail Barang</a></li>
        
        </ul>
        <!-- Tab panes, ini content dari tab di atas -->
        <div class="tab-content">
        <!--biodata -->
        <div class="tab-pane active" id="data1"> <br>
        
        <form action="#" id="form" class="form-horizontal">
          <table class="table table-hover">
            <th colspan="3"> MASUKKAN DATA OPERASIONAL</th>

            <input type="hidden" name="id_drop" class="form-control">



             <tr>
            <td>Lokasi Drop</td>
            <td>:</td>
            
            <td colspan=2>
                 <select class="form-control select2" name="id_pemakaian" style="width:100%">
                    
                    <?php
                    $query = $this->db->query("SELECT * FROM pemakaian_tanah");
                   foreach ($query->result() as $row) { ?>
                  <option value="<?php echo $row->id_pemakaian;?>" selected="selected"> <?php echo $row->nama_proyek; ?> </option>

                    <?php
                    }
                    ?>

                    </select>
            </td>
              
            </td>
            </tr>
            
            
            <tr>
            <td>Surat Jalan</td>
            <td>:</td>
            
            <td colspan=2><input type="text" name="surat_jalan" class="form-control" placeholder="Masukkan Surat Jalan"> </td>
              
            </td>
            </tr>

           <tr>
            <td>Tanggal Masuk</td>
            <td>:</td>
            <td colspan=2>

            <div class="input-group date">
                  <div class="input-group-addon">
                    <i class="fa fa-calendar"></i>
                  </div>
                  <input type="text" name="tgl_masuk" class="form-control pull-right" id="datepicker">
                </div>
                <!-- /.input group -->
              </div>

            </td>
            </tr>

             <tr>
            <td>Jam</td>
            <td>:</td>
              <td colspan=2><input type="text" name="jam" class="form-control" id="" placeholder="Masukkan Waktu Penerimaan"> </td>
            
            </tr>

            <tr>
            <td>Nomor Polisi</td>
            <td>:</td>
            
              <td colspan=2><input type="text" name="no_polisi" class="form-control" id="" placeholder="Masukkan Nomor Polisi"> </td>
            
            </tr>

            <tr>
            <td>Nama Supplier</td>
            <td>:</td>
            <td colspan=2><input type="text" name="supplier" class="form-control" id="" placeholder="Masukkan Nama Supplier"> </td>
            </tr>

            <tr>
            <td>Nama Sopir</td>
            <td>:</td>
            <td colspan=2><input type="text" name="sopir" class="form-control" id="" placeholder="Masukkan Nama Sopir"> </td>
            </tr>

            
            </table>

              </div>

           <div class="tab-pane" id="metode1">
           
           <table class="table table-hover">
            <th colspan="3"> MASUKKAN DETAIL BARANG</th>
            
            <tr>
            <td>Nama Barang</td>
            <td>:</td>
            
            <td colspan=2><input type="text" name="nama_barang" class="form-control" id="" placeholder="Masukkan Nama Barang"> </td>

            
            </td>
            </tr>

            <tr>
            <td>Jumlah Barang</td>
            <td>:</td>
            <td colspan=2><input type="text" name="jumlah_barang" class="form-control" id="" placeholder="Masukkan Jumlah Barang"> </td>
            </tr>
            
            <tr>
            <td>Satuan</td>
            <td>:</td>
            <td colspan=2><input type="text" name="satuan" class="form-control" id="" placeholder="Masukkan Satuan"> </td>
            </tr>

            <tr>
            <td>Barang Rusak</td>
            <td>:</td>
            <td colspan=2><input type="text" name="barang_rusak" class="form-control" id="" placeholder="Masukkan Barang Rusak"> </td>
            </tr>

            <tr>
            <td>Jenis Pembelian</td>
            <td>:</td>
            <td colspan=2><input type="text" name="jenis_pembelian" class="form-control" id="" placeholder="Masukkan Jenis Pembelian"> </td>
            </tr>

            

            </table>
           </div>
        </form>

        <div class="modal-footer">
        <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
        <button type="button" onclick="save()" class="btn btn-primary">Save</button>
      </div>

      </div>
        
      </div>
     
    </div><!-- /.modal-content -->
  </div><!-- /.modal-dialog -->
</div><!-- /.modal -->


 












