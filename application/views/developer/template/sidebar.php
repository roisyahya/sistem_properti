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
          <a href="<?php echo base_url('developer/dashboard');?>">
            <i class="glyphicon glyphicon-home"></i>
            <span>Dashboard</span>
            <span class="pull-right-container">
             
            </span>
          </a>
          
        </li>

       <li class="treeview">
          <a href="#">
            <i class="glyphicon glyphicon-book"></i>
            <span>Tanah Mentah</span>
            <span class="pull-right-container">
                  <i class="fa fa-angle-left pull-right"></i>
                </span>
          </a>
          <ul class="treeview-menu">
            <li><a href="<?php echo base_url('developer/detail_tanah');?>"><i class="fa fa-circle-o"></i> Detail Tanah Mentah</a></li>
            <li><a href="<?php echo base_url('developer/surat_tanah');?>"><i class="fa fa-circle-o"></i> Surat Tanah</a></li>
        
            
          
            
          </ul>
        </li>

         <li>
          <a href="<?php echo base_url('developer/daftar_pembelian');?>">
            <i class="glyphicon glyphicon-shopping-cart"></i>
            <span>Pembelian Tanah</span>
            <span class="pull-right-container">
             
            </span>
          </a>
          
        </li>


         <li>
          <a href="<?php echo base_url('developer/daftar_pemakaian');?>">
            <i class="glyphicon glyphicon-check"></i>
            <span>Tanah Matang</span>
            <span class="pull-right-container">
             
            </span>
          </a>
          
        </li>


         <li>
          <a href="<?php echo base_url('developer/daftar_tanah_efektif');?>">
            <i class="glyphicon glyphicon-ok"></i>
            <span>Tanah Efektif</span>
            <span class="pull-right-container">
             
            </span>
          </a>
          
        </li>

         <li class="treeview">
          <a href="#">
            <i class="glyphicon glyphicon-tint"></i>
            <span>Data RAB</span>
            <span class="pull-right-container">
                  <i class="fa fa-angle-left pull-right"></i>
                </span>
          </a>
          <ul class="treeview-menu">
            <li><a href="<?php echo base_url('developer/data_rab');?>"><i class="fa fa-circle-o"></i> Perancangan RAB</a></li>
            <li><a href="<?php echo base_url('developer/penerimaan_rab');?>"><i class="fa fa-circle-o"></i> Penerimaan</a></li>    
          </ul>
        </li>
        

       

        <li>
          <a href="<?php echo base_url('developer/profile');?>">
            <i class="glyphicon glyphicon-user"></i> <span>Manajemen User</span>
            <span class="pull-right-container">
             
            </span>
          </a>
        </li>

        <li><a href="<?php echo base_url('developer/petunjuk');?>"><i class="fa fa-book"></i> <span>Petunjuk</span></a></li>
        
      </ul>
    </section>
    <!-- /.sidebar -->
  </aside>