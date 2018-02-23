<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <h1>
        Daftar Tanah Efektif PT ENGGANG PROPERTINDO SAKTI
        
      </h1>
      <ol class="breadcrumb">
        <li><a href="#"><i class="fa fa-dashboard"></i> Home</a></li>
        <li><a href="#">Pemakaian Tanah</a></li>
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
                  <th>Nama Proyek</th>
                  <th>Luas </th>
                  <th>Luas Sisa</th>
                  <th>Detail</th>
                </tr>
                </thead>
                <tbody>
                  <?php
                  $no = 1;
                  foreach ($tanah_efektif as $row) {
                    
                   
                    
                  ?>
               <tr>
                                            <td><?php echo $no++; ?></td>
                                            <td ><?php echo $row->nama_proyek; ?></td>
                                            <td><?php echo $row->luas_dipakai; ?></td>
                                            <td><?php echo $row->luas_sisa_dipakai; ?></td>
           
                                            
                                            <td>
  
  
   <a class="btn btn-info" href="<?php echo site_url('developer/daftar_tanah_efektif/detail_tanah_efektif/'.$row->id_pemakaian);?>"><i class="glyphicon glyphicon-info-sign"></i> Info</a>
 


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

  