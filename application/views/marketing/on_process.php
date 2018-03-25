<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <h1>
        Data On Process  PT ENGGANG PROPERTINDO SAKTI
        
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
           

            <!-- /.box-header -->
            <div class="box-body">
              <table id="example1" class="table table-bordered table-striped">
                <thead>
               <tr>
                  <th>No</th>
                  <th>Nama Pemesan</th>
                  <th>Nama Unit</th>
                  <th>Blok/Nomor </th>
                  <th>LB/LT </th>
                  <th>Uang Muka </th>
                  <th>Dokumen </th>
                  <th>Wawancara </th>
                  <th>Hasil </th>
                  <th>Akad </th>
                  
                  
                  <th>Aksi</th>
                </tr>
                </thead>
                <tbody>
                  <?php
                  $no = 1;
                  foreach ($on_process as $row) {
                    
                   
                    
                  ?>
               <tr>
                    <td><?php echo $no++; ?></td>
                    <td><?php echo $row->nama_pembeli; ?></td>
                    <td><?php echo $row->nama_unit; ?></td>
                    <td><?php echo $row->blok;?> /<?php echo $row->nomor;?></td>
                    <td><?php echo $row->luas_bangunan;?> / <?php echo $row->luas_tanah; ?> </td>
                    <td><?php echo $row->status_um;?> </td>
                    <td><?php echo $row->kel_dokumen;?> </td>
                    <td><?php echo $row->hasil_wawancara;?> </td>
                    <td><?php echo $row->hasil_kep;?> </td>
                    <td><?php echo $row->tgl_akad;?> </td>
                                            
                                            
  <td>
    <a href="<?php echo site_url('marketing/on_process/detail_on_process/'.$row->id_pembayaran);?>"><button class="btn btn-info" ><i class="glyphicon glyphicon-transfer"> Detail</i></button></a>
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



      function save() {

        var url;
               

        if(save_method=='update') {
          url =  '<?php echo site_url('index.php/marketing/on_process/edit_on_process/'); ?>';
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

      function edit_on_process(id) {

        save_method = 'update';
        $('#form')[0].reset();
        $('.form-group').removeClass('has-error'); // clear error class
        $('.help-block').empty(); 

        //load dari ajax
        $.ajax({
          url: "<?php echo site_url('index.php/marketing/on_process/ajax_edit/'); ?>"+id,
          type: "GET",
          dataType: "JSON",
          success: function(data) {
            $('[name="id_pembayaran"]').val(data.id_pembayaran);
            $('[name="id_tanah_efektif"]').val(data.id_tanah_efektif);
            $('[name="id_wilayah"]').select2("val",data.id_wilayah);
            $('[name="nama_pembeli"]').val(data.nama_pembeli);
            $('[name="booking_fee"]').val(data.booking_fee);
            $('[name="tgl_bayar"]').val(data.tgl_bayar);
            $('[name="uang_muka"]').val(data.uang_muka);
            $('[name="status_um"]').val(data.status_um);
            $('[name="diskon"]').val(data.diskon);
            $('[name="tgl_wawancara"]').val(data.tgl_wawancara);
            $('[name="hasil_wawancara"]').val(data.hasil_wawancara);
            $('[name="tgl_akad"]').val(data.tgl_akad);
            $('[name="keterangan_hasil"]').val(data.keterangan_hasil);
            $('[name="kel_dokumen"]').val(data.kel_dokumen);
            $('[name="hasil_kep"]').val(data.hasil_kep);

            $('#modal_form').modal('show');
            $('.modal_title').text('Edit Jurusan');
          },

          error: function(jqXHR, textStatus, errorThrown) {
          alert('Error getting data from ajax');
        }



        });

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
          <input type="hidden" name="id_pembayaran" value="">

        
          <div class="form-body">
            <div class="form-group">
              <label class="control-label col-md-3">Keterangan</label>
              <div class="col-md-9">

                <input type="text"  name="id_pembayaran"  class="form-control" placeholder="Masukkan Type ">
                <span class="help-block"></span>
              </div>
            </div>
          </div>

          

          <div class="form-body">
            <div class="form-group">
              <label class="control-label col-md-3">Kuantitas</label>
              <div class="col-md-9">
                <input type="text" name="nama_pembeli" class="form-control" placeholder="Masukkan Presentase Tanah">
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

