<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <h1>
        Daftar Penerimaan PT ENGGANG PROPERTINDO SAKTI
        
      </h1>
      <ol class="breadcrumb">
        <li><a href="#"><i class="fa fa-dashboard"></i> Home</a></li>
        <li><a href="#">Daftar Penerimaan</a></li>
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
              <table id="example1" class="table table-bordered table-striped">
                <thead>
                <tr>
                  <th>No</th>
                  <th>Nama Tanah </th>
                  <th>Lokasi</th>
                  <th>Luas (m2) </th>
                  <th>Detail</th>
                </tr>
                </thead>
                <tbody>
                  <?php
                  $no = 1;
                  foreach ($data_rab as $row) {
                    
                   
                    
                  ?>
               <tr>
                                            <td><?php echo $no++; ?></td>
                                            <td ><?php echo $row->nama_tanah; ?></td>
                                            <td><?php echo $row->lokasi; ?></td>
                                            <td><?php echo $row->luas; ?></td>
                                            <td>
  
  
   <a class="btn btn-info" href="<?php echo site_url('developer/penerimaan_rab/detail_penerimaan_rab/'.$row->id_wilayah);?>"><i class="glyphicon glyphicon-info-sign"></i> Info</a>
 


                                            </td> 
                                       
                                        </tr>
    <?php
    }
    ?>

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

  