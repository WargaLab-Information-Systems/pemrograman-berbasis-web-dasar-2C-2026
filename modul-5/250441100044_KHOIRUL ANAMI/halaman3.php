<?php
$artikel = [
    "html" => [
        "judul" => "Belajar HTML Pertama Kali",
        "tanggal" => "2025-09-01",
        "isi" => "Awalnya saya merasa bingung ketika pertama kali belajar HTML karena banyak sekali tag dan struktur yang harus dipahami, namun seiring berjalannya waktu dan dengan terus mencoba serta berlatih, Alhamdulillah saya mulai memahami bagaimana struktur dasar sebuah web bekerja, mulai dari penulisan elemen, penggunaan atribut, hingga bagaimana halaman bisa ditampilkan dengan rapi di browser 😁",
        "gambar" => "gambar/awalbelajar.png",
        "link" => "https://www.w3schools.com/"
    ],
    "error" => [
        "judul" => "Error Pertama",
        "tanggal" => "2025-09-10",
        "isi" => "Error sering kali menjadi tantangan yang cukup membuat frustasi, terutama ketika tidak langsung mengetahui di mana letak kesalahannya. Tetapi dari situlah saya belajar untuk lebih teliti dalam membaca kode, memahami alur logika program, dan melatih kesabaran dalam menyelesaikan masalah, sehingga saya menjadi lebih terbiasa menghadapi error dan tidak mudah menyerah dalam proses belajar 😊",
        "gambar" => "gambar/eror.png",
        "link" => "https://www.petanikode.com/"
    ]
];

$quotes = [
    "Coding itu bukan bakat, tapi latihan.",
    "Error adalah teman terbaik programmer.",
    "Jangan takut gagal, takutlah tidak mencoba."
];

$randomQuote = $quotes[array_rand($quotes)];
$key = $_GET['artikel'] ?? null;
?>

<!DOCTYPE html>
<html>
<head>
<script src="https://cdn.tailwindcss.com"></script>
</head>

<body class="bg-gradient-to-br from-slate-900 via-purple-900 to-slate-900 min-h-screen text-white p-6">

<div class="max-w-4xl mx-auto">

<h1 class="text-3xl font-bold mb-6 text-center">📝 Blog Developer</h1>

<div class="grid md:grid-cols-3 gap-4 mb-6">
<?php foreach ($artikel as $k => $a): ?>
    <a href="?artikel=<?= $k ?>" class="bg-white/10 p-4 rounded-xl hover:scale-105 transition">
        <h2 class="font-bold"><?= $a['judul'] ?></h2>
        <p class="text-sm text-gray-400"><?= $a['tanggal'] ?></p>
    </a>
<?php endforeach; ?>

    <a href="?" class="bg-white/10 p-4 rounded-xl hover:scale-105 transition font-bold ">
        ← Kembali ke Beranda
    </a>
</div>

<?php if ($key && isset($artikel[$key])): ?>
<div class="bg-white/10 p-6 rounded-xl">
    <h2 class="text-xl font-bold"><?= $artikel[$key]['judul'] ?></h2>
    <p class="text-gray-400 mb-2"><?= $artikel[$key]['tanggal'] ?></p>
    <p class= "text-justify leading-relaxed text-gray-200"><?= $artikel[$key]['isi'] ?></p>
    <a href="<?= $artikel[$key]['link'] ?>" target="_blank" class="text-blue-400 underline block mt-2">🔗 Baca Referensi</a>
    <img src="<?= $artikel[$key]['gambar'] ?>" class="mt-4 rounded-lg">
</div>
<?php endif; ?>

<p class="mt-6 italic text-center text-purple-300">
"<?= $randomQuote ?>"
</p>

<div class="mt-8 flex justify-between">
    <a href="halaman1.php" class="bg-blue-500 px-4 py-2 rounded-lg">← Profil</a>
    <a href="halaman2.php" class="bg-purple-500 px-4 py-2 rounded-lg">Timeline →</a>
</div>

</div>

</body>
</html>