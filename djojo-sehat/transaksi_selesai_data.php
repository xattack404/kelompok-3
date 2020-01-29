
<h4>NO. INVOICE: #<?php echo $faktur_selesai ?></h4>

<p align="right">
  <a href='invoice/<?php echo $faktur_selesai; ?>'>
    <button type='button' class='btn btn-primary'>
      <span class='glyphicon glyphicon-download' aria-hidden='true'></span> Download Invoice
    </button>
  </a>
</p>

<div id="no-more-tables">
  <?php
  include 'faktur_selesai.php';                     // Panggil data faktur
  // Membuat join query 3 tabel: transaksi, transaksi_detail dan produk
  $cek_trans =  mysqli_query($koneksi,"SELECT detail_jual.id_trans, detail_jual.id_member, 
                                             detail_jual.id_barang,detail_jual.jumlah,
                                             detail_jual.jumlah_berat, detail_jual.subtotal,
                                             tb_barang.id_barang, tb_barang.nama_barang, tb_barang.judul,
                                             tb_barang.harga_jual, tb_barang.berat
                                      FROM detail_jual
                                      LEFT JOIN tb_barang ON tb_barang.id_barang = detail_jual.id_barang
                                      WHERE detail_jual.id_trans = '$faktur_selesai'
                                      AND detail_jual.id_member = '$sesen_id' ");
  if(mysqli_num_rows($cek_trans) == 0)
  {echo "<center><h4>Keranjang belanja anda masih kosong</h4></center>";}
  else
  {
    echo "
    <table class='col-md-12 table-bordered table-striped table-condensed cf'>
      <thead class='cf'>
        <tr>
          <th>No.</th>
          <th>Nama Produk</th>
          <th>Harga</th>
          <th>Berat</th>
          <th>J.Berat</th>
          <th>Qty</th>
          <th>Sub Total</th>
        </tr>
      </thead>";

    $no = 1;
    while($data_trans = mysqli_fetch_array($cek_trans))
    {
      $harga = number_format($data_trans['harga_jual'], 0, ',', '.');
      $subtotal     = number_format($data_trans['subtotal'], 0, ',', '.');

      echo "
      <tbody>
        <tr>
          <td data-title='No.' align='center'>".$no."</td>
          <td data-title='Nama Produk' align='left'><a href='$base_url"."produk/$data_trans[judul].html'>$data_trans[nama_barang]</a></td>
          <td data-title='Harga Diskon' align='right'>$harga,-</td>
          <td data-title='Berat' align='center'>$data_trans[berat]</td>
          <td data-title='Jumlah Berat' align='center'>$data_trans[jumlah_berat]</td>
          <td data-title='Jumlah barang' align='center'>$data_trans[jumlah]</td>
          <td data-title='Sub Total' align='right'>$subtotal,-</td>
        </tr>";
      $no++;
    }
  }
  ?>
</table>
</div>

<hr/>

<?php
include 'keranjang_total_berat_selesai.php';
$ambil =  mysqli_query($koneksi," SELECT tb_barang.id_barang,tb_barang.nama_barang,tb_barang.judul,
                                          tb_barang.berat,tb_barang.harga_jual,tb_member.id_member,
                                          tb_member.nama,tb_alamat.alamat,tb_alamat.kecamatan,
                                          tb_alamat.kabupaten_kota,tb_alamat.provinsi,tb_alamat.kode_pos,
                                          tb_alamat.no_hp,
                                          trans_jual.id_trans,trans_jual.id_member,trans_jual.status,
                                          detail_jual.jumlah,detail_jual.jumlah_berat,detail_jual.subtotal,
                                          kec.nama_kec,
                                          kabkot.nama_kabkot,kabkot.jne_reg,
                                          prov.nama_prov
              FROM detail_jual
              LEFT JOIN trans_jual ON trans_jual.id_trans = detail_jual.id_trans
              LEFT JOIN tb_barang ON tb_barang.id_barang  = detail_jual.id_barang
              LEFT JOIN tb_member ON tb_member.id_member  = trans_jual.id_member
              LEFT JOIN tb_alamat ON tb_alamat.id_member = tb_member.id_member
              LEFT JOIN kec ON kec.id_kec = tb_alamat.kecamatan
              LEFT JOIN kabkot ON kabkot.id_kabkot = kec.id_kabkot AND kabkot.id_kabkot = tb_alamat.kabupaten_kota
              LEFT JOIN prov ON prov.id_prov = kabkot.id_prov AND prov.id_prov = tb_alamat.provinsi
                AND trans_jual.status = 2");
$array        = mysqli_fetch_array($ambil);
$ongkir       = $array['jne_reg'];
$nama_kota_kec= $array['nama_kabkot'].', '.$array['nama_kec'];
if(mysqli_num_rows($ambil) > 0)
{
?>
  <table class="table">
    <thead>
      <tr>
        <th></th>
        <th></th>
        <th></th>
        <th></th>
        <th></th>
      </tr>
    </thead>
    <tbody>
      <tr>
        <th scope="row">Ongkos Kirim</th>
        <td align="right">Via JNE REG</td>
        <td><?php echo $nama_kota_kec ?></td>
        <td align="right">Rp</td>
        <td align="right"><?php echo number_format($ongkir, 0, ',', '.').',-' ?></td>
      </tr>
      <tr>
        <th scope="row">Total Berat</th>
        <td></td>
        <td></td>
        <td></td>
        <td align="right"><?php echo $total_berat ?> kg</td>
      </tr>
      <tr>
        <th scope="row">Total Ongkos Kirim</th>
        <td align="right"><?php echo $total_berat_genap ?> kg</td>
        <td>x Rp <?php echo number_format($ongkir, 0, ',', '.').',-' ?></td>
        <td align="right">Rp</td>
        <td align="right">
          <?php $totalongkir = $total_berat_genap * $ongkir;
          echo number_format($totalongkir, 0, ',', '.').',-';
          ?>
        </td>
      </tr>
      <tr>
        <th scope="row">Grand Total</th>
        <td></td>
        <td></td>
        <td align="right">Rp</td>
        <td align="right">
        <b>
          <?php
          $query        = "SELECT sum(subtotal) AS subtotal FROM detail_jual
                          INNER JOIN tb_barang ON tb_barang.id_barang = detail_jual.id_barang
                          INNER JOIN trans_jual ON trans_jual.id_trans = detail_jual.id_trans
                          WHERE detail_jual.id_trans = '$faktur_selesai'
                          AND detail_jual.id_member = '$sesen_id'
                          AND trans_jual.status = 2 ";
          $hasil        = mysqli_query($koneksi,$query);
          $data         = mysqli_fetch_assoc($hasil);
          $subtotal     = $data['subtotal'];
          $grand_total  = $totalongkir + $subtotal;
          echo number_format($grand_total, 0, ',', '.').',-';
          ?>
        </b></td>
      </tr>
    </tbody>
   </table>

<?php } ?>

<hr/>

<p>Total biaya yang harus Anda bayar adalah sebesar <strong>Rp <?php echo number_format($grand_total, 0, ',', '.').',-';  ?></strong></p>
<p>Apabila telah melakukan pembayaran, mohon konfirmasi ke halaman berikut: <a href="<?php echo $base_url.'konfirmasi.html' ?>">klik disini</a></p>
<hr/>
<p>Pembayaran ditujukan ke rekening kami di bawah ini: </p>
<p><?php echo $bank ?></p>
<hr/>
<p>Setelah proses verifikasi pembayaran Anda selesai, maka kami akan mengirimkan barang ke:</p>

<p>
<?php
  echo "<b>Atas Nama</b>: $array[nama]<br/>
        <b>No. HP</b>: $array[no_hp]<br/>
        <b>Alamat</b>: $array[alamat], $array[nama_kec], $array[nama_kabkot], $array[nama_prov], $array[kopos]";
?>
</p>
<hr/>
<p align="center">Terima kasih telah berbelanja bersama kami, <?php echo $namatoko ?>.</p>
