  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <h1>
        Dashboard Developer Sistem Informasi Properti PT ENGGANG PROPERTINDO SAKTI
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
              <?php 
            $this->db->from('detail_tanah');
            echo $this->db->count_all_results();
            ?>
            </h3>

              <p>Tanah Mentah</p>
            </div>
            <div class="icon">
              <i class="ion-person"></i>
            </div>
            <a href="<?php echo base_url('developer/data_pelanggan');?>" class="small-box-footer">Selengkapnya <i class="fa fa-arrow-circle-right"></i></a>
          </div>
        </div>
        <!-- ./col -->
        <div class="col-lg-3 col-xs-6">
          <!-- small box -->
          <div class="small-box bg-green">
            <div class="inner">
              <h3>
              <?php 
            $this->db->from('sertifikat_tanah');
            echo $this->db->count_all_results();
            ?>
            </h3>

              <p>Sertifikat Tanah</p>
            </div>
            <div class="icon">
              <i class="ion-erlenmeyer-flask"></i>
            </div>
            <a href="<?php echo base_url('developer/data_sample');?>" class="small-box-footer">Selengkapnya <i class="fa fa-arrow-circle-right"></i></a>
          </div>
        </div>
        <!-- ./col -->
        <div class="col-lg-3 col-xs-6">
          <!-- small box -->
          <div class="small-box bg-yellow">
            <div class="inner">
              <h3>
              <?php 
            $this->db->from('pembelian_tanah');
            echo $this->db->count_all_results();
            ?>
          </h3>

              <p>Data Pembelian</p>
            </div>
            <div class="icon">
              <i class="ion ion-person-add"></i>
            </div>
            <a href="<?php echo base_url('developer/profile');?>" class="small-box-footer">Selengkapnya<i class="fa fa-arrow-circle-right"></i></a>
          </div>
        </div>
        <!-- ./col -->
        <div class="col-lg-3 col-xs-6">
          <!-- small box -->
          <div class="small-box bg-red">
            <div class="inner">
              <h3>
              <?php 
            $this->db->from('pemakaian_tanah');
            echo $this->db->count_all_results();
            ?>
          </h3>

              <p>Tanah Efektif</p>
            </div>
            <div class="icon">
              <i class="ion-thermometer"></i>
            </div>
            <a href="<?php echo base_url('developer/laboratorium');?>" class="small-box-footer">Selengkapnya<i class="fa fa-arrow-circle-right"></i></a>
          </div>
        </div>
        <!-- ./col -->
      </div>
      <!-- /.row -->

       <table class="table table-bordered">
  <tr>
    <td rowspan=4 width="25%">

     <div class="pull-left image">
          
          <?php 
                $rows = $this->db->query("SELECT * FROM user WHERE username='".$this->session->username."'")->row_array();
                echo"  
                <img src='".base_url('upload/'.$rows['photo'])."' class='img-circle' alt='User Image'>";
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

  <tr>
    <td>Telepon</td>
    <td><?php echo $rows['telpon']; ?></td>
    
  </tr>

 

</table>



  
  


       

    </section>
    <!-- /.content -->
  </div>
  <!-- /.content-wrapper -->