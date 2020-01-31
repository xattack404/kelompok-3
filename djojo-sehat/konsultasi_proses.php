  <?php session_start();
  include 'config/koneksi.php';
   $topik = $_GET['topik'];
     $isi = $_GET['isi'];
    $sql = "INSERT INTO tb_konsultasi VALUES ('', '$_SESSION[id_member]', '$topik', '$isi', ' ', '1')";
    if(mysqli_query($koneksi, $sql)) 
      {
        echo "<script>alert('Insert data berhasil! Klik ok untuk melanjutkan');location.replace('konsultasi.html')</script>";
      } 
        else 
        {
          echo "Error updating record: " . mysqli_error($koneksi);
        }
  
  
  ?>