<?php
$host = "localhost";
$user = "root";
$pass = ""; // Kosong jika guna default XAMPP
$db = "kvkaunsel_db"; // Nama database anda

$conn = mysqli_connect($host, $user, $pass, $db);

if (!$conn) {
  die("Sambungan gagal: " . mysqli_connect_error());
}
?>
