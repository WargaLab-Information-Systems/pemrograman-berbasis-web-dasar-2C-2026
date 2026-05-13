<?php
$conn = new mysqli("localhost", "root", "", "sistem_buku");

if ($conn->connect_error) {
    die("Koneksi gagal: " . $conn->connect_error);
}
?>