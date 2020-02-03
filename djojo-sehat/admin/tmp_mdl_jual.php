<?php
require_once("../config/koneksi.php");
   $id=$_GET['kd_jual'];
    $sql1 = mysqli_query($koneksi, "SELECT trans_jual.id_trans, trans_jual.berat, trans_jual.total_bayar, trans_jual.tanggal, tb_member.nama FROM trans_jual LEFT JOIN tb_member on tb_member.id_member = trans_jual.id_member where id_trans ='$id'");
    $data1 = mysqli_fetch_array($sql1);
 ?>
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                 <h4 class="modal-title">No. Transaksi : <span class="bg-primary"><?= $data1['id_trans'] ?></span></h4>
            </div>
            <div class="modal-body">
   						<div class="row">
                <div class="col-lg-12">
                        <div class="row">
                                <p class="col-lg-3 col-lg-offset-1">Tanggal Transaksi :</p>
                                <p class="col-lg-2" ><input style="cursor: default;" type="text" name="tgl" value="<?= $data1['tanggal'] ?>" readonly></p>
                        </div>
                        <div class="row">
                                <p class="col-lg-3 col-lg-offset-1">Nama Pelanggan :</p>
                                <p class="col-lg-2"><input style="cursor: default;" type="text" name="tgl" value="<?= $data1['nama'] ?>" readonly></p>
                        </div>
    					<div class="table-responsive">
                           <table class="table table-bordered" id="tabel">
                           <thead>
                              <tr bgcolor='deepskyblue' align='center'>
                                <th style="color: white;">No</th>
                                <th style="color: white;">Barang</th>
                                <th style="color: white;">Harga jual</th>
                                <th style="color: white;">Berat</th>
                                <th style="color: white;">Qty</th>
                                <th style="color: white;">Sub total</th>
                              </tr>
                            </thead>
                            <tbody>
                           <?php $no=1; ?>
                           <?php 
                            $sql2 = mysqli_query($koneksi, "SELECT tb_barang.nama_barang,tb_barang.harga_jual, detail_jual.jumlah, detail_jual.jumlah_berat, detail_jual.subtotal FROM detail_jual LEFT JOIN tb_barang on tb_barang.id_barang = detail_jual.id_barang WHERE id_trans = '$id'");
                            ?>
                           <?php while ($data_kr = mysqli_fetch_array($sql2)) {?>
                              <tr>
                                <td><?= $no++; ?></td>
                                <td><?= $data_kr['nama_barang']; ?></td>
                                <td class="text-center">Rp. <?= number_format($data_kr['harga_jual'], 0, ',', '.').",-"; ?></td>
                                <td class="text-center"><?= $data_kr['jumlah_berat'] ?></td>
                                <td class="text-center"><?= $data_kr['jumlah'] ?></td>
                                <td class="text-right">Rp. <?= number_format($data_kr['subtotal'], 0, ',', '.').",-"; ?></td>
                              </tr>
                           <?php } ?>  
                           <tr bgcolor="lightgray">
                            <?php $q = mysqli_query($koneksi, "SELECT sum(detail_jual.jumlah) as jumlahe FROM detail_jual WHERE id_trans='$id'"); $d = mysqli_fetch_array($q); ?>
                            <td colspan="3" class="text-right"><b>Total </b></td>
                            <td class="text-center"><b><?= $d['jumlahe'] ?></b></td>
                            <td class="text-center"><b>Total Bayar</b></td>
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




