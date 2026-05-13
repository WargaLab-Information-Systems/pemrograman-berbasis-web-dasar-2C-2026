<?php
include 'koneksi.php';

if(isset($_POST['register'])){

    $nama = $_POST['nama'];
    $username = $_POST['username'];
    $password = password_hash(
        $_POST['password'],
        PASSWORD_DEFAULT
    );

    $role = "user";

    $query = "INSERT INTO users
    VALUES (
        NULL,
        '$nama',
        '$username',
        '$password',
        '$role'
    )";

    mysqli_query($conn, $query);

    echo "
    <script>
        alert('Register berhasil');
        window.location='login.php';
    </script>
    ";
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
    <style></style>
</head>
<body>
<body class="bg-primary-subtle min-vh-100 d-flex align-items-center">
    <section class="container ">
        <div class="d-flex justify-content-center">
            <div class="col-md-6 col-lg-5">
                <div class="card shadow-lg rounded-4">
                    <div class="card-body p-3">
                        <h2 class="text-center fw-bold mb-4 text-primary">Register</h2>

                        <form method="POST">
                            <div class="mb-3">
                                <label class="form-label fw-semibold">Nama</label>
                                <input type="text" name="nama" class="form-control border-primary rounded-3" required>
                            </div>

                            <div class="mb-3">
                                <label class="form-label fw-semibold">Username</label>
                                <input type="text" name="username" class="form-control border-primary rounded-3" required>
                            </div>

                            <div class="mb-3">
                                <label class="form-label fw-semibold">Password</label>
                                <input type="password" name="password" class="form-control border-primary rounded-3" required>
                            </div>

                            <div class="d-grid">
                                <button type="submit" name="register" class="btn btn-primary rounded-3 fw-semibold">Register</button>
                            </div>

                            <div class="text-center mt-4">
                                <a href="login.php" class="text-decoration-none fw-semibold">Sudah punya akun?</a>
                            </div>

                        </form>

                    </div>

                </div>

            </div>

        </div>
    </section>
</body>
</html>