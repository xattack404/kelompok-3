<?php
if ($_GET['id_navigasi'] == 1) {
  echo "Home";
}
elseif ($_GET['id_navigasi'] == 2) {
  echo "Cara Order";
}
elseif ($_GET['id_navigasi'] == 3) {
  echo "Ketentuan";
}
elseif ($_GET['id_navigasi'] == 4) {
  echo "Kontak";
}
elseif ($_GET['id_navigasi'] == 5) {
  echo "Profil";
}
elseif ($_GET['id_navigasi'] == 6) {
  echo "Katalog Barang";
}
elseif ($_GET['id_navigasi'] == 7) {
  echo "Keranjang Belanja";
}
elseif ($_GET['id_navigasi'] == 8) {
  echo "Konsultasi";
}
elseif ($_GET['id_navigasi'] == 9) {
  echo "Login";
}
else {
  echo "<script>alert('Maaf, data yang Anda cari tidak ditemukan');location.replace('home.php')</script>";
}
?>
