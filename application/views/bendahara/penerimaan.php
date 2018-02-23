
<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <h1>
        RAB Penerimaan PT ENGGANG PROPERTINDO SAKTI
        
      </h1>
      <ol class="breadcrumb">
        <li><a href="#"><i class="fa fa-dashboard"></i> Home</a></li>
        <li><a href="#">RAB Penerimaan</a></li>
      </ol>
    </section>

<section class="content">
      <div class="row">
        <div class="col-xs-12">

<div class="box">

  <br>

  <button class="btn btn-success" onclick="tambah_penerimaan()"><i class="glyphicon glyphicon-plus">Tambah</i></button>      
  <a href="<?php echo base_url('bendahara/penerimaan');?>"><button class="btn btn-success"><i class="glyphicon glyphicon-refresh">Refresh</i></button></a>
  <br>
  <br>
           

            <!-- /.box-header -->
            <div class="box-body">
              <table id="example1" class="table table-bordered table-striped">
                <thead>
                <tr>
                  <th>No</th>
                  <th>Id Wilayah</th>
                  <th>Tipe</th>
                  <th>Luas Bangunan </th>
                  <th>Luas Tanah</th>
                  <th>Unit</th>
                  <th>Harga</th>
                  <th>Total</th>
                  
                  
                  <th>Aksi</th>
                </tr>
                </thead>
                <tbody>
                  <?php
                  $no = 1;
                  foreach ($penerimaan as $row) {
                    
                   
                    
                  ?>
               <tr>
                                            <td><?php echo $no++; ?></td>
                                            <td ><?php echo $row->id_wilayah; ?></td>
                                            <td><?php echo $row->type; ?></td>
                                            <td><?php echo $row->luas_bangunan; ?></td>
                                            <td><?php echo $row->luas_tanah; ?></td>
                                            <td><?php echo $row->unit; ?></td>
                                            <td><?php echo $row->harga; ?></td>
                                            <td><?php echo $row->total; ?></td>
                                            
                                            
                                            <td>
  
  <button class="btn btn-warning" onclick="edit_penerimaan(<?php echo $row->id_penerimaan; ?>)"><i class="glyphicon glyphicon-pencil"></i></button>
  <button class="btn btn-danger" onclick="delete_penerimaan(<?php echo $row->id_penerimaan; ?>)"><i class="glyphicon glyphicon-remove"></i></button>      
 


                                            </td> 
                                       
                                        </tr>
                                         



    <?php
    }
    ?>
    </tbody>





      <tfoot>
         <thead>
      <tr>
      <th colspan="6"></th>

      <th>Jumlah </th>
      <th>
      <?php
      $total_semua = $this->db->query("SELECT sum(total) AS total_semua FROM rab_penerimaan")->row_array();
      echo $total_semua['total_semua'];


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


      function tambah_penerimaan() {
          save_method ='add';
          $('#form')[0].reset();
          $('#modal_form').modal('show');
  $('.form-group').removeClass('has-error'); 
  $('.help-block').empty(); 
      }

      function save() {

        var url;
               

        if(save_method=='add') {
          url =  '<?php echo site_url('index.php/bendahara/penerimaan/add_penerimaan/'); ?>';
        } else {
          url =  '<?php echo site_url('index.php/bendahara/penerimaan/edit_penerimaan/'); ?>';
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

      function edit_penerimaan(id) {

        save_method = 'update';
        $('#form')[0].reset();
  $('.form-group').removeClass('has-error'); // clear error class
  $('.help-block').empty(); 

        //load dari ajax
        $.ajax({
          url: "<?php echo site_url('index.php/bendahara/penerimaan/ajax_edit/'); ?>"+id,
          type: "GET",
          dataType: "JSON",
          success: function(data) {
            $('[name="id_penerimaan"]').val(data.id_penerimaan);
            $('[name="id_wilayah"]').select2("val",data.id_wilayah);
            $('[name="type"]').val(data.type);
            $('[name="luas_bangunan"]').val(data.luas_bangunan);
            $('[name="luas_tanah"]').val(data.luas_tanah);
            $('[name="unit"]').val(data.unit);
            $('[name="harga"]').val(data.harga);
            $('[name="total"]').val(data.total);
            
            

            $('#modal_form').modal('show');
            $('.modal_title').text('Edit Jurusan');
          },

          error: function(jqXHR, textStatus, errorThrown) {
          alert('Error getting data from ajax');
        }



        });

      }


      function delete_penerimaan(id) {
        if (confirm('Are you sure delete data?')) {

          $.ajax({
            url: "<?php echo site_url('index.php/bendahara/penerimaan/delete_penerimaan/'); ?>"+id,
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
          <input type="hidden" name="id_penerimaan" value="">

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
              <label class="control-label col-md-3">Tipe</label>
              <div class="col-md-9">

                <input type="text"  name="type"  class="form-control" placeholder="Masukkan Type ">
                <span class="help-block"></span>
              </div>
            </div>
          </div>

          

          <div class="form-body">
            <div class="form-group">
              <label class="control-label col-md-3">Luas Bangunan</label>
              <div class="col-md-9">
                <input type="text" name="luas_bangunan" class="form-control" placeholder="Masukkan Luas Bangunan">
                <span class="help-block"></span>
              </div>
            </div>
          </div>


          <div class="form-body">
            <div class="form-group">
              <label class="control-label col-md-3">Luas Tanah</label>
              <div class="col-md-9">
                <input type="text" name="luas_tanah" class="form-control" placeholder="Masukkan Luas Tanah">
                <span class="help-block"></span>
              </div>
            </div>
          </div>

           <div class="form-body">
            <div class="form-group">
              <label class="control-label col-md-3">Unit</label>
              <div class="col-md-9">
                <input type="text" name="unit" class="form-control" placeholder="Masukkan Jumlah Unit">
                <span class="help-block"></span>
              </div>
            </div>
          </div>

          <div class="form-body">
            <div class="form-group">
              <label class="control-label col-md-3">Harga</label>
              <div class="col-md-9">
                <input type="text" name="harga" class="form-control" placeholder="Masukkan Harga">
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
