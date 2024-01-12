	<?php 
	session_start();
	require 'koneksi.php';
	if($_SESSION['status']!="login"){
		header("location:index.php?pesan=belum_login");
	}
	?>