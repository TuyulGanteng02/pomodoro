<?php
require 'session.php';
// Koneksi ke database (gantilah nilai-nilai berikut sesuai dengan informasi database Anda)
$host = "localhost";
$user = "root";
$password = "";
$database = "pomodoro";

$conn = new mysqli($host, $user, $password, $database);

// Periksa koneksi
if ($conn->connect_error) {
    die("Koneksi gagal: " . $conn->connect_error);
}

// Mendapatkan username dari user yang login (Anda dapat mengganti ini sesuai dengan implementasi login Anda)
$masuk=$_SESSION['username'];

// Kueri SELECT dengan pengurutan dan batasan
$select_query = "SELECT id_task, username, deskripsi, durasi, status 
                 FROM task 
                 INNER JOIN user ON task.id_user=user.id_user 
                 WHERE status = 'belum selesai' AND username = '$masuk'
                 ORDER BY id_task ASC
                 LIMIT 1";

$result = $conn->query($select_query);

if ($result->num_rows > 0) {
    // Output data dari hasil kueri
    $roww = $result->fetch_assoc();
    // Kueri UPDATE
    $update_query = "UPDATE task SET status = 'selesai' WHERE id_task = " . $roww["id_task"];

    if ($conn->query($update_query) === TRUE) {
        header("Location:dashboard.php?pesan=selesai");
    } else {
        echo "Error updating record: " . $conn->error;
    }
} else {
    header("Location:dashboard.php?pesan=tidakada");
}
?>