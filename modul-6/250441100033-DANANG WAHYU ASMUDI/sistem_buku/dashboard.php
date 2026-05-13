<?php
include 'auth.php';
include 'koneksi.php';

if(isset($_POST['tambah']) && $_SESSION['role'] == 'admin') {

    $judul = $_POST['judul'];
    $penulis = $_POST['penulis'];
    $tahun = $_POST['tahun'];
    $harga = $_POST['harga'];
    $stok = $_POST['stok'];


    if(strlen($tahun) != 4 || $tahun < 1600) {
        die("Tahun harus 4 digit dan minimal 1600");
    }

    if($harga < 5000) {
        die("Harga minimal 5000");
    }

    if($stok < 1) {
        die("Stok minimal 1");
    }

    $stmt = $conn->prepare("INSERT INTO buku(judul,penulis,tahun,harga,stok) VALUES(?,?,?,?,?)");

    $stmt->bind_param("ssidi", $judul, $penulis, $tahun, $harga, $stok);

    $stmt->execute();

    header("Location: dashboard.php");
}

if(isset($_GET['hapus']) && $_SESSION['role'] == 'admin') {

    $id = $_GET['hapus'];

    $stmt = $conn->prepare("DELETE FROM buku WHERE id=?");

    $stmt->bind_param("i", $id);

    $stmt->execute();

    header("Location: dashboard.php");
}

if(isset($_POST['edit']) && $_SESSION['role'] == 'admin') {

    $id = $_POST['id'];
    $judul = $_POST['judul'];
    $penulis = $_POST['penulis'];
    $tahun = $_POST['tahun'];
    $harga = $_POST['harga'];
    $stok = $_POST['stok'];

    // Validasi
    if(strlen($tahun) != 4 || $tahun < 1600) {
        die("Tahun harus 4 digit dan minimal 1600");
    }

    if($harga < 5000) {
        die("Harga minimal 5000");
    }

    if($stok < 1) {
        die("Stok minimal 1");
    }

    $stmt = $conn->prepare("UPDATE buku SET judul=?, penulis=?, tahun=?, harga=?, stok=? WHERE id=?");

    $stmt->bind_param("ssidii", $judul, $penulis, $tahun, $harga, $stok, $id);

    $stmt->execute();

    header("Location: dashboard.php");
}

$data = $conn->query("SELECT * FROM buku");
?>

<!DOCTYPE html>
<html id="html">

<head>

    <title>Dashboard</title>

    <script src="https://cdn.tailwindcss.com"></script>

    <script>
    tailwind.config = {
        darkMode: 'class'
    }
    </script>

    <script src="theme.js"></script>

</head>

<body class="bg-slate-100 dark:bg-slate-900 min-h-screen duration-200">

<div class="max-w-7xl mx-auto p-6">
    <div class="bg-white dark:bg-slate-800 border border-slate-200 dark:border-slate-700 shadow-lg rounded-2xl p-6 mb-6 flex justify-between items-center">
        <div>
            <h1 class="text-3xl font-bold text-slate-800 dark:text-white">
                BookStore
            </h1>

            <p class="text-slate-500 dark:text-slate-300 mt-1">
                Sistem Penjualan Buku
            </p>
        </div>
        <div class="text-right">

            <p class="text-slate-600 dark:text-slate-300">
                <?= htmlspecialchars($_SESSION['username']) ?>
            </p>

            <p class="text-slate-500 dark:text-slate-400 mb-3">
                <?= htmlspecialchars($_SESSION['role']) ?>
            </p>

            <a href="logout.php"
            class="bg-red-500 hover:bg-red-600 text-white px-4 py-2 rounded-xl">

                Logout

            </a>

        </div>

    </div>

    <?php if($_SESSION['role'] == 'admin') : ?>

    <div class="bg-white dark:bg-slate-800 border border-slate-200 dark:border-slate-700 shadow-lg rounded-2xl p-6 mb-6">

        <h2 class="text-xl font-bold text-slate-800 dark:text-white mb-4">
            Tambah Buku
        </h2>

        <form method="POST">

            <div class="grid grid-cols-1 md:grid-cols-6 gap-3">

                <input type="text"
                name="judul"
                placeholder="Judul"
                required
                class="border border-slate-300 dark:border-slate-600 dark:bg-slate-700 dark:text-white rounded-xl px-4 py-3">

                <input type="text"
                name="penulis"
                placeholder="Penulis"
                required
                class="border border-slate-300 dark:border-slate-600 dark:bg-slate-700 dark:text-white rounded-xl px-4 py-3">

                <input type="number"
                name="tahun"
                placeholder="Tahun"
                required
                min="1600"
                max="9999"
                class="border border-slate-300 dark:border-slate-600 dark:bg-slate-700 dark:text-white rounded-xl px-4 py-3">

                <input type="number"
                step="0.01"
                name="harga"
                placeholder="Harga"
                required
                min="5000"
                class="border border-slate-300 dark:border-slate-600 dark:bg-slate-700 dark:text-white rounded-xl px-4 py-3">

                <input type="number"
                name="stok"
                placeholder="Stok"
                required
                min="1"
                class="border border-slate-300 dark:border-slate-600 dark:bg-slate-700 dark:text-white rounded-xl px-4 py-3">

                <button type="submit"
                name="tambah"
                class="bg-blue-600 hover:bg-blue-700 text-white rounded-xl px-4 py-3">
                    Tambah
                </button>
            </div>
        </form>
    </div>

    <?php endif; ?>

    <div class="bg-white dark:bg-slate-800 border border-slate-200 dark:border-slate-700 shadow-lg rounded-2xl overflow-hidden">
        <div class="overflow-x-auto">
            <table class="w-full">
                <thead class="bg-slate-800 text-white">
                    <tr>

                        <th class="p-4 text-left">Judul</th>
                        <th class="p-4 text-left">Penulis</th>
                        <th class="p-4 text-left">Tahun</th>
                        <th class="p-4 text-left">Harga</th>
                        <th class="p-4 text-left">Stok</th>

                        <?php if($_SESSION['role'] == 'admin') : ?>

                        <th class="p-4 text-left">Aksi</th>

                        <?php endif; ?>

                    </tr>

                </thead>

                <tbody>

                <?php while($row = $data->fetch_assoc()) : ?>

                <tr class="border-t border-slate-200 dark:border-slate-700 hover:bg-slate-50 dark:hover:bg-slate-700 duration-150">

                    <form method="POST">

                    <input type="hidden"
                    name="id"
                    value="<?= $row['id'] ?>">

                    <td class="p-4">

                        <input type="text"
                        name="judul"
                        value="<?= htmlspecialchars($row['judul']) ?>"
                        class="w-full border border-slate-300 dark:border-slate-600 dark:bg-slate-700 dark:text-white rounded-lg px-3 py-2"
                        <?php if($_SESSION['role'] == 'user') echo 'readonly'; ?>>

                    </td>

                    <td class="p-4">

                        <input type="text"
                        name="penulis"
                        value="<?= htmlspecialchars($row['penulis']) ?>"
                        class="w-full border border-slate-300 dark:border-slate-600 dark:bg-slate-700 dark:text-white rounded-lg px-3 py-2"
                        <?php if($_SESSION['role'] == 'user') echo 'readonly'; ?>>

                    </td>

                    <td class="p-4">

                        <input type="number"
                        name="tahun"
                        value="<?= htmlspecialchars($row['tahun']) ?>"
                        min="1600"
                        max="9999"
                        class="w-full border border-slate-300 dark:border-slate-600 dark:bg-slate-700 dark:text-white rounded-lg px-3 py-2"
                        <?php if($_SESSION['role'] == 'user') echo 'readonly'; ?>>

                    </td>

                    <td class="p-4">

                        <input type="number"
                        step="0.01"
                        name="harga"
                        value="<?= htmlspecialchars($row['harga']) ?>"
                        min="5000"
                        class="w-full border border-slate-300 dark:border-slate-600 dark:bg-slate-700 dark:text-white rounded-lg px-3 py-2"
                        <?php if($_SESSION['role'] == 'user') echo 'readonly'; ?>>

                    </td>

                    <td class="p-4">

                        <input type="number"
                        name="stok"
                        value="<?= htmlspecialchars($row['stok']) ?>"
                        min="1"
                        class="w-full border border-slate-300 dark:border-slate-600 dark:bg-slate-700 dark:text-white rounded-lg px-3 py-2"
                        <?php if($_SESSION['role'] == 'user') echo 'readonly'; ?>>

                    </td>

                    <?php if($_SESSION['role'] == 'admin') : ?>

                    <td class="p-4">
                        <div class="flex gap-2">
                            <button type="submit"
                            name="edit"
                            class="bg-yellow-500 hover:bg-yellow-600 text-white px-4 py-2 rounded-lg">
                                Edit
                            </button>

                            <a href="?hapus=<?= $row['id'] ?>"
                            onclick="return confirm('Hapus data?')"
                            class="bg-red-500 hover:bg-red-600 text-white px-4 py-2 rounded-lg">
                                Hapus
                            </a>
                        </div>
                    </td>

                    <?php endif; ?>

                    </form>

                </tr>

                <?php endwhile; ?>

                </tbody>

            </table>
        </div>
    </div>
</div>

<button onclick="toggleTheme()"
class="fixed bottom-5 right-5 bg-slate-800 dark:bg-slate-200 dark:text-black text-white w-12 h-12 rounded-xl shadow-lg">
    Tema
</button>

</body>
</html>