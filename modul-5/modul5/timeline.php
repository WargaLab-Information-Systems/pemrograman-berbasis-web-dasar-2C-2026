<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Timeline</title>
    <script src="https://cdn.tailwindcss.com"></script>
    <style>
    .Timeline {             
        position: relative;             
        margin-left: 20px;             
        padding-left: 20px;             
        border-left: 2px solid ; 
        background: white;
        max-width: 600px;
        margin: 0 auto;

    } 
 
    .Timeline-item {             
        position: relative;             
        margin-bottom: 30px;
    } 

    .footer {
        display: flex;
        justify-content: space-between;
        align:center;
        max-width: 600px;
        margin:20px auto 0;
        padding: 15px;
    }
    </style>
</head>
<body class="bg-fuchsia-500">
    <header class="text-center py-8">
        <h1 class="text-xl font-bold">Timeline Perjalanan Belajar Coding</h1>
    </header>

    <section>
        <?php 
        $riwayat = [
            [
                "Tahun" => "2025",
                "Kejadian" => "Masuk Kuliah Prodi Sistem Informasi"
            ],
            [
                "Tahun" => "2026", 
                "Kejadian" => "Awal Mulai Belajar HTML"
            ],
            [
                "Tahun" => "2026",
                "Kejadian" => "Membuat Proyek Pertama yaitu Curriculum Vitae"  
            ],
            [
                "Tahun" => "2026", 
                "Kejadian" => "Mulai Belajar CSS"
            ],
            [
                "Tahun" => "2026",
                "Kejadian" => "Mulai Beelajar PHP dan MySQL"
            ]
        ];
        ?>
        <div class="Timeline"> 
             <?php foreach ($riwayat as $item): ?>                 
                    <div class="Timeline-item"> 
                    <h3 class="text-lg font-bold text-fuchsia-600"><?= $item['Tahun'] ?></h3> 
                     <p class="text-gray-700"><?= $item['Kejadian'] ?></p> 
                 </div> 
             <?php endforeach; ?> 
         </div>
    </section>

    <div class="footer">         
        <a href="index.php" class="bg-blue-600 text-white px-4 py-2 rounded hover:bg-fuchsia-600"><- Kembali ke Profil</a> 
        <a href="blog.php" class="bg-blue-600 text-white px-4 py-2 rounded hover:bg-fuchsia-600">Menuju Blog -></a>     
    </div>

</body>
</html>

