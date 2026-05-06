<?php
$timeline = [ 
    "2022" => "Masuk Kuliah",
    "2023" => "Belajar Python",
    "2024" => "Belajar HTML & CSS",
    "2025" => "Membuat Website Pertama",
    "2026" => "Belajar JavaScript & PHP",
];

function penekanan($tahun, $kegiatan) {
    if ($tahun == "2025") {
        return "<b style='color:red;'>$tahun - $kegiatan</b><br>";
    }
    return "$tahun - $kegiatan<br>";
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <style>
         body {
            font-family: Arial, sans-serif;
            background-color: #f4f6f9;
            margin: 20px;
        }

        .garisvertikal {
            border-left: 3px solid black;
            padding-left: 20px;
            margin: auto;
            background: white;
            padding-top: 20px;
            padding-bottom: 20px;
            border-radius: 10px;
            box-shadow: 0 2px 8px rgba(0,0,0,0.1);
        }

        .jarak {
            margin-bottom: 20px;
            position: relative;
            padding-left: 10px;
        }

        
        
    </style>
</head>
<body>
    <h2 style="text-align: center">Timeline Perjalanan Belajar Coding</h2>

    <div class="garisvertikal">
    <?php
    foreach ($timeline as $tahun => $kegiatan) {
        echo "<div class='jarak'>";
        echo penekanan($tahun, $kegiatan) ;
        echo "</div>";
    }
    ?>
    </div>

    <br>
    <a href="index.php">kembali ke profil</a> |
    <a href="blog.php">pergi ke blog</a>

</body>
</html>