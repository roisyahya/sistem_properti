<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <h1>
        Data Tanah Efektif PT ENGGANG PROPERTINDO SAKTI
        
      </h1>
      <ol class="breadcrumb">
        <li><a href="#"><i class="fa fa-dashboard"></i> Home</a></li>
        <li><a href="#">Tanah Efektif</a></li>
      </ol>
    </section>

<section class="content">
      <div class="row">
        <div class="col-xs-12">

<div class="box">

  <br>

  
  <br>
           

            <!-- /.box-header -->
            <div class="box-body">
              <table id="example1" class="table table-bordered table-striped">
                <thead>
               <tr>
                  <th>No</th>
                  <th>Nama Unit</th>
                  <th>Blok/Nomor </th>
                  <th>LB/LT </th>
                  <th>Marketer </th>
                  <th>Status </th>
                  <th>Keterangan </th>
                  
                  
                  <th>Aksi</th>
                </tr>
                </thead>
                <tbody>
                  <?php
                  $no = 1;
                  foreach ($unit_terjual as $row) {
                    
                   
                    
                  ?>
               <tr>
                                            <td><?php echo $no++; ?></td>
                                            <td><?php echo $row->nama_unit; ?></td>
                                            <td><?php echo $row->blok;?> /<?php echo $row->nomor;?></td>
                                            <td><?php echo $row->luas_bangunan;?> / <?php echo $row->luas_tanah; ?> </td>
                                            <td><?php echo $row->nama; ?></td>
                                            <td><?php echo $row->status; ?></td>
                                            <td><?php echo $row->keterangan; ?></td>
                                            
                                            
                                            <td>
  
 
 
 
<a href="<?php echo site_url('bendahara/unit_terjual/input_pembayaran/'.$row->id_tanah_efektif);?>"><button class="btn btn-info" ><i class="glyphicon glyphicon-transfer"> Pembayaran</i></button></a>

                                            </td> 
                                       
                                        </tr>
    <?php
    }
    ?>

                

                
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

  <script type="text/javascript">

  var save_method;
  var table;

  $(document).ready(function() {


    
    $("input").change(function(){
        $(this).parent().parent().removeClass('has-error');
        $(this).next().empty();
    });
    $("textarea").change(function(){
        $(this).parent().parent().removeClass('has-error');
        $(this).next().empty();
    });
    $("select").change(function(){
        $(this).parent().parent().removeClass('has-error');
        $(this).next().empty();
    });

});


     


      
      }
      

  </script>


