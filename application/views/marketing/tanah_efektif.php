<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <h1>
        Data Tanah Efektif PT ENGGANG PROPERTINDO SAKTI


        <?php 
                      $rows = $this->db->query("SELECT * FROM user WHERE username='".$this->session->username."'")->row_array();
                      echo $rows['nama'];
                      ?>
        
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

 <br>
  <br>
           

            <!-- /.box-header -->
            <div class="box-body">
              <table id="example1" class="table table-bordered table-striped">
                <thead>
                <tr>
                  <th>No</th>
                  <th>Nama Unit</th>
                  <th>Lokasi</th>
                  <th>Blok/Nomor </th>
                  <th>LB/LT </th>
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
                                            <td><?php echo $row->lokasi; ?></td>
                                            <td><?php echo $row->blok;?> /<?php echo $row->nomor;?></td>
                                            <td><?php echo $row->luas_bangunan;?> / <?php echo $row->luas_tanah; ?> </td>
                                            <td><?php echo $row->status; ?></td>
                                            <td><?php echo $row->keterangan; ?></td>
                                            
                                            
                                            <td>
  
  <button class="btn btn-warning" onclick="edit_tanah_efektif(<?php echo $row->id_tanah_efektif; ?>)"><i class="glyphicon glyphicon-pencil">Status</i></button>
  
 


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
          url =  '<?php echo site_url('index.php/developer/tanah_efektif/edit_status_tanah_efektif/'); ?>';
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
            $('[name="status"]').val(data.status);
            
            
            
            

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
          <input type="hidden" name="id_user" value="">

         <div class="form-body">
            <div class="form-group">
              <label class="control-label col-md-3">Status Unit</label>
              <div class="col-md-9">
                <select class="form-control" name="status">
            <option value="">--Pilih Kategori--</option>
            <option value="Keep">Keep</option>
            <option value="Tersedia">Batal</option>
                 </select>
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
