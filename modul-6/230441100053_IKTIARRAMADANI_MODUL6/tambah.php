<?php 
include 'auth.php'; 
include 'koneksi.php'; 

if (isset($_POST['submit'])) {
    $nama = htmlspecialchars($_POST['nama']);
    $kat  = htmlspecialchars($_POST['kategori']);
    $stok = (int)$_POST['stok'];
    $hrg  = $_POST['harga'];
    $tgl  = $_POST['tanggal'];
    $uid  = $_SESSION['user_id'];

    $stmt = $conn->prepare("INSERT INTO barang (nama_barang, kategori, stok, harga, tanggal_masuk, created_by) VALUES (?, ?, ?, ?, ?, ?)");
    $stmt->bind_param("ssidsi", $nama, $kat, $stok, $hrg, $tgl, $uid);
    
    if ($stmt->execute()) {
        echo "<script>alert('Data Berhasil Ditambah!'); window.location='index.php';</script>";
        exit;
    } else {
        echo "<script>alert('Gagal Menambah Data!');</script>";
    }
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Tambah Barang - Sistem Inventaris</title>
    <script src="https://cdn.tailwindcss.com"></script>
</head>
<body class="bg-gray-100 p-8">
    <div class="max-w-md mx-auto bg-white p-6 rounded border border-gray-300">
        <h2 class="text-xl font-bold mb-6">Tambah Barang</h2>
        
        <form method="POST" class="space-y-4">
            <div>
                <label class="block text-sm font-medium mb-1">Nama Barang</label>
                <input type="text" name="nama" class="w-full border border-gray-300 p-2 rounded outline-none focus:border-blue-500" required>
            </div>
            <div>
                <label class="block text-sm font-medium mb-1">Kategori</label>
                <input type="text" name="kategori" class="w-full border border-gray-300 p-2 rounded outline-none focus:border-blue-500" required>
            </div>
            <div class="grid grid-cols-2 gap-4">
                <div>
                    <label class="block text-sm font-medium mb-1">Stok</label>
                    <input type="number" name="stok" class="w-full border border-gray-300 p-2 rounded outline-none focus:border-blue-500" required min="0">
                </div>
                <div>
                    <label class="block text-sm font-medium mb-1">Harga</label>
                    <input type="number" name="harga" class="w-full border border-gray-300 p-2 rounded outline-none focus:border-blue-500" required min="0">
                </div>
            </div>
            <div>
                <label class="block text-sm font-medium mb-1">Tanggal Masuk</label>
                <input type="date" name="tanggal" class="w-full border border-gray-300 p-2 rounded outline-none focus:border-blue-500" value="<?= date('Y-m-d') ?>" required>
            </div>
            
            <div class="pt-2">
                <button type="submit" name="submit" class="w-full bg-blue-600 text-white py-2 rounded hover:bg-blue-700">Simpan</button>
                <a href="index.php" class="block text-center mt-4 text-gray-500 text-sm hover:underline">Batal</a>
            </div>
        </form>
    </div>
</body>
</html>