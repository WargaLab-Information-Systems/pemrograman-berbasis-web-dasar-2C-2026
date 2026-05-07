<!DOCTYPE html>
<html>
<head>
    <title>Timeline Belajar Coding</title>
    <style>
        body {
            font-family: Arial;
        }

        h2 {
            text-align: center;
        }

        .timeline {
            border-left: 2px solid black;
            padding-left: 10px;
        }

        .timeline p {
            margin: 8px 0;
            padding: 5px;
        }

        .highlight {
            color: green;
            font-weight: bold;
        }

        a {
            text-decoration: none;
            color: blue;
        }

    </style>
</head>
<body>

<h2>Timeline Perjalanan Belajar Coding</h2>

<?php
$timeline = [
    "2022" => "Belajar Otodidak Python",
    "2023" => "Mulai meningkatkan skill",
    "2024" => "Belajar Lebih dalam tentang pemrogaman",
    "2025" => "Masuk Kuliah Serta Belajar Python lebih dalam",
    "2026" => "Belajar html, css, js, dan php"
];

function highlightTahun($tahun, $kegiatan) {
    if ($tahun == "2025") {
        return "<span class='highlight'>$tahun - $kegiatan</span>";
    } else {
        return "$tahun - $kegiatan";
    }
}
?>

<div class="timeline">
<?php
foreach ($timeline as $tahun => $kegiatan) {
    echo "<p>" . highlightTahun($tahun, $kegiatan) . "</p>";
}
?>
</div>

<hr>

<a href="hal1.php">Kembali ke Profil</a> |
<a href="hal3.php">Menuju Blog</a>

</body>
</html>