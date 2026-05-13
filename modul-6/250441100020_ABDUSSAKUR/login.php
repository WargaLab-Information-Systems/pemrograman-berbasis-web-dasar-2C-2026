
<?php
session_start();
include 'koneksi.php';

$error_username = "";
$error_password = "";

if(isset($_POST['login'])){

    $username = $_POST['username'];
    $password = $_POST['password'];

    $query = "SELECT * FROM users
    WHERE username='$username'";

    $data = mysqli_fetch_assoc(
        mysqli_query($conn, $query)
    );

    if($data){

        if(password_verify(
            $password,
            $data['password']
        )){

            $_SESSION['login'] = true;

            $_SESSION['username']
            = $data['username'];

            $_SESSION['role']
            = $data['role'];

            header("Location: data_buku.php");

        }else{
            $error_password = "password tidak valid";
        }

    }else{
        $error_username = "username tidak valid";
    }
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body class="bg-primary-subtle min-vh-100 d-flex align-items-center">
    <section class="container">
        <div class="row justify-content-center">
            <div class="col-md-6 col-lg-5">
                <div class="card shadow-lg border-0 rounded-4">
                    <div class="card-body p-3">
                        <h2 class="text-center fw-bold mb-4 text-primary">Login</h2>
                        <form method="POST">
                            <div class="mb-3">
                                <label class="form-label fw-semibold">Username</label>
                                <input type="text" name="username" class="form-control border-primary rounded-3" required>
                                <div class="text-danger">
                                    <?php echo $error_username; ?>
                                </div>
                            </div>

                            <div class="mb-4">
                                <label class="form-label fw-semibold">Password</label>
                                <input type="password" name="password" class="form-control border-primary rounded-3" required>

                                <div class="text-danger small mt-1">
                                    <?php echo $error_password; ?>
                                </div>
                            </div>

                            <div class="d-grid">
                                <button type="submit" name="login" class="btn btn-primary rounded-3 fw-semibold">Login</button>
                            </div>

                            <div class="text-center mt-2">
                                <a href="register.php" class="text-decoration-none fw-semibold">Belum punya akun? Daftar</a>
                            </div>

                        </form>

                    </div>

                </div>

            </div>

        </div>

    </section>
</body>
</html>