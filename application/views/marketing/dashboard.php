  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <h1>
        Dashboard Bendahara PT ENGGANG PROPERTINDO SAKTI
        
      </h1>
      <ol class="breadcrumb">
        <li><a href="#"><i class="fa fa-dashboard"></i> Home</a></li>
        <li class="active">Dashboard</li>
      </ol>
    </section>

    <!-- Main content -->
    <section class="content">
      <!-- Small boxes (Stat box) -->
      <div class="row">
        <div class="col-lg-3 col-xs-6">
          <!-- small box -->

          <div class="small-box bg-aqua">
            <div class="inner">
            <h3> 

      

           

          <!-- fix for small devices only -->
       
  <table class="table table-bordered">
  <tr>
  	<td rowspan=4 width="50%">

  	 <div class="pull-left image">
          
          <?php 
                $rows = $this->db->query("SELECT * FROM user WHERE username='".$this->session->username."'")->row_array();
                  
                  if ($rows ==1) {
                  echo"  
                <img src='".base_url('upload/'.$rows['photo'])."' class='img-circle' alt='User Image'>";  
                } else {
                  echo"  
                <img src='".base_url('upload/a.jpg')."' class='img-circle' alt='User Image'>";
                } 

                ?>
        </div>

    </td>
  	<td>Nama</td>
  	<td><?php echo $rows['nama']; ?></td>
  	
  </tr>

  <tr>
  	<td>Jabatan</td>
  	<td><?php echo $rows['jabatan']; ?></td>
  	
  </tr>

 
  	
  </tr>

</table>


       

    </section>
    <!-- /.content -->
  </div>
  <!-- /.content-wrapper -->