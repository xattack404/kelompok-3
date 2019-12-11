<style>
@keyframes blowUpModal {
  0% {
    transform:scale(0);
  }
  100% {
    transform:scale(1);
  }
}
@keyframes blowUpModalTwo {
  0% {
    transform:scale(1);
    opacity:1;
  }
  100% {
    transform:scale(0);
    opacity:0;
  }
}
</style>

<div class="box">
  <div class="box-body table-responsive padding">
    <table id="example1" class="table table-bordered table-striped">
      <thead>
        <tr>
          <th style="text-align: center">No.Invoice</th>
          <th style="text-align: center">Nama Pemesan</th>
          <th style="text-align: center">Alamat</th>
          <th style="text-align: center">No. Telpon</th>
          <th style="text-align: center">Bukti Bayar</th>
          <th style="text-align: center">Status</th>
          <th style="text-align: center">Aksi</th>
        </tr>
      </thead>
      <tbody>
      <?php
      $sql = "SELECT trans_jual.id_trans, trans_jual.status, trans_jual.bukti_bayar, 
                      tb_member.id_member, tb_member.nama, tb_member.no_hp,tb_member.alamat,
                      tb_status.id_status,tb_status.status_pesanan
      FROM trans_jual
      JOIN tb_member ON tb_member.id_member = trans_jual.id_member
      JOIN tb_status ON tb_status.id_status = trans_jual.status

      ORDER BY trans_jual.status = 2 ";

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
            <td style='text-align: center'><img data-toggle='modal' data-target='#exampleModal' id='bukti_bayar' src='../images/slider/".$data['bukti_bayar']."' width='100px' height='50px'></td>
            <td style='text-align: center'>".$data['status_pesanan']."</td>
            <td style='text-align: left'>
              <a href='pesanan_detail.php?id_trans=$data[id_trans]'><button type='submit' class='btn btn-success'>Detail</button></a>
            </td>
            <td style='text-align: left'>
            <a href='pesanan_tolak.php?id_trans=$data[id_trans]'><button type='submit' class='btn btn-danger'>Tolak</button></a>
          </td>
          <td style='text-align: left'>
            <a href='pesanan_proses.php?id_trans=$data[id_trans]'><button type='submit' class='btn btn-warning'>Proses</button></a>
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
<div class="modal" id="myModal" tabindex="-1" style="animation: blowUpModal .5s cubic-bezier(0.165, 0.840, 0.440, 1.000) forwards;" role="dialog">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title">Bukti Bayar</h5>
        </button>
      </div>
      <div class="modal-body">
      <?= "<img style='margin-left:20px;margin-top:10px;' src='../images/slider/".$data['bukti_bayar']."' width='500px' height='500px'>"?>
      </div>
      <div class="modal-footer">
      <button type="button" id="close" class="btn btn-secondary" data-dismiss="modal" >Close
      </div>
    </div>
  </div>
</div>

<script>
$("#bukti_bayar").click(function(){
    $("#myModal").modal();
  });
</script>
