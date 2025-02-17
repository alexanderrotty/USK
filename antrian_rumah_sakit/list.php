<?php
session_start();
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Daftar Antrian</title>
    <link rel="stylesheet" href="style.css">
</head>
<body>
    <div class="container">
        <h1>Daftar Antrian Pasien</h1>
        <a href="index.php" class="btn">Kembali ke Halaman Utama</a>
        <ul>
            <?php
            if (!empty($_SESSION['antrian'])) {
                foreach ($_SESSION['antrian'] as $index => $pasien) {
                    echo "<li>" . ($index + 1) . ". $pasien</li>";
                }
            } else {
                echo "<li>Tidak ada pasien dalam antrian.</li>";
            }
            ?>
        </ul>
    </div>
</body>
</html>