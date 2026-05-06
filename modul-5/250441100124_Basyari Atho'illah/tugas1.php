<!DOCTYPE html>
<html>
<head>
    <title>Profil Developer</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            background-color: #f4f6f9;
            margin: 40px;
        }

        h2, h3 {
            color: #333;
        }

        table {
            border-collapse: collapse;
            width: 50%;
            margin-bottom: 20px;
            margin-top: 20px;
            background-color: #fff;
        }

        table td {
            padding: 10px;
        }

        table tr:nth-child(even) {
            background-color: #f2f2f2;
        }

        table tr:hover {
            background-color: #e6f0ff;
        }

        form {
            background-color: #fff;
            padding: 20px;
            width: 50%;
            border-radius: 8px;
            box-shadow: 0 0 10px rgba(0,0,0,0.1);
        }

        input[type="text"],
        textarea,
        select {
            width: 100%;
            padding: 8px;
            margin-top: 5px;
            margin-bottom: 15px;
            border: 1px solid #ccc;
            border-radius: 5px;
        }

        textarea {
            height: 80px;
        }

        input[type="checkbox"],
        input[type="radio"] {
            margin-right: 5px;
        }

        button {
            background-color: #007bff;
            color: white;
            padding: 10px 15px;
            border: none;
            border-radius: 5px;
            cursor: pointer;
        }

        button:hover {
            background-color: #0056b3;
        }

        p {
            background-color: #fff;
            padding: 10px;
            width: 50%;
            border-left: 5px solid #007bff;
        }
    </style>
</head>
<body>

<h2>Profil Interaktif Developer Pemula</h2>

<table border="1" cellpadding="8">
<tr><td>Nama</td><td>Basyari A.</td></tr>
<tr><td>ID Developer</td><td>DEV969</td></tr>
<tr><td>Kota/Tgl Lahir</td><td>Gresik,29 September 2006</td></tr>
<tr><td>Email</td><td>irayyy@gmail.com</td></tr>
<tr><td>No WA</td><td>08123456789</td></tr>
</table>

<h3>Form Input</h3>
<form method="post">
Framework: <input type="text" name="framework"><br><br>
Pengalaman: <textarea name="pengalaman"></textarea><br><br>

Tools:
<input type="checkbox" name="tools[]" value="VS Code">VS Code
<input type="checkbox" name="tools[]" value="GitHub">GitHub
<input type="checkbox" name="tools[]" value="Figma">Figma<br><br>

Minat:
<input type="radio" name="minat" value="Frontend">Frontend
<input type="radio" name="minat" value="Backend">Backend
<input type="radio" name="minat" value="Fullstack">Fullstack<br><br>

Skill:
<select name="skill">
<option value="">--Pilih--</option>
<option>Dasar</option>
<option>Cukup</option>
<option>Profesional</option>
</select><br><br>

<button type="submit" name="submit">Kirim</button>
</form>

<a href="tugas2.php" style="display: inline-block;
            text-decoration: none;
            padding: 8px 12px; margin-top: 10px;
            border-radius: 5px;
            color: white;
            margin-right: 10px; background-color: #002fff">Perjalanan belajar</a>
<a href="tugas3.php" style="display: inline-block;
            text-decoration: none;
            padding: 8px 12px;
            border-radius: 5px;
            color: white;
            margin-right: 10px;background-color: #ff1a1a">Halaman Blog</a>

<?php
if (isset($_POST['submit'])) {

    if (
        empty($_POST['framework']) ||
        empty($_POST['pengalaman']) ||
        empty($_POST['tools']) ||
        empty($_POST['minat']) ||
        empty($_POST['skill'])
    ) {
        echo "Semua input wajib diisi!";
    } else {

        $framework = explode(",", $_POST['framework']);
        $tools = isset($_POST['tools']) ? implode(", ", $_POST['tools']) : "-";

        $data = [
            "Framework" => implode(", ", $framework),
            "Tools" => $tools,
            "Minat" => $_POST['minat'],
            "Skill" => $_POST['skill']
        ];

        tampilkanData($data);

        echo "<p><b>Pengalaman:</b> " . $_POST['pengalaman'] . "</p>";

        if (count($framework) > 2) {
            echo "<p><b>Skill Anda cukup luas di bidang development!</b></p>";
        }
    }
}

function tampilkanData($data) {
    echo "<table border='1' cellpadding='8'>";
    foreach ($data as $key => $value) {
        echo "<tr>
                <td><b>$key</b></td>
                <td>$value</td>
              </tr>";
    }
    echo "</table>";
}
?>

</body>
</html>


<!-- wajib diisi semua inputan -->