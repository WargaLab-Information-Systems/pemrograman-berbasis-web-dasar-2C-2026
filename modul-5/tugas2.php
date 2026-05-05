<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <title>Timeline Perjalanan Belajar Coding</title>
    <script src="https://cdn.tailwindcss.com"></script>
</head>
<body class="bg-pink-100">

<div class="max-w-4xl mx-auto py-8 px-4">
    <h1 class="text-3xl font-bold text-center text-purple-700 mb-10">~ TIMLINE PERJALANAN BELAJAR CODING 2025-2026 ~</h1>

    <?php
    $timeline = [
        ["tahun" => "September 2025", "event" => "Operator Aritmatika & Penyeleksian Kondisi", "deskripsi" => "Mempelajari dasar-dasar PHP seperti variabel, tipe data, operator aritmatika, dan struktur kontrol if-else."],
        ["tahun" => "Oktober 2025", "event" => "Looping, Pola Struktur Perulangan, & Function", "deskripsi" => "Mempelajari perulangan (while, do-while, for, foreach) serta pembuatan fungsi sendiri."],
        ["tahun" => "November 2025", "event" => "List dan Tuple & Dictionary dan Himpunan", "deskripsi" => "Mempelajari struktur data List, Tuple, Dictionary, dan Himpunan (Set) beserta operasinya."],
        ["tahun" => "Desember 2025", "event" => "Projek Akhir", "deskripsi" => "Menerapkan semua materi yang telah dipelajari untuk membuat project akhir semester."],
        ["tahun" => "Maret 2026", "event" => "HTML, CSS & Framework CSS", "deskripsi" => "Mempelajari desain web menggunakan HTML, CSS, dan Framework CSS seperti Tailwind."],
        ["tahun" => "April 2026", "event" => "JavaScript & PHP", "deskripsi" => "Mengintegrasikan JavaScript dengan PHP untuk membuat website yang lebih interaktif."]
    ];
    
    function highlightTahun($tahun) {
        if (strpos($tahun, "2026") !== false) {
        return "<span class='text-red-600 font-bold'>$tahun (Sekarang!)</span>";
        }
        return $tahun;
        }
    ?>

    <div class="space-y-8">
        <?php foreach ($timeline as $item): ?>
            <div class="bg-white p-6 rounded-lg shadow flex gap-6 items-start">
                <div class="w-20 h-20 bg-purple-400 text-white rounded-2xl flex flex-col items-center justify-center text-center flex-shrink-0">
                    <span class="text-xs font-medium"><?= highlightTahun($item['tahun']) ?></span></span>
                </div>
                
                <div class="pt-1">
                    <h3 class="text-xl font-semibold"><?= $item['event'] ?></h3>
                    <p class="text-pink-600 mt-2"><?= $item['deskripsi'] ?></p>
                </div>
            </div>
        <?php endforeach; ?>
    </div>

    <div class="text-center mt-12 space-x-4">
        <a href="tugas1.php" class="bg-gray-600 text-white px-6 py-3 rounded inline-block hover:bg-pink-500">← Kembali ke Profil</a>
        <a href="tugas3.php" class="bg-purple-600 text-white px-6 py-3 rounded inline-block hover:bg-pink-500">Menuju Blog Developer →</a>
    </div>  
</div>

</body>
</html>