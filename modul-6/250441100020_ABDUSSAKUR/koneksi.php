<!-- koneksi -->
<?php
$servername = "localhost";
$username = "root";
$password = "";
$database = "perpustakaan";

$conn = new mysqli($servername, $username, $password, $database);

if (!$conn) {
    die("Koneksi gagal: " . mysqli_connect_error());
}

?>