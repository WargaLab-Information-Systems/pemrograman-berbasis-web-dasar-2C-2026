<?php
function tampilkanArray($data) {
    return implode(", ", $data);
}

$hasil = "";
$error = "";

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $framework = $_POST['framework'];
    $pengalaman = $_POST['pengalaman'];
    $tools = $_POST['tools'] ?? [];
    $minat = $_POST['minat'];
    $skill = $_POST['skill'];   

    if ($framework == "" || $pengalaman == "" || empty($tools) || $minat == "" || $skill == "") {
        $error = "Semua field wajib diisi!";
    } else {
        $frameworkArray = explode(",", $framework);

        $hasil = [
            "framework" => tampilkanArray($frameworkArray),
            "tools" => tampilkanArray($tools),
            "minat" => $minat,
            "skill" => $skill,
            "pengalaman" => $pengalaman,
            "jumlahFramework" => count($frameworkArray)
        ];
    }
}
?>

<!DOCTYPE html>
<html lang="id">
<head>
<meta charset="UTF-8">
<title>Developer Portfolio</title>
<script src="https://cdn.tailwindcss.com"></script>
</head>

<body class="bg-gradient-to-r from-pink-500 via-purple-500 to-indigo-500 min-h-screen">

<div class="max-w-6xl mx-auto p-6">

<div class="text-center text-white mb-10">
    <h1 class="text-5xl font-extrabold drop-shadow-lg">🚀 Developer Portfolio</h1>
    <p class="text-lg">Bangun masa depanmu dengan coding</p>
</div>

<div class="grid md:grid-cols-2 gap-6">


<div class="bg-white/90 backdrop-blur-lg p-6 rounded-3xl shadow-2xl hover:scale-105 transition relative overflow-hidden">


    <div class="absolute -top-10 -right-10 w-40 h-40 bg-purple-400 opacity-30 rounded-full blur-3xl"></div>

    <div class="flex flex-col items-center text-center mb-4">
        <img src="gambar/fotoanam.jpeg" 
        class="w-24 h-24 rounded-full border-4 border-purple-500 shadow-lg mb-3">

        <h2 class="text-2xl font-extrabold text-gray-800">KHOIRUL ANAMI</h2>
        <p class="text-sm text-gray-500">💻 Junior Web Developer</p>
    </div>

    <div class="space-y-2 text-gray-700">

        <div class="flex justify-between border-b pb-1">
            <span class="font-semibold">🆔 ID</span>
            <span>250441100044</span>
        </div>

        <div class="flex justify-between border-b pb-1">
            <span class="font-semibold">📍 Tempat tanggal lahir</span>
            <span>Sumenep, 18 Juni 2007</span>
        </div>

        <div class="flex justify-between border-b pb-1">
            <span class="font-semibold">📧 Email</span>
            <span class="text-blue-600 text-sm">anamkhoirul123@gmail.com</span>
        </div>

        <div class="flex justify-between">
            <span class="font-semibold">📱 WhatsApp</span>
            <span class="text-green-600">08123456789</span>
        </div>

    </div>

    <div class="mt-4 text-center">
        <span class="bg-gradient-to-r from-purple-500 to-pink-500 text-white px-4 py-1 rounded-full text-sm shadow">
            🚀 Active Learner
        </span>
    </div>

</div>


<div class="bg-white/90 backdrop-blur-lg p-6 rounded-2xl shadow-2xl">
    <h2 class="text-xl font-bold mb-4 text-indigo-600">🧠 Input Skill</h2>

    <form method="POST" class="space-y-3">

        <input type="text" name="framework"
        placeholder="Laravel, React, Vue"
        class="w-full p-3 rounded-lg border focus:ring-2 focus:ring-purple-500">

        <textarea name="pengalaman"
        placeholder="Pengalaman kamu..."
        class="w-full p-3 rounded-lg border"></textarea>

        <div>
            <p class="font-semibold">Tools:</p>
            <div class="flex gap-3 flex-wrap">
                <label class="bg-gray-200 px-2 py-1 rounded"><input type="checkbox" name="tools[]" value="VS Code"> VS Code</label>
                <label class="bg-gray-200 px-2 py-1 rounded"><input type="checkbox" name="tools[]" value="GitHub"> GitHub</label>
                <label class="bg-gray-200 px-2 py-1 rounded"><input type="checkbox" name="tools[]" value="Figma"> Figma</label>
                <label class="bg-gray-200 px-2 py-1 rounded"><input type="checkbox" name="tools[]" value="Postman"> Postman</label>
            </div>
        </div>

        <div>
            <p class="font-semibold">Minat:</p>
            <label><input type="radio" name="minat" value="Frontend"> Frontend</label>
            <label><input type="radio" name="minat" value="Backend"> Backend</label>
            <label><input type="radio" name="minat" value="Fullstack"> Fullstack</label>
        </div>

        <select name="skill" class="w-full p-3 border rounded-lg">
            <option value="">Pilih Skill</option>
            <option>Dasar</option>
            <option>Cukup</option>
            <option>Profesional</option>
        </select>

        <button class="w-full bg-gradient-to-r from-pink-500 to-purple-600 text-white py-3 rounded-lg font-bold hover:scale-105 transition">
            Kirim 🚀
        </button>
    </form>
</div>

</div>


<?php if ($error): ?>
<p class="text-white mt-4 bg-red-500 p-2 rounded"><?= $error ?></p>
<?php endif; ?>


<?php if ($hasil): ?>
<div class="mt-8 bg-white/95 p-6 rounded-2xl shadow-2xl">
    <h2 class="text-xl font-bold text-purple-600 mb-3">📊 Hasil</h2>

    <p><b>Framework:</b> <?= $hasil['framework'] ?></p>
    <p><b>Tools:</b> <?= $hasil['tools'] ?></p>
    <p><b>Minat:</b> <?= $hasil['minat'] ?></p>
    <p><b>Skill:</b> <?= $hasil['skill'] ?></p>

    <p class="mt-3"><?= $hasil['pengalaman'] ?></p>

    <?php if ($hasil['jumlahFramework'] > 2): ?>
    <p class="mt-2 text-green-600 font-bold">🔥 Skill Anda luas di bidang web developer!</p>
    <?php endif; ?>
</div>
<?php endif; ?>


<div class="mt-8 flex justify-center gap-4">
    <a href="halaman2.php" class="bg-white text-purple-600 px-6 py-2 rounded-full shadow hover:scale-105 transition">Timeline</a>
    <a href="halaman3.php" class="bg-black text-white px-6 py-2 rounded-full shadow hover:scale-105 transition">Blog</a>
</div>

</div>

</body>
</html>





