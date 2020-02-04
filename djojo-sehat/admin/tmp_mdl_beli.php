<?php
require_once("../config/koneksi.php");
   $id=$_GET['kd_beli'];
    $sql1 = mysqli_query($koneksi, "SELECT trans_beli.id_beli, trans_beli.jumlah_beli, trans_beli.total_bayar, trans_beli.tanggal, tb_supplier.nama_supplier FROM trans_beli LEFT JOIN tb_supplier on tb_supplier.id_supplier = trans_beli.id_supplier where id_beli ='$id'");
    $data1 = mysqli_fetch_array($sql1);
 ?>
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                 <h4 class="modal-title">No. Transaksi : <span class="bg-primary"><?= $data1['id_beli'] ?></span></h4>
            </div>
            <div class="modal-body">
   						<div class="row">
                <div class="col-lg-12">
                        <div class="row">
                                <p class="col-lg-3 col-lg-offset-1">Tanggal Pembelian :</p>
                                <p class="col-lg-2" ><input style="cursor: default;" type="text" name="tgl" value="<?= $data1['tanggal'] ?>" readonly></p>
                        </div>
                        <div class="row">
                                <p class="col-lg-3 col-lg-offset-1">Nama supplier :</p>
                                <p class="col-lg-2"><input style="cursor: default;" type="text" name="tgl" value="<?= $data1['nama_supplier'] ?>" readonly></p>
                        </div>
    					<div class="table-responsive">
                           <table class="table table-bordered" id="tabel">
                           <thead>
                              <tr bgcolor='deepskyblue' align='center'>
                                <th style="color: white;">No</th>
                                <th style="color: white;">Barang</th>
                                <th style="color: white;">Harga Beli</th>
                                <th style="color: white;">Qty</th>
                                <th style="color: white;">Sub total</th>
                              </tr>
                            </thead>
                            <tbody>
                           <?php $no=1; ?>
                           <?php 
                            $sql2 = mysqli_query($koneksi, "SELECT tb_barang.nama_barang, detail_beli.harga_beli, detail_beli.jumlah, detail_beli.subtotal FROM detail_beli LEFT JOIN tb_barang on tb_barang.id_barang = detail_beli.id_barang WHERE id_beli = '$id'");
                            ?>
                           <?php while ($data_kr = mysqli_fetch_array($sql2)) {?>
                              <tr>
                                <td><?= $no++; ?></td>
                                <td><?= $data_kr['nama_barang']; ?></td>
                                <td class="text-center">Rp. <?= number_format($data_kr['harga_beli'], 0, ',', '.').",-"; ?></td>
                                <td class="text-center"><?= $data_kr['jumlah'] ?></td>
                                <td class="text-right">Rp. <?= number_format($data_kr['subtotal'], 0, ',', '.').",-"; ?></td>
                              </tr>
                           <?php } ?>  
                           <tr bgcolor="lightgray">
                            <td colspan="3" class="text-right"><b>Total </b></td>
                            <td class="text-center"><b><?= $data1['jumlah_beli'] ?></b></td>
                              <td class="text-right"><b>Rp. <?= number_format($data1['total_bayar'], 0, ',', '.').",-"; ?></b></td>
                              <!-- <td>Rp. <?= number_format($data['bayar'], 0, ',', '.').",-"; ?></td>
                              <td>Rp. <?= number_format($u['total_hutang'], 0, ',', '.').",-"; ?></td> -->
                           </tr>            		
                       </tbody>
                   </table>
               </div>
             </div>
             </div>
           </div>
               <div class="modal-footer">
                  <button type="button" class="btn btn-danger" data-dismiss="modal"><i class="fa fa-close"></i> Tutup</button>
              </div>




