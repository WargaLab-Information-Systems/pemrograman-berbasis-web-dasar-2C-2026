<?php
session_start();
include 'koneksi.php';

if (isset($_SESSION['user_id'])) {
    header("Location: index.php");
    exit;
}

if (isset($_POST['login'])) {
    $user = htmlspecialchars($_POST['username']);
    $pass = $_POST['password'];

    $stmt = $conn->prepare("SELECT * FROM users WHERE username = ?");
    $stmt->bind_param("s", $user);
    $stmt->execute();
    $res = $stmt->get_result();
    $data = $res->fetch_assoc();

    if ($data && password_verify($pass, $data['password'])) {
        $_SESSION['user_id'] = $data['id'];
        $_SESSION['username'] = $data['username'];
        $_SESSION['role'] = $data['role'];
        echo "<script>alert('Login Berhasil!'); window.location='index.php';</script>";
        exit;
    } else {
        echo "<script>alert('Username atau Password salah!');</script>";
    }
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Login - Sistem Inventaris</title>
    <script src="https://cdn.tailwindcss.com"></script>
</head>
<body class="bg-gray-100 flex items-center justify-center min-h-screen">
    <div class="bg-white p-8 rounded border border-gray-300 w-full max-w-sm">
        <h2 class="text-xl font-bold mb-6 text-center">LOGIN SISTEM</h2>
        
        <form method="POST" class="space-y-4">
            <div>
                <label class="block text-sm font-medium mb-1">Username</label>
                <input type="text" name="username" class="w-full border border-gray-300 p-2 rounded outline-none focus:border-blue-500" required>
            </div>
            <div>
                <label class="block text-sm font-medium mb-1">Password</label>
                <input type="password" name="password" class="w-full border border-gray-300 p-2 rounded outline-none focus:border-blue-500" required>
            </div>
            <button type="submit" name="login" class="w-full bg-blue-600 text-white py-2 rounded hover:bg-blue-700">Masuk</button>
        </form>
        
        <p class="mt-6 text-center text-sm">
            Belum punya akun? <a href="register.php" class="text-blue-600 hover:underline">Daftar</a>
        </p>
    </div>
</body>
</html>