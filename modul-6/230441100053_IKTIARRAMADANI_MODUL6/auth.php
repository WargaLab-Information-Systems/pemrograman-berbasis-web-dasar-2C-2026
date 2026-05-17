<?php
session_start();

// Redirect ke login jika belum ada session user_id
if (!isset($_SESSION['user_id'])) {
    header("Location: login.php");
    exit;
}

// Fungsi untuk mengecek apakah user adalah admin
function wajibAdmin() {
    if ($_SESSION['role'] !== 'admin') {
        echo "<script>alert('Akses Ditolak! Hanya untuk Admin.'); window.location='index.php';</script>";
        exit;
    }
}

// Fungsi untuk mengecek kepemilikan data atau jika user adalah admin
function cekAkses($created_by) {
    if ($_SESSION['role'] === 'admin') {
        return true;
    }
    return $_SESSION['user_id'] == $created_by;
}
?>