 <div class="content-wrapper">
    <section class="content-header">
    <h1>
      Edit Data Pembayaran
    </h1>
    <ol class="breadcrumb">
        <li><a href="#"><i class="fa fa-dashboard"></i> Home</a></li>
        <li class="active">Bendahara</li>
        <li class="active">Edit Data Pembayaran</li>
    </ol>
</section>

<!-- Main content -->
<section class="content">
<div class="row">
        <div class="col-xs-12">

<div class="box">

     <ul class="nav nav-tabs">
      <br>
        
        <li class="active"><a href="#datadiri" data-toggle="tab">Booking Fee</a></li>
        <li><a href="#operasisar" data-toggle="tab">Biaya Lain-lain</a></li>
        <li><a href="#maksimalkpr" data-toggle="tab">Maksimal KPR</a></li>
        <li><a href="#diklatsar" data-toggle="tab">Uang Muka</a></li>
        </ul>
        
<div class="tab-content">

  <div class="tab-pane active" id="datadiri"> <br>

  <div class="row">
  <div class="col-xs-12">
    <div class="box">

            <!-- /.box-header -->
            <div class="box-body">
              <div class="panel panel-primary">
                  <div class="panel-heading">Booking Fee</div>
                      <div class="panel-body">

                        <form role="form" method="post" action="<?php echo site_url('bendahara/input_pembayaran/edit_pembayaran');?>">
                          
                          <table class="table table-hover">

                            <?php foreach ($edit_pembayaran as $key ) {  } ?>
                             
                            <tr>
                              <td width="150px">Id Pembayaran</td>
                              <td width="20px">:</td>
                              <td colspan="4" width="350px">
                                 <input type="text" class="form-control" id="exampleInputEmail1" name="id_pembayaran" value="<?php echo $key->id_pembayaran;?>" readonly style="width:30%;">
                              </td>                              
                            </tr>

                            
                           <tr>
                              <td width="150px">Id Tanah Efektif</td>
                              <td width="20px">:</td>
                              <td colspan="4" width="350px">
                                 <input type="number" class="form-control" id="" name="id_tanah_efektif" value="<?php echo $key->id_tanah_efektif;?>"  readonly style="width:30%;">
                              </td>                              
                            </tr>   

                             <tr>
                              <td width="150px">Tanggal Pembayaran</td>
                              <td width="20px">:</td>
                              <td colspan="4" width="350px"><input type="text" name="tgl_bayar" class="form-control" id="datepicker" style="width:30%;" value="<?php echo $key->tgl_bayar;?>"  ></td>                              
                            </tr>                      

                            <tr>
                              <td width="150px">Nama Pembeli</td>
                              <td width="20px">:</td>
                              <td colspan="4" width="350px"><input type="text" class="form-control" id="exampleInputEmail1" name="nama_pembeli" placeholder="Masukkan Nama Pembeli" value="<?php echo $key->nama_pembeli;?>" style="width:50%;"></td>                              
                            </tr>

                            

                             <tr>
                              <td width="150px">Booking Fee</td>
                              <td width="20px">:</td>
                              <td width="150px"><input type="number" class="form-control" id="exampleInputEmail1" name="booking_fee" placeholder="Masukkan Besar Booking Fee" value="<?php echo $key->booking_fee;?>" style="width:50%;"></td>
                            </tr>

                          </table>

                      </div>
                  </div>
            </div>
            <!-- /.box-body -->


          </div>
          <!-- /.box -->
        </div>
        <!-- /.col -->
      </div>
             
     </div>
          
        



  <!-- Tab Panel Skill -->
  <div class="tab-pane" id="operasisar">    
   <br>
  <div class="row">
  <div class="col-xs-12">
    <div class="box">

            <!-- /.box-header -->
            <div class="box-body">
              

              <div class="panel panel-primary">
                  <div class="panel-heading">Maksimal KPR</div>
                      <div class="panel-body">
                          <hr>

                           <table class="table table-bordered table-striped">
                            <tr>
                              <td width="150px">Diskon</td>
                              <td width="20px">:</td>
                              <td colspan="4" width="350px"><input type="number" class="form-control" id="exampleInputEmail1" name="diskon" value="<?php echo $key->diskon;?>"></td>                              
                            </tr>


                             <tr>
                              <td width="150px">Penambahan Uang Muka (dari plafon kredit)</td>
                              <td width="20px">:</td>
                              <td width="150px"><input type="number" class="form-control" id="exampleInputEmail1" name="penambahan_um" value="<?php echo $key->penambahan_um;?>"></td>
                              <td width="50px">Status Penambahan Uang Muka</td>
                              <td width="20px">:</td>
                              <td width="150px"> <select class="form-control" name="status_pum">
                                  <option value="Lunas" <?php if ($key->status_pum == "Lunas") {
                                    echo "selected='true'";
                                      } ?> />Lunas</option>
                                  <option value="Angsuran" <?php if ($key->status_pum == "Angsuran") {
                                    echo "selected='true'";
                                } ?> />Angsuran</option>
                                </select></td>                              
                            </tr>

                            <tr>
                              <td width="150px">Kelebihan Tanah</td>
                              <td width="20px">:</td>
                              <td width="150px"><input type="number" class="form-control" id="exampleInputEmail1" name="kelebihan_tanah" value="<?php echo $key->kelebihan_tanah;?>"></td>
                              <td width="50px">Status Kelebihan Tanah</td>
                              <td width="20px">:</td>
                              <td width="150px"><select class="form-control" name="status_kt">
                                  <option value="Lunas" <?php if ($key->status_kt == "Lunas") {
                                    echo "selected='true'";
                                      } ?> />Lunas</option>
                                  <option value="Angsuran" <?php if ($key->status_kt == "Angsuran") {
                                    echo "selected='true'";
                                } ?> />Angsuran</option>
                                </select></td>                              
                            </tr>

                             <tr>
                              <td width="150px">Biaya Lokasi Strategis</td>
                              <td width="20px">:</td>
                              <td width="150px"><input type="number" class="form-control" id="exampleInputEmail1" name="lokasi_strategis" value="<?php echo $key->lokasi_strategis;?>"></td>
                              <td width="50px">Status Pembayaran Biaya Lokasi Strategis</td>
                              <td width="20px">:</td>
                              <td width="150px"><select class="form-control" name="status_ls">
                                  <option value="Lunas" <?php if ($key->status_ls == "Lunas") {
                                    echo "selected='true'";
                                      } ?> />Lunas</option>
                                  <option value="Angsuran" <?php if ($key->status_ls == "Angsuran") {
                                    echo "selected='true'";
                                } ?> />Angsuran</option>
                                </select></td>                              
                            </tr>

                          </table>




                      </div>
                  </div>
            </div>
            <!-- /.box-body -->


          </div>
          <!-- /.box -->
        </div>
        <!-- /.col -->
      </div>
  </div>


  <div class="tab-pane" id="maksimalkpr">    
   <br>
  <div class="row">
  <div class="col-xs-12">
    <div class="box">

            <!-- /.box-header -->
            <div class="box-body">
              

              <div class="panel panel-primary">
                  <div class="panel-heading">Maksimal KPR</div>
                      <div class="panel-body">
                          <hr>

                          <table class="table table-hover">
                            <tr>
                              <td width="150px">Nominal MKR</td>
                              <td width="20px">:</td>
                              <td colspan="4" width="350px"><input type="number" class="form-control" id="exampleInputEmail1" name="mkr" value="<?php echo $key->mkr;?>" style="width:50%;"></td>                              
                            </tr>

                            <tr>
                              <td width="150px">Sertifikat</td>
                              <td width="20px">:</td>
                              <td colspan="4" width="350px"><input type="number" class="form-control" id="exampleInputEmail1" name="sertifikat" placeholder="Masukkan Nominal Sertifikat" style="width:50%;" value="<?php echo $key->sertifikat;?>"></td>                              
                            </tr>

                             <tr>
                              <td width="150px">Status Sertifikat</td>
                              <td width="20px">:</td>
                              <td colspan="4" width="350px">
                                <select class="form-control" name="status_sertifikat" style="width:50%;">                  
                                    <option value="Belum diterima" <?php if ($key->status_sertifikat == "Belum diterima") {
                                    echo "selected='true'";
                                    } ?> />Belum diterima</option>
                                   <option value="Sudah diterima" <?php if ($key->status_sertifikat == "Sudah diterima") {
                                   echo "selected='true'";
                              } ?>>Sudah diterima</option>
                                </select>
                            </td>                              
                            </tr>

                             <tr>
                              <td width="150px">IMB</td>
                              <td width="20px">:</td>
                              <td width="150px"><input type="number" class="form-control" id="exampleInputEmail1" name="imb" placeholder="Masukkan Nominal IMB"  style="width:100%;" value="<?php echo $key->imb;?>"></td>
                              <td width="50px">Status IMB</td>
                              <td width="20px">:</td>
                              <td width="150px">
                                <select class="form-control" name="status_imb">
                                  <option value="Belum diterima" <?php if ($key->status_imb == "Belum diterima") {
                                    echo "selected='true'";
                                      } ?> />Belum diterima</option>
                                  <option value="Sudah diterima" <?php if ($key->status_imb == "Sudah diterima") {
                                    echo "selected='true'";
                                } ?> />Sudah diterima</option>
                                </select>
                              </td>                              
                            </tr>

                            <tr>
                              <td width="150px">Listrik</td>
                              <td width="20px">:</td>
                              <td width="150px"><input type="number" class="form-control" id="exampleInputEmail1" name="listrik" value="<?php echo $key->listrik;?>"></td>
                              <td width="50px">Status Listrik</td>
                              <td width="20px">:</td>
                              <td width="150px">
                              <select class="form-control" name="status_listrik">
                                <option value="Belum diterima" <?php if ($key->status_listrik == "Belum diterima") {
                                echo "selected='true'";
                                } ?> />Belum diterima</option>
                                <option value="Sudah diterima" <?php if ($key->status_listrik == "Sudah diterima") {
                                echo "selected='true'";
                                } ?> />Sudah diterima</option>
                                </select>
                              </td>                              
                            </tr>


                            <tr>
                              <td width="150px">Bestek</td>
                              <td width="20px">:</td>
                              <td width="150px"><input type="number" class="form-control" id="exampleInputEmail1" name="bestek" value="<?php echo $key->bestek;?>"></td>
                              <td width="50px">Status Bestek</td>
                              <td width="20px">:</td>
                              <td width="150px">
                                <select class="form-control" name="status_bestek">
                                  <option value="Belum diterima" <?php if ($key->status_bestek == "Belum diterima") {
                                    echo "selected='true'";
                                      } ?> />Belum diterima</option>
                                  <option value="Sudah diterima" <?php if ($key->status_listrik == "Sudah diterima") {
                                    echo "selected='true'";
                                      } ?> />Sudah diterima</option>
                                </select>
                                </td>                              
                            </tr>




                             <tr>
                              <td width="150px"></td>
                              <td width="20px"></td>
                              <td colspan="4" width="350px"></td>                              
                            </tr>

                            <tr>
                              <td width="150px"></td>
                              <td width="20px"></td>
                              <td colspan="4" width="350px">
                              <button type="submit" class="btn btn-success"><i class="glyphicon glyphicon-saved">UBAH</i></button>
                              <a class="btn btn-md btn-danger" href="<?php echo site_url('bendahara/daftar_pemesanan');?>"><i class="glyphicon glyphicon-arrow-left">KEMBALI</i></a>
                            </td>                              
                            </tr>

                          </table>
                    </form>


                      </div>
                  </div>
            </div>
            <!-- /.box-body -->


          </div>
          <!-- /.box -->
        </div>
        <!-- /.col -->
      </div>
  </div>


          <div class="tab-pane" id="diklatsar">
