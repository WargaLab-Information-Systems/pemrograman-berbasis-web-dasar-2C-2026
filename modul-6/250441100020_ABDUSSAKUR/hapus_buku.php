<?php

include 'cek_login.php';

include 'koneksi.php';

if($_SESSION['role'] != 'admin'){

    die("Akses ditolak");

}

$id = $_GET['id'];

$query = "DELETE FROM buku
WHERE id='$id'";

mysqli_query($conn, $query);

header("Location: data_buku.php");

?>