
<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <h1>
        Data Sub Kontraktor PT ENGGANG PROPERTINDO SAKTI
        
      </h1>
      <ol class="breadcrumb">
        <li><a href="#"><i class="fa fa-dashboard"></i> Home</a></li>
        <li><a href="#">Sub Kontraktor</a></li>
      </ol>
    </section>

<section class="content">
      <div class="row">
        <div class="col-xs-12">

<div class="box">

  <br>

  <button class="btn btn-success" onclick="tambah_subkontraktor()"><i class="glyphicon glyphicon-plus">Tambah</i></button>      
  <a href="<?php echo base_url('bendahara/subkontraktor');?>"><button class="btn btn-success"><i class="glyphicon glyphicon-refresh">Refresh</i></button></a>
  <br>
  <br>
           

            <!-- /.box-header -->
            <div class="box-body">
              <table id="example1" class="table table-bordered table-striped">
                <thead>
                <tr>
                  <th>No</th>
                  <th>Id Wilayah</th>
                  <th>Nama Subkontraktor</th>
                  <th>Total </th>
                  <th>Keterangan</th>
                  
                  <th>Aksi</th>
                </tr>
                </thead>
                <tbody>
                  <?php
                  $no = 1;
                  foreach ($subkontraktor as $row) {
                    
                   
                    
                  ?>
               <tr>
                                            <td><?php echo $no++; ?></td>
                                            <td ><?php echo $row->id_wilayah; ?></td>
                                            <td><?php echo $row->nama_sub; ?></td>
                                            <td><?php  $total = $row->total; 
                                                echo number_format($total,2,",",".")?></td>
                                            <td><?php echo $row->keterangan; ?></td>
                                            
                                            
                                            <td>
  
  <button class="btn btn-warning" onclick="edit_subkontraktor(<?php echo $row->id_sub_kontraktor; ?>)"><i class="glyphicon glyphicon-pencil"></i></button>
  <button class="btn btn-danger" onclick="delete_subkontraktor(<?php echo $row->id_sub_kontraktor; ?>)"><i class="glyphicon glyphicon-remove"></i></button>      
 


                                            </td> 
                                       
                                        </tr>
                                         



    <?php
    }
    ?>
    </tbody>





     

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


      function tambah_subkontraktor() {
          save_method ='add';
          $('#form')[0].reset();
          $('#modal_form').modal('show');
  $('.form-group').removeClass('has-error'); 
  $('.help-block').empty(); 
      }

      function save() {

        var url;
               

        if(save_method=='add') {
          url =  '<?php echo site_url('index.php/bendahara/subkontraktor/add_subkontraktor/'); ?>';
        } else {
          url =  '<?php echo site_url('index.php/bendahara/subkontraktor/edit_subkontraktor/'); ?>';
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

      function edit_subkontraktor(id) {

        save_method = 'update';
        $('#form')[0].reset();
  $('.form-group').removeClass('has-error'); // clear error class
  $('.help-block').empty(); 

        //load dari ajax
        $.ajax({
          url: "<?php echo site_url('index.php/bendahara/subkontraktor/ajax_edit/'); ?>"+id,
          type: "GET",
          dataType: "JSON",
          success: function(data) {
            $('[name="id_sub_kontraktor"]').val(data.id_sub_kontraktor);
            $('[name="id_wilayah"]').select2("val",data.id_wilayah);
            $('[name="nama_sub"]').val(data.nama_sub);
            $('[name="total"]').val(data.total);
            $('[name="keterangan"]').val(data.keterangan);

            $('#modal_form').modal('show');
            $('.modal_title').text('Edit Jurusan');
          },

          error: function(jqXHR, textStatus, errorThrown) {
          alert('Error getting data from ajax');
        }



        });

      }


      function delete_subkontraktor(id) {
        if (confirm('Are you sure delete data?')) {

          $.ajax({
            url: "<?php echo site_url('index.php/bendahara/subkontraktor/delete_subkontraktor/'); ?>"+id,
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
          <input type="hidden" name="id_sub_kontraktor" value="">

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
              <label class="control-label col-md-3">Nama Subkontraktor</label>
              <div class="col-md-9">

                <input type="text"  name="nama_sub"  class="form-control" placeholder="Masukkan Nama Subkontraktor ">
                <span class="help-block"></span>
              </div>
            </div>
          </div>

          <div class="form-body">
            <div class="form-group">
              <label class="control-label col-md-3">Total</label>
              <div class="col-md-9">

                <input type="text"  name="total"  class="form-control" placeholder="Masukkan Total ">
                <span class="help-block"></span>
              </div>
            </div>
          </div>

          <div class="form-body">
            <div class="form-group">
              <label class="control-label col-md-3">Keterangan</label>
              <div class="col-md-9">

                <input type="text"  name="keterangan"  class="form-control" placeholder="Masukkan Keterangan ">
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
