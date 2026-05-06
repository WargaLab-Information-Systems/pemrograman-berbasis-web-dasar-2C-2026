<?php

$html = [
    "judul" => "Belajar HTML Pertama Kali",
    "tanggal" => "11 Maret 2026",
    "isi" => "Saya pertama kali belajar HTML dan mulai memahami struktur website.",
    "gambar" => "img/gambar_html.jpeg",
    "link" => "https://www.w3schools.com/html/"
];

$error = [
    "judul" => "Error Pertama",
    "tanggal" => "27 Maret 2026",
    "isi" => "Saya mengalami error pertama dan belajar cara memperbaikinya.",
    "gambar" => "img/gambar_coding_error.png",
    "link" => "https://www.petanikode.com/"
];

$post = isset($_GET['post']) ? $_GET['post'] : '';

$kata_kata = [
    "Jangan menyerah, kalau gak bisa ya sudahlah",
    "Error adalah guru terbaik, tapi ngeselin",
    "Coding itu proses belajar, kalau mau cepat pake GPT"
];
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <style>
        body {

            background-color: #f4f6f9;
            margin: 20px;
        }
        img {
            border-radius: 10px;
            max-width: 100%;
            height: auto;
        }
        .box {
            max-width: 700px;
            margin: 20px auto;
            background: white;
            padding: 20px;
            border-radius: 10px;
            box-shadow: 0 3px 10px rgba(0,0,0,0.1);
        }

    </style>
</head>
<body class="box">
    <h2 style="text-align: center">Blog Developer</h2>

    <a href="blog.php?post=html">belajar HTML pertama kali</a><br><br>
    <a href="blog.php?post=error">Error Pertama</a>
    <hr>

    <?php
    if ($post == "html") {

        echo "<h3>" . $html['judul'] . "</h3>";
        echo "<p>Tanggal: " . $html['tanggal'] . "</p>";
        echo "<p>" . $html['isi'] . "</p>";
        echo "<img src='" . $html['gambar'] . "' width='500'><br><br>";
        echo "<p><i>" . $kata_kata[array_rand($kata_kata)] . "</i></p>";
        echo "<a href='" . $html['link'] . "'>Baca Referensi</a>";

    } 
    if ($post == "error") {

        echo "<h3>" . $error['judul'] . "</h3>";
        echo "<p>Tanggal: " . $error['tanggal'] . "</p>";
        echo "<p>" . $error['isi'] . "</p>";
        echo "<img src='" . $error['gambar'] . "' width='500'><br><br>";
        echo "<p><i>" . $kata_kata[array_rand($kata_kata)] . "</i></p>";
        echo "<a href='" . $error['link'] . "'>Baca Referensi</a>";

    } 
    if ($post != '') {
    echo "<br><br><a href='blog.php'>Kembali ke awal</a>";
    }   
    ?>
    

    <hr>

    <a href="index.php">kembali ke profil</a> |
    <a href="timeline.php">kembali ke timeline</a>

</body>
</html>