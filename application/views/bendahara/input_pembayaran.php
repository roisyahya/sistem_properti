 <div class="content-wrapper">
    <section class="content-header">
    <h1>
      Input Data Pembayaran
    </h1>
    <ol class="breadcrumb">
        <li><a href="#"><i class="fa fa-dashboard"></i> Home</a></li>
        <li class="active">Bendahara</li>
        <li class="active">Input Data Pembayaran</li>
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
        <li><a href="#diklatsar" data-toggle="tab">Uang Muka</a></li>
        <li><a href="#operasisar" data-toggle="tab">Maksimal KPR</a></li>
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

                        <form role="form" method="post" action="<?php echo site_url('bendahara/input_pembayaran/add_pembayaran');?>">
                          
                          <table class="table table-hover">
                            <tr>
                              <td width="150px">Id Pembayaran</td>
                              <td width="20px">:</td>
                              <td colspan="4" width="350px">
                                 <input type="text" class="form-control" id="exampleInputEmail1" name="id_pembayaran" value="<?php echo $id_pembayaran;?>" readonly style="width:30%;">
                              </td>                              
                            </tr>

                            <?php foreach ($id_tanah_efektif as $key ) {  } ?>

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
                              <td colspan="4" width="350px"><input type="text" name="tgl_bayar" class="form-control" id="datepicker" style="width:30%;"   ></td>                              
                            </tr>                      

                            <tr>
                              <td width="150px">Nama Pembeli</td>
                              <td width="20px">:</td>
                              <td colspan="4" width="350px"><input type="text" class="form-control" id="exampleInputEmail1" name="nama_pembeli" placeholder="Masukkan Nama Pembeli" style="width:50%;"></td>                              
                            </tr>

                            

                             <tr>
                              <td width="150px">Booking Fee</td>
                              <td width="20px">:</td>
                              <td width="150px"><input type="number" class="form-control" id="exampleInputEmail1" name="booking_fee" placeholder="Masukkan Besar Booking Fee" style="width:50%;"></td>
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
          
        
    <div class="tab-pane" id="diklatsar">
     

