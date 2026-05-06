<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Blog Reflektif Developer</title>

    <style>
        body {
            font-family: Arial, sans-serif;
            background-color: #f4f6f9;
            margin: 40px;
        }
        a {
            text-decoration: none;
            color: #007bff;
            display: inline-block;
            margin-bottom: 8px;
            font-size: large;
        }

        .card {
            background-color: #fff;
            padding: 20px;
            border-radius: 10px;
            box-shadow: 0 0 10px rgba(0,0,0,0.1);
            margin-top: 20px;
        }

        small {
            color: #777;
        }

        p {
            line-height: 1.6;
        }

        img {
            width: 100%;
            max-width: 400px;
            border-radius: 8px;
            margin-top: 10px;
        }

        .readmore {
            display: inline-block;
            margin-top: 10px;
            background-color: #28a745;
            color: white;
            padding: 8px 12px;
            border-radius: 5px;
        }

        .readmore:hover {
            background-color: #1e7e34;
        }

        blockquote {
            margin-top: 20px;
            padding: 15px;
            background-color: #fff;
            border-left: 5px solid #007bff;
            font-style: italic;
        }

        .profil, .timeline {
            display: inline-block;
            text-decoration: none;
            padding: 8px 12px;
            border-radius: 5px;
            color: white;
            margin-top: 20px;
            margin-right: 10px;
        }

        .profil {
            background-color: #4a64f5;
        }

        .profil:hover {
            background-color: #2f49d1;
        }

        .timeline {
            background-color: #ff1a1a;
        }

        .timeline:hover {
            background-color: #cc0000;
        }
    </style>
</head>

<body>

    <?php
    $blog = [
        "html" => [
            "judul" => "Apa itu koding?",
            "tanggal posting" => "30 September 2020",
            "isi" => "Di era digital dan perkembangan teknologi yang pesat seperti sekarang ini. Profesi programmer atau developer perangkat lunak banyak menarik minat atau menjadi primadona sebagian orang. Perkembangan perangkat lunak atau aplikasi tidak terlepas dari para programmer yang mengembangkannya, dengan kata lain programmer lah yang meng coding aplikasi tersebut. Jadi apa itu coding? Dimana memulai belajar coding? Temukan jawabannya melalui uraian di bawah ini.",
            "gambar" => "img/1.jpg",
            "link" => "https://www.dicoding.com/blog/apa-itu-coding/"
        ],
        "error" => [
            "judul" => "Error: Pengertian, Jenis, dan Dampaknya",
            "tanggal posting" => "20 February 2025",
            "isi" => "Istilah error digunakan dalam dua jenis yang berbeda. Ini mengacu pada perbedaan antara nilai yang dihitung, diamati, atau terukur dan nilai benar, ditentukan, atau secara teoritis benar. Hal tersebut adalah kesalahan yang mengacu pada perbedaan antara output aktual perangkat lunak dan keluaran yang benar. Fault adalah suatu kondisi yang menyebabkan suatu sistem gagal dalam melakukan fungsi yang disyaratkan. Fault adalah alasan dasar untuk kerusakan perangkat lunak (software malfunction) dan identik dengan istilah bug yang umum digunakan. Failure adalah ketidakmampuan suatu sistem atau komponen untuk melakukan fungsi yang dibutuhkan sesuai dengan spesifikasinya. Kegagalan perangkat lunak (software failure) terjadi jika perilaku perangkat lunak berbeda dari perilaku yang ditentukan/dispesifikasikan.",
            "gambar" => "img/2.png",
            "link" => "https://bse-pwt.telkomuniversity.ac.id/perbedaan-antara-error-fault-dan-failure/"
        ]
    ];

    foreach ($blog as $key => $data) {
        echo "<a href='?blog=$key'>• " . $data['judul'] . "</a><br>";
    }

    if (isset($_GET['blog']) && array_key_exists($_GET['blog'], $blog)) {
        $key = $_GET['blog'];
        $data = $blog[$key];
    }

    if (isset($data)) {
        echo "<div class='card'>";
        echo "<h2>" . $data['judul'] . "</h2>";
        echo "<small>" . $data['tanggal posting'] . "</small>";
        echo "<p>" . $data['isi'] . "</p>";
        echo "<img src='" . $data['gambar'] . "'>";
        echo "<br><a href='" . $data['link'] . "' target='_blank' class='readmore'>Baca selengkapnya</a>";
        echo "</div>";
    }

    $quotes = [
        "Coding itu latihan, bukan bakat",
        "Error adalah guru terbaik",
        "Ngoding pelan asal paham lebih baik daripada cepat tapi bingung",
        "Pemrograman bukan tentang apa yang kamu ketahui, tetapi tentang apa yang dapat kamu cari tahu.",
        "Kode lebih sering dibaca daripada ditulis.",
        "Kode itu seperti humor. Saat Anda harus menjelaskannya, itu berarti humornya buruk."
    ];

    $randomQuote = $quotes[array_rand($quotes)];

    echo "<blockquote>$randomQuote</blockquote>";
    ?>

    <br>

    <a href="tugas1.php" class="profil">Halaman Profil</a>
    <a href="tugas2.php" class="timeline">Halaman Timeline</a>

</body>

</html>