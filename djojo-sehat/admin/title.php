<?php 

if($_SESSION['akses'] == 'admin')
{
  echo "Admin Area | $namatoko";
}
if($_SESSION['akses'] == 'admin2')
{
  echo "Super Admin Area | $namatoko";
}
?>