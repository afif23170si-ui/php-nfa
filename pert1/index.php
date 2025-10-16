<?php

$nama = '';
$email = '';
$nilai = '';
$keterangan = '';
$show_results = false;


if (isset($_POST['submit'])) {

    $nama = $_POST['nama'];
    $email = $_POST['email'];
    $nilai = $_POST['nilai'];

    if ($nilai > 70) {
        $keterangan = "Lulus";
    } else {
        $keterangan = "Remedial";
    }

    $show_results = true;
}
?>

<!DOCTYPE html>
<html lang="id">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Form Penilaian Ujian</title>
    <style>
        body {
            font-family: sans-serif;
            line-height: 1.6;
            padding: 20px;
            max-width: 600px;
            margin: auto;
        }

        .container {
            border: 1px solid #ccc;
            padding: 20px;
            border-radius: 8px;
        }

        h2,
        h3 {
            text-align: center;
        }

        input[type="text"],
        input[type="email"],
        input[type="number"] {
            width: 100%;
            padding: 8px;
            margin-bottom: 10px;
            border-radius: 4px;
            border: 1px solid #ccc;
        }

        input[type="submit"] {
            width: 100%;
            padding: 10px;
            background-color: #007BFF;
            color: white;
            border: none;
            border-radius: 4px;
            cursor: pointer;
            font-size: 16px;
        }

        input[type="submit"]:hover {
            background-color: #0056b3;
        }

        .results {
            margin-top: 20px;
            padding: 15px;
            border: 1px solid #ddd;
            background-color: #f9f9f9;
            border-radius: 8px;
        }

        .lulus {
            color: green;
            font-weight: bold;
        }

        .remedial {
            color: red;
            font-weight: bold;
        }
    </style>
</head>

<body>

    <div class="container">
        <h2>Form Input Nilai Ujian</h2>

        <form method="POST" action="">
            <label for="nama">Nama:</label>
            <input type="text" id="nama" name="nama" required>

            <label for="email">Email:</label>
            <input type="email" id="email" name="email" required>

            <label for="nilai">Nilai Ujian:</label>
            <input type="number" id="nilai" name="nilai" min="0" max="100" required>

            <input type="submit" name="submit" value="Proses Nilai">
        </form>

        <?php
        if ($show_results) :
        ?>
            <div class="results">
                <h3>Hasil Penilaian</h3>
                <p><strong>Nama:</strong> <?php echo htmlspecialchars($nama); ?></p>
                <p><strong>Email:</strong> <?php echo htmlspecialchars($email); ?></p>
                <p><strong>Nilai Ujian:</strong> <?php echo htmlspecialchars($nilai); ?></p>
                <p><strong>Keterangan:</strong>
                    <?php
                    if ($keterangan == "Lulus") {
                        echo '<span class="lulus">' . $keterangan . '</span>';
                    } else {
                        echo '<span class="remedial">' . $keterangan . '</span>';
                    }
                    ?>
                </p>
            </div>
        <?php endif; ?>
    </div>

</body>

</html>