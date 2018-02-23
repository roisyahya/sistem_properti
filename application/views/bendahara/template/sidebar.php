<aside class="main-sidebar">
    <!-- sidebar: style can be found in sidebar.less -->
    <section class="sidebar">
      <!-- Sidebar user panel -->
      <div class="user-panel">
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
        <div class="pull-left info">
          <p>Hallo <?php echo $this->session->userdata('username'); ?> !!</p>
          <a href="#"><i class="fa fa-circle text-success"></i> Online</a>
        </div>
      </div>
      <!-- search form -->
      <form action="#" method="get" class="sidebar-form">
        <div class="input-group">
          <input type="text" name="q" class="form-control" placeholder="Cari...">
          <span class="input-group-btn">
                <button type="submit" name="search" id="search-btn" class="btn btn-flat"><i class="fa fa-search"></i>
                </button>
              </span>
        </div>
      </form>
      <!-- /.search form -->
      <!-- sidebar menu: : style can be found in sidebar.less -->
      <ul class="sidebar-menu" data-widget="tree">
        <li class="header">MENU UTAMA</li>
       <li>
          <a href="<?php echo base_url('bendahara/dashboard');?>">
            <i class="glyphicon glyphicon-home"></i>
            <span>Dashboard</span>
            <span class="pull-right-container">
             
            </span>
          </a>
          
        </li>


       <li class="treeview">
          <a href="#">
            <i class="glyphicon glyphicon-book"></i>
            <span>Data RAB</span>
            <span class="pull-right-container">
                  <i class="fa fa-angle-left pull-right"></i>
                </span>
          </a>
          <ul class="treeview-menu">
            <li><a href="<?php echo base_url('bendahara/land_used');?>"><i class="fa fa-circle-o"></i> Land Used</a></li>
            <li><a href="<?php echo base_url('bendahara/jumlah_unit');?>"><i class="fa fa-circle-o"></i> Jumlah Unit</a></li>
            <li><a href="<?php echo base_url('bendahara/pematangan_tanah');?>"><i class="fa fa-circle-o"></i> Pematangan Tanah</a></li>
            <li><a href="<?php echo base_url('bendahara/sarana');?>"><i class="fa fa-circle-o"></i> Sarana</a></li>
            <li><a href="<?php echo base_url('bendahara/prasarana');?>"><i class="fa fa-circle-o"></i> Prasarana</a></li>
            <li><a href="<?php echo base_url('bendahara/konstruksi');?>"><i class="fa fa-circle-o"></i> Konstruski</a></li>
            <li><a href="<?php echo base_url('bendahara/operasional');?>"><i class="fa fa-circle-o"></i> Operasional</a></li>
            <li><a href="<?php echo base_url('bendahara/penerimaan');?>"><i class="fa fa-circle-o"></i> Penerimaan</a></li>
            
          
            
          </ul>
        </li>


         <li>
          <a href="c">
            <i class="glyphicon glyphicon-briefcase"></i> <span>Subkontraktor</span>
            <span class="pull-right-container">
             
            </span>
          </a>
        </li>

         

        <li class="treeview">
          <a href="">
            <i class="glyphicon glyphicon-saved"></i>
            <span>Daftar Unit Terjual</span>
            <span class="pull-right-container">
                  <i class="fa fa-angle-left pull-right"></i>
                </span>
          </a>
          <ul class="treeview-menu">
            <li><a href="<?php echo base_url('bendahara/unit_terjual');?>"><i class="fa fa-circle-o"></i> Pemesanan Baru</a></li>
            <li><a href="<?php echo base_url('bendahara/daftar_pemesanan');?>"><i class="fa fa-circle-o"></i> Data Pemesanan </a></li>
            <li><a href="<?php echo base_url('bendahara/data_lunas');?>"><i class="fa fa-circle-o"></i> Data Pembelian Lunas </a></li>
            
            
          </ul>
        </li>


        <li class="treeview">
          <a href="">
            <i class="glyphicon glyphicon-text-color"></i>
            <span>Data Account Biaya</span>
            <span class="pull-right-container">
                  <i class="fa fa-angle-left pull-right"></i>
                </span>
          </a>
          <ul class="treeview-menu">
            <li><a href="<?php echo base_url('bendahara/account_biaya_kantor');?>"><i class="fa fa-circle-o"></i> Account Biaya Kantor</a></li>
            <li><a href="<?php echo base_url('bendahara/account_biaya_proyek');?>"><i class="fa fa-circle-o"></i> Account Biaya Proyek </a></li>
            <li><a href="<?php echo base_url('bendahara/account_biaya_marketing');?>"><i class="fa fa-circle-o"></i>Account Biaya Marketing </a></li>
            
            
          </ul>
        </li>


        <li class="treeview">
          <a href="">
            <i class="glyphicon glyphicon-record"></i>
            <span>Data Operasional</span>
            <span class="pull-right-container">
                  <i class="fa fa-angle-left pull-right"></i>
                </span>
          </a>
          <ul class="treeview-menu">
            <li><a href="<?php echo base_url('bendahara/unit_terjual');?>"><i class="fa fa-circle-o"></i> Operasional Kantor</a></li>
            <li><a href="<?php echo base_url('bendahara/daftar_pemesanan');?>"><i class="fa fa-circle-o"></i> Operasional Proyek </a></li>
            <li><a href="<?php echo base_url('bendahara/data_lunas');?>"><i class="fa fa-circle-o"></i> Operasional Marketing </a></li>
            
            
          </ul>
        </li>

        <li class="treeview">
          <a href="">
            <i class="glyphicon glyphicon-text-width"></i>
            <span>Data Tanah</span>
            <span class="pull-right-container">
                  <i class="fa fa-angle-left pull-right"></i>
                </span>
          </a>
          <ul class="treeview-menu">
            <li><a href="<?php echo base_url('bendahara/unit_terjual');?>"><i class="fa fa-circle-o"></i> Tanah Mentah</a></li>
            <li><a href="<?php echo base_url('bendahara/daftar_pemesanan');?>"><i class="fa fa-circle-o"></i> Tanah Metang </a></li>
            <li><a href="<?php echo base_url('bendahara/data_lunas');?>"><i class="fa fa-circle-o"></i> Tanah Efektif </a></li>
            
            
          </ul>
        </li>

           <li class="treeview">
          <a href="">
            <i class="glyphicon glyphicon-saved"></i>
            <span>Laporan</span>
            <span class="pull-right-container">
                  <i class="fa fa-angle-left pull-right"></i>
                </span>
          </a>
          <ul class="treeview-menu">
            <li><a href="<?php echo base_url('bendahara/unit_terjual');?>"><i class="fa fa-circle-o"></i> Laporan Operasional Kantor</a></li>
            <li><a href="<?php echo base_url('bendahara/unit_terjual');?>"><i class="fa fa-circle-o"></i> Laporan Operasional Proyek</a></li>
            <li><a href="<?php echo base_url('bendahara/unit_terjual');?>"><i class="fa fa-circle-o"></i> Laporan Operasional Marketing</a></li>
            <li><a href="<?php echo base_url('bendahara/unit_terjual');?>"><i class="fa fa-circle-o"></i> Laporan Tanah Mentah</a></li>
            <li><a href="<?php echo base_url('bendahara/unit_terjual');?>"><i class="fa fa-circle-o"></i> Laporan Tanah Matang</a></li>
            <li><a href="<?php echo base_url('bendahara/unit_terjual');?>"><i class="fa fa-circle-o"></i> Laporan Tanah Efektif</a></li>
            
            
          </ul>
        </li>

        <li>
          <a href="<?php echo base_url('bendahara/profile');?>">
            <i class="glyphicon glyphicon-user"></i> <span>Manajemen User</span>
            <span class="pull-right-container">
             
            </span>
          </a>
        </li>

        <li><a href="<?php echo base_url('bendahara/petunjuk');?>"><i class="fa fa-book"></i> <span>Petunjuk</span></a></li>
        
      </ul>
    </section>
    <!-- /.sidebar -->
  </aside>