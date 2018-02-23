<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <h1>
        Data RAB PT ENGGANG PROPERTINDO SAKTI
        
      </h1>
      <ol class="breadcrumb">
        <li><a href="#"><i class="fa fa-dashboard"></i> Home</a></li>
        <li><a href="#">Data RAB</a></li>
      </ol>
    </section>

<section class="content">
      <div class="row">
        <div class="col-xs-12">

<div class="box">

  
           

            <!-- /.box-header -->
            <div class="box-body">
              <table id="" class="table table-bordered table-striped">
                <thead>
                
                <tr>
                  <th colspan="6" class="info">LAND USED</th>
                </tr>

                	
                 <tr>
                  <th>No</th>
                  <th>Land Used</th>
                  <th>% Tanah</th>
                  <th>Luas</th>
                  <th>% Persen</th>
                  <th>Luas</th>
                </tr>

                </thead>
                <tbody>
                  <?php
                  $no = 1;
                  foreach ($data_rab as $row) {
                    
                   
                    
                  ?>
               <tr>
                                            <td><?php echo $no++; ?></td>
                                            <td ><?php echo $row->land_used; ?></td>
                                            <td ><?php echo $row->per_luas_tanah; ?></td>
                                            <td ><?php echo $row->luas; ?></td>
                                            <td ><?php echo $row->per_luas_tanah_1; ?></td>
                                            <td ><?php echo $row->luas1; ?></td>
                                       
                                        </tr>
                                         



    <?php
    }
    ?>
    </tbody>





      <tfoot>
         <thead>
      
    </thead>
      </tfoot>

              </table>
            </div>

    <!--Tabel Jumlah Unit-->
      

     <div class="box-body">
              <table id="" class="table table-bordered">
                <thead>
                  
                  <tr>
                  <th colspan="6" class="info">JUMLAH UNIT OK</th>
                </tr>
                 <tr>
                  <th>No</th>
                  <th>Land Used</th>
                  <th>% Tanah</th>
                  <th>Luas</th>
                  <th>% Persen</th>
                  <th>Luas</th>
                </tr>

                </thead>
                <tbody>
                  <?php
                  $no = 1;
                  foreach ($jml_unit as $r) { ?>
                 
               <tr>
                                            <td><?php echo $no++; ?></td>
                                            <td><?php echo $r->type; ?></td>
                                            <td><?php echo $r->persen_tanah; ?></td>
                                            <td><?php echo $r->luas; ?></td>
                                            <td><?php echo $r->tanah; ?></td>
                                            <td><?php echo $r->jumlah; ?></td>
                                       
                                        </tr>
                                         



     <?php
    }
    ?>
    </tbody>





      <tfoot>
         <thead>

           <tr>
      

      <th > </th>
      <th class="info">Jumlah </th>
      <th class="info">
      <?php
      $id = $this->uri->segment(4);
      $total_semua = $this->db->query("SELECT sum(persen_tanah) AS total_semua FROM rab_jumlah_unit WHERE id_wilayah='$id'")->row_array();
      $total_jumlah_unit =$total_semua['total_semua'];
      $total_jumlah_unit_format =  number_format($total_jumlah_unit,2,",",".");
      echo $total_jumlah_unit_format;


      ?>


      </th>

      <th class="info">
      <?php
      $total_semua = $this->db->query("SELECT sum(luas) AS total_semua FROM rab_jumlah_unit WHERE id_wilayah='$id'")->row_array();
      $total_luas =$total_semua['total_semua'];
      $total_luas_format =  number_format($total_luas,2,",",".");
      echo $total_luas_format;


      ?>


      </th>
          
      </tr>


      
    </thead>
      </tfoot>

              </table>
            </div>
     <!-- /.box-body -->

     <div class="box-body">
              <table id="" class="table table-bordered table-striped">
                <thead>
                  <th colspan="6" class="info">PEMATANGAN TANAH</th>
                 <tr>
                  <th>No</th>
                  <th>Keterangan</th>
                  <th>Kuantitas </th>
                  <th>Harga</th>
                  <th>Total</th>
                </tr>

                </thead>
                <tbody>
                  <?php
                  $no = 1;
                  foreach ($pematangan as $row) { ?>
                 
               <tr>
                                            <td><?php echo $no++; ?></td>
                                            <td><?php echo $row->keterangan; ?></td>

                                            <td><?php $kuantitas = $row->kuantitas;
                                                $kuantitas_format = number_format($kuantitas,2,",","."); 
                                                echo $kuantitas_format; ?></td>

                                            <td><?php $angka = $row->harga;
                                                $angka_format = number_format($angka,2,",",".");
                                                echo $angka_format; ?></td>

                                            <td><?php $total =  $row->total;
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
      <th colspan="3"></th>

      <th class="info">Jumlah </th>
      <th class="info">
      <?php
      $total_semua = $this->db->query("SELECT sum(total) AS total_semua FROM rab_pematangan_tanah WHERE id_wilayah='$id'")->row_array();
      $total_pematangan =$total_semua['total_semua'];
      $total_pematangan_format =  number_format($total_pematangan,2,",",".");
      echo $total_pematangan_format;


      ?>


      </th>
          
      </tr>

      
    </thead>
      </tfoot>

              </table>
            </div>


     
     <!-- /.box-body -->

     <div class="box-body">
              <table id="" class="table table-bordered table-striped">
                <thead>
                  <th colspan="6" class="info">SARANA</th>
                 <tr>
                  <th>No</th>
                  <th>Keterangan</th>
                  <th>Kuantitas </th>
                  <th>Harga</th>
                  <th>Total</th>
                </tr>

                </thead>
                <tbody>
                  <?php
                  $no = 1;
                  foreach ($sarana as $row) { ?>
                 
               <tr>
                                            
                                            <td><?php echo $no++; ?></td>
                                            <td><?php echo $row->keterangan; ?></td>

                                            <td><?php $kuantitas = $row->kuantitas;
                                                $kuantitas_format = number_format($kuantitas,2,",","."); 
                                                echo $kuantitas_format; ?></td>

                                            <td><?php $angka = $row->harga;
                                                $angka_format = number_format($angka,2,",",".");
                                                echo $angka_format; ?></td>

                                            <td><?php $total =  $row->total;
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
      <th colspan="3"></th>

      <th class="info">Jumlah </th>
      <th class="info">
      <?php
      $total_semua = $this->db->query("SELECT sum(total) AS total_semua FROM rab_sarana WHERE id_wilayah='$id'")->row_array();
      $total_sarana = $total_semua['total_semua'];
      $total_sarana_format =  number_format($total_sarana,2,",",".");
      echo $total_sarana_format;


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
                  <th colspan="6" class="info">PRASARANA</th>
                 <tr>
                  <th>No</th>
                  <th>Keterangan</th>
                  <th>Kuantitas </th>
                  <th>Harga</th>
                  <th>Total</th>
                </tr>

                </thead>
                <tbody>
                  <?php
                  $no = 1;
                  foreach ($prasarana as $row) { ?>
                 
               <tr>
                                            
                                           <td><?php echo $no++; ?></td>
                                            <td><?php echo $row->keterangan; ?></td>

                                            <td><?php $kuantitas = $row->kuantitas;
                                                $kuantitas_format = number_format($kuantitas,2,",","."); 
                                                echo $kuantitas_format; ?></td>

                                            <td><?php $angka = $row->harga;
                                                $angka_format = number_format($angka,2,",",".");
                                                echo $angka_format; ?></td>

                                            <td><?php $total =  $row->total;
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
      <th colspan="3"></th>

      <th class="info">Jumlah </th>
      <th class="info">
      <?php
      $total_semua = $this->db->query("SELECT sum(total) AS total_semua FROM rab_prasarana  WHERE id_wilayah='$id'")->row_array();
      $total_prasarana = $total_semua['total_semua'];
      $total_prasarana_format =  number_format($total_prasarana,2,",",".");
      echo $total_prasarana_format;


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
                  <th colspan="7" class="info">KONSTRUKSI</th>
                 <tr>
                  <th>No</th>
                  <th>Tipe</th>
                  <th>Luas </th>
                  <th>Unit</th>
                  <th>Harga per meter</th>
                  <th>Harga </th>
                  <th>Total </th>
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
                                            <td><?php echo $row->unit; ?></td>
                                             <td><?php $harga_meter = $row->harga_meter;
                                                $harga_meter_format = number_format($harga_meter,2,",","."); 
                                                echo $harga_meter_format; ?></td>

                                            <td><?php $harga = $row->harga;
                                                $harga_format = number_format($harga,2,",","."); 
                                                echo $harga_format; ?></td>

                                             <td><?php $total = $row->total;
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
      $total_semua = $this->db->query("SELECT sum(total) AS total_semua FROM rab_konstruksi WHERE id_wilayah='$id'")->row_array();
      $total_konstruksi = $total_semua['total_semua'];
      $total_konstruksi_format =  number_format($total_konstruksi,2,",",".");
      echo $total_konstruksi_format;


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
                  <th colspan="6" class="info">OPERASIONAL</th>
                 <tr>
                  <th>No</th>
                  <th>Keterangan</th>
                  <th>Total</th>
                </tr>

                </thead>
                <tbody>
                  <?php
                  $no = 1;
                  foreach ($operasional as $row) { ?>
                 
               <tr>
                                            
                                           <td><?php echo $no++; ?></td>

                                             <td><?php echo $row->keterangan; ?></td>

                                            <td><?php $total = $row->total;
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
      <th colspan="1"></th>

      <th class="info">Jumlah </th>
      <th class="info">
      <?php
      $total_semua = $this->db->query("SELECT sum(total) AS total_semua FROM rab_operasional WHERE id_wilayah='$id'")->row_array();
      $total_operasional = $total_semua['total_semua'];
      $total_operasional_format =  number_format($total_operasional,2,",",".");
      echo $total_operasional_format;


      ?>


      </th>
                      
      </tr>


      
    </thead>
      </tfoot>

              </table>
            </div>
   

  



          </div>
          <!-- /.box -->
        </div>
        <!-- /.col -->
      </div>
      <!-- /.row -->
    </section>
    <!-- /.content -->
  </div>