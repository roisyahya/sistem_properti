
<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <h1>
        Data Operasional proyek  PT ENGGANG PROPERTINDO SAKTI
        
      </h1>
      <ol class="breadcrumb">
        <li><a href="#"><i class="fa fa-dashboard"></i> Home</a></li>
        <li><a href="#">Data Operasional proyek</a></li>
      </ol>
    </section>

<section class="content">
      <div class="row">
        <div class="col-xs-12">

<div class="box">

  <br>

  <button class="btn btn-success" onclick="tambah_operasional()"><i class="glyphicon glyphicon-plus">Tambah</i></button>      
  <a href="<?php echo base_url('bendahara/operasional');?>"><button class="btn btn-success"><i class="glyphicon glyphicon-refresh">Refresh</i></button></a>
  <br>
  <br>
           

            <!-- /.box-header -->
            <div class="box-body">
              <table id="table" class="table table-bordered table-striped">
                <thead>
                <tr>
                  <th>No</th>
                  <th>No transaksi</th>
                  <th>Tgl transaksi</th>
                  <th>Kelompok Biaya</th>
                  <th>Nilai</th>
                  <th>Jumlah Bayar</th>
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
        <li class="active"><a href="#data" data-toggle="tab">Data Operasional</a></li> <!-- Untuk Tab pertama berikan li class=”active” agar pertama kali halaman di load tab langsung active-->
        <li><a href="#metode" data-toggle="tab">Metode Pembayaran</a></li>
        
        </ul>
        <!-- Tab panes, ini content dari tab di atas -->
        <div class="tab-content">
        <!--biodata -->
        <div class="tab-pane active" id="data"> <br>
        
        <form action="#" id="form_edit" class="form-horizontal">
          <table class="table table-hover">
            <th colspan="3"> MASUKKAN DATA OPERASIONAL</th>

            <?php
                  $no = 1;
                  foreach ($operasional_proyek as $row) { } ?>

            <input type="hidden" name="id_operasional" class="form-control">
            <tr>
            <td>No Transaksi</td>
            <td>:</td>
            <td colspan=2><input type="text"  class="form-control"  value="<?php echo $no_trans;?>" readonly> </td>
            </tr>
            
            <tr>
            <td>Tanggal Transaksi</td>
            <td>:</td>
            
            <td colspan=2><input type="text" name="tgl_trans" class="form-control" id="" readonly> </td>

              
            </td>
            </tr>

            <tr>
            <td>Kelompok Biaya</td>
            <td>:</td>
              <td colspan=2><input type="text" name="kel_biaya" class="form-control" id="" readonly> </td>
            </tr>

             <tr>
            <td>Sub Biaya 1</td>
            <td>:</td>
              <td colspan=2><input type="text" name="sub_biaya1" class="form-control" id="" readonly> </td>
            
            </tr>

            <tr>
            <td>Sub Biaya 2</td>
            <td>:</td>
            
              <td colspan=2><input type="text" name="sub_biaya2" class="form-control" id="" readonly> </td>
            
            </tr>

            <tr>
            <td>Keterangan</td>
            <td>:</td>
            <td colspan=2><input type="text" name="keterangan" class="form-control" id="" readonly> </td>
            </tr>

            <tr>
            <td>Bukti</td>
            <td>:</td>
            <td colspan=2><input type="text" name="bukti" class="form-control" id="" readonly> </td>
            </tr>

            <tr>
            <td>Nilai</td>
            <td>:</td>
            <td colspan=2><input type="text" name="nilai" class="form-control" id="" readonly> </td>
            </tr>
            </table>

              </div>

           <div class="tab-pane" id="metode">
           
           <table class="table table-hover">
            <th colspan="3"> MASUKKAN METODE PEMBAYARAN</th>
            
            <tr>
            <td>Tanggal Pembayaran</td>
            <td>:</td>
            

            <td colspan=2><input type="text" name="tgl_bayar" class="form-control" id="" readonly> </td>

            
            </td>
            </tr>

            <tr>
            <td>Metode Pembayaran</td>
            <td>:</td>
            <td colspan=2><input type="text" name="metode_bayar" class="form-control" id="" readonly> </td>
            </tr>
            
            <tr>
            <td>Jumlah Bayar</td>
            <td>:</td>
            <td colspan=2><input type="text" name="jumlah_bayar" class="form-control" id="" readonly> </td>
            </tr>

            <tr>
            <td>Bank</td>
            <td>:</td>
            <td colspan=2><input type="text" name="bank" class="form-control" id="" readonly> </td>
            </tr>

            <tr>
            <td>No Rekening</td>
            <td>:</td>
            <td colspan=2><input type="text" name="no_rekening" class="form-control" id="" readonly> </td>
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
        <li class="active"><a href="#home" data-toggle="tab">Data Operasional</a></li> <!-- Untuk Tab pertama berikan li class=”active” agar pertama kali halaman di load tab langsung active-->
        <li><a href="#profile" data-toggle="tab">Metode Pembayaran</a></li>
        
        </ul>
        <!-- Tab panes, ini content dari tab di atas -->
        <div class="tab-content">
        <!--biodata -->
        <div class="tab-pane active" id="home"> <br>
        
        <form action="#" id="form" class="form-horizontal">
          <table class="table table-hover">
            <th colspan="3"> MASUKKAN DATA OPERASIONAL</th>

            <input type="hidden" name="id_operasional" class="form-control">
            <tr>
            <td>No Transaksi</td>
            <td>:</td>
            <td colspan=2><input type="text" name="no_trans" class="form-control" id="" value="<?php echo $no_trans;?>" readonly> </td>
            </tr>
            
            <tr>
            <td>Tanggal Transaksi</td>
            <td>:</td>
            <td colspan=2>

            <div class="input-group date">
                  <div class="input-group-addon">
                    <i class="fa fa-calendar"></i>
                  </div>
                  <input type="text" name="tgl_trans" class="form-control pull-right" id="datepicker">
                </div>
                <!-- /.input group -->
              </div>

            </td>
            </tr>

            <tr>
            <td>Kelompok Biaya</td>
            <td>:</td>
            <td>

              <select class="form-control select2" name="kel_biaya" style="width:100%">
                    
                    <?php
                    $query = $this->db->query("SELECT * FROM kel_biaya");
                   foreach ($query->result() as $row) { ?>
                  <option value="<?php echo $row->keterangan;?>" selected="selected"> <?php echo $row->keterangan; ?> </option>

                    <?php
                    }
                    ?>

                    </select>

            </td>
            </tr>

             <tr>
            <td>Sub Biaya 1</td>
            <td>:</td>
            <td>
              <select class="form-control select2" name="sub_biaya1" style="width:100%">                    
                    <?php
                    $query = $this->db->query("SELECT * FROM sub_biaya1");
                   foreach ($query->result() as $row) { ?>
                  <option value="<?php echo $row->keterangan;?>" selected="selected"> <?php echo $row->keterangan; ?> </option>

                    <?php
                    }
                    ?>

                    </select>

            </td>
            </tr>

            <tr>
            <td>Sub Biaya 2</td>
            <td>:</td>
            <td>

              <select class="form-control select2" name="sub_biaya2" style="width:100%">
                    
                    <?php
                    $query = $this->db->query("SELECT * FROM sub_biaya2");
                   foreach ($query->result() as $row) { ?>
                  <option value="<?php echo $row->keterangan;?>" selected="selected"> <?php echo $row->keterangan; ?> </option>

                    <?php
                    }
                    ?>

                    </select>

            </td>
            </tr>

            <tr>
            <td>Keterangan</td>
            <td>:</td>
            <td colspan=2><input type="text" name="keterangan" class="form-control" id="" placeholder="Masukkan Keterangan"></td>
            </tr>

            <tr>
            <td>Bukti</td>
            <td>:</td>
            <td colspan=2><input type="text" name="bukti" class="form-control" id="" placeholder="Masukkan Bukti"></td>
            </tr>

            <tr>
            <td>Nilai</td>
            <td>:</td>
            <td colspan=2><input type="text" name="nilai" class="form-control" id="" placeholder="Masukkan Nilai"></td>
            </tr>
            </table>

              </div>

           <div class="tab-pane" id="profile">
           
           <table class="table table-hover">
            <th colspan="3"> MASUKKAN METODE PEMBAYARAN</th>
            
            <tr>
            <td>Tanggal Pembayaran</td>
            <td>:</td>
            <td colspan=2>

            <div class="input-group date">
                  <div class="input-group-addon">
                    <i class="fa fa-calendar"></i>
                  </div>
                  <input type="text" name="tgl_bayar" class="form-control pull-right" id="datepicker1">
                </div>
                <!-- /.input group -->
              </div>

            </td>
            </tr>

            <tr>
            <td>Metode Pembayaran ny</td>
            <td>:</td>
            <td>  
            <label class="radio-inline">
            <input type="radio" name="metode_bayar" id="inlineRadio1" value="cash"> Cash
            </label>
            <label class="radio-inline">
            <input type="radio" name="metode_bayar" id="inlineRadio2" value="transfer"> Transfer
            </label>

            </td>
            </tr>
            
            <tr>
            <td>Jumlah Bayar</td>
            <td>:</td>
            <td colspan=2><input type="number" name="jumlah_bayar" class="form-control" id="" placeholder="Masukkan Jumlah Bayar"></td>
            </tr>

            <tr>
            <td>Bank</td>
            <td>:</td>
            <td colspan=2><input type="text" name="bank" class="form-control" id="" placeholder="Masukkan Nama Bank (Jika Metode Transfer)"></td>
            </tr>

            <tr>
            <td>No Rekening</td>
            <td>:</td>
            <td colspan=2><input type="text" name="no_rekening" class="form-control" id="" placeholder="Masukkan No Rekening (Jika Metode Transfer)"></td>
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









