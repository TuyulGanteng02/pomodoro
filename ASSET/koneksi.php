<?php
//koneksi.php
$server = 'localhost';
$username = 'root';
$password = '';
$database = 'pomodoro';

$db = mysqli_connect($server,$username,$password,$database);
if (mysqli_connect_errno()){
	echo "Koneksi database gagal : " . mysqli_connect_error();
}
?>