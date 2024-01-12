<?php
// mengaktifkan session php
session_start();
 
// menghubungkan dengan koneksi
include 'koneksi.php';
 
// menangkap data yang dikirim dari form
$user =mysqli_real_escape_string($db,$_POST['user_name']);
$pass =mysqli_real_escape_string($db,$_POST['user_pass']);
 
// menyeleksi data admin dengan username dan password yang sesuai
$data = mysqli_query($db,"select * from user where username='$user' and password='$pass'");
 
// menghitung jumlah data yang ditemukan
$cek = mysqli_num_rows($data);
 
if($cek > 0){
$sesi = mysqli_query($db,"select * from user where username='$user' and password='$pass'");
$sesi = mysqli_fetch_assoc($sesi);
	$_SESSION['id_user'] = $sesi['id_user'];
	$_SESSION['username'] = $sesi['username'];
	$_SESSION['status'] = "login";
	header("location:dashboard.php");
}else{
	header("location:index.php?pesan=gagal");
}
?>