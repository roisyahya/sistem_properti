
<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <h1>
        Data Barang Keluar Proyek PT ENGGANG PROPERTINDO SAKTI
        
      </h1>
      <ol class="breadcrumb">
        <li><a href="#"><i class="fa fa-dashboard"></i> Home</a></li>
        <li><a href="#">Data Operasional Kantor</a></li>
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
                  <th >No</th>
                  <th >Tgl Keluar </th>
                  <th >Nama Barang</th>
                  <th  >Nama Proyek</th>
                  <th  >Jumlah Keluar </th>
                  <th  >Sisa </th>
                  <th  >Satuan </th>
                  
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


  <div class="modal fade" id="modal_form" role="dialog">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
        <h4 class="modal-title"></h4>
      </div>
      <div class="modal-body form">
        <form action="#" id="form" class="form-horizontal">
          

          <input type="hidden" name="id_barang_keluar" value="">

         <div class="form-body">
            <div class="form-group">
              <label class="control-label col-md-3">Tanggal Keluar</label>
              <div class="col-md-9">

                
                  <input type="text" name="tgl_keluar" class="form-control pull-right" id="datepicker">
                
                <span class="help-block"></span>
              </div>
            </div>
          </div>

          <div class="form-body">
            <div class="form-group">
              <label class="control-label col-md-3">Nama Barang </label>
              <div class="col-md-9">
                
                <select class="form-control select2" name="id_barang_masuk" style="width:100%">
                    
                    <?php
                    $query = $this->db->query("SELECT * FROM barang_masuk WHERE sisa_bm !='0'");
                   foreach ($query->result() as $row) { ?>
                  <option value="<?php echo $row->id_barang_masuk;?>" selected="selected"> <?php echo $row->nama_barang; ?> </option>

                    <?php
                    }
                    ?>

                    </select>

                <span class="help-block"></span>
              </div>
            </div>
          </div>


          <div class="form-body">
            <div class="form-group">
              <label class="control-label col-md-3">Nama Proyek </label>
              <div class="col-md-9">
                
                <select class="form-control select2" name="id_pemakaian" style="width:100%">
                    
                    <?php
                    $query = $this->db->query("SELECT * FROM pemakaian_tanah");
                   foreach ($query->result() as $row) { ?>
                  <option value="<?php echo $row->id_pemakaian;?>" selected="selected"> <?php echo $row->nama_proyek; ?> </option>

                    <?php
                    }
                    ?>

                    </select>

                <span class="help-block"></span>
              </div>
            </div>
          </div>

          

          

          <div class="form-body">
            <div class="form-group">
              <label class="control-label col-md-3">Jumlah Pemakaian</label>
              <div class="col-md-9">
                <input type="text" name="jumlah_keluar" class="form-control" placeholder="Masukkan Jumlah Barang Keluar">
                <span class="help-block"></span>
              </div>
            </div>
          </div>


        </form>
        
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
        <button type="button" onclick="save()" class="btn btn-primary">Save</button>
      </div>
    </div><!-- /.modal-content -->
  </div><!-- /.modal-dialog -->
</div><!-- /.modal -->











