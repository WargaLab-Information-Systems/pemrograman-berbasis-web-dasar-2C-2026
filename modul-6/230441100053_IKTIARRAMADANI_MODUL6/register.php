<?php
session_start();
include 'koneksi.php';

if (isset($_SESSION['user_id'])) {
    header("Location: index.php");
    exit;
}

if (isset($_POST['register'])) {
    $user = htmlspecialchars($_POST['username']);
    $pass = $_POST['password'];
    $role = $_POST['role'];
    $hash = password_hash($pass, PASSWORD_DEFAULT);

    $cek = $conn->prepare("SELECT id FROM users WHERE username = ?");
    $cek->bind_param("s", $user);
    $cek->execute();
    if ($cek->get_result()->num_rows > 0) {
        echo "<script>alert('Username sudah ada!');</script>";
    } else {
        $stmt = $conn->prepare("INSERT INTO users (username, password, role) VALUES (?, ?, ?)");
        $stmt->bind_param("sss", $user, $hash, $role);
        if ($stmt->execute()) {
            echo "<script>alert('Registrasi Berhasil! Silakan Login.'); window.location='login.php';</script>";
            exit;
        } else {
            echo "<script>alert('Gagal Mendaftar!');</script>";
        }
    }
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Daftar - Sistem Inventaris</title>
    <script src="https://cdn.tailwindcss.com"></script>
</head>
<body class="bg-gray-100 flex items-center justify-center min-h-screen">
    <div class="bg-white p-8 rounded border border-gray-300 w-full max-w-sm">
        <h2 class="text-xl font-bold mb-6 text-center">DAFTAR AKUN</h2>
        
        <form method="POST" class="space-y-4">
            <div>
                <label class="block text-sm font-medium mb-1">Username</label>
                <input type="text" name="username" class="w-full border border-gray-300 p-2 rounded outline-none focus:border-blue-500" required>
            </div>
            <div>
                <label class="block text-sm font-medium mb-1">Password</label>
                <input type="password" name="password" class="w-full border border-gray-300 p-2 rounded outline-none focus:border-blue-500" required>
            </div>
            <div>
                <label class="block text-sm font-medium mb-1">Role</label>
                <select name="role" class="w-full border border-gray-300 p-2 rounded outline-none focus:border-blue-500">
                    <option value="user">User</option>
                    <option value="admin">Admin</option>
                </select>
            </div>
            <button type="submit" name="register" class="w-full bg-blue-600 text-white py-2 rounded hover:bg-blue-700">Daftar</button>
        </form>
        
        <p class="mt-6 text-center text-sm">
            Sudah punya akun? <a href="login.php" class="text-blue-600 hover:underline">Login</a>
        </p>
    </div>
</body>
</html>