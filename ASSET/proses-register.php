<?php
include "koneksi.php";
	
	$name = $_POST['name'];
	$password = $_POST['password'];
	
    mysqli_query($db,"INSERT INTO user (username, password, role) value ('$name','$password','user')");
	header("Location:login.php?pesan=berhasil");
?>
