<?php 
include 'auth.php'; 
include 'koneksi.php'; 

$query = "SELECT barang.*, users.username as pembuat FROM barang LEFT JOIN users ON barang.created_by = users.id ORDER BY barang.id DESC";
$result = $conn->query($query);
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Dashboard - Sistem Inventaris</title>
    <script src="https://cdn.tailwindcss.com"></script>
</head>
<body class="bg-white text-gray-800 p-8">
    <div class="max-w-5xl mx-auto">
        <div class="flex justify-between items-center mb-8">
            <h1 class="text-2xl font-bold">Data Inventaris</h1>
            <div class="text-right">
                <p class="text-sm">Halo, <b><?= htmlspecialchars($_SESSION['username']) ?></b> (<?= $_SESSION['role'] ?>)</p>
                <a href="logout.php" class="text-red-600 text-sm hover:underline" onclick="return confirm('Apakah Anda yakin ingin keluar?')">Logout</a>
            </div>
        </div>

        <div class="mb-4">
            <a href="tambah.php" class="bg-blue-600 text-white px-4 py-2 rounded hover:bg-blue-700 text-sm">Tambah Barang</a>
        </div>

        <table class="w-full border-collapse border border-gray-200">
            <thead>
                <tr class="bg-gray-100">
                    <th class="border p-2 text-left">Nama Barang</th>
                    <th class="border p-2 text-left">Kategori</th>
                    <th class="border p-2 text-left">Stok</th>
                    <th class="border p-2 text-left">Harga</th>
                    <th class="border p-2 text-left">Pembuat</th>
                    <th class="border p-2 text-center">Aksi</th>
                </tr>
            </thead>
            <tbody>
                <?php while($row = $result->fetch_assoc()): ?>
                <tr class="hover:bg-gray-50">
                    <td class="border p-2"><?= htmlspecialchars($row['nama_barang']) ?></td>
                    <td class="border p-2"><?= htmlspecialchars($row['kategori']) ?></td>
                    <td class="border p-2"><?= $row['stok'] ?></td>
                    <td class="border p-2">Rp <?= number_format($row['harga'], 0, ',', '.') ?></td>
                    <td class="border p-2 text-sm text-gray-500"><?= htmlspecialchars($row['pembuat'] ?? 'Unknown') ?></td>
                    <td class="border p-2 text-center">
                        <?php if (cekAkses($row['created_by'])): ?>
                            <a href="edit.php?id=<?= $row['id'] ?>" class="text-blue-600 hover:underline mr-2 text-sm">Edit</a>
                            <a href="hapus.php?id=<?= $row['id'] ?>" class="text-red-600 hover:underline text-sm" onclick="return confirm('Hapus?')">Hapus</a>
                        <?php else: ?>
                            <span class="text-gray-400 text-xs italic">Tidak Dapat Akses</span>
                        <?php endif; ?>
                    </td>
                </tr>
                <?php endwhile; ?>
            </tbody>
        </table>
    </div>
</body>
</html>
