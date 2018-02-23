 <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <h1>
       Edit Account Biaya Kantor
        
      </h1>
      <ol class="breadcrumb">
        <li><a href="#"><i class="fa fa-dashboard"></i> Home</a></li>
        <li><a href="#">Edit Account Biaya Kantor</a></li>
        
      </ol>
    </section>

    <!-- Main content -->
    <section class="content">
      <div class="row">
        <!-- left column -->
         <div class="col-md-12">
          <!-- Horizontal Form -->
          <div class="box box-info">
            <div class="box-header with-border">
              <h3 class="box-title"></h3>
            </div>
            <!-- /.box-header -->
            <!-- form start -->

            <form class="form-horizontal" method="post" action="<?php echo site_url('bendahara/account_biaya_kantor/proses_edit_account_biaya_kantor');?>">
            	<?php foreach ($edit_account_biaya_kantor as $key ) {   ?>
          		

              <div class="box-body">
                <div class="form-group">
                  <label for="inputEmail3" class="col-sm-2 control-label">Kode Account</label>
                  <div class="col-sm-6">
                    <input type="text" name="kode_account" class="form-control" value="<?php echo $key->kode_account; ?>" >
                  </div>
                </div>

                

               
                <div class="form-group">
                  <label for="inputEmail3" class="col-sm-2 control-label" >Keterangan</label>

                  <div class="col-sm-6">
                    <input type="text" name="keterangan" class="form-control" value="<?php echo $key->keterangan; ?>">
                  </div>
                </div>

                


            	<?php }   	?>

              <!-- /.box-body -->
              <div class="box-footer">
                <a class="btn btn-md btn-danger" href="<?php echo site_url('bendahara/account_biaya_kantor');?>">Kembali</a>
                <button type="submit" class="btn btn-info pull-right">Ubah</button>
              </div>
              <!-- /.box-footer -->

            </form>
          </div>
          </div>



      </div>
      <!-- /.row -->
    </section>
    <!-- /.content -->
  </div>