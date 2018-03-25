 <table id="example1" class="table table-bordered table-striped">

 
                <thead>
                <tr>
                  <th>No</th>
                  <th>Surat Jalan </th>
                  <th>Tgl Masuk </th>
                  <th>Nama Barang </th>
                  <th>Diterima </th>
                  <th>Rusak </th>
                  <th>Layak </th>
                  <th>Stok </th>
                  
                  <th>Satuan </th>
                  <th>Supplier </th>
                  
                </tr>
                </thead>
                <tbody>
                  <?php
                  $no = 1;
                  foreach ($stok->result() as $row) {
                    
                  ?>
               <tr>
                                            <td><?php echo $no++; ?></td>
                                            <td ><?php echo $row->surat_jalan; ?></td>
                                            <td ><?php echo $row->tgl_masuk; ?></td>
                                            <td><?php echo $row->nama_barang; ?></td>
                                            <td><?php echo $row->jumlah_barang; ?></td>
                                            <td><?php echo $row->barang_rusak; ?></td>
                                            <td><?php echo $row->jml_terima; ?></td>
                                            <td><?php echo $row->sisa_bm; ?></td>
                                            <td><?php echo $row->satuan; ?></td>
                                            <td><?php echo $row->supplier; ?></td>
                                            
                                            
                                       
                                        </tr>
    <?php
    }
    ?>

                </tfoot>
              </table>