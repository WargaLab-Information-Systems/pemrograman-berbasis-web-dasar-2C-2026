<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Blog Reflektif Developer</title>
    <script src="https://cdn.tailwindcss.com"></script>
</head>
<body class="bg-slate-50 min-h-screen">

    <div class="max-w-5xl mx-auto p-6 md:p-12">
        <header class="mb-10 border-b pb-6">
            <h1 class="text-3xl font-extrabold text-slate-800">Blog <span class="text-fuchsia-500 hover:text-blue-500">Dev_Andhini</span></h1>
            <p class="text-slate-500">Berbagi pengalaman, error, dan kemenangan kecil dalam coding.</p>
        </header>

        <div class="grid grid-cols-1 md:grid-cols-3 gap-8">
            
            <aside class="space-y-4">
                <h2 class="text-lg font-bold text-slate-700 mb-4 uppercase tracking-wider text-sm">Daftar Artikel</h2>
                <nav class="flex flex-col gap-2">
                    <?php
                    $artikel_list = [
                        "html-dasar" => "Belajar HTML Pertama Kali",
                        "error-log" => "Menghadapi Error 404 & Syntax Error",
                        "tailwind-journey" => "Eksplorasi Desain dengan Tailwind CSS"
                    ];

                    foreach ($artikel_list as $slug => $judul) {
                        $activeClass = (isset($_GET['post']) && $_GET['post'] == $slug) ? 'bg-fuchsia-600 text-white shadow-md' : 'bg-white text-slate-600 hover:bg-blue-50 border border-slate-200';
                        echo "<a href='?post=$slug' class='p-3 rounded-lg transition-all font-medium $activeClass'>$judul</a>";
                    }
                    ?>
                </nav>

                <div class="mt-8 p-6 bg-fuchsia-500 rounded-2xl text-white shadow-lg">
                    <h3 class="text-xs font-bold uppercase opacity-80 mb-2 italic">Motivasi Hari Ini:</h3>
                    <?php
                    $quotes = [
                        "Tidak harus pintar dulu untuk mulai, tapi mulailah dulu untuk menjadi pintar.",
                        "Setiap error adalah pelajaran yang membuatmu selangkah lebih ahli.",
                        "Coding adalah seni memecahkan masalah yang tidak kamu ketahui sebelumnya.",
                    ];
                    $random_quote = $quotes[array_rand($quotes)];
                    echo "<p class='font-medium'>\"$random_quote\"</p>";
                    ?>
                </div>
            </aside>

            <main class="md:col-span-2">
                <?php
                $konten = [
                    "html-dasar" => [
                        "judul" => "Belajar HTML Pertama Kali",
                        "tanggal" => "24 Februari 2026",
                        "refleksi" => "Saat pertama kali melihat tag <html> di layar, saya merasa seperti sedang mempelajari bahasa rahasia. Membuat teks menjadi 'Hello World' di browser adalah kemenangan besar bagi saya saat itu.",
                        "gambar" => "html.png",
                        "link" => "https://www.w3schools.com/html/"
                    ],
                    "error-log" => [
                        "judul" => "Menghadapi Error",
                        "tanggal" => "24 Februari 2026",
                        "refleksi" => "Error pertama saya membuat saya panik selama berjam-jam, hanya karena kurang satu titik koma (;). Dari sini saya belajar bahwa ketelitian adalah kunci utama seorang developer.",
                        "gambar" => "eror.jpeg",
                        "link" => "https://developer.mozilla.org/en-US/docs/Web/HTTP/Status/404"
                    ],
                    "tailwind-journey" => [
                        "judul" => "Eksplorasi Desain dengan Tailwind CSS",
                        "tanggal" => "7 April 2026",
                        "refleksi" => "Tailwind mengubah cara saya memandang CSS. Tidak lagi pusing dengan penamaan class yang panjang, cukup utility class dan desain langsung jadi dengan rapi.",
                        "gambar" => "tailwind.png",
                        "link" => "https://tailwindcss.com/"
                    ]
                ];

                $selected_post = $_GET['post'] ?? null;

                if ($selected_post && isset($konten[$selected_post])) {
                    $post = $konten[$selected_post];
                    ?>
                    <article class="bg-white p-8 rounded-2xl shadow-sm border border-slate-200">
                        <header class="mb-6">
                            <span class="text-blue-600 text-sm font-bold uppercase tracking-widest"><?= $post['tanggal']; ?></span>
                            <h2 class="text-3xl font-bold text-slate-800 mt-2"><? $post['judul']; ?></h2>
                        </header>
                        
                        <div class="mb-6 overflow-hidden rounded-xl h-64 bg-slate-200">
                            <img src="img/<?= htmlspecialchars($post['gambar']); ?>" 
                                alt="<?= htmlspecialchars($post['judul']); ?>" 
                                class="w-full h-full object-cover hover:scale-105 transition-transform duration-500">
                        </div>

                        <div class="max-w-none">
                            <p class="text-slate-600  text-lg italic">"<?php echo $post['refleksi']; ?>"</p>
                        </div>

                        <div class="mt-8 pt-6 border-t">
                            <a href="<?php echo $post['link']; ?>" target="_blank" class="text-blue-600 font-semibold hover:underline flex items-center gap-1">
                                Referensi Dokumentasi Eksternal 
                                <svg xmlns="http://www.w3.org/2000/svg" class="h-4 w-4"></svg>
                            </a>
                        </div>
                    </article>
                    <?php
                } else {
                    echo "
                    <div class='bg-blue-50 border-2 border-dashed border-blue-200 p-12 rounded-2xl text-center'>
                        <div class='text-5xl mb-4'>📑</div>
                        <h3 class='text-xl font-bold text-blue-800'>Selamat Datang di Blog</h3>
                        <p class='text-blue-600'>Silakan pilih salah satu judul artikel di samping untuk membaca refleksi saya.</p>
                    </div>";
                }
                ?>
            </main>
        </div>


        <div class="mt-16 flex justify-between items-center border-t pt-8">         
            <a href="index.php" class="bg-fuchsia-600 text-white px-4 py-2 rounded hover:bg-blue-600"><- Kembali ke Profil</a> 
            <a href="timeline.php" class="bg-fuchsia-600 text-white px-4 py-2 rounded hover:bg-blue-600">Menuju Timeline -></a>     
        </div>
    </div>
</body>
</html>