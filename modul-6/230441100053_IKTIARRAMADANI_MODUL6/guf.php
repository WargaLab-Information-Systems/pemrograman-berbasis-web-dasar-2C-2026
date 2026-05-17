<?php
// 1. Sertakan file koneksi
include 'koneksi.php';

// 2. Ambil ID dari URL
$id = $_GET['id'];

// 3. Buat query delete
$sql = "DELETE FROM users WHERE id = '$id'";

// 4. Eksekusi query
if (mysqli_query($conn, $sql)) {
    // Jika berhasil, kembali ke halaman utama
    header("Location: index.php?pesan=hapus_sukses");
} else {
    // Jika gagal
    echo "Error deleting record: " . mysqli_error($conn);
}

// 5. Tutup koneksi
mysqli_close($conn);
?>
