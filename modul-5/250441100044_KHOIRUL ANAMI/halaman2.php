<?php
function highlight($tahun, $target) {
    return $tahun == $target ? "text-blue-400 font-bold text-lg" : "text-gray-300";
}

$data = [
    ["tahun" => "2025-09-12", "event" => "Masuk dunia IT"],
    ["tahun" => "2025-10-01", "event" => "Belajar HTML & CSS"],
    ["tahun" => "2025-10-20", "event" => "Belajar JavaScript"],
    ["tahun" => "2025-11-02", "event" => "Membuat project pertama"],
    ["tahun" => "2025-12-12", "event" => "Belajar PHP & Backend"]
];
?>

<!DOCTYPE html>
<html>
<head>
<script src="https://cdn.tailwindcss.com"></script>
</head>

<body class="bg-gradient-to-br from-slate-900 via-purple-900 to-slate-900 min-h-screen text-white p-6">

<div class="max-w-3xl mx-auto">

<h1 class="text-3xl font-bold mb-8 text-center">📈 Timeline Perjalanan Coding</h1>

<div class="relative border border-purple-500 pl-6">

<?php foreach ($data as $d): ?>
    <div class="mb-8 relative">
        <p class="<?= highlight($d['tahun'], "2025-12-12") ?>">
            <?= $d['tahun'] ?>
        </p>
        <p class="text-gray-400"><?= $d['event'] ?></p>
    </div>
<?php endforeach; ?>

</div>

<div class="mt-10 flex justify-between">
    <a href="halaman1.php" class="bg-blue-500 px-4 py-2 rounded-lg">← Profil</a>
    <a href="halaman3.php" class="bg-purple-500 px-4 py-2 rounded-lg">Blog →</a>
</div>

</div>

</body>
</html>