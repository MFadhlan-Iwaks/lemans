<?php
// SIMPAN SEBAGAI db.php DI WINDOWS (XAMPP)
$host = "localhost";
$user = "root";       // Username bawaan XAMPP
$pass = "";           // Password bawaan XAMPP biasanya kosong
$db   = "lemans_db";  // Pastikan database ini sudah dibuat di phpMyAdmin

$conn = mysqli_connect($host, $user, $pass, $db);

if (!$conn) {
    die("Koneksi Windows Gagal: " . mysqli_connect_error());
}
?>