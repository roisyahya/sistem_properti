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

  <button class="btn btn-success" onclick="tambah_tanah_efektif()"><i class="glyphicon glyphicon-plus">Tambah</i></button>      
  <a href="<?php echo base_url('developer/daftar_tanah_efektif');?>"><button class="btn btn-success"><i class="glyphicon glyphicon-refresh">Refresh</i></button></a>
  <br>
  <br>
           

            <!-- /.box-header -->
            <div class="box-body">
              <table id="example1" class="table table-bordered table-striped">
                <thead>
                <tr>
                  <th>No</th>
                  <th>Nama Unit</th>
                  <th>Blok </th>
                  <th>Nomor </th>
                  <th>Luas Bangunan </th>
                  <th>Luas Tanah </th>
                  <th>Status </th>
                  <th>Keterangan </th>
                  
                  
                  <th>Aksi</th>
                </tr>
                </thead>
                <tbody>
                  <?php
                  $no = 1;
                  foreach ($detail_tanah_efektif as $row) {
                    
                   
                    
                  ?>
               <tr>
                                            <td><?php echo $no++; ?></td>
                                            <td><?php echo $row->nama_unit; ?></td>
                                            <td><?php echo $row->blok; ?></td>
                                            <td><?php echo $row->nomor; ?></td>
                                            <td><?php echo $row->luas_bangunan; ?></td>
                                            <td><?php echo $row->luas_tanah; ?></td>
                                            <td><?php echo $row->status; ?></td>
                                            <td><?php echo $row->keterangan; ?></td>
                                            
                                            
                                            <td>
  
  <button class="btn btn-warning" onclick="edit_tanah_efektif(<?php echo $row->id_tanah_efektif; ?>)"><i class="glyphicon glyphicon-pencil"></i></button>
  <button class="btn btn-danger" onclick="delete_tanah_efektif(<?php echo $row->id_tanah_efektif; ?>)"><i class="glyphicon glyphicon-remove"></i></button>      
 


                                            </td> 
                                       
                                        </tr>
    <?php
    }
    ?>

                

                <tfoot>
         <thead>
      <tr>
      <th colspan="4"></th>

      <th>Total Luas </th>
      <th>
      <?php
      $id = $this->uri->segment(4);
      $total_semua = $this->db->query("SELECT sum(luas_tanah) AS total_semua FROM tanah_efektif WHERE id_pemakaian='$id'")->row_array();
      $hasil =  $total_semua['total_semua'];
     
      echo $hasil;


      ?>


      </th>
      <th colspan="2"></th>                  
      </tr>
    </thead>
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


      function tambah_tanah_efektif() {
          save_method ='add';
          $('#form')[0].reset();
          $('#modal_form').modal('show');
  $('.form-group').removeClass('has-error'); 
  $('.help-block').empty(); 
      }

      function save() {

        var url;
               

        if(save_method=='add') {
          url =  '<?php echo site_url('index.php/developer/tanah_efektif/add_tanah_efektif/'); ?>';
        } else {
          url =  '<?php echo site_url('index.php/developer/tanah_efektif/edit_tanah_efektif/'); ?>';
        }


        $.ajax({
        url:url,
        type:"POST",
        data: $('#form').serialize(),
        dataType:"JSON",
        success:function(data) {
          if(data.status) //Jika sukses tutup modal dan reload tabel
            {
                $('#modal_form').modal('hide');
                location.reload();
            }
            else //Untuk mengecek besar dari suatu file, jika lebih besar akan memberi notice
            {
                for (var i = 0; i < data.inputerror.length; i++) 
                {
                    $('[name="'+data.inputerror[i]+'"]').parent().parent().addClass('has-error'); //select parent twice to select div form-group class and add has-error class
                    $('[name="'+data.inputerror[i]+'"]').next().text(data.error_string[i]); //select span help-block class set text error string
                }
            }
            $('#btnSave').text('save'); //change button text
            $('#btnSave').attr('disabled',false); //set button enable 
          
        },


        error: function(jqXHR, textStatus, errorThrown) {
          alert('Error insert/update');
        }


      });

      }

      function edit_tanah_efektif(id) {

        save_method = 'update';
        $('#form')[0].reset();
  $('.form-group').removeClass('has-error'); // clear error class
  $('.help-block').empty(); 

        //load dari ajax
        $.ajax({
          url: "<?php echo site_url('index.php/developer/tanah_efektif/ajax_edit/'); ?>"+id,
          type: "GET",
          dataType: "JSON",
          success: function(data) {
            $('[name="id_tanah_efektif"]').val(data.id_tanah_efektif);
            $('[name="id_pemakaian"]').select2("val",data.id_pemakaian);
            $('[name="nama_unit"]').val(data.nama_unit);
            $('[name="blok"]').val(data.blok);
            $('[name="nomor"]').val(data.nomor);
            $('[name="luas_bangunan"]').val(data.luas_bangunan);
            $('[name="luas_tanah"]').val(data.luas_tanah);
            $('[name="status"]').val(data.status);
            $('[name="keterangan"]').val(data.keterangan);
            
            
            

            $('#modal_form').modal('show');
            $('.modal_title').text('Edit Jurusan');
          },

          error: function(jqXHR, textStatus, errorThrown) {
          alert('Error getting data from ajax');
        }



        });

      }


      function delete_pembelian(id) {
        if (confirm('Are you sure delete data?')) {

          $.ajax({
            url: "<?php echo site_url('index.php/developer/tanah_efektif/delete_tanah_efektif/'); ?>"+id,
            type: "POST",
            dataType: "JSON",
            success: function(data) {
              location.reload();
            },
            error: function(jqXHR, textStatus, errorThrown) {
          alert('Error Deleting Data');
        }

          });
        }
      }
      

  </script>



  <div class="modal fade" id="modal_form" role="dialog">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
        <h4 class="modal-title"></h4>
      </div>
      <div class="modal-body form">
        <form action="#" id="form" class="form-horizontal">
          <input type="hidden" name="id_tanah_efektif" value="">
          

          <div class="form-body">
            <div class="form-group">
              <label class="control-label col-md-3">Nama Wilayah </label>
              <div class="col-md-9">
                
                <select class="form-control select2" name="id_pemakaian" style="width:100%">
                    
                    <?php
                    $query = $this->db->query("SELECT * FROM pemakaian_tanah");
                   foreach ($query->result() as $row) { ?>
                  <option value="<?php echo $row->id_pemakaian;?>" selected="selected"> <?php echo $row->nama_proyek; ?> </option>

                    <?php
                    }
                    ?>

                    </select>

                <span class="help-block"></span>
              </div>
            </div>
          </div>

          <div class="form-body">
            <div class="form-group">
              <label class="control-label col-md-3">Nama Unit</label>
              <div class="col-md-9">

                <input type="text"  name="nama_unit"  class="form-control" placeholder="Masukkan Nama Unit">
                <span class="help-block"></span>
              </div>
            </div>
          </div>

           <div class="form-body">
            <div class="form-group">
              <label class="control-label col-md-3">Blok</label>
              <div class="col-md-9">

                <input type="text"  name="blok"  class="form-control" placeholder="Masukkan Blok Bangunan">
                <span class="help-block"></span>
              </div>
            </div>
          </div>

           <div class="form-body">
            <div class="form-group">
              <label class="control-label col-md-3">Nomor</label>
              <div class="col-md-9">

                <input type="text"  name="nomor"  class="form-control" placeholder="Masukkan Nomor Bangunan">
                <span class="help-block"></span>
              </div>
            </div>
          </div>

          

          <div class="form-body">
            <div class="form-group">
              <label class="control-label col-md-3">Luas Bangunan (m2)</label>
              <div class="col-md-9">
                <input type="text" name="luas_bangunan" class="form-control" placeholder="Masukkan Luas Bangunan">
                <span class="help-block"></span>
              </div>
            </div>
          </div>

          <div class="form-body">
            <div class="form-group">
              <label class="control-label col-md-3">Luas Tanah (m2)</label>
              <div class="col-md-9">
                <input type="text" name="luas_tanah" class="form-control" placeholder="Masukkan Luas Tanah">
                <span class="help-block"></span>
              </div>
            </div>
          </div>

          <div class="form-body">
            <div class="form-group">
              <label class="control-label col-md-3">Keterangan</label>
              <div class="col-md-9">
                <input type="text" name="keterangan" class="form-control" placeholder="Masukkan Keterangan (Jika Ada)">
                <span class="help-block"></span>
              </div>
            </div>
          </div>


        </form>
        
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
        <button type="button" onclick="save()" class="btn btn-primary">Save</button>
      </div>
    </div><!-- /.modal-content -->
  </div><!-- /.modal-dialog -->
</div><!-- /.modal -->
