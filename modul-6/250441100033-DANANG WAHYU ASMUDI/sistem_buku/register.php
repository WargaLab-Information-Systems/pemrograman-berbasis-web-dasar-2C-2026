<?php
include 'koneksi.php';

if(isset($_POST['register'])) {

    $username = $_POST['username'];
    $password = password_hash($_POST['password'], PASSWORD_DEFAULT);

    $role = "user";

    $stmt = $conn->prepare("INSERT INTO users(username,password,role) VALUES(?,?,?)");

    $stmt->bind_param("sss", $username, $password, $role);

    if($stmt->execute()) {

        echo "<script>
        alert('Registrasi berhasil');
        window.location='login.php';
        </script>";

    } else {

        $error = "Username sudah digunakan!";
    }
}
?>

<!DOCTYPE html>
<html id="html">

<head>

    <title>Register</title>

    <script src="https://cdn.tailwindcss.com"></script>

    <script>
    tailwind.config = {
        darkMode: 'class'
    }
    </script>

    <script src="theme.js"></script>

</head>

<body class="bg-slate-100 dark:bg-slate-900 min-h-screen flex items-center justify-center duration-200">
<div class="w-full max-w-md p-5">
    <div class="bg-white dark:bg-slate-800 shadow-xl rounded-2xl p-8 border border-slate-200 dark:border-slate-700">
        <div class="text-center mb-8">
            <h1 class="text-3xl font-bold text-slate-800 dark:text-white">
                BookStore
            </h1>

            <p class="text-slate-500 dark:text-slate-300 mt-2">
                Register Pembeli
            </p>
        </div>
        <?php if(isset($error)) : ?>
        <div class="bg-red-100 text-red-600 border border-red-300 px-4 py-3 rounded-xl mb-5">
            <?= $error ?>
        </div>
        <?php endif; ?>

        <form method="POST" class="space-y-4">

            <input type="text"
            name="username"
            placeholder="Username"
            required
            class="w-full border border-slate-300 dark:border-slate-600 dark:bg-slate-700 dark:text-white rounded-xl px-4 py-3 focus:outline-none focus:ring-2 focus:ring-blue-500">

            <input type="password"
            name="password"
            placeholder="Password"
            required
            class="w-full border border-slate-300 dark:border-slate-600 dark:bg-slate-700 dark:text-white rounded-xl px-4 py-3 focus:outline-none focus:ring-2 focus:ring-blue-500">

            <button type="submit"
            name="register"
            class="w-full bg-blue-600 hover:bg-blue-700 text-white font-semibold py-3 rounded-xl duration-200">
                Register
            </button>
        </form>
        <div class="text-center mt-5">
            <a href="login.php"
            class="text-blue-600 dark:text-blue-400 hover:underline">
                Sudah punya akun? Login
            </a>
        </div>
    </div>
</div>
<button onclick="toggleTheme()"
class="fixed bottom-5 right-5 bg-slate-800 dark:bg-slate-200 dark:text-black text-white w-12 h-12 rounded-xl shadow-lg">
    Tema
</button>

</body>
</html>