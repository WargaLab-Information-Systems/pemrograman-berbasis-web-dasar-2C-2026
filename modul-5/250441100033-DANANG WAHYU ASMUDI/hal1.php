<!DOCTYPE html>
<html>
<head>
    <title>Profil Developer</title>

    <style>
        body {
            font-family: Arial;
            padding: 20px;
        }

        .box {
            max-width: 700px;
            margin: auto;
        }

        table {
            border-collapse: collapse;
            width: 100%;
        }

        table th, table td {
            padding: 8px;
        }

        h2, h3 {
            text-align: center;
        }

        form {
            margin-top: 10px;
        }

        input[type="text"], textarea, select {
            width: 100%;
            padding: 5px;
            margin-top: 5px;
        }

        textarea {
            height: 80px;
        }

        .opsi label {
            display: block;
            margin: 3px 0;
        }

        .btn {
            margin-top: 10px;
            padding: 8px 12px;
            cursor: pointer;
        }

        .nav {
            margin-top: 20px;
            text-align: center;
        }

        .nav a {
            text-decoration: none;
            margin: 0 10px;
        }
    </style>
</head>

<body>

<div class="box">

<h2>Profil Interaktif Developer Pemula</h2>

<table border="1">
    <tr><th>Data</th><th>Keterangan</th></tr>
    <tr><td>Nama</td><td>Danang Wahyu Asmudi</td></tr>
    <tr><td>ID Developer</td><td>250441100033</td></tr>
    <tr><td>Kota/Tgl Lahir</td><td>Mojokerto, 08-07-2007</td></tr>
    <tr><td>Email</td><td>danangstudy@email.com</td></tr>
    <tr><td>No. WhatsApp</td><td>08123456789</td></tr>
</table>

<hr>

<h3>Form Input</h3>

<form method="post">

    Framework/Tools:
    <input type="text" name="framework" placeholder="Laravel, React"><br><br>

    Pengalaman:
    <textarea name="pengalaman"></textarea><br><br>

    Tools Penunjang:
    <div class="opsi">
        <label><input type="checkbox" name="tools[]" value="VS Code"> VS Code</label>
        <label><input type="checkbox" name="tools[]" value="GitHub"> GitHub</label>
        <label><input type="checkbox" name="tools[]" value="Figma"> Figma</label>
        <label><input type="checkbox" name="tools[]" value="Postman"> Postman</label>
    </div><br>

    Minat:
    <div class="opsi">
        <label><input type="radio" name="minat" value="Frontend"> Frontend</label>
        <label><input type="radio" name="minat" value="Backend"> Backend</label>
        <label><input type="radio" name="minat" value="Fullstack"> Fullstack</label>
    </div><br>

    Skill:
    <select name="skill">
        <option value="">-- Pilih --</option>
        <option value="Dasar">Dasar</option>
        <option value="Cukup">Cukup</option>
        <option value="Profesional">Profesional</option>
    </select><br><br>

    <input type="submit" name="submit" value="Kirim" class="btn">

</form>

<?php
function tampilData($data) {
    echo "<table border='1'>";
    foreach ($data as $k => $v) {
        echo "<tr><td>$k</td><td>$v</td></tr>";
    }
    echo "</table>";
}

if (isset($_POST['submit'])) {

    $framework = $_POST['framework'];
    $pengalaman = $_POST['pengalaman'];
    $tools = $_POST['tools'] ?? [];
    $minat = $_POST['minat'] ?? "";
    $skill = $_POST['skill'];

    if ($framework == "" || $pengalaman == "" || empty($tools) || $minat == "" || $skill == "") {
        echo "<p style='color:red;'>Semua input wajib diisi!</p>";
    } else {

        $frameworkArray = explode(",", $framework);

        if (count($frameworkArray) > 2) {
            echo "<p style='color:green;'>Skill Anda cukup luas di bidang development!</p>";
        }

        $data = [
            "Framework" => implode(", ", $frameworkArray),
            "Tools" => implode(", ", $tools),
            "Minat" => $minat,
            "Skill" => $skill
        ];

        echo "<h3>Hasil Data</h3>";
        tampilData($data);

        echo "<h3>Pengalaman</h3>";
        echo "<p>$pengalaman</p>";
    }
}
?>

<div class="nav">
    <a href="hal3.php">Menuju Blog</a> |
    <a href="hal2.php">Lanjut ke Timeline</a>
</div>

</div>

</body>
</html>