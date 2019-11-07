<div class="box">
  <div class="box-body table-responsive padding">
    <table id="example1" class="table table-bordered table-striped">
      <thead>
        <tr>
          <th style="text-align: center">No.</th>
          <th style="text-align: center">Nama</th>
          <th style="text-align: center">Alamat</th>
          <th style="text-align: center">Tempat, Tanggal Lahir</th>
          <th style="text-align: center">Kecamatan</th>
          <th style="text-align: center">Kabupaten</th>
          <th style="text-align: center">Kode Pos</th>
          <th style="text-align: center">Email</th>
          <th style="text-align: center">No Hp</th>
          <th style="text-align: center">Aksi</th>
        </tr>
      </thead>
      <tbody>

        <?php
      $sql = "SELECT * FROM tb_member";
      $result = mysqli_query($koneksi, $sql);
      $no = 1;
      if (mysqli_num_rows($result) > 0)
      {
        while ($data = mysqli_fetch_array($result))
        {?>
        <tr>
          <td style="text-align: center"><?= $no++ ?></td>
          <td style="text-align: left"><?= $data['nama'] ?></td>
          <td style="text-align: left"><?= $data['alamat'] ?></td>
          <td style="text-align: center"><?= $data['tempat_lahir'] ?>, <?= $data['tanggal_lahir'] ?></td>
          <td style="text-align: center"><?= $data['kecamatan'] ?></td>
          <td style="text-align: center"><?= $data['kabupaten_kota'] ?></td>
          <td style="text-align: center"><?= $data['kode_pos'] ?></td>
          <td style="text-align: center"><?= $data['email'] ?></td>
          <td style="text-align: center"><?= $data['no_hp'] ?></td>
          <td style="text-align: center">
            <a href="member_ubah.php?id=<?=$data['id_member'];?>" title="ubah Data" class="btn btn-warning btn-xs"><i
                class="glyphicon glyphicon-pencil"></i></a>
            <a href="member_reset.php?id=<?=$data['id_member'];?>" title="reset password"
              class="btn btn-secondary btn-xs"><i class="glyphicon glyphicon-lock"></i></a>
            <a href="member_hapus.php?id=<?=$data['id_member'];?>" title="Hapus Data" class="btn btn-danger btn-xs"
              OnClick="return confirm('Apakah Anda yakin?');"><i class="glyphicon glyphicon-trash"></i></a>
            <a href="member_detail.php?id=<?=$data['id_member'];?>" title="Detail Data" class="btn btn-info btn-xs"><i
                class="glyphicon glyphicon-user"></i></a>

          </td>
        </tr>

        <?php
        }
        
      }
      ?>
      </tbody>
    </table>
  </div>
</div>