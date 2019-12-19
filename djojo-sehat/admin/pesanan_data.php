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
      $sql = "SELECT trans_jual.id_trans, trans_jual.status, trans_jual.bukti_bayar, tb_member.id_member,
                     tb_member.nama, tb_member.no_hp,tb_member.alamat,tb_status.id_status,tb_status.status_pesanan
      FROM trans_jual
      JOIN tb_member ON tb_member.id_member = trans_jual.id_member
      JOIN tb_status ON tb_status.id_status = trans_jual.status";

      $result = mysqli_query($koneksi, $sql);
      if (mysqli_num_rows($result) > 0)
      {
        while ($data = mysqli_fetch_array($result))
        { if ($data['status'] == 1 or $data['status'] == 5) {
            echo "
          <tr>
            <td valign='top' align='center'>".$data['id_trans']."</td>
            <td style='text-align: center'>".$data['nama']."</td>
            <td style='text-align: center'>".$data['alamat']."</td>
            <td style='text-align: center'>".$data['no_hp']."</td>
            <td style='text-align: center'><button data-toggle='modal' data-target='#myModal'><img data-toggle='modal' data-target='#myModal' id='bukti_bayar' src='../images/bukti_bayar/".$data['bukti_bayar']."' width='100px' height='50px'></td>
            <td style='text-align: center'>".$data['status_pesanan']."</td>
            <td style='text-align: center'>
             <a class='btn btn-success btn-s' title='DETAIL pesanan' href='pesanan_detail.php?id_trans=$data[id_trans]'><i class='glyphicon glyphicon-list'></i></a>
            </td>
          </tr>
          <div class='modal' id='myModal' tabindex='-1' style='animation: blowUpModal .5s cubic-bezier(0.165, 0.840, 0.440, 1.000) forwards;' role='dialog'>
  <div class='modal-dialog' role='document'>
    <div class='modal-content'>
      <div class='modal-header'>
        <h5 class='modal-title'>Bukti Bayar</h5>
        </button>
      </div>
      <div class='modal-body'>
      <img style='margin-left:20px;margin-top:10px;width:500px; height:500px' src='../images/bukti_bayar/". $data['bukti_bayar']."'>
      </div>
      <div class='modal-footer'>
      <button type='button' id='close' class='btn btn-secondary' data-dismiss='modal' >Close
      </div>
    </div>
  </div>
</div>";
          }
          if ($data['status'] == 2 ) {
            echo "
          <tr>
            <td valign='top' align='center'>".$data['id_trans']."</td>
            <td style='text-align: center'>".$data['nama']."</td>
            <td style='text-align: center'>".$data['alamat']."</td>
            <td style='text-align: center'>".$data['no_hp']."</td>
            <td style='text-align: center'><button data-toggle='modal' data-target='#myModal'><img id='bukti_bayar' src='../images/bukti_bayar/".$data['bukti_bayar']."' width='100px' height='50px'></td>
            <td style='text-align: center'>".$data['status_pesanan']."</td>
            <td style='text-align: center'>
              <a class='btn btn-danger btn-s' title='TOLAK pesanan' href='pesanan_tolak.php?id_trans=$data[id_trans]'><i class='glyphicon glyphicon-remove'></i></a>
              <a class='btn btn-warning btn-s' href='pesanan_proses.php?id_trans=$data[id_trans]' title='PROSES'><i class='glyphicon glyphicon-saved'></i></a>
              <a class='btn btn-success btn-s' title='DETAIL pesanan' href='pesanan_detail.php?id_trans=$data[id_trans]'><i class='glyphicon glyphicon-list'></i></a>
            </td>
          </tr>";
          }
          if ($data['status'] == 3) {
            echo "
          <tr>
            <td valign='top' align='center'>".$data['id_trans']."</td>
            <td style='text-align: center'>".$data['nama']."</td>
            <td style='text-align: center'>".$data['alamat']."</td>
            <td style='text-align: center'>".$data['no_hp']."</td>
            <td style='text-align: center'><button data-toggle='modal' data-target='#myModal'><img data-toggle='modal' data-target='#myModal' id='bukti_bayar' src='../images/bukti_bayar/".$data['bukti_bayar']."' width='100px' height='50px'></td>
            <td style='text-align: center'>".$data['status_pesanan']."</td>
            <td style='text-align: center'>
              <a class='btn btn-primary btn-s' href='pesanan_kirim.php?id_trans=$data[id_trans]&no_hp=$data[no_hp]&alamat=$data[alamat]&id_member=$data[id_member]&nama=$data[nama]' id='kirim' title='Kirim '><i class='glyphicon glyphicon-send'></i></a>
              <a class='btn btn-success btn-s' title='DETAIL pesanan' href='pesanan_detail.php?id_trans=$data[id_trans]'><i class='glyphicon glyphicon-list'></i></a>
            </td>
          </tr>";
          }
          if ($data['status'] == 4) {
            echo "
          <tr>
            <td valign='top' align='center'>".$data['id_trans']."</td>
            <td style='text-align: center'>".$data['nama']."</td>
            <td style='text-align: center'>".$data['alamat']."</td>
            <td style='text-align: center'>".$data['no_hp']."</td>
            <td style='text-align: center'><button data-toggle='modal' data-target='#myModal'><img data-toggle='modal' data-target='#myModal' id='bukti_bayar' src='../images/bukti_bayar/".$data['bukti_bayar']."' width='100px' height='50px'></td>
            <td style='text-align: center'>".$data['status_pesanan']."</td>
            <td style='text-align: center'>
              <a href='pesanan_detail.php?id_trans=$data[id_trans]'><button type='submit' class='btn btn-success'>Detail</button></a>
          </tr>";
          }

          
        }
      }
      else {echo "Belum ada data";}
      ?>
    </tbody>
  </table>
  </div>
</div>



<script>
$("#bukti_bayar").click(function(){
    $("#myModal").modal();
  });
</script>