<br>
 <div class="row">
  <div class="col-xs-12">
    <div class="box">

            <!-- /.box-header -->
            <div class="box-body">
              <div class="panel panel-primary">
                  <div class="panel-heading">UANG MUKA <?php echo $key->nama_pembeli;?></div>
                      <div class="panel-body">
                          

                          <table class="table table-hover">
                            <thead>
                              <tr>
                                <th>No</th>
                                <th>Tanggal Bayar</th>
                                <th>Nominal</th>
                              </tr>
                            </thead>
                               <tbody>
                                  <?php
                                  $no = 1;
                                  foreach ($cicilan_um as $row) {
                                  ?>
                              <tr>
                                  <td><?php echo $no++; ?></td>
                                  <td ><?php echo $row->tgl_bayar; ?></td>
                                  <td><?php echo $row->nominal_cicilan; ?></td>
                              </tr>                 
                                </tbody> <?php } ?>

                          </table><hr>

                          <h5 class="box-title"><b>Status Uang Muka Saat ini : <?php echo $key->status_um;?></b></h5> <br>

                          <div class="box-header with-border">
                              <h3 class="box-title">Update Pembayaran Uang Muka</h3> <br>
                              <h5 class="box-title"><i>* Untuk pembayaran jenis angsuran</i></h5>
                          </div>


                          <table class="table table-hover">



                            <?php foreach ($edit_pembayaran as $key ) {  } ?>

                            <form role="form" method="post" action="<?php echo site_url('bendahara/input_pembayaran/add_cicilan');?>">

                            <input type="hidden" class="form-control" id="exampleInputEmail1" name="id_pembayaran" value="<?php echo $key->id_pembayaran;?>" readonly>
                             
                             
                             <tr>
                              <td width="150px">Tanggal Pembayaran</td>
                              <td width="20px">:</td>
                              <td colspan="4" width="350px"><input type="text" name="tgl_bayar" class="form-control" id="datepicker1" style="width:70%;" ></td>                              
                            </tr>                      

                            <tr>
                              <td width="150px">Nominal Pembayaran</td>
                              <td width="20px">:</td>
                              <td colspan="4" width="350px"><input type="number" class="form-control" id="exampleInputEmail1" name="nominal_cicilan" placeholder="Masukkan Nominal Pembayaran" style="width:70%;"></td>                              
                            </tr>

                            

                             <tr>
                              <td width="150px">Cara Pembayaran Uang Muka</td>
                              <td width="20px">:</td>
                              <td width="150px"><select class="form-control" name="status_um" style="width:70%;">
                                                    <option>--Pilih Status--</option>
                                                    <option value="Lunas">Lunas</option>
                                                    <option value="Angsuran">Angsuran</option>
                                                </select></td>
                            </tr>

                             <tr>
                              <td width="150px"></td>
                              <td width="20px"></td>
                              <td width="150px"><button type="submit" class="btn btn-info pull-right">Update Pembayaran</button></td>
                            </tr>

                             

                          </table>
                        </form>


                      </div>
                   </div>
                </div>

          </div>
          <!-- /.box -->
        </div>
        <!-- /.col -->
      </div>
             
     </div>


      
</div>



  <!-- ================================================================================ -->



</section>
   
    <!-- /.content -->
  </div>