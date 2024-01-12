<?php
include "koneksi.php";
	
	$id_user = $_POST['id_user'];
	$deskripsi = $_POST['deskripsi'];
	$durasi = $_POST['durasi'];
	
    mysqli_query($db,"INSERT INTO task (id_user, deskripsi, durasi, status) value ('$id_user','$deskripsi','$durasi','belum selesai')");
	header("Location:dashboard.php?pesan=berhasil");
?>
