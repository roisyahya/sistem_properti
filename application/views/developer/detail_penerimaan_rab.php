<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <h1>
        Daftar RAB PT ENGGANG PROPERTINDO SAKTI
        
      </h1>
      <ol class="breadcrumb">
        <li><a href="#"><i class="fa fa-dashboard"></i> Home</a></li>
        <li><a href="#">Daftar RAB</a></li>
      </ol>
    </section>

<section class="content">
      <div class="row">
        <div class="col-xs-12">

<div class="box">

  <br>

  
  <br>
  <br>
           

            <!-- /.box-header -->
          


<div class="box-body">
              <table id="" class="table table-bordered table-striped">
                <thead>
                  <th colspan="6" class="info">TANAH MATANG</th>
                 <tr>
                  
                  <th>Keterangan</th>
                  <th>Total</th>
                </tr>

                </thead>
                <tbody>
                  
                    
               <tr>
                <td>Pematangan Tanah</td>                            
                <td><?php
                $id = $this->uri->segment(4);
      $total_semua = $this->db->query("SELECT sum(total) AS total_semua FROM rab_pematangan_tanah WHERE id_wilayah='$id'")->row_array();
      $total_pematangan =$total_semua['total_semua'];
      $total_pematangan_format =  number_format($total_pematangan,2,",",".");
       echo $total_pematangan_format;?></td> 
              </tr>

              <tr>
                <td>Sarana</td>                            
                <td><?php
                $total_semua = $this->db->query("SELECT sum(total) AS total_semua FROM rab_sarana WHERE id_wilayah='$id'")->row_array();
      $total_sarana = $total_semua['total_semua'];
      $total_sarana_format =  number_format($total_sarana,2,",",".");
       echo $total_sarana_format;?></td> 
              </tr>
              
              <tr>
                <td>Prasarana</td>                            
                <td><?php 
                $total_semua = $this->db->query("SELECT sum(total) AS total_semua FROM rab_prasarana  WHERE id_wilayah='$id'")->row_array();
      $total_prasarana = $total_semua['total_semua'];
      $total_prasarana_format =  number_format($total_prasarana,2,",",".");
      echo $total_prasarana_format;?></td> 
              </tr>

               <tr>
                <td>Operasional</td>                            
                <td><?php 
                 $total_semua = $this->db->query("SELECT sum(total) AS total_semua FROM rab_operasional WHERE id_wilayah='$id'")->row_array();
      $total_operasional = $total_semua['total_semua'];
      $total_operasional_format =  number_format($total_operasional,2,",",".");
      echo $total_operasional_format;?></td> 
              </tr>

               <tr>
                <td>Jumlah</td>                            
                <td><?php
                  $jumlah = $total_pematangan + $total_sarana + $total_prasarana + $total_operasional;
                  echo number_format($jumlah,2,",","."); 
                ?></td> 
              </tr>

               <tr>
                <td>Harga Tanah Efektif</td>                            
                <td>
                  <?php
                   $total_semua = $this->db->query("SELECT sum(luas) AS total_semua FROM rab_jumlah_unit WHERE id_wilayah='$id'")->row_array();
      $total_luas =$total_semua['total_semua'];
      
                    $tanah_efektif = $jumlah /  $total_luas;
                    echo number_format($tanah_efektif,2,",","."); 

                  ?></td> 
              </tr>


                                         



    </tbody>





      <tfoot>
         <thead>

         


      
    </thead>
      </tfoot>

              </table>
            </div>
     

  <div class="box-body">
              <table id="" class="table table-bordered table-striped">
                <thead>
                  <th colspan="6" class="info">TARGET PENJUALAN</th>
                 

                </thead>
                <tbody>
                  
                    
               <tr>

                 <?php
                  $no = 1;
                  foreach ($konstruksi as $row) { ?>
                <td colspan="2" class="success"><b><?php echo $row->type;?></b></td>   
                </tr>
                
                <tr>
                  <td>Tanah Matang</td>
                  <td><?php 
                       $luas_tanah = $row->luas_tanah;
                       $harga_meter = $row->harga_meter;
                       $jml_tanah = $luas_tanah * $tanah_efektif;
                       echo number_format($jml_tanah,2,",",".");
                        ?></td>
                </tr>

                <tr>
                  <td>Bangunan</td>
                  <td><?php 
                       $luas = $row->luas;
                       $harga_meter = $row->harga_meter;
                       $jml_bang = $luas * $harga_meter;
                       echo number_format($jml_bang,2,",",".");
                        ?></td>
                </tr>

                <tr>
                  <td>Jumlah</td>
                  <td><?php
                  $jml = $jml_bang + $jml_tanah;
                  echo number_format($jml,2,",",".");
                  ?></td>
                </tr>

                <tr>
                  <td>Laba yang diharap</td>
                  <td><?php
                    $laba = $row->laba_diharap;
                    $laba_diharap = $laba * $jml;
                    echo number_format($laba_diharap,2,",",".");

                  ?></td>
                </tr>

                <tr>
                  <td class="warning">Harga Jual</td>
                  <td class="warning"><?php
                    $harga_jual = $jml + $laba_diharap;
                    echo number_format($harga_jual,2,",",".");

                  ?></td>
                </tr>

                <tr>
                  <td class="warning">Dibulatkan</td>
                  <td class="warning"><?php 
                      $harga_bulat = ceil($harga_jual);
                      if (substr($harga_bulat,-5)>99000) {
                        $hargabulat = round($harga_bulat,-5);
                      } else {
                        $hargabulat = round($harga_bulat,-5);
                      }

                      echo number_format($hargabulat,2,',','.');
                      ?></td>
                </tr>

               

                <tr>
                  <td>PPn</td>
                  <td><?php
                      $ppn = $row->ppn;
                      $ppn_ = $ppn * $hargabulat;
                      echo number_format($ppn_,2,',','.');
                  ?></td>
                </tr>

                <tr>
                  <td>BPHTB</td>
                  <td><?php
                  $bphtb = $row->bphtb;
                  $bphtb_ = ($hargabulat - 60000000) * $bphtb;
                  echo number_format($bphtb_,2,',','.');
                  ?></td>
                </tr>

                <tr>
                  <td>PPh</td>
                  <td><?php
                      $pph = $row->pph;
                      $pph_ = $pph * $hargabulat;
                      echo number_format($pph_,2,',','.');
                  ?></td>
                </tr>

               

                <tr>
                  <td>Total Harga Jual</td>
                  <td><?php
                  $total_semua = $hargabulat + $ppn_ + $bphtb_ + $pph_;
                  echo number_format($total_semua,2,',','.'); ?></td>
                </tr>
                <?php }?>
              



                                         



    </tbody>





      <tfoot>
         <thead>

         


      
    </thead>
      </tfoot>

              </table>
            </div>

            <div class="box-body">
              <table id="" class="table table-bordered table-striped">

                <thead>
                  <th colspan="7" class="info">PENERIMAAN</th>
                 <tr>
                 <th>No</th>
                  <th>Tipe</th>
                  <th>Luas Bangunan </th>
                  <th>Luas Tanah</th>
                  <th>Unit</th>
                  <th>Harga</th>
                  <th>Total</th>
                </tr>

                </thead>
                <tbody>
                  <?php
                  




                  $no = 1;
                  foreach ($konstruksi as $row) { ?>
                 
               <tr>
                                            
                                          <td><?php echo $no++; ?></td>
                                            <td><?php echo $row->type; ?></td>
                                            <td><?php echo $row->luas; ?></td>
                                            <td><?php echo $row->luas_tanah; ?></td>
                                            <td><?php echo $row->unit; ?></td>

                                             <td><?php 

                                                $luas_tanah = $row->luas_tanah;
                                                $harga_meter = $row->harga_meter;
                                                $jml_tanah = $luas_tanah * $tanah_efektif;
                                                $luas = $row->luas;
                                                $harga_meter = $row->harga_meter;
                                                $jml_bang = $luas * $harga_meter;
                                                $jml = $jml_bang + $jml_tanah;
                                                $laba = $row->laba_diharap;
                                                $laba_diharap = $laba * $jml;
                                                $harga_jual = $jml + $laba_diharap;
                                                $harga_bulat = ceil($harga_jual);
                                                if (substr($harga_bulat,-5)>99000) {
                                                $hrgbulat = round($harga_bulat,-5);
                                                } else {
                                                $hrgbulat = round($harga_bulat,-5);
                                                }
                                                echo number_format($hrgbulat,2,",","."); ?></td>

                                                <td><?php $unit = $row->unit;
                                                          $total = $unit * $hrgbulat;
                                                $total_format = number_format($total,2,",","."); 
                                                echo $total_format; ?></td>

                                            
                                       
                                        </tr>
                                         



     <?php
    }
    ?>
    </tbody>





      <tfoot>
         <thead>

         <tr>
      <th colspan="5"></th>

      <th class="info">Jumlah </th>

      <th class="info">
      <?php
        
        $total_semuanya = 70744500000 + 11771200000+ 18389000000+ 8265600000;
        echo number_format($total_semuanya,2,",",".");




      ?>


      </th>
                      
      </tr>



      <tr>
      <th colspan="5"></th>

      <th class="info">Jumlah dipotong fee marketing (4%)</th>

      <th class="info">
      <?php
        
        $total_fee = (70744500000 + 11771200000+ 18389000000+ 8265600000) * 0.04;
        $setelah_fee = $total_semuanya - $total_fee;
        echo number_format($setelah_fee,2,",",".");




      ?>


      </th>
                      
      </tr>


      
    </thead>
      </tfoot>

              </table>
            </div>


  <div class="box-body">
              <table id="" class="table table-bordered table-striped">
                <thead>
                  <th colspan="6" class="info">PERHITUNGAN LABA DAN RUGI</th>
                 <tr>
                  
                  <th>Keterangan</th>
                  <th>Total</th>
                </tr>

                </thead>
                <tbody>
                  
                    

      <tr>
      <td>PENERIMAAN</td>                            
      <td>
      <?php
      echo number_format($setelah_fee,2,",",".");
      ?></td>   
      </tr>


      <tr>
      <td>PENGELUARAN</td>                            
      <td><?php 

      $total_semua = $this->db->query("SELECT sum(total) AS total_semua FROM rab_konstruksi WHERE id_wilayah='$id'")->row_array();
      $total_konstruksi = $total_semua['total_semua'];
      $total_konstruksi_format =  number_format($total_konstruksi,2,",",".");

      $pengeluaran = $jumlah +$total_konstruksi;
      echo number_format($pengeluaran,2,",",".");
      ?></td> 
      </tr>

       <tr>
      <td>LABA</td>                            
      <td>
      <?php
      $laba = $setelah_fee - $pengeluaran;
      echo number_format($laba,2,",",".");
      ?></td>   
      </tr>

             
               


                                         



    </tbody>





      <tfoot>
         <thead>

         


      
    </thead>
      </tfoot>

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

  