<?php 
if(isset($_POST['email']))
{
	// include Database connection file 
	include '..config/koneksi.php';

	$username = mysqli_real_escape_string($koneksi, $_POST['email']);

	$query = "SELECT email FROM tb_member WHERE email = '$username'";
	if(!$result = mysqli_query($koneksi, $query))
	{
		exit(mysqli_error($koneksi));
	}

	if(mysqli_num_rows($result) > 0)
	{
		// username is already exist 
		echo '<div style="color: red;"> <b>'.$username.'</b> is already in use! </div>';
	}
	else
	{
		// username is avaialable to use.
		echo '<div style="color: green;"> <b>'.$username.'</b> is avaialable! </div>';
	}
}
 ?>