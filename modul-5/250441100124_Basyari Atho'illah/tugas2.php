<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Timeline Perjalanan Belajar Coding</title>

    <style>
        body {
            font-family: Arial, sans-serif;
            background-color: #f4f6f9;
            margin: 40px;
        }

        .timeline {
            border-left: 4px solid #333;
            padding-left: 30px;
            margin-bottom: 30px;
        }

        .item {
            position: relative;
            margin-bottom: 25px;
            background-color: #fff;
            padding: 15px 20px;
            border-radius: 8px;
            box-shadow: 0 0 8px rgba(0,0,0,0.1);
        }

        .item h3 {
            margin: 0;
            font-size: 20px;
        }

        .item p {
            margin: 5px 0 0;
        }

        .item::before {
            content: "";
            position: absolute;
            left: -38px;
            top: 20px;
            width: 15px;
            height: 15px;
            background: #999;
            border-radius: 50%;
        }
        .hijau h3 {
            color: #27ae60;
        }

        .hijau::before {
            background: #27ae60;
        }

        .biru h3 {
            color: #2980b9;
        }

        .biru::before {
            background: #2980b9;
        }

        .orange h3 {
            color: #e67e22;
        }

        .orange::before {
            background: #e67e22;
        }

        .profil, .blog {
            display: inline-block;
            text-decoration: none;
            padding: 8px 12px;
            border-radius: 5px;
            color: white;
            margin-right: 10px;
            transition: 0.3s;
        }

        .profil {
            background-color: #4a64f5;
        }

        .profil:hover {
            background-color: #2f49d1;
        }

        .blog {
            background-color: #ff1a1a;
        }

        .blog:hover {
            background-color: #cc0000;
        }
    </style>
</head>

<body>

    <h2>Timeline Perjalanan Belajar Coding</h2>

    <div class="timeline">
        <?php
        $data = [
            2022 => "Mengenal HTML dan CSS",
            2023 => "Mengenal bahasa pemrograman PHP dan Framework Laravel",
            2024 => "Projek besar pertama menggunakan Framework Laravel",
            2025 => "Masuk Kuliah dan Mengenal bahasa pemrograman Python",
            2026 => "Mengenal Framework Tailwind CSS"
        ];

        foreach ($data as $tahun => $kegiatan) {
            echo "<div class='item " . highlight($tahun) . "'>";
            echo "<h3>$tahun</h3>";
            echo "<p>$kegiatan</p>";
            echo "</div>";
        }

        function highlight(int $tahun)
        {
            if ($tahun == 2022) {
                return "hijau";
            } elseif ($tahun == 2024) {
                return "biru";
            } elseif ($tahun == 2026) {
                return "orange";
            } else {
                return "";
            }
        }
        ?>
    </div>

    <a href="tugas1.php" class="profil">Halaman Profil</a>
    <a href="tugas3.php" class="blog">Halaman Blog</a>

</body>
</html>