<?php
function tampilkanData($data) {
    echo "<table class='mt-6 w-full bg-white rounded-xl shadow overflow-hidden'>";
    foreach ($data as $key => $value) {
        echo "<tr class='border-b'>
                <td class='p-3 font-semibold w-1/3'>$key</td>
                <td class='p-3'>$value</td>
              </tr>";
    }
    echo "</table>";
}
?>

<!DOCTYPE html>
<html>
<head>
<title>Profil</title>
<script src="https://cdn.tailwindcss.com"></script>
</head>

<body class="bg-gradient-to-r from-blue-100 to-purple-100 min-h-screen">

<nav class="bg-gradient-to-r from-blue-600 to-purple-600 text-white p-4 shadow-lg fixed top-0 w-full z-50">
  <div class="max-w-5xl mx-auto flex justify-between items-center">
    <h1 class="font-bold text-lg"> DevApp</h1>
    <div class="space-x-4">
      <a href="index.php" class="font-bold underline">Profil</a>
      <a href="timeline.php" class="hover:underline">Timeline</a>
      <a href="blog.php" class="hover:underline">Blog</a>
    </div>
  </div>
</nav>

<div class="max-w-4xl mx-auto mt-28">

<div class="bg-white p-6 rounded-2xl shadow-lg mb-6">

<h2 class="text-2xl font-bold text-center mb-6 text-blue-600">
Profil Interaktif Developer Pemula
</h2>

<div class="flex justify-center mb-6">
  <img src="foto anang 2.jpeg"
  class="w-32 h-32 rounded-full object-cover shadow-lg border-4 border-white">
</div>

<div class="grid md:grid-cols-2 gap-6">
    
<div class="space-y-3">
    <p class="text-gray-700"><b>Nama:</b> Muhammad Maulana Ramadhan</p>
    <p class="text-gray-700"><b>ID:</b> DEV001</p>
    <p class="text-gray-700"><b>TTL:</b> Pamekasan, 02-10-2006</p>
</div>

<div class="space-y-3">
    <p class="text-gray-700"><b>Email:</b><br>
    <a href="mailto:samuraigaming109@gmail.com" class="text-blue-500 hover:underline font-semibold">
        samuraigaming109@gmail.com
    </a>
    </p>
    
    <p class="text-gray-700"><b>WhatsApp:</b><br>
    <a href="https://wa.me/6281234298880" class="text-green-500 hover:underline font-semibold">
        081234298880
    </a>
    </p>
</div>

</div>
</div>

<div class="bg-white p-6 rounded-2xl shadow-lg">
    
<form method="POST" class="space-y-4">
    
<input type="text" name="framework" placeholder="Framework (pisahkan koma)"
class="w-full p-3 border rounded-lg">

<textarea name="pengalaman" placeholder="Pengalaman"
class="w-full p-3 border rounded-lg"></textarea>

<div>
    <p class="font-semibold">Tools:</p>
    <label><input type="checkbox" name="tools[]" value="VS Code"> VS Code</label>
    <label class="ml-3"><input type="checkbox" name="tools[]" value="GitHub"> GitHub</label>
    <label class="ml-3"><input type="checkbox" name="tools[]" value="Figma"> Figma</label>
    <label class="ml-3"><input type="checkbox" name="tools[]" value="Postman"> Postman</label>
</div>

<div>
    <p class="font-semibold">Minat:</p>
    <label><input type="radio" name="minat" value="Frontend"> Frontend</label>
    <label class="ml-3"><input type="radio" name="minat" value="Backend"> Backend</label>
    <label class="ml-3"><input type="radio" name="minat" value="Fullstack"> Fullstack</label>
</div>

<select name="skill" class="w-full p-3 border rounded-lg">
    <option value="">Pilih Skill</option>
    <option>Dasar</option>
    <option>Cukup</option>
    <option>Profesional</option>
</select>

<button class="w-full bg-gradient-to-r from-blue-500 to-purple-500 text-white p-3 rounded-lg">
Submit
</button>

</form>
</div>

<?php
if ($_POST) {

    if (
        $_POST['framework'] == "" ||
        $_POST['pengalaman'] == "" ||
        !isset($_POST['tools']) ||
        !isset($_POST['minat']) ||
        $_POST['skill'] == ""
    ) {
        echo "<p class='text-red-500 mt-4 text-center font-bold'>
        Semua input wajib diisi!
        </p>";
    } else {

        $framework = array_filter(array_map('trim', explode(",", $_POST['framework'])));

        $data = [
            "Framework" => implode(", ", $framework),
            "Tools" => isset($_POST['tools']) ? implode(", ", $_POST['tools']) : "-",
            "Minat" => $_POST['minat'],
            "Skill" => $_POST['skill']
            ];

        tampilkanData($data);

        echo "<div class='bg-white p-4 rounded-xl shadow mt-4'>";
        echo "<p><b>Pengalaman:</b> ".$_POST['pengalaman']."</p>";
        echo "</div>";

        if (count($framework) > 2) {
            echo "<p class='text-green-600 font-bold text-center mt-3'>
            Skill Anda cukup luas di bidang development!
            </p>";
        }
    }
}
?>

</div>
</body>
</html>