<?php
$artikel = [
    "html" => [
        "judul" => "Belajar HTML Pertama Kali",
        "tanggal" => "2024",
        "isi" => "Pengalaman pertama belajar HTML sangat menarik karena saya mulai memahami struktur dasar website.",
        "gambar" => "html.jpg",
        "link" => "https://developer.mozilla.org/id/docs/Web/HTML"
    ],
    "error" => [
        "judul" => "Error Pertama",
        "tanggal" => "2025",
        "isi" => "Mengalami error pertama membuat saya belajar lebih sabar dan teliti dalam menulis kode.",
        "gambar" => "error.jpeg",
        "link" => "https://stackoverflow.com/"
    ]
];

$quotes = [
    "Jangan menyerah belajar coding!",
    "Error adalah guru terbaik",
    "Ngoding itu proses",
    "Terus belajar dan jangan takut gagal"
];

$quote = $quotes[array_rand($quotes)];
?>
    
<!DOCTYPE html>
<html>
<head>
<title>Blog Developer</title>
<script src="https://cdn.tailwindcss.com"></script>
</head>

<body class="bg-gradient-to-r from-blue-100 to-purple-100 min-h-screen">

<nav class="bg-gradient-to-r from-blue-600 to-purple-600 text-white p-4">
  <div class="max-w-5xl mx-auto flex justify-between">
    <h1 class="font-bold"> DevApp</h1>
    <div class="space-x-4">
      <a href="index.php">Profil</a>
      <a href="timeline.php">Timeline</a>
      <a href="blog.php" class="underline">Blog</a>
    </div>
  </div>
</nav>

<div class="max-w-3xl mx-auto mt-10 bg-white p-6 rounded-2xl shadow-lg">

<h2 class="text-xl font-bold text-center text-purple-600 mb-4">
Blog Reflektif Developer
</h2>

<?php foreach ($artikel as $key => $a): ?>
<a href="?id=<?= $key ?>"
class="block p-3 mb-2 bg-gray-50 rounded-lg hover:bg-blue-100 transition">
<?= $a['judul'] ?>
</a>
<?php endforeach; ?>

<hr class="my-4">

<?php
if (isset($_GET['id']) && isset($artikel[$_GET['id']])) {
    $id = $_GET['id'];
?>

<h3 class="font-bold text-lg text-blue-600">
<?= $artikel[$id]['judul'] ?>
</h3>

<p class="text-sm text-gray-500">
Tanggal: <?= $artikel[$id]['tanggal'] ?>
</p>

<p class="mt-2">
<?= $artikel[$id]['isi'] ?>
</p>

<img src="<?= $artikel[$id]['gambar'] ?>"
class="mt-4 rounded-lg shadow">

<p class="mt-3">
Referensi:
<a href="<?= $artikel[$id]['link'] ?>" target="_blank"
class="text-blue-500 underline">
Klik di sini
</a>
</p>

<?php
} elseif (isset($_GET['id'])) {
    echo "<p class='text-red-500'>Artikel tidak ditemukan</p>";
}
?>

<div class="mt-6 p-4 bg-purple-100 rounded-lg text-center italic">
"<?= $quote ?>"
</div>

</div>
</body>
</html>