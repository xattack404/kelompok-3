<div class="box">
  <div class="box-body table-responsive padding">
    <table id="example1" class="table table-bordered table-striped">
      <thead>
        <tr>
          <th style="text-align: center">No.Invoice</th>
          <th style="text-align: center">Nama Pemesan</th>
          <th style="text-align: center">Alamat</th>
          <th style="text-align: center">No. Telpon</th>
          <th style="text-align: center">Aksi</th>
        </tr>
      </thead>
      <tbody>
      <?php
      $sql = "SELECT detail_jual.id_trans, trans_jual.status, trans_jual.bukti_bayar, tb_member.id_member,
                     tb_member.nama, tb_member.no_hp,tb_member.alamat
      FROM detail_jual 
      JOIN tb_member ON tb_member.id_member = detail_jual.id_member 
      JOIN trans_jual ON trans_jual.id_trans = detail_jual.id_trans
      WHERE trans_jual.status = '2'";

      $result = mysqli_query($koneksi, $sql);
      if (mysqli_num_rows($result) > 0)
      {
        while ($data = mysqli_fetch_array($result))
        {
          echo "
          <tr>
            <td valign='top' align='center'>".$data['id_trans']."</td>
            <td style='text-align: center'>".$data['nama']."</td>
            <td style='text-align: center'>".$data['alamat']."</td>
            <td style='text-align: center'>".$data['no_hp']."</td>
            <td style='text-align: center'>
              <a href='pesanan_detail.php?id_trans=$data[id_trans]'><button type='submit' class='btn btn-success'>Selengkapnya</button></a>
            </td>
          </tr>";
        }
      }
      else {echo "Belum ada data";}
      ?>
    </tbody>
  </table>
  </div>
</div>
