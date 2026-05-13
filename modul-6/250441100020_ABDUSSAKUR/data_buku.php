<?php

session_start();

include 'koneksi.php';

if(!isset($_SESSION['login'])){

    header("Location: login.php");

}

$query = "SELECT * FROM buku";

$data = mysqli_query($conn, $query);

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Daftar buku</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css"rel="stylesheet">

</head>
<body class="bg-primary-subtle">

    <div class="container-fluid py-5">

        <div class="card border-0 shadow-lg rounded-4">

            <div class="card-body p-4">

                <h2 class="fw-bold text-primary mb-2">
                    Daftar Buku
                </h2>

                <p class="mb-4">
                    <?php 
                    if ($_SESSION['role'] == 'admin') {
                        echo "Selamat datang <b>admin</b>, <b>" . $_SESSION['username'] . "</b>";
                    } else {
                        echo "Selamat datang <b>" . $_SESSION['username'] . "</b>";
                    }
                    ?>
                </p>

                <?php
                if($_SESSION['role'] == "admin"){
                ?>

                <a 
                    href="tambah_buku.php" 
                    class="btn btn-primary rounded-3 fw-semibold mb-3"
                >
                    Tambah Buku
                </a>

                <?php } ?>

                <div class="table-responsive">

                    <table class="table table-bordered table-hover align-middle">

                        <tr class="table-primary text-center">

                            <th>No</th>
                            <th>Judul</th>
                            <th>Penulis</th>
                            <th>Penerbit</th>
                            <th>Tahun</th>
                            <th>Stok</th>

                            <?php
                            if($_SESSION['role'] == "admin"){
                            ?>

                            <th>Aksi</th>

                            <?php } ?>

                        </tr>

                        <?php
                        $no = 1;

                        while($row = mysqli_fetch_assoc($data)){
                        ?>

                        <tr>

                            <td class="text-center">
                                <?php echo $no++; ?>
                            </td>

                            <td>
                                <?php echo htmlspecialchars($row['judul']); ?>
                            </td>

                            <td>
                                <?php echo htmlspecialchars($row['penulis']); ?>
                            </td>

                            <td>
                                <?php echo htmlspecialchars($row['penerbit']); ?>
                            </td>

                            <td class="text-center">
                                <?php echo htmlspecialchars($row['tahun']); ?>
                            </td>

                            <td class="text-center">
                                <?php echo htmlspecialchars($row['stok']); ?>
                            </td>

                            <?php
                            if($_SESSION['role'] == "admin"){
                            ?>

                            <td>

                                <div class="d-flex gap-2 justify-content-center">

                                    <a 
                                        href="edit_buku.php?id=<?php echo $row['id']; ?>" 
                                        class="btn btn-warning btn-sm rounded-3 fw-semibold"
                                    >
                                        Edit
                                    </a>

                                    <a 
                                        href="hapus_buku.php?id=<?php echo $row['id']; ?>"
                                        class="btn btn-danger btn-sm rounded-3 fw-semibold"
                                    >
                                        Hapus
                                    </a>

                                </div>

                            </td>

                            <?php } ?>

                        </tr>

                        <?php } ?>

                    </table>

                </div>

                <div class="mt-4">

                    <a 
                        href="login.php" 
                        class="btn btn-secondary rounded-3 fw-semibold me-2"
                    >
                        Kembali
                    </a>

                    <a 
                        href="logout.php" 
                        class="btn btn-danger rounded-3 fw-semibold"
                    >
                        Logout
                    </a>

                </div>

            </div>

        </div>

    </div>
</body>
</html>