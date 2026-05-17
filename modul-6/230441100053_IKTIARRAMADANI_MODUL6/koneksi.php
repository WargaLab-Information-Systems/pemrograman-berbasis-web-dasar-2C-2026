<?php
$host = "127.0.0.1";
$user = "root";
$pass = "root";
$db   = "db_inventaris";

$conn = new mysqli($host, $user, $pass, $db);

if ($conn->connect_error) {
    die("Koneksi Gagal: " . $conn->connect_error);
}
?>