<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Profil Interaktif Developer</title>
    <script src="https://cdn.tailwindcss.com"></script>
</head>
<body class="bg-fuchsia-500 min-h-screen p-4 md:p-8">

    <div class="max-w-4xl mx-auto space-y-8">
        
        <div class="bg-white p-6 rounded-xl">
            <h2 class="text-2xl font-bold text-gray-800 mb-4">Profil Interaktif Developer Pemula</h2>
            <div class="overflow-x-auto">
                <table class="w-full text-left text-gray-600 ">
                    <tr class="bg-fuchsia-300">
                        <th class="py-3 px-4  font-bold w-1/3">Nama</th>
                        <td class="py-3 px-4">Andhini Diah Ayu Wulan Dari</td>
                    </tr>
                    <tr class=" bg-fuchsia-200 ">
                        <th class="py-3 px-4  font-bold">ID Devoloper</th>
                        <td class="py-3 px-4">250441100071</td>
                    </tr>
                    <tr class="bg-fuchsia-300">
                        <th class="py-3 px-4  font-bold">Tempat/Tgl Lahir</th>
                        <td class="py-3 px-4">Mojokerto, 16 November 2006</td>
                    </tr>
                    <tr class="bg-fuchsia-200">
                        <th class="py-3 px-4 font-bold">Email</th>
                        <td class="py-3 px-4">andhinidiah99@gmail.com</td>
                    </tr>
                    <tr class="bg-fuchsia-300">
                        <th class="py-3 px-4  font-bold ">No. Telp</th>
                        <td class="py-3 px-4 ">0857460382260</td>
                    </tr>
                </table>
            </div>
        </div>

        <div class="bg-white p-6 rounded-xl ">
            <h3 class="text-2xl font-bold text-gray-800 mb-6 border-b pb-2">Input Data Developer</h3>
            <form method="POST" action="" class="space-y-5">
                
                <div>
                    <label class="block text-lg font-bold text-gray-700 mb-1">Framework/Tools yang dikuasai:</label>
                    <input type="text" name="frameworks" placeholder="contoh:Tailwind, Laravel, dll (gunakan ',')" 
                           class="w-full p-2 border border-gray-300 rounded-md focus:ring-2 focus:ring-blue-500 focus:outline-none">
                </div>

                <div>
                    <label class="block text-lg font-bold text-gray-700 mb-1">Cerita singkat Pengalaman membuat aplikasi/website:</label>
                    <textarea name="pengalaman" rows="4"  placeholder="ketik disini..." class="w-full p-2 border border-gray-300 rounded-md focus:ring-2 focus:ring-blue-500 focus:outline-none"></textarea>
                </div>

                <div class="">
                    <div class="mb-3">
                        <label class=" text-lg font-bold text-gray-700 mb-2">Tools Penunjang:</label>
                        <div class="space-y-2 ">
                            <label class=" cursor-pointer mr-4">
                                <input type="checkbox" name="tools[]" value="VS Code" class="rounded text-blue-600"> <span class="ml-1">VS Code</span>
                            </label>
                            <label class=" cursor-pointer mr-4">
                                <input type="checkbox" name="tools[]" value="GitHub" class="rounded text-blue-600"> <span class="ml-1">GitHub</span>
                            </label>
                            <label class=" cursor-pointer">
                                <input type="checkbox" name="tools[]" value="Figma" class="rounded text-blue-600"> <span class="ml-1">Figma</span>
                            </label>
                        </div>
                    </div>

                    <div>
                        <label class=" text-lg font-bold text-gray-700 mb-2">Minat Bidang:</label>
                        <div class="space-y-2">
                            <label class="inline-flex items-center mr-4 cursor-pointer">
                                <input type="radio" name="minat" value="Frontend" class="text-blue-600"> <span class="ml-2">Frontend</span>
                            </label>
                            <label class="inline-flex items-center mr-4 cursor-pointer">
                                <input type="radio" name="minat" value="Backend" class="text-blue-600"> <span class="ml-2">Backend</span>
                            </label>
                        </div>
                    </div>
                </div>

                <div>
                    <label class="block text-sm font-medium text-gray-700 mb-1">Tingkat Skill Coding:</label>
                    <select name="level" class="w-full md:w-1/3 p-2 border border-gray-300 rounded-md bg-white">
                        <option value="">-- Pilih Tingkat --</option>
                        <option value="Dasar">Dasar</option>
                        <option value="Cukup">Cukup</option>
                        <option value="Profesional">Profesional</option>
                    </select>
                </div>

                <button type="submit" name="submit" 
                        class="bg-blue-600 hover:bg-blue-700 text-white font-bold py-2 px-6 rounded-lg transition duration-200">
                    Submit
                </button>
            </form>
        </div>

        <?php
        if (isset($_POST['submit'])) {
            function tampilkanData($data) {
                echo "<div class='bg-blue-50 p-6 rounded-xl border-2'>";
                echo "<h3 class='text-xl font-bold text-blue-800 mb-4'>Hasil Output Profil:</h3>";
                
                if (empty($data['frameworks']) || empty($data['pengalaman']) || empty($data['minat']) || empty($data['level'])) {
                    echo "<div class='bg-red-100 text-red-700 p-3 rounded-md mb-4 font-bold'>Peringatan: Semua field input wajib diisi!</div>";
                    return;
                }

                $listFramework = array_map('trim', explode(",", $data['frameworks']));

                if (count($listFramework) > 2) {
                    echo "<div class='bg-green-100 text-green-700 p-3 rounded-md mb-4 border-l-4 border-green-500'>Skill Anda cukup luas di bidang development!
                          </div>";
                }

                echo "<div class='bg-white rounded-lg shadow overflow-hidden mb-6'>";
                    echo "<table class='w-full text-left'>";
                        echo "<tr class='border-b'><th class='p-3 bg-gray-50'>Frameworks</th><td class='p-3'>";
                        foreach($listFramework as $fw) {
                            echo "<span class='inline-block bg-blue-100 text-blue-800 text-xs px-2 py-1 rounded mr-1 mb-1'>".htmlspecialchars($fw)."</span>";
                        }
                        echo "</td></tr>";
                        echo "<tr><th class='p-3 bg-gray-50'>Tools</th><td class='p-3'>".(isset($data['tools']) ? implode("/ ", $data['tools']) : "-")."</td></tr>";
                        echo "<tr class='border-b'><th class='p-3 bg-gray-50 w-1/3'>Minat</th><td class='p-3'>".htmlspecialchars($data['minat'])."</td></tr>";
                        echo "<tr class='border-b'><th class='p-3 bg-gray-50'>Level</th><td class='p-3'>".htmlspecialchars($data['level'])."</td></tr>";
                    echo "</table></div>";

                    echo "<h4 class='font-bold text-gray-800 mb-2'>Cerita Pengalaman:</h4>";
                    echo "<p class='text-gray-600 bg-white p-4 rounded-lg italic border shadow-sm'>\"" . nl2br(htmlspecialchars($data['pengalaman'])) . "\"</p>";
                echo "</div>";
            }
            tampilkanData($_POST);
        }
        ?>

        <div class="mt-16 flex flex-col md:flex-row justify-center items-center gap-4">
            <a href="timeline.php" class="w-full md:w-auto text-center px-6 py-3 bg-blue-600 text-white font-semibold rounded-lg hover:bg-blue-700">
                Halaman Timeline →
            </a>
        </div>
    </div>
</body>
</html>