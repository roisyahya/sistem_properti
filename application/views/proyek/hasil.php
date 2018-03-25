
<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <h1>
        Laporan Periodik Data Pelanggan Uji Laboratorium BARISTAND
        
      </h1>
      <ol class="breadcrumb">
        <li><a href="#"><i class="fa fa-dashboard"></i> Home</a></li>
        <li><a href="#">Laporan Periodik</a></li>
      </ol>
    </section>

        

<section class="content">
      <div class="row">
        <div class="col-xs-12">

<div class="box">
 

    
   
      

 
 
  <br>
 
  <hr>
  
            <!-- /.box-header -->
            <div class="box-body">
              <table id="example1" class="table table-bordered table-striped">
                <thead>
                <tr>
                  <th rowspan="2">No</th>
                  <th rowspan="2">Tgl Masuk</th>
                  <th rowspan="2">Surat Jalan</th>
                  <th rowspan="2">Nama Barang</th>
                  <th colspan="4" >Jumlah</th>
                  
                  <th rowspan="2">Satuan</th>
                  <th rowspan="2">Status Bayar</th>
                </tr>

                 <tr>
                
                  <th>Terima</th>
                  <th>Rusak</th>
                  <th>Layak</th>
                  <th>Stok</th>
                  
                </tr>
                </thead>
                <tbody>
                  <?php
                  $no = 1;
                  foreach ($stok->result() as $row) {
                    $tanggal = $row->tgl_masuk;
                    
                  ?>
               <tr>
                                            <td><?php echo $no++; ?></td>
                                            <td ><?php echo date('d/m/Y', strtotime($tanggal)); ?></td>
                                            <td><?php echo $row->surat_jalan; ?></td>
                                            <td><?php echo $row->nama_barang; ?></td>
                                            <td><?php echo $row->jumlah_barang; ?></td>
                                            <td><?php echo $row->barang_rusak; ?></td>
                                            <td><?php echo $row->jml_terima; ?></td>
                                            <td><?php echo $row->sisa_bm; ?></td>
                                            <td><?php echo $row->satuan; ?></td>
                                            <td><?php echo $row->status; ?></td>
                                            
                                            
                                       
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

  <script type="text/javascript">


  var save_method;
  var table;

      function tambah_pelanggan() {
        save_method ='add';
        $('#form')[0].reset();
        $('#modal_form').modal('show');
      }

      function save() {

        var url;
               

        if(save_method=='add') {
          url =  '<?php echo site_url('index.php/admin/pelanggan/add_pelanggan/'); ?>';
        } else {
          url =  '<?php echo site_url('index.php/admin/pelanggan/edit_pelanggan/'); ?>';
        }


        $.ajax({
        url:url,
        type:"POST",
        data: $('#form').serialize(),
        dataType:"JSON",
        success:function(data) {
          $('#modal_form').modal('hide');
          location.reload();
          
        },

        error: function(jqXHR, textStatus, errorThrown) {
          alert('Error insert/update');
        }


      });

      }

      function edit_pelanggan(id) {

        save_method = 'update';
        $('#form')[0].reset();

        //load dari ajax
        $.ajax({
          url: "<?php echo site_url('index.php/admin/pelanggan/ajax_edit/'); ?>"+id,
          type: "GET",
          dataType: "JSON",
          success: function(data) {
            $('[name="id_pelanggan"]').val(data.id_pelanggan);
            $('[name="nama"]').val(data.nama_pelanggan);
            $('[name="kategori"]').val(data.kategori);
            $('[name="alamat"]').val(data.alamat);
            $('[name="kota"]').val(data.kota);
            $('[name="provinsi"]').val(data.provinsi);
            $('[name="email"]').val(data.email);
            $('[name="telepon"]').val(data.telepon);
            $('[name="fax"]').val(data.fax);
            $('[name="jenis"]').val(data.jenis_pengujian);

            $('#modal_form').modal('show');
            $('.modal_title').text('Edit Jurusan');
          },

          error: function(jqXHR, textStatus, errorThrown) {
          alert('Error getting data from ajax');
        }



        });

      }


      function delete_pelanggan(id) {
        if (confirm('Are you sure delete data?')) {

          $.ajax({
            url: "<?php echo site_url('index.php/admin/pelanggan/delete_pelanggan/'); ?>"+id,
            type: "POST",
            dataType: "JSON",
            success: function(data) {
              location.reload();
            },
            error: function(jqXHR, textStatus, errorThrown) {
          alert('Error Deleteing Data');
        }

          });
        }
      }
      

  </script>

  
