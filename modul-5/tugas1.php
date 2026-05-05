<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Profile</title>
    <script src="https://cdn.tailwindcss.com"></script>
</head>
<body class="bg-pink-100">

<div class="max-w-3xl mx-auto py-8 px-4">

    <h1 class="text-3xl font-bold text-center text-purple-700 mb-8">~ PROFILE DEVELOPER ~</h1>

    <div class="bg-white p-6 rounded-lg shadow mb-8">
        <h2 class="text-xl font-semibold mb-4">Profil Saya</h2>
        <table class="w-full border border-black-300">
            <tr class="bg-purple-600 text-white">
                <th class="p-3 text-left">Keterangan</th>
                <th class="p-3 text-left">Informasi</th>
            </tr>
            <tr><td class="p-3 border">Nama</td><td class="p-3 border">Maha</td></tr>
            <tr><td class="p-3 border">ID Developer</td><td class="p-3 border">DEV2025119</td></tr>
            <tr><td class="p-3 border">Kota/Tgl Lahir</td><td class="p-3 border">Jeddah, 21 Mei 2006</td></tr>
            <tr><td class="p-3 border">Email</td><td class="p-3 border">maha5574667@gmail.com</td></tr>
            <tr><td class="p-3 border">No. WhatsApp</td><td class="p-3 border">081234567890</td></tr>
        </table>
    </div>

    <div class="bg-white p-6 rounded-lg shadow">
        <h2 class="text-xl font-semibold mb-4">Form Pengalaman Developer</h2>
        
        <form method="POST">
            <div class="mb-4">
                <label class="block mb-1">Framework/Tools yang dikuasai (pisahkan dengan koma)</label>
                <input type="text" name="framework" class="w-full border p-3 rounded" placeholder="HTML, JavaScript, Bootstrap" required>
            </div>

            <div class="mb-4">
                <label class="block mb-1">Cerita singkat pengalaman</label>
                <textarea name="pengalaman" rows="4" class="w-full border p-3 rounded" required></textarea>
            </div>

            <div class="mb-4">
                <label class="block mb-1">Tools Penunjang</label><br>
                <input type="checkbox" name="tools[]" value="VS Code"> VS Code &nbsp;
                <input type="checkbox" name="tools[]" value="GitHub"> GitHub &nbsp;
                <input type="checkbox" name="tools[]" value="Figma"> Figma &nbsp;
                <input type="checkbox" name="tools[]" value="Postman"> Postman
            </div>

            <div class="mb-4">
                <label class="block mb-1">Minat Bidang</label><br>
                <input type="radio" name="bidang" value="Frontend" required> Frontend &nbsp;
                <input type="radio" name="bidang" value="Backend"> Backend &nbsp;
                <input type="radio" name="bidang" value="Fullstack"> Fullstack
            </div>

            <div class="mb-4">
                <label class="block mb-1">Tingkat Skill Coding</label>
                <select name="skill" class="w-full border p-3 rounded" required>
                    <option value="">Silahkan Pilih</option>
                    <option value="Dasar">Dasar</option>
                    <option value="Cukup">Cukup</option>
                    <option value="Profesional">Profesional</option>
                </select>
            </div>

            <button type="submit" name="submit" class="bg-purple-600 text-white px-6 py-3 rounded hover:bg-purple-700">
                Submit
            </button>
        </form>

        <?php
        function tampilkanHasil($data) {
            echo "<h2 class='text-xl font-semibold mt-8 mb-3'>Hasil Input Anda</h2>";
            echo "<table class='w-full border border-pink-300'>";
            echo "<tr class='bg-pink-200'><th class='p-3 text-left'>Data</th><th class='p-3 text-left'>Nilai</th></tr>";
            
            foreach ($data as $key => $value) {
                if (is_array($value)) {
                    $value = implode(", ", $value);
                }
                echo "<tr><td class='p-3 border'>" . ucfirst($key) . "</td><td class='p-3 border'>" . htmlspecialchars($value) . "</td></tr>";
            }
            echo "</table>";
        }

        if (isset($_POST['submit'])) {
            $framework   = trim($_POST['framework']);
            $pengalaman  = trim($_POST['pengalaman']);
            $tools       = isset($_POST['tools']) ? $_POST['tools'] : [];
            $bidang      = $_POST['bidang'] ?? '';
            $skill       = $_POST['skill'] ?? '';

            if (empty($framework) || empty($pengalaman) || empty($bidang) || empty($skill) || empty($tools)) {
                echo "<p class='text-red-500 mt-4'>Semua field wajib diisi!</p>";
            } else {
                $framework_arr = array_map('trim', explode(',', $framework));

                $output = [
                    'framework' => $framework,
                    'pengalaman' => $pengalaman,
                    'tools' => $tools,
                    'bidang' => $bidang,
                    'skill' => $skill
                ];

                tampilkanHasil($output);

                if (count($framework_arr) > 2) {
                    echo "<p class='text-green-600 font-bold mt-4'>Skill Anda cukup luas di bidang development!</p>";
                }
            }
        }
        ?>
    </div>

    <div class="text-center mt-8">
        <a href="tugas2.php" class="bg-purple-600 text-white px-6 py-3 rounded inline-block hover:bg-pink-500">Lanjut ke Timeline →</a>
    </div>
</div>

</body>
</html>
