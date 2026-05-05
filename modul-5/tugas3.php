<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <title>Blog Reflektif Developer</title>
    <script src="https://cdn.tailwindcss.com"></script>
</head>
<body class="bg-pink-100">

<div class="max-w-5xl mx-auto py-8 px-4">
    <h1 class="text-3xl font-bold text-center text-purple-700 mb-8">~ BLOG DEVELOPER ~</h1>

    <?php
    $artikel = [
        "html-pertama" => [
            "judul" => "Belajar HTML Pertama Kali",
            "tanggal" => "21 September 2025",
            "isi" => "Pengalaman pertama kali belajar HTML membuat saya sangat excited tapi saya merasa cukup bingung dengan berbagai tag dan struktur dasarnya seperti <html>, <head>, dan <body>, bahkan sering melakukan kesalahan seperti lupa menutup tag sehingga tampilan tidak sesuai. Namun setelah mencoba membuat halaman sederhana seperti biodata dan menambahkan teks maupun gambar, saya mulai memahami cara kerja HTML dan semakin tertarik belajar web development, karena dari setiap kesalahan tersebut saya mendapatkan pengalaman baru yang membantu saya berkembang.",
            "gambar" => "firsthtml.png",
            "link" => "https://www.w3schools.com/html/"
        ],
        "error-pertama" => [
            "judul" => "Error Pertama yang Tak Terlupakan",
            "tanggal" => "05 Maret 2026",
            "isi" => "Pada saat error saat pertama kali yaitu pada variabel nilai belum pernah dideklarasikan atau diberi nilai sebelumnya. Akibatnya, ketika program dijalankan, PHP menampilkan error “Undefined variable: nilai” karena mencoba memanggil variabel yang tidak ada.",
            "gambar" => "eror.png",
            "link" => "https://www.w3schools.com/php/"
        ]
    ];

    $kutipan = [
        "Programming is not about what you know, but what you can figure out.",
        "love programming"
    ];
    $kutipan_hari_ini = $kutipan[array_rand($kutipan)];

    $selected = $_GET['artikel'] ?? '';
    ?>

    <h2 class="text-2xl font-semibold mb-6">Daftar Artikel</h2>
    <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
        <?php foreach ($artikel as $key => $a): ?>
            <div onclick="window.location='tugas3.php?artikel=<?= $key ?>'" 
                 class="bg-white p-6 rounded-lg shadow hover:shadow-xl cursor-pointer transition">
                <h3 class="text-xl font-semibold"><?= htmlspecialchars($a['judul']) ?></h3>
                <small class="text-purple-500"><?= $a['tanggal'] ?></small>
            </div>
        <?php endforeach; ?>
    </div>

    <?php if ($selected && isset($artikel[$selected])): ?>
        <div class="mt-10 bg-white p-8 rounded-lg shadow">
            <h2 class="text-2xl font-bold"><?= htmlspecialchars($artikel[$selected]['judul']) ?></h2>
            <small class="text-purple-500"><?= $artikel[$selected]['tanggal'] ?></small>
            
            <p class="mt-6 text-gray-700 leading-relaxed"><?= nl2br(htmlspecialchars($artikel[$selected]['isi'])) ?></p>
            
            <img src=" <?= $artikel[$selected]['gambar'] ?>" alt="Ilustrasi" 
                 class="mt-6 w-full rounded-lg" style="max-width: 300px; width: 100%; height: auto;" onerror="this.style.display='none';">
            
            <p class="mt-6">
                <a href="<?= $artikel[$selected]['link'] ?>" target="_blank" class="text-blue-600 hover:underline">
                    🔗 Link Referensi
                </a>
            </p>
        </div>
    <?php endif; ?>

    <div class="bg-white p-6 rounded-lg shadow mt-10 text-center">
        <h3 class="text-lg font-semibold text-purple-700 mb-2">Motivation</h3>
        <blockquote class="italic text-gray-600 text-xl">
            "<?= $kutipan_hari_ini = $kutipan [array_rand($kutipan)];?>   
        </blockquote>
    </div>

    <div class="text-center mt-10">
        <a href="tugas1.php" class="bg-gray-600 text-white px-6 py-3 rounded inline-block hover:bg-pink-500">← Kembali ke Profil</a>
    </div>
</div>

</body>
</html>