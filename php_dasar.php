<!DOCTYPE html>
<html>
<head>
    <title>File Rizky Maulana</title>
    <style>
        body {
            font-family: 'Poppins', sans-serif;
            background: linear-gradient(135deg, #141e30, #243b55);
            color: #fff;
            display: flex;
            flex-direction: column;
            align-items: center;
            justify-content: flex-start;
            min-height: 100vh;
            margin: 0;
            padding: 40px;
        }

        h2 {
            color: #00c6ff;
            text-shadow: 0 0 10px rgba(0,198,255,0.6);
        }

        form {
            background: rgba(255,255,255,0.08);
            padding: 25px 35px;
            border-radius: 12px;
            box-shadow: 0 5px 20px rgba(0,0,0,0.3);
            width: 320px;
            backdrop-filter: blur(6px);
        }

        input[type="text"],
        input[type="date"],
        select {
            width: 100%;
            padding: 8px;
            margin-top: 5px;
            margin-bottom: 15px;
            border: 1px solid #555;
            border-radius: 5px;
            background: rgba(255,255,255,0.1);
            color: #fff;
            font-size: 14px;
        }

        select option {
            background-color: #243b55;
            color: #fff;
        }

        input[type="submit"] {
            background-color: #00c6ff;
            color: #fff;
            border: none;
            padding: 10px 15px;
            border-radius: 5px;
            cursor: pointer;
            font-size: 15px;
            transition: all 0.3s;
            width: 100%;
        }

        input[type="submit"]:hover {
            background-color: #0094cc;
            transform: scale(1.03);
        }

        hr {
            margin: 40px 0;
            width: 60%;
            border: 1px solid rgba(255,255,255,0.2);
        }

        h3 {
            color: #00c6ff;
            text-shadow: 0 0 8px rgba(0,198,255,0.6);
        }

        .output {
            background: rgba(255,255,255,0.1);
            padding: 20px;
            border-radius: 10px;
            box-shadow: 0 5px 15px rgba(0,0,0,0.3);
            width: 320px;
            backdrop-filter: blur(5px);
        }

        .output span {
            color: #00ffd5;
        }
    </style>
</head>
<body>
    <h2>Form Input Data</h2>

    <form method="post">
        Nama: <br>
        <input type="text" name="nama" required><br>

        Tanggal Lahir: <br>
        <input type="date" name="tgl" required><br>

        Pekerjaan: <br>
        <select name="pekerjaan" required>
            <option value="Programmer">Programmer</option>
            <option value="Desainer">Desainer</option>
            <option value="Manager">Manager</option>
            <option value="Operator">Operator</option>
        </select><br>

        <input type="submit" value="Tampilkan">
    </form>

    <hr>

    <?php
    if ($_SERVER["REQUEST_METHOD"] == "POST") {

        $nama = $_POST['nama'];
        $tgl = $_POST['tgl'];
        $pekerjaan = $_POST['pekerjaan'];

        // Hitung umur
        $lahir = new DateTime($tgl);
        $sekarang = new DateTime();
        $umur = $sekarang->diff($lahir)->y;

        // Tentukan gaji
        switch ($pekerjaan) {
            case "Programmer": $gaji = 7000000; break;
            case "Desainer":   $gaji = 5000000; break;
            case "Manager":    $gaji = 12000000; break;
            case "Operator":   $gaji = 4000000; break;
            default: $gaji = 0;
        }

        echo '<div class="output">';
        echo "<h3>Hasil Output:</h3>";
        echo "Nama: <span>$nama</span><br>";
        echo "Tanggal Lahir: <span>$tgl</span><br>";
        echo "Umur: <span>$umur tahun</span><br>";
        echo "Pekerjaan: <span>$pekerjaan</span><br>";
        echo "Gaji: <span>Rp " . number_format($gaji, 0, ',', '.') . "</span>";
        echo '</div>';
    }
    ?>
</body>
</html>