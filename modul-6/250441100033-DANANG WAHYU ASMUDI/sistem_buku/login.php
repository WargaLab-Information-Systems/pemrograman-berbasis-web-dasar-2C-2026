<?php
session_start();
include 'koneksi.php';

if(isset($_POST['login'])) {

    $username = $_POST['username'];
    $password = $_POST['password'];

    $stmt = $conn->prepare("SELECT * FROM users WHERE username=?");
    $stmt->bind_param("s", $username);
    $stmt->execute();

    $result = $stmt->get_result();

    if($result->num_rows > 0) {

        $data = $result->fetch_assoc();

        if(password_verify($password, $data['password'])) {

            $_SESSION['login'] = true;
            $_SESSION['username'] = $data['username'];
            $_SESSION['role'] = $data['role'];

            header("Location: dashboard.php");
            exit;
        }
    }

    $error = "Username atau password salah!";
}
?>

<!DOCTYPE html>
<html id="html">
<head>
    <title>Login</title>
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
                Login Sistem
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
            name="login"
            class="w-full bg-blue-600 hover:bg-blue-700 text-white font-semibold py-3 rounded-xl duration-200">
                Login
            </button>

        </form>
        <div class="text-center mt-5">
            <a href="register.php"
            class="text-blue-600 dark:text-blue-400 hover:underline">
                Belum punya akun? Register
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