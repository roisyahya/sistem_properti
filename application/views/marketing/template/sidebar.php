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
          <a href="<?php echo base_url('marketing/dashboard');?>">
            <i class="glyphicon glyphicon-home"></i>
            <span>Dashboard</span>
            <span class="pull-right-container">
             
            </span>
          </a>
          
        </li>

         <li>
          <a href="<?php echo base_url('marketing/daftar_unit');?>">
            <i class="glyphicon glyphicon-list-alt"></i>
            <span>Daftar Unit</span>
            <span class="pull-right-container">
             
            </span>
          </a>
          
        </li>


        <li>
          <a href="<?php echo base_url('marketing/market_saya');?>">
            <i class="glyphicon glyphicon-globe"></i>
            <span>Market Saya</span>
            <span class="pull-right-container">
             
            </span>
          </a>
          
        </li>



        <li>
          <a href="<?php echo base_url('marketing/on_process');?>">
            <i class="glyphicon glyphicon-globe"></i>
            <span>On Process</span>
            <span class="pull-right-container">
             
            </span>
          </a>
          
        </li>

        <li>
          <a href="<?php echo base_url('marketing/market_terjual');?>">
            <i class="glyphicon glyphicon-globe"></i>
            <span>Market Terjual</span>
            <span class="pull-right-container">
             
            </span>
          </a>
          
        </li>

      

       

        <li>
          <a href="<?php echo base_url('marketing/profile');?>">
            <i class="glyphicon glyphicon-user"></i> <span>Manajemen User</span>
            <span class="pull-right-container">
             
            </span>
          </a>
        </li>

        <li><a href="<?php echo base_url('marketing/petunjuk');?>"><i class="fa fa-book"></i> <span>Petunjuk</span></a></li>
        
      </ul>
    </section>
    <!-- /.sidebar -->
  </aside>