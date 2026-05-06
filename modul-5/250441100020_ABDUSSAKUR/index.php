<?php

function tampilkan($frameworkArray, $pengalaman, $tools, $minat, $skill) {

    if (count($frameworkArray) > 2) {
        echo "<p style='color:green;'>Skill Anda cukup luas di bidang development!</p>";
    }

    echo "<table border='1' cellpadding='10'>";
    echo "<tr><td>framewok</td><td>" . implode(", ", $frameworkArray) . "</td></tr>";
    echo "<tr><td>tools</td><td>" . implode(", ", $tools) . "</td></tr>";
    echo "<tr><td>minat bidang</td><td>$minat</td></tr>";
    echo "<tr><td>tingkat skill</td><td>$skill</td></tr>";
    echo "</table> <br>";
    echo "Pengalaman : $pengalaman <br>";
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <style>
        .bradius{
            border-radius: 10px;
        }
        body {
            font-family: Arial, sans-serif;
            background-color: #f4f6f9;
            margin: 20px;
        }
        section {
            background: #fff;
            padding: 50px;
            margin-bottom: 20px;
            border-radius: 10px;
            box-shadow: 0 2px 8px rgba(0,0,0,0.1);
        }

        table {
            width: 100%;
            background: #fff;
        }

        input[type="text"],
        textarea,
        select {
            width: 100%;
            padding: 8px;
            margin-top: 5px;
            border-radius: 6px;
            border: 1px solid #ccc;
            box-sizing: border-box;
        }

        textarea {
            resize: none;
            height: 80px;
        }

        button {
            background-color: blue;
            color: white;
            padding:10px;
            border: none;
            border-radius: 6px;
        }
    </style>
</head>
<body>
    <section>
        <h1>Profil Interatif Developer Pemula</h1>
        <table border="1" cellpadding="10">
            <tr><td>Nama</td><td>Abdus Sakur</td></tr>
            <tr><td>ID Developer</td><td>250441100020</td></tr>
            <tr><td>Kota/Tgl Lahir</td><td>Bangkalan,15,09,2006</td></tr>
            <tr><td>Email</td><td>abdussakurv@gmail.com</td></tr>
            <tr><td>No. WhatsApp</td><td>08978056058</td></tr>
        </table>
    </section>
    <section>
        <h3>Form</h3>
        <form method="POST">
            Framework/Tools yang dikuasai:
            <br><input type="text" name="framework"><br><br>
            Pengalaman Singkat:
            <br><textarea name="pengalaman"></textarea><br><br>
            Tools Penunjang:
            <br>
            <input type="checkbox" name="tools[]" value="VS Code"> VS Code
            <input type="checkbox" name="tools[]" value="GitHub">GitHub
            <input type="checkbox" name="tools[]" value="Figma">Figma
            <input type="checkbox" name="tools[]" value="Postman">Postman
            <br>
            <br>
            Minat Bidang:
            <br>
            <input type="radio" name="minat" value="Frontend">Frontend 
            <input type="radio" name="minat" value="Backend">Backend
            <input type="radio" name="minat" value="Fullstack">Fullstack
            <br>
            <br>
            Tingkat skill Coding:
            <br>  
            </select>
            <select id="" name="skill">
                <option value="Dasar">Dasar</option>
                <option value="Cukup">Cukup</option>
                <option value="Profesional">Profesional</option>
            </select>
            <br>
            <br>
            <button type="submit">Submit</button>
            <br>
            <br>
        </form>
    </section>
    <?php
    if ($_SERVER["REQUEST_METHOD"] == "POST") {

        if (isset($_POST['framework'])) {
            $framework = $_POST['framework'];
        } else {
            $framework = '';
        }


        if (isset($_POST['pengalaman'])) {
            $pengalaman = $_POST['pengalaman'];
        } else {
            $pengalaman = '';
        }


        if (isset($_POST['tools'])) {
            $tools = $_POST['tools'];
        } else {
            $tools = [];
        }

        
        if (isset($_POST['minat'])) {
            $minat = $_POST['minat'];
        } else {
            $minat = '';
        }

        
        if (isset($_POST['skill'])) {
            $skill = $_POST['skill'];
        } else {
            $skill = '';
        }

        
        if ($framework == "" || $pengalaman == "" || empty($tools) || $minat == "" || $skill == "") {
           echo "<p style='color:red;'>semua form harus diisi!</p>";
        } else {
            $frameworkArray = explode(",", $framework);
             
            tampilkan($frameworkArray, $pengalaman, $tools, $minat, $skill);
        }
    }
    ?>
    <br>
    <a href="timeline.php">pergi ke timeline</a> | 
    <a href="blog.php">pergi ke blog</a>
</body>
</html>
