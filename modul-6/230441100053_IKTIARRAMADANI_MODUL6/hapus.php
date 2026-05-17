<?php
include 'auth.php';
include 'koneksi.php';

if (isset($_GET['id'])) {
    $id = (int)$_GET['id'];

    $cek = $conn->prepare("SELECT created_by FROM barang WHERE id = ?");
    $cek->bind_param("i", $id);
    $cek->execute();
    $res = $cek->get_result()->fetch_assoc();

    if (!$res) {
        header("Location: index.php");
        exit;
    }

    if (!cekAkses($res['created_by'])) {
        echo "<script>alert('Akses Ditolak!'); window.location='index.php';</script>";
        exit;
    }

    $stmt = $conn->prepare("DELETE FROM barang WHERE id = ?");
    $stmt->bind_param("i", $id);

    if ($stmt->execute()) {
        echo "<script>alert('Data Berhasil Dihapus!'); window.location='index.php';</script>";
        exit;
    } else {
        echo "<script>alert('Gagal Menghapus Data!'); window.location='index.php';</script>";
    }
} else {
    header("Location: index.php");
}
?>