<br>
 <div class="row">
  <div class="col-xs-12">
    <div class="box">

            <!-- /.box-header -->
            <div class="box-body">
              <div class="panel panel-primary">
                  <div class="panel-heading">UANG MUKA</div>
                      <div class="panel-body">
                          

                          <table class="table table-hover">
                            <tr>
                              <td width="150px">Uang Muka</td>
                              <td width="20px">:</td>
                              <td colspan="4" width="350px"><input type="number" class="form-control" id="exampleInputEmail1" name="uang_muka" placeholder="Masukkan Besar Uang Muka" style="width:50%;"></td>                              
                            </tr>

                            <tr>
                              <td width="150px">Cara Pembayaran Uang Muka</td>
                              <td width="20px">:</td>
                              <td colspan="4" width="350px">
                                    <select class="form-control" name="status_um" style="width:50%;">
                                      <option>--Pilih Status--</option>
                                      <option value="Lunas">Lunas</option>
                                      <option value="Angsuran">Angsuran</option>
                                    </select>
                              </td>                              
                            </tr>

                            <tr>
                              <td width="150px">Diskon</td>
                              <td width="20px">:</td>
                              <td colspan="4" width="350px"><input type="number" class="form-control" id="exampleInputEmail1" name="diskon" placeholder="Masukkan Besar Diskon (Jika Ada)" style="width:50%;"></td>                              
                            </tr>


                             <tr>
                              <td width="150px">Penambahan Uang Muka (dari plafon kredit)</td>
                              <td width="20px">:</td>
                              <td width="150px"><input type="number" class="form-control" id="exampleInputEmail1" name="penambahan_um" placeholder="Masukkan Besar Penambahan Uang Muka (Jika Ada)" style="width:100%;"></td>
                              <td width="50px">Status Penambahan Uang Muka</td>
                              <td width="20px">:</td>
                              <td width="150px"><select class="form-control" name="status_pum" style="width:70%;">
                                  <option>--Pilih Status--</option>
                                  <option value="Lunas">Lunas</option>
                                  <option value="Angsuran">Angsuran</option>
                                  
                                </select></td>                              
                            </tr>

                             <tr>
                              <td width="150px">Kelebihan Tanah</td>
                              <td width="20px">:</td>
                              <td width="150px"><input type="number" class="form-control" id="exampleInputEmail1" name="kelebihan_tanah" placeholder="Masukkan Biaya Kelebihan (Jika Ada)"></td>
                              <td width="50px">Status Pembayaran Kelebihan Tanah</td>
                              <td width="20px">:</td>
                              <td width="150px"><select class="form-control" name="status_kt" style="width:70%;">
                                  <option>--Pilih Status--</option>
                                  <option value="Lunas">Lunas</option>
                                  <option value="Angsuran">Angsuran</option>
                                  
                                </select></td>                              
                            </tr>


                            <tr>
                              <td width="150px">Kelebihan Tanah</td>
                              <td width="20px">:</td>
                              <td width="150px"><input type="number" class="form-control" id="exampleInputEmail1" name="kelebihan_tanah" placeholder="Masukkan Besar Penambahan Uang Muka (Jika Ada)" style="width:100%;"></td>
                              <td width="50px">Status Kelebihan Tanah</td>
                              <td width="20px">:</td>
                              <td width="150px"><select class="form-control" name="status_kt" style="width:70%;">
                                  <option>--Pilih Status--</option>
                                  <option value="Lunas">Lunas</option>
                                  <option value="Angsuran">Angsuran</option>
                                  
                                </select></td>                              
                            </tr>

                             <tr>
                              <td width="150px">Biaya Lokasi Strategis</td>
                              <td width="20px">:</td>
                              <td width="150px"><input type="number" class="form-control" id="exampleInputEmail1" name="lokasi_strategis" placeholder="Masukkan Biaya Lokasi Strategis (Jika Ada)"></td>
                              <td width="50px">Status Pembayaran Biaya Lokasi Strategis</td>
                              <td width="20px">:</td>
                              <td width="150px"><select class="form-control" name="status_ls" style="width:70%;">
                                  <option>--Pilih Status--</option>
                                  <option value="Lunas">Lunas</option>
                                  <option value="Angsuran">Angsuran</option>
                                  
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

                          <table class="table table-hover">
                            <tr>
                              <td width="150px">Nominal MKR</td>
                              <td width="20px">:</td>
                              <td colspan="4" width="350px"><input type="number" class="form-control" id="exampleInputEmail1" name="mkr" placeholder="Masukkan Nominal MKR" style="width:50%;"></td>                              
                            </tr>

                            <tr>
                              <td width="150px">Sertifikat</td>
                              <td width="20px">:</td>
                              <td colspan="4" width="350px"><input type="number" class="form-control" id="exampleInputEmail1" name="sertifikat" placeholder="Masukkan Nominal Sertifikat" style="width:50%;"></td>                              
                            </tr>

                             <tr>
                              <td width="150px">Status Sertifikat</td>
                              <td width="20px">:</td>
                              <td colspan="4" width="350px"><select class="form-control" name="status_sertifikat" style="width:50%;">
                                  <option>--Pilih Status--</option>
                                  <option value="Belum diterima">Belum diterima</option>
                                  <option value="Sudah diterima">Sudah diterima</option>                                  
                                </select>
                            </td>                              
                            </tr>

                             <tr>
                              <td width="150px">IMB</td>
                              <td width="20px">:</td>
                              <td width="150px"><input type="number" class="form-control" id="exampleInputEmail1" name="imb" placeholder="Masukkan Nominal IMB"  style="width:100%;"></td>
                              <td width="50px">Status IMB</td>
                              <td width="20px">:</td>
                              <td width="150px"><select class="form-control" name="status_imb">
                                  <option>--Pilih Status--</option>
                                  <option value="Belum diterima">Belum diterima</option>
                                  <option value="Sudah diterima">Sudah diterima</option>                                  
                                </select></td>                              
                            </tr>

                            <tr>
                              <td width="150px">Listrik</td>
                              <td width="20px">:</td>
                              <td width="150px"><input type="number" class="form-control" id="exampleInputEmail1" name="listrik" placeholder="Masukkan Nominal Listrik"></td>
                              <td width="50px">Status Listrik</td>
                              <td width="20px">:</td>
                              <td width="150px"><select class="form-control" name="status_listrik">
                                  <option>--Pilih Status--</option>
                                  <option value="Belum diterima">Belum diterima</option>
                                  <option value="Sudah diterima">Sudah diterima</option>                                  
                                </select></td>                              
                            </tr>


                            <tr>
                              <td width="150px">Bestek</td>
                              <td width="20px">:</td>
                              <td width="150px"><input type="number" class="form-control" id="exampleInputEmail1" name="bestek" placeholder="Masukkan Nominal Bestek"></td>
                              <td width="50px">Status Bestek</td>
                              <td width="20px">:</td>
                              <td width="150px"><select class="form-control" name="status_bestek">
                                  <option>--Pilih Status--</option>
                                  <option value="Belum diterima">Belum diterima</option>
                                  <option value="Sudah diterima">Sudah diterima</option>                                  
                                </select></td>                              
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
                              <button type="submit" class="btn btn-success"><i class="glyphicon glyphicon-saved">SIMPAN</i></button>
                              <a class="btn btn-md btn-danger" href="<?php echo site_url('bendahara/unit_terjual');?>"><i class="glyphicon glyphicon-arrow-left">Kembali</i></a>
                            </td>                              
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


      
</div>



  <!-- ================================================================================ -->



</section>
   
    <!-- /.content -->
  </div>