<div class="box">
  <div class="box-body table-responsive padding">
    <table id="example1" class="table table-bordered table-striped">
      <thead>
        <tr>
          <th style="text-align: center">No.</th>
          <th style="text-align: center">Nama Member</th>
          <th style="text-align: center">Topik</th>
          <th style="text-align: center">Isi Konsultasi</th>
          <th style="text-align: center">Balas Konsultasi</th>
          <th style="text-align: center">Nama Penjawab</th>
          <th style="text-align: center">Aksi</th>
        </tr>
      </thead>
      <tbody>

        <?php
      $sql = "SELECT a.id_konsultasi, a.isi_konsultasi, a.balas_konsultasi, b.nama as nama_member, c.nama as nama_admin, d.nama_topik as nama_topike FROM tb_konsultasi a LEFT JOIN tb_member b on b.id_member = a.id_member
          LEFT JOIN tb_topik d on d.id_topik = a.id_topik  
          LEFT JOIN tb_login c on c.id_login = a.id_login";
      $result = mysqli_query($koneksi, $sql);
      $no = 1;
      if (mysqli_num_rows($result) > 0)
      {
        while ($data = mysqli_fetch_array($result))
        {?>
        <tr>
          <td style="text-align: center"><?= $no++ ?></td>
          <td style="text-align: left"><?= $data['nama_member'] ?></td>
          <td style="text-align: left"><?= $data['nama_topike'] ?></td>
          <td style="text-align: center"><?= $data['isi_konsultasi'] ?></td>
          <td style="text-align: center"><?= $data['balas_konsultasi'] ?></td>
          <td style="text-align: center"><?= $data['nama_admin'] ?></td>
          <td style="text-align: center">
            <a href="member_ubah.php?id=<?=$data['id_konsultasi'];?>" title="ubah Data" class="btn btn-warning btn-xs"><i
                class="glyphicon glyphicon-pencil"></i></a>
            <a href="member_reset.php?id=<?=$data['id_konsultasi'];?>" title="reset password"
              class="btn btn-secondary btn-xs"><i class="glyphicon glyphicon-lock"></i></a>
            <a href="member_hapus.php?id=<?=$data['id_konsultasi'];?>" title="Hapus Data" class="btn btn-danger btn-xs"
              OnClick="return confirm('Apakah Anda yakin?');"><i class="glyphicon glyphicon-trash"></i></a>
            <a data-toggle="modal" data-target="#detail" title="Detail Data" class="btn btn-info btn-xs"><i
                class="glyphicon glyphicon-user"></i></a>

          </td>
        </tr>

        <?php
        }
        
      }else{
        echo "tidak ada data";
      }
      ?>
      </tbody>
    </table>
  </div>
</div>