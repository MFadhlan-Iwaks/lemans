<?php

$host = "localhost";
$user = "root";       
$pass = "";           
$db   = "lemans_db";  

$conn = mysqli_connect($host, $user, $pass, $db);

if (!$conn) {
    die("Koneksi Windows Gagal: " . mysqli_connect_error());
}
?>