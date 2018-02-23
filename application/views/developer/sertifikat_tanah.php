<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <h1>
        Daftar Kelengkapan Berkas
        
      </h1>
      <ol class="breadcrumb">
        <li><a href="#"><i class="fa fa-dashboard"></i> Home</a></li>
        <li><a href="#">Berkas</a></li>
      </ol>
    </section>

<section class="content">
      <div class="row">
        <div class="col-xs-12">

<div class="box">

  <br>

  <button class="btn btn-success" onclick="tambah_sertifikat()"><i class="glyphicon glyphicon-plus">Tambah</i></button>      
  
  <br>
  <br>
           

            <!-- /.box-header -->
            <div class="box-body">
              <table id="example1" class="table table-bordered table-striped">
                <thead>
                <tr>
                  <th>No</th>
                  <th>Nama Sertifikat</th>
                  <th>File Berkas</th>
                </tr>
                </thead>
                <tbody>
                  <?php
                  $no = 1;
                  foreach ($sertifikat_tanah as $row) {
                    
                  ?>
               <tr>
                                            <td><?php echo $no++; ?></td>
                                            <td><?php echo $row->nama_sertifikat; ?></td>
                                            
                                            
                                            <td><?php 
                                              if ($row->photo == TRUE) {
                                              echo '<a href="'.base_url('upload/sertifikat/'.$row->photo).'" target="_blank"><img src="'.base_url('upload/sertifikat/'.$row->photo).'" class="img-responsive" width=80px  /></a>';
                                              } else{
                                              echo '(No photo)';
                                            }
                                            ?>
                                            </td>
                                            <td>
  
  <button class="btn btn-warning" onclick="edit_sertifikat(<?php echo $row->id_sertifikat; ?>)"><i class="glyphicon glyphicon-pencil"></i></button>
  <button class="btn btn-danger" onclick="delete_sertifikat(<?php echo $row->id_sertifikat; ?>)"><i class="glyphicon glyphicon-remove"></i></button>      
  


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

  <script type="text/javascript">

  var save_method;
  var table;
  var base_url = '<?php echo base_url();?>';

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

      function tambah_sertifikat() {
        save_method ='add';
        $('#form')[0].reset();
        $('#modal_form').modal('show');
$('.form-group').removeClass('has-error'); 
$('.help-block').empty(); 
        $('#photo-preview').hide(); // 
         $('#label-photo').text('Upload Photo'); 
      }

      function save() {
        $('#btnSave').text('saving...'); 
        $('#btnSave').attr('disabled',true);
        var url;
               

        if(save_method=='add') {
          url =  '<?php echo site_url('index.php/developer/surat_tanah/add_sertifikat/'); ?>';
        } else {
          url =  '<?php echo site_url('index.php/developer/surat_tanah/edit_sertifikat/'); ?>';
        }

        
    var formData = new FormData($('#form')[0]);
    $.ajax({
        url : url,
        type: "POST",
        data: formData,
        contentType: false,
        processData: false,
        dataType: "JSON",
        
        success: function(data)
        {

            if(data.status) //Jika sukses tutup modal dan reload tabel
            {
                $('#modal_form').modal('hide');
                location.reload();
            }
            else
            {
                for (var i = 0; i < data.inputerror.length; i++) 
                {
                    $('[name="'+data.inputerror[i]+'"]').parent().parent().addClass('has-error'); //select parent twice to select div form-group class and add has-error class
                    $('[name="'+data.inputerror[i]+'"]').next().text(data.error_string[i]); //select span help-block class set text error string
                }
            }
            $('#btnSave').text('save'); 
            $('#btnSave').attr('disabled',false); 


        },
        error: function (jqXHR, textStatus, errorThrown)
        {
            alert('Error adding / update data');
            $('#btnSave').text('save'); 
            $('#btnSave').attr('disabled',false); 

        }
    });
}

      function edit_sertifikat(id) {

        save_method = 'update';
        $('#form_edit')[0].reset();
$('.form-group').removeClass('has-error'); // clear error class
$('.help-block').empty(); 

        //load dari ajax
        $.ajax({
          url: "<?php echo site_url('index.php/developer/surat_tanah/ajax_edit/'); ?>"+id,
          type: "GET",
          dataType: "JSON",
          success: function(data) {
            $('[name="id_sertifikat"]').val(data.id_sertifikat);
            $('[name="id_wilayah"]').select2("val",data.id_wilayah);
            $('[name="nama_sertifikat"]').val(data.nama_sertifikat);
            $('[name="photo"]').val(data.photo);

            $('#modal_form_edit').modal('show');
            $('.modal_title').text('Edit Surat Keluar');

            $('#photo-preview').show(); // show photo preview modal

            if(data.photo)
            {
                $('#label-photo').text('Change Photo'); // label photo upload
                $('#photo-preview div').html('<img src="'+base_url+'upload/sertifikat/'+data.photo+'" class="img-responsive" >'); // show photo
                $('#photo-preview div').append('<input type="checkbox" name="remove_photo" value="'+data.photo+'"/> Hapus foto ketika disimpan'); // remove photo

            }
            else
            {
                $('#label-photo').text('Upload Photo'); // label photo upload
                $('#photo-preview div').text('(No photo)');
            }


        },
        error: function (jqXHR, textStatus, errorThrown)
        {
            alert('Error get data from ajax');
        }
    });
}


      function delete_sertifikat(id) {
        if (confirm('Are you sure delete data?')) {

          $.ajax({
            url: "<?php echo site_url('index.php/developer/surat_tanah/delete_sertifikat/'); ?>"+id,
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
          <input type="hidden" name="id_sertifikat" value="">

          


          <div class="form-body">
            <div class="form-group">
              <label class="control-label col-md-3">Nama Wilayah </label>
              <div class="col-md-9">
                
                <select class="form-control select2" name="id_wilayah" style="width:100%">
                    
                    <?php
                    $query = $this->db->query("SELECT * FROM detail_tanah");
                   foreach ($query->result() as $row) { ?>
                  <option value="<?php echo $row->id_wilayah;?>" selected="selected"> <?php echo $row->nama_tanah; ?> </option>

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
              <label class="control-label col-md-3">Nama Berkas</label>
              <div class="col-md-9">
                <input type="text" name="nama_sertifikat" class="form-control" placeholder="Masukkan Nama Sertifikat">
                <span class="help-block"></span>
              </div>
            </div>
          </div>

          
          
          <div class="form-body">
          <div class="form-group" id="photo-preview">
          <label class="control-label col-md-3">File Berkas</label>
          <div class="col-md-9">
          
          <span class="help-block"></span>
        </div>
          </div>
          </div>

           <div class="form-body">
            <div class="form-group">
              <label class="control-label col-md-3">File Berkas</label>
              <div class="col-md-9">
                <input type="file" id="exampleInputFile" name="photo">

                  <p class="help-block">Silahkan pilih foto surat</p>
              </div>
            </div>
          </div>
         
          

        </form>
        
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
        <button type="button" id="btnSave" onclick="save()" class="btn btn-primary">Save</button>
      </div>
    </div><!-- /.modal-content -->
  </div><!-- /.modal-dialog -->
</div><!-- /.modal -->

<!-- Modal Edit-->

<div class="modal fade" id="modal_form_edit" role="dialog">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
        <h4 class="modal-title"></h4>
      </div>
      <div class="modal-body form">
        <form action="#" id="form_edit" class="form-horizontal">
          <input type="hidden" name="id_sertifikat" value="">

          


          <div class="form-body">
            <div class="form-group">
              <label class="control-label col-md-3">Nama Wilayah </label>
              <div class="col-md-9">
                
                <select class="form-control select2" name="id_wilayah" style="width:100%">
                    
                    <?php
                    $query = $this->db->query("SELECT * FROM detail_tanah");
                   foreach ($query->result() as $row) { ?>
                  <option value="<?php echo $row->id_wilayah;?>" selected="selected"> <?php echo $row->nama_tanah; ?> </option>

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
              <label class="control-label col-md-3">Nama Berkas</label>
              <div class="col-md-9">
                <input type="text" name="nama_sertifikat" class="form-control" placeholder="Masukkan Nama Sertifikat">
                <span class="help-block"></span>
              </div>
            </div>
          </div>

          
          
          <div class="form-body">
          <div class="form-group" id="photo-preview">
          <label class="control-label col-md-3">File Berkas</label>
          <div class="col-md-9">
          
          <span class="help-block"></span>
        </div>
          </div>
          </div>

           <div class="form-body">
            <div class="form-group">
              <label class="control-label col-md-3">File Berkas</label>
              <div class="col-md-9">
                <input type="file" id="exampleInputFile" name="photo">

                  <p class="help-block">Silahkan pilih foto surat</p>
              </div>
            </div>
          </div>
         
          

        </form>
        
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
        <button type="button" id="btnSave" onclick="save()" class="btn btn-primary">Save</button>
      </div>
    </div><!-- /.modal-content -->
  </div><!-- /.modal-dialog -->
</div><!-- /.modal -->

