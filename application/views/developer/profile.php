<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <h1>
        Manajemen User PT ENGGANG PROPERTINDO SAKTI
        
      </h1>
      <ol class="breadcrumb">
        <li><a href="#"><i class="fa fa-dashboard"></i> Home</a></li>
        <li><a href="#">Profile</a></li>
      </ol>
    </section>

<section class="content">
      <div class="row">
        <div class="col-xs-12">

<div class="box">

  <br>

  <button class="btn btn-success" onclick="tambah_akun()"><i class="glyphicon glyphicon-plus">Tambah</i></button>      
  
  <br>
  <br>
           

            <!-- /.box-header -->
            <div class="box-body">
              <table id="example1" class="table table-bordered table-striped">
                <thead>
                <tr>
                  <th>No</th>
                  <th>Username</th>
                  <th>Nama Lengkap</th>
                  <th>Jabatan</th>
                  
                  <th>Telepon</th>
                  <th>Photo</th>
                  <th>Aksi</th>
                </tr>
                </thead>
                <tbody>
                  <?php
                  $no = 1;
                  foreach ($akun as $row) {
                    
                  ?>
               <tr>
                                            <td><?php echo $no++; ?></td>
                                            <td><?php echo $row->username; ?></td>
                                            <td><?php echo $row->nama; ?></td>
                                            <td><?php echo $row->jabatan; ?></td>
                                            <td><?php echo $row->telpon; ?></td>
                                            
                                            <td><?php 
                                              if ($row->photo == TRUE) {
                                              echo '<a href="'.base_url('upload/'.$row->photo).'" target="_blank"><img src="'.base_url('upload/'.$row->photo).'" class="img-responsive" width=80px  /></a>';
                                              } else{
                                              echo '(No photo)';
                                            }
                                            ?>
                                            </td>
                                            <td>
  
  <button class="btn btn-warning" onclick="edit_akun(<?php echo $row->id_user; ?>)"><i class="glyphicon glyphicon-pencil"></i></button>
  <button class="btn btn-danger" onclick="delete_akun(<?php echo $row->id_user; ?>)"><i class="glyphicon glyphicon-remove"></i></button>      
  


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

      function tambah_akun() {
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
          url =  '<?php echo site_url('index.php/developer/profile/add_akun/'); ?>';
        } else {
          url =  '<?php echo site_url('index.php/developer/profile/edit_akun/'); ?>';
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

      function edit_akun(id) {

        save_method = 'update';
        $('#form')[0].reset();
$('.form-group').removeClass('has-error'); // clear error class
$('.help-block').empty(); 

        //load dari ajax
        $.ajax({
          url: "<?php echo site_url('index.php/developer/profile/ajax_edit/'); ?>"+id,
          type: "GET",
          dataType: "JSON",
          success: function(data) {
            $('[name="id_user"]').val(data.id_user);
            $('[name="username"]').val(data.username);
            $('[name="password"]').val(data.password);
            $('[name="nama"]').val(data.nama);
            $('[name="jabatan"]').val(data.jabatan);
            $('[name="alamat"]').val(data.alamat);
            $('[name="telpon"]').val(data.telpon);

            $('#modal_form').modal('show');
            $('.modal_title').text('Edit Surat Keluar');

            $('#photo-preview').show(); // show photo preview modal

            if(data.photo)
            {
                $('#label-photo').text('Change Photo'); // label photo upload
                $('#photo-preview div').html('<img src="'+base_url+'upload/'+data.photo+'" class="img-responsive" >'); // show photo
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


      function delete_akun(id) {
        if (confirm('Are you sure delete data?')) {

          $.ajax({
            url: "<?php echo site_url('index.php/developer/profile/delete_akun/'); ?>"+id,
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
          <input type="hidden" name="id_user" value="">

          


          <div class="form-body">
            <div class="form-group">
              <label class="control-label col-md-3">Username </label>
              <div class="col-md-9">
                <input type="text" name="username" class="form-control" placeholder="Masukkan Username">
                <span class="help-block"></span>
              </div>
            </div>
          </div>

          <div class="form-body">
            <div class="form-group">
              <label class="control-label col-md-3">Password</label>
              <div class="col-md-9">
                <input type="password" name="password" class="form-control" placeholder="Masukkan Password">
                <span class="help-block"></span>
              </div>
            </div>
          </div>

          <div class="form-body">
            <div class="form-group">
              <label class="control-label col-md-3">Nama Lengkap</label>
              <div class="col-md-9">
                <input type="text" name="nama" class="form-control" placeholder="Masukkan Nama Lengkap">
                <span class="help-block"></span>
              </div>
            </div>
          </div>

          <div class="form-body">
            <div class="form-group">
              <label class="control-label col-md-3">Jabatan</label>
              <div class="col-md-9">
               
				<select class="form-control" name="jabatan">
				<option value="Developer">Developer</option>
      <option value="Bendahara">Bendahara</option>
      <option value="Proyek">Proyek</option>
      <option value="Marketing">Marketing</option>

				</select>


                <span class="help-block"></span>
              </div>
            </div>
          </div>



          <div class="form-body">
            <div class="form-group">
              <label class="control-label col-md-3">Telepon</label>
              <div class="col-md-9">
                <input type="text" name="telpon" class="form-control" placeholder="Masukkan Nomor Telepon">
                <span class="help-block"></span>
              </div>
            </div>
          </div>

        
          
          <div class="form-body">
          <div class="form-group" id="photo-preview">
          <label class="control-label col-md-3">Photo</label>
          <div class="col-md-9">
          
          <span class="help-block"></span>
        </div>
          </div>
          </div>

           <div class="form-body">
            <div class="form-group">
              <label class="control-label col-md-3">Photo</label>
              <div class="col-md-9">
                <input type="file" id="exampleInputFile" name="photo">

                  <p class="help-block">Silahkan pilih foto Anda</p>
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


 <div class="modal fade" id="modal_form" role="dialog">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
        <h4 class="modal-title"></h4>
      </div>
      <div class="modal-body form">
        <form action="#" id="form" class="form-horizontal">
          <input type="hidden" name="id_user" value="">

          


          <div class="form-body">
            <div class="form-group">
              <label class="control-label col-md-3">Username </label>
              <div class="col-md-9">
                <input type="text" name="username" class="form-control" placeholder="Masukkan Username">
                <span class="help-block"></span>
              </div>
            </div>
          </div>

          <div class="form-body">
            <div class="form-group">
              <label class="control-label col-md-3">Password</label>
              <div class="col-md-9">
                <input type="password" name="password" class="form-control" placeholder="Masukkan Password">
                <span class="help-block"></span>
              </div>
            </div>
          </div>

          <div class="form-body">
            <div class="form-group">
              <label class="control-label col-md-3">Nama Lengkap</label>
              <div class="col-md-9">
                <input type="text" name="nama" class="form-control" placeholder="Masukkan Nama Lengkap">
                <span class="help-block"></span>
              </div>
            </div>
          </div>

          <div class="form-body">
            <div class="form-group">
              <label class="control-label col-md-3">Jabatan</label>
              <div class="col-md-9">
               
				<select class="form-control" name="jabatan">
				<option>-Pilih level-</option>
				<option value="Developer">Developer</option>
      <option value="Bendahara">Bendahara</option>
      <option value="Proyek">Proyek</option>
      <option value="Marketing">Marketing</option>
				
				</select>


                <span class="help-block"></span>
              </div>
            </div>
          </div>



          <div class="form-body">
            <div class="form-group">
              <label class="control-label col-md-3">Telepon</label>
              <div class="col-md-9">
                <input type="text" name="telpon" class="form-control" placeholder="Masukkan Nomor Telepon">
                <span class="help-block"></span>
              </div>
            </div>
          </div>

        
          
          <div class="form-body">
          <div class="form-group" id="photo-preview">
          
          <div class="col-md-9">
          
          <span class="help-block"></span>
        </div>
          </div>
          </div>

           <div class="form-body">
            <div class="form-group">
              <label class="control-label col-md-3">Photo</label>
              <div class="col-md-9">
                <input type="file" id="exampleInputFile" name="photo">

                  <p class="help-block">Silahkan pilih foto Anda</p>
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
