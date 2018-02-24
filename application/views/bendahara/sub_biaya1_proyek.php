<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <h1>
        Data Sub Kelompok Biaya 1 Kantor
        
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

  <button class="btn btn-success" onclick="tambah_sub_biaya1()"><i class="glyphicon glyphicon-plus">Tambah</i></button>      
  
  <br>
  <br>
       
           

            <!-- /.box-header -->
            <div class="box-body">
              <table id="example1" class="table table-bordered table-striped">
                <thead>
               <tr>
                  <th>No</th>
                  <th>Account Biaya</th>
                  <th>Keterangan</th>
                 
                  
                  
                  <th>Aksi</th>
                </tr>
                </thead>
                <tbody>
                  <?php
                  $no = 1;
                  foreach ($sub_biaya1 as $row) {
                    
                   
                    
                  ?>
               <tr>
                                            <td><?php echo $no++; ?></td>
                                            <td><?php echo $row->kode_account1; ?></td>
                                            <td><?php echo $row->keterangan;?></td>
                                            
                                            <td>


  <button class="btn btn-warning" onclick="edit_sub_biaya1(<?php echo $row->id_sub_biaya1; ?>)"><i class="glyphicon glyphicon-pencil"></i></button>
  <button class="btn btn-danger" onclick="delete_sub_biaya1(<?php echo $row->id_sub_biaya1; ?>)"><i class="glyphicon glyphicon-remove"></i></button>
  <a href="<?php echo site_url('bendahara/account_biaya_proyek/sub_biaya2_proyek/'.$row->id_sub_biaya1);?>"><button class="btn btn-info" ><i class="glyphicon glyphicon-plus-sign">SubBiaya2</i></button></a>      
  
  
 
 
 


                                            </td> 
                                       
                                        </tr>
    <?php
    }
    ?>

                

                
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

   function tambah_sub_biaya1() {
          save_method ='add';
          $('#form')[0].reset();
          $('#modal_form').modal('show');
  $('.form-group').removeClass('has-error'); 
  $('.help-block').empty(); 
      }

      function save() {

        var url;
               

        if(save_method=='add') {
          url =  '<?php echo site_url('index.php/bendahara/sub_biaya1_proyek/add_sub_biaya1_proyek/'); ?>';
        } else {
          url =  '<?php echo site_url('index.php/bendahara/sub_biaya1_proyek/edit_sub_biaya1_proyek/'); ?>';
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

  function edit_sub_biaya1(id) {

        save_method = 'update';
        $('#form')[0].reset();
  $('.form-group').removeClass('has-error'); // clear error class
  $('.help-block').empty(); 

        //load dari ajax
        $.ajax({
          url: "<?php echo site_url('index.php/bendahara/sub_biaya1_proyek/ajax_edit/'); ?>"+id,
          type: "GET",
          dataType: "JSON",
          success: function(data) {
            $('[name="id_sub_biaya1"]').val(data.id_sub_biaya1);
            $('[name="id_kel_biaya"]').val(data.id_kel_biaya);
            $('[name="kode_account1"]').val(data.kode_account1);
            $('[name="keterangan"]').val(data.keterangan);

            $('#modal_form').modal('show');
            $('.modal_title').text('Edit Jurusan');
          },

          error: function(jqXHR, textStatus, errorThrown) {
          alert('Error getting data from ajax');
        }



        });

      }


      function delete_sub_biaya1(id) {
        if (confirm('Are you sure delete data?')) {

          $.ajax({
            url: "<?php echo site_url('index.php/bendahara/sub_biaya1_proyek/delete_sub_biaya1_proyek/'); ?>"+id,
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
          
          <input type="hidden"  name="id_sub_biaya1"  class="form-control">
          <input type="hidden"  name="id_kel_biaya"  class="form-control" <?php $id = $this->uri->segment(4);?> value="<?php echo $id;?>">





          <div class="form-body">
            <div class="form-group">
              <label class="control-label col-md-3">Kode Account</label>
              <div class="col-md-9">

                <input type="text"  name="kode_account1"  class="form-control" placeholder="Masukkan Kode Account ">
                <span class="help-block"></span>
              </div>
            </div>
          </div>

          

          <div class="form-body">
            <div class="form-group">
              <label class="control-label col-md-3">Keterangan</label>
              <div class="col-md-9">
                <input type="text" name="keterangan" class="form-control" placeholder="Masukkan Keterangan ">
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



