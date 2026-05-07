<!DOCTYPE html>
<html>
<head>
    <title>Blog Developer</title>

    <style>
        body {
            font-family: Arial;
        }

        .container {
            display: flex;
        }

        .menu {
            width: 30%;
        }

        .content {
            width: 70%;
            padding-left: 10px;
        }

        a {
            display: block;
            margin-bottom: 5px;
        }

        img {
            max-width: 250px;
            margin-top: 10px;
        }

        .back-btn {
            display: inline-block;
            margin-top: 15px;
            padding: 8px 12px;
            background: #333;
            color: white;
            text-decoration: none;
            border-radius: 5px;
        }
    </style>
</head>

<body>

<h2>Blog Reflektif Developer</h2>

<div class="container">

    <div class="menu">
        <h3>Daftar Artikel</h3>
        <a href="?post=html">Belajar HTML</a>
        <a href="?post=error">Error Pertama</a>
    </div>

    <div class="content">

<?php

$data = [
    "html" => [
        "judul" => "Belajar HTML",
        "tanggal" => "03-02-2026",
        "isi" => "Pengalaman pertama kali belajar HTML di kampus. Belajar HTML itu ibarat memasang fondasi. Kita belajar menyusun elemen dasar agar halaman web punya struktur yang jelas.",
        "gambar" => "../img/html.png",
        "referensi" => "https://www.w3schools.com/html/"
    ],
    "error" => [
        "judul" => "Error Pertama dalam Pemrograman",
        "tanggal" => "21-09-2025",
        "isi" => "Pengalaman pertama kali mengalami error pada Python karena perbedaan variabel yang case sensitive. Ini penting untuk belajar debugging dan ketelitian.",
        "gambar" => "../img/eror.png",
        "referensi" => "https://kbbi.web.id/eror"
    ]
];

if (isset($_GET['post']) && array_key_exists($_GET['post'], $data)) {

    $d = $data[$_GET['post']];

    echo "<h3>{$d['judul']}</h3>";
    echo "<p><b>Tanggal:</b> {$d['tanggal']}</p>";
    echo "<p>{$d['isi']}</p>";
    echo "<img src='{$d['gambar']}'>";

    echo "<p><b>Referensi:</b> 
    <a href='{$d['referensi']}' target='_blank'>Klik untuk sumber belajar</a>
    </p>";

  
    $quotes = [
        "Terus belajar.",
        "Error itu wajar.",
        "Jangan menyerah.",
        "Setiap hari adalah kesempatan baru.",
        "Kesabaran adalah kunci."
    ];

    echo "<hr>";
    echo "<p><i> Motivasi: " . $quotes[array_rand($quotes)] . "</i></p>";


    echo "<a class='back-btn' href='?'>Kembali</a>";

} else {
    echo "<p>Pilih artikel di sebelah kiri untuk membaca isi blog.</p>";
}

?>

    </div>
</div>

<hr>

<a href="hal2.php">Kembali ke Timeline</a> |
<a href="hal1.php">Kembali ke Profil</a>

</body>
</html>