 <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <h1>
        Input Data Pembayaran
        <small>Preview</small>
      </h1>
      <ol class="breadcrumb">
        <li><a href="#"><i class="fa fa-dashboard"></i> Home</a></li>
        <li><a href="#">Forms</a></li>
        <li class="active">General Elements</li>
      </ol>
    </section>

    <!-- Main content -->
    <section class="content">
      <div class="row">
        <!-- left column -->
        <div class="col-md-6">
          <!-- general form elements -->
          <div class="box box-primary">
            <div class="box-header with-border">
              <h3 class="box-title">Booking Fee</h3>
            </div>
            <!-- /.box-header -->
            <!-- form start -->
            <form role="form" method="post" action="<?php echo site_url('bendahara/input_pembayaran/add_pembayaran');?>">
              
              <div class="box-body">

                 <div class="form-group">
                  <label >Id Pembayaran</label>
                  <input type="text" class="form-control" id="exampleInputEmail1" name="id_pembayaran" value="<?php echo $id_pembayaran;?>" readonly>
                </div>

               
               
                 <?php foreach ($id_tanah_efektif as $key ) {   ?>

               
                 <div class="form-group">
                  <label >Id Tanah Efektif</label>
                  <input type="number" class="form-control" id="" name="id_tanah_efektif" value="<?php echo $key->id_tanah_efektif;?>"  readonly>
                    <?php }?>
                </div>

                <div class="form-group">
                  <label >Nama Pembeli</label>
                  <input type="text" class="form-control" id="exampleInputEmail1" name="nama_pembeli" placeholder="Masukkan Nama Pembeli">
                </div>

                <div class="form-group">
                <label>Tanggal Pembayaran</label>

                <div class="input-group date">
                  <div class="input-group-addon">
                    <i class="fa fa-calendar"></i>
                  </div>
                  <input type="text" name="tgl_bayar" class="form-control pull-right" id="datepicker">
                </div>
                <!-- /.input group -->
              </div>
                  

                <div class="form-group">
                  <label >Booking Fee</label>
                  <input type="number" class="form-control" id="exampleInputEmail1" name="booking_fee" placeholder="Masukkan Besar Booking Fee">
                </div>
               
              </div>
              <!-- /.box-body -->

              
          </div>

          <!-- /.box -->

    
          <!-- Form Element sizes -->
          <div class="box box-success">
            <div class="box-header with-border">
              <h3 class="box-title">Uang Muka</h3>
            </div>
            <div class="box-body">
              
              <div class="form-group">
                  <label for="exampleInputEmail1">Uang Muka</label>
                  <input type="number" class="form-control" id="exampleInputEmail1" name="uang_muka" placeholder="Masukkan Besar Uang Muka">
                </div>


               <div class="form-group">
                  <label>Cara Pembayaran Uang Muka</label>
                  <select class="form-control" name="status_um">
                    <option>--Pilih Status--</option>
                    <option value="Lunas">Lunas</option>
                    <option value="Angsuran">Angsuran</option>
                    
                  </select>
                </div>

                <div class="form-group">
                  <label >Diskon</label>
                  <input type="number" class="form-control" id="exampleInputEmail1" name="diskon" placeholder="Masukkan Besar Diskon (Jika Ada)">
                </div>

                <div class="form-group">
                  <label >Penambahan Uang Muka (dari plafon kredit)</label>
                  <input type="number" class="form-control" id="exampleInputEmail1" name="penambahan_um" placeholder="Masukkan Besar Penambahan Uang Muka (Jika Ada)">
                </div>

                <div class="form-group">
                  <label >Kelebihan Tanah</label>
                  <input type="number" class="form-control" id="exampleInputEmail1" name="kelebihan_tanah" placeholder="Masukkan Biaya Kelebihan (Jika Ada)">
                </div>

                <div class="form-group">
                  <label >Biaya Lokasi Strategis</label>
                  <input type="number" class="form-control" id="exampleInputEmail1" name="lokasi_strategis" placeholder="Masukkan Biaya Lokasi Strategis (Jika Ada)">
                </div>

            </div>
            <!-- /.box-body -->
          </div>
          <!-- /.box -->

         

          <!-- Input addon -->
          
          <!-- /.box -->

        </div>
        <!--/.col (left) -->
        <!-- right column -->
        <div class="col-md-6">
          <!-- Horizontal Form -->
          <div class="box box-info">
            <div class="box-header with-border">
              <h3 class="box-title">Maksimal KPR</h3>
            </div>
            <!-- /.box-header -->
            <!-- form start -->
          
              
              <div class="box-body">
                <div class="form-group">
                  <label for="exampleInputEmail1">Nominal MKR</label>
                  <input type="number" class="form-control" id="exampleInputEmail1" name="mkr" placeholder="Masukkan Nominal MKR">
                </div>


                <div class="form-group">
                  <label >Sertifikat</label>
                  <input type="number" class="form-control" id="exampleInputEmail1" name="sertifikat" placeholder="Masukkan Nominal Sertifikat">
                </div>

                 <div class="form-group">
                  <label>Status Sertifikat</label>
                  <select class="form-control" name="status_sertifikat">
                    <option>--Pilih Status--</option>
                    <option value="Belum diterima">Belum diterima</option>
                    <option value="Sudah diterima">Sudah diterima</option>
                    
                  </select>
                </div>

                <div class="form-group">
                  <label >IMB</label>
                  <input type="number" class="form-control" id="exampleInputEmail1" name="imb" placeholder="Masukkan Nominal IMB">
                </div>

                 <div class="form-group">
                  <label>Status IMB</label>
                  <select class="form-control" name="status_imb">
                    <option>--Pilih Status--</option>
                    <option value="Belum diterima">Belum diterima</option>
                    <option value="Sudah diterima">Sudah diterima</option>
                    
                  </select>
                </div>

                <div class="form-group">
                  <label >Listrik</label>
                  <input type="number" class="form-control" id="exampleInputEmail1" name="listrik" placeholder="Masukkan Nominal Listrik">
                </div>

                 <div class="form-group">
                  <label>Status Listrik</label>
                  <select class="form-control" name="status_listrik">
                    <option>--Pilih Status--</option>
                    <option value="Belum diterima">Belum diterima</option>
                    <option value="Sudah diterima">Sudah diterima</option>
                    
                  </select>
                </div>

                <div class="form-group">
                  <label >Bestek</label>
                  <input type="number" class="form-control" id="exampleInputEmail1" name="bestek" placeholder="Masukkan Nominal Bestek">
                </div>

                 <div class="form-group">
                  <label>Status Bestek</label>
                  <select class="form-control" name="status_bestek">
                    <option>--Pilih Status--</option>
                    <option value="Belum diterima">Belum diterima</option>
                    <option value="Sudah diterima">Sudah diterima</option>
                    
                  </select>
                </div>



                
              <!-- /.box-body -->
              
                
              

              <div class="box-footer">
                <a class="btn btn-md btn-danger" href="<?php echo site_url('bendahara/unit_terjual');?>">Kembali</a>
                <button type="submit" class="btn btn-info pull-right">Simpan</button>
              </div>
              <!-- /.box-footer -->
            </form>

          </div>

         

        </div>
        <!--/.col (right) -->
      </div>
      <!-- /.row -->
    </section>
    <!-- /.content -->
  </div>