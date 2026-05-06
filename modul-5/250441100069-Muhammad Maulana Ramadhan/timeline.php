<?php
function highlight($tahun) {
    if ($tahun == "2026") {
        return "text-purple-600 font-bold";
    }
    return "";
}

$data = [
    ["tahun"=>"2022", "kegiatan"=>"HTML"],
    ["tahun"=>"2023", "kegiatan"=>"CSS"],
    ["tahun"=>"2024", "kegiatan"=>"FRAMEWORK CSS"],
    ["tahun"=>"2025", "kegiatan"=>"JAVASCRIPT"],
    ["tahun"=>"2026", "kegiatan"=>"PHP"]
];
?>

<html>
<head>
<script src="https://cdn.tailwindcss.com"></script>
</head>

<body class="bg-gradient-to-r from-blue-100 to-purple-100 min-h-screen">
    
<nav class="bg-gradient-to-r from-blue-600 to-purple-600 text-white p-4">
<div class="max-w-5xl mx-auto flex justify-between">
    <h1 class="font-bold"> DevApp</h1>
<div class="space-x-4">
    <a href="index.php">Profil</a>
    <a href="timeline.php" class="underline">Timeline</a>
    <a href="blog.php">Blog</a>
</div>
</div>
</nav>

<div class="max-w-3xl mx-auto mt-10 bg-white p-6 rounded-2xl shadow-lg">

<h2 class="text-xl font-bold text-center text-blue-600 mb-6">
Timeline Belajar Coding
</h2>

<div class="border-l-4 border-purple-500 pl-6 space-y-4">
<?php foreach ($data as $d): ?>
<div class="bg-gray-50 p-3 rounded-lg shadow hover:bg-purple-50 transition">

<b class="<?= highlight($d['tahun']) ?>">
    <?= $d['tahun'] ?>
</b> - <?= $d['kegiatan'] ?>

</div>
<?php endforeach; ?>
</div>

</div>
</body>
</html>