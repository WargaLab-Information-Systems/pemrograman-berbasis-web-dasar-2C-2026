<?php

include 'cek_login.php';
include 'koneksi.php';

if ($_SESSION['role'] != 'admin') {

    die("Akses ditolak");
}

$id = $_GET['id'];

$query = "SELECT * FROM buku WHERE id='$id'";

$data = mysqli_fetch_assoc(
    mysqli_query($conn, $query)
);

if (isset($_POST['update'])) {

    $judul = $_POST['judul'];
    $penulis = $_POST['penulis'];
    $penerbit = $_POST['penerbit'];
    $tahun = $_POST['tahun'];
    $kategori = $_POST['kategori'];
    $stok = $_POST['stok'];

    $update = "UPDATE buku SET

        judul='$judul',
        penulis='$penulis',
        penerbit='$penerbit',
        tahun='$tahun',
        kategori='$kategori',
        stok='$stok'

        WHERE id='$id'
    ";

    mysqli_query($conn, $update);

    header("Location: data_buku.php");
}

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
    content="width=device-width, initial-scale=1.0">
    <title>Edit Buku</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css"rel="stylesheet">
</head>
<body class="bg-primary-subtle min-vh-100 d-flex align-items-center">
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8 col-lg-6">
                <div class="card shadow-lg rounded-4">
                    <div class="card-body p-5">
                        <h2 class="fw-bold text-primary text-center mb-4">Edit Buku</h2>

                        <form method="POST">
                            <div class="mb-3">
                                <label class="form-label fw-semibold">Judul</label>
                                <input type="text" name="judul" class="form-control border-primary rounded-3" value="<?php echo $data['judul']; ?>" required>
                            </div>

                            <div class="mb-3">
                                <label class="form-label fw-semibold">Penulis</label>
                                <input type="text" name="penulis" class="form-control border-primary rounded-3" value="<?php echo $data['penulis']; ?>" required>

                            </div>

                            <div class="mb-3">
                                <label class="form-label fw-semibold">Penerbit</label>
                                <input type="text" name="penerbit" class="form-control border-primary rounded-3" value="<?php echo $data['penerbit']; ?>" required>
                            </div>

                            <div class="mb-3">
                                <label class="form-label fw-semibold">Tahun</label>
                                <input type="number" name="tahun" min="0" class="form-control border-primary rounded-3" value="<?php echo $data['tahun']; ?>" required>

                            </div>

                            <div class="mb-3">
                                <label class="form-label fw-semibold">Kategori</label>
                                <input type="text" name="kategori" class="form-control border-primary rounded-3" value="<?php echo $data['kategori']; ?>" required>

                            </div>

                            <div class="mb-4">
                                <label class="form-label fw-semibold">Stok</label>
                                <input type="number" name="stok" min="0" class="form-control border-primary rounded-3" value="<?php echo $data['stok']; ?>" required>
                            </div>

                            <div class="d-flex gap-2">
                                <button type="submit" name="update" class="btn btn-primary rounded-3 fw-semibold">Update</button>
                                <a href="data_buku.php" class="btn btn-secondary rounded-3 fw-semibold">Kembali</a>

                            </div>

                        </form>

                    </div>

                </div>

            </div>

        </div>

    </div>
</body>
</html>