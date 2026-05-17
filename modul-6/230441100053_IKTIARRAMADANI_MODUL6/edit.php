<?php 
include 'auth.php'; 
include 'koneksi.php'; 

if (!isset($_GET['id'])) header("Location: index.php");
$id = (int)$_GET['id'];
$stmt = $conn->prepare("SELECT * FROM barang WHERE id = ?");
$stmt->bind_param("i", $id);
$stmt->execute();
$row = $stmt->get_result()->fetch_assoc();

if (!$row) die("Data tidak ditemukan!");

if (!cekAkses($row['created_by'])) {
    echo "<script>alert('Akses Ditolak!'); window.location='index.php';</script>";
    exit;
}

if (isset($_POST['update'])) {
    $nama = htmlspecialchars($_POST['nama_barang']);
    $kat  = htmlspecialchars($_POST['kategori']);
    $stok = (int)$_POST['stok'];
    $hrg  = $_POST['harga'];

    $stmt = $conn->prepare("UPDATE barang SET nama_barang=?, kategori=?, stok=?, harga=? WHERE id=?");
    $stmt->bind_param("ssidi", $nama, $kat, $stok, $hrg, $id);
    
    if ($stmt->execute()) {
        echo "<script>alert('Data Berhasil Diperbarui!'); window.location='index.php';</script>";
        exit;
    } else {
        echo "<script>alert('Gagal Memperbarui Data!');</script>";
    }
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Edit Barang - Sistem Inventaris</title>
    <script src="https://cdn.tailwindcss.com"></script>
</head>
<body class="bg-gray-100 p-8">
    <div class="max-w-md mx-auto bg-white p-6 rounded border border-gray-300">
        <h2 class="text-xl font-bold mb-6">Edit Barang</h2>
        
        <form method="POST" class="space-y-4">
            <div>
                <label class="block text-sm font-medium mb-1">Nama Barang</label>
                <input type="text" name="nama_barang" value="<?= htmlspecialchars($row['nama_barang']) ?>" class="w-full border border-gray-300 p-2 rounded outline-none focus:border-blue-500" required>
            </div>
            <div>
                <label class="block text-sm font-medium mb-1">Kategori</label>
                <input type="text" name="kategori" value="<?= htmlspecialchars($row['kategori']) ?>" class="w-full border border-gray-300 p-2 rounded outline-none focus:border-blue-500" required>
            </div>
            <div class="grid grid-cols-2 gap-4">
                <div>
                    <label class="block text-sm font-medium mb-1">Stok</label>
                    <input type="number" name="stok" value="<?= $row['stok'] ?>" class="w-full border border-gray-300 p-2 rounded outline-none focus:border-blue-500" required min="0">
                </div>
                <div>
                    <label class="block text-sm font-medium mb-1">Harga</label>
                    <input type="number" name="harga" value="<?= $row['harga'] ?>" class="w-full border border-gray-300 p-2 rounded outline-none focus:border-blue-500" required min="0">
                </div>
            </div>
            
            <div class="pt-2">
                <button type="submit" name="update" class="w-full bg-blue-600 text-white py-2 rounded hover:bg-blue-700">Simpan Perubahan</button>
                <a href="index.php" class="block text-center mt-4 text-gray-500 text-sm hover:underline">Batal</a>
            </div>
        </form>
    </div>
</body>
</html>