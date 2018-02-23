<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <h1>
        Data Pemakaian Tanah PT ENGGANG PROPERTINDO SAKTI
        
      </h1>
      <ol class="breadcrumb">
        <li><a href="#"><i class="fa fa-dashboard"></i> Home</a></li>
        <li><a href="#">Pemakaian Tanah</a></li>
      </ol>
    </section>

<section class="content">
      <div class="row">
        <div class="col-xs-12">

<div class="box">

  <br>

  <button class="btn btn-success" onclick="tambah_pemakaian()"><i class="glyphicon glyphicon-plus">Tambah</i></button>      
  <a href="<?php echo base_url('developer/pemakaian_tanah');?>"><button class="btn btn-success"><i class="glyphicon glyphicon-refresh">Refresh</i></button></a>
  <br>
  <br>
           

            <!-- /.box-header -->
            <div class="box-body">
              <table id="example1" class="table table-bordered table-striped">
                <thead>
                <tr>
                  <th>No</th>
                  <th>Nama Wilayah </th>
                  <th>Nama Proyek</th>
                  <th>Luas dipakai (m2) </th>
                  <th>Aksi</th>
                </tr>
                </thead>
                <tbody>
                  <?php
                  $no = 1;
                  foreach ($detail_pemakaian as $row) {
                    
                   
                    
                  ?>
               <tr>
                                            <td><?php echo $no++; ?></td>
                                            <td ><?php echo $row->id_wilayah; ?></td>
                                            <td><?php echo $row->nama_proyek; ?></td>
                                            <td><?php echo $row->luas_dipakai; ?></td>
                                            <td>
  
  <button class="btn btn-warning" onclick="edit_pemakaian(<?php echo $row->id_pemakaian; ?>)"><i class="glyphicon glyphicon-pencil"></i></button>
  <button class="btn btn-danger" onclick="delete_pemakaian(<?php echo $row->id_pemakaian; ?>)"><i class="glyphicon glyphicon-remove"></i></button>      
 


                                            </td> 
                                       
                                        </tr>
    <?php
    }
    ?>

                
                <tfoot>
         <thead>
      <tr>
      <th colspan="2"></th>

      <th>Total Luas </th>
      <th>
      <?php
      $id = $this->uri->segment(4);
      $total_semua = $this->db->query("SELECT sum(luas_dipakai) AS total_semua FROM pemakaian_tanah WHERE id_wilayah='$id'")->row_array();
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


      function tambah_pemakaian() {
          save_method ='add';
          $('#form')[0].reset();
          $('#modal_form').modal('show');
  $('.form-group').removeClass('has-error'); 
  $('.help-block').empty(); 
      }

      function save() {

        var url;
               

        if(save_method=='add') {
          url =  '<?php echo site_url('index.php/developer/pemakaian_tanah/add_pemakaian/'); ?>';
        } else {
          url =  '<?php echo site_url('index.php/developer/pemakaian_tanah/edit_pemakaian/'); ?>';
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

      function edit_pemakaian(id) {

        save_method = 'update';
        $('#form')[0].reset();
  $('.form-group').removeClass('has-error'); // clear error class
  $('.help-block').empty(); 

        //load dari ajax
        $.ajax({
          url: "<?php echo site_url('index.php/developer/pemakaian_tanah/ajax_edit/'); ?>"+id,
          type: "GET",
          dataType: "JSON",
          success: function(data) {
            $('[name="id_pemakaian"]').val(data.id_pemakaian);
            $('[name="id_wilayah"]').select2("val",data.id_wilayah);
            $('[name="nama_proyek"]').val(data.nama_proyek);
            $('[name="luas_dipakai"]').val(data.luas_dipakai);
            
            
            

            $('#modal_form').modal('show');
            $('.modal_title').text('Edit Jurusan');
          },

          error: function(jqXHR, textStatus, errorThrown) {
          alert('Error getting data from ajax');
        }



        });

      }


      function delete_pemakaian(id) {
        if (confirm('Are you sure delete data?')) {

          $.ajax({
            url: "<?php echo site_url('index.php/developer/pemakaian_tanah/delete_pemakaian/'); ?>"+id,
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
          <input type="hidden" name="id_pemakaian" value="">

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
              <label class="control-label col-md-3">Nama Proyek</label>
              <div class="col-md-9">

                <input type="text"  name="nama_proyek"  class="form-control" placeholder="Masukkan Nama Proyek ">
                <span class="help-block"></span>
              </div>
            </div>
          </div>

          

          <div class="form-body">
            <div class="form-group">
              <label class="control-label col-md-3">Luas Tanah Dipakai (m2)</label>
              <div class="col-md-9">
                <input type="text" name="luas_dipakai" class="form-control" placeholder="Masukkan Luas Tanah Yang Dipakai">
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
