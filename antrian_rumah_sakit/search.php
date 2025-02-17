<?php
session_start();
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Cari Pasien</title>
    <link rel="stylesheet" href="style.css">
</head>
<body>
    <div class="container">
        <h1>Hasil Pencarian</h1>
        <a href="index.php" class="btn">Kembali ke Halaman Utama</a>
        <?php
        if (isset($_GET['cari'])) {
            $keyword = $_GET['cari'];
            $hasil = [];
            foreach ($_SESSION['antrian'] as $pasien) {
                if (stripos($pasien, $keyword) !== false) {
                    $hasil[] = $pasien;
                }
            }
            if (!empty($hasil)) {
                echo "<ul>";
                foreach ($hasil as $pasien) {
                    echo "<li>$pasien</li>";
                }
                echo "</ul>";
            } else {
                echo "<p>Pasien tidak ditemukan.</p>";
            }
        }
        ?>
    </div>
</body>
</html>