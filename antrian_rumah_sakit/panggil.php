<?php
session_start();

// Ambil data pasien yang dipanggil
if (isset($_SESSION['pasien_terpanggil'])) {
    $pasien_terpanggil = $_SESSION['pasien_terpanggil'];
    unset($_SESSION['pasien_terpanggil']); // Hapus data setelah ditampilkan
} else {
    header("Location: index.php"); // Kembali ke halaman utama jika tidak ada pasien yang dipanggil
    exit();
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Pasien Dipanggil</title>
    <link rel="stylesheet" href="style.css">
</head>
<body>
    <div class="container">
        <h1>Pasien Dipanggil</h1>
        <div class="pasien-dipanggil">
            <p>Pasien berikutnya yang dipanggil:</p>
            <h2><?php echo htmlspecialchars($pasien_terpanggil); ?></h2>
            <p>Silakan menuju ke ruang pemeriksaan.</p>
        </div>
        <a href="index.php" class="btn">Kembali ke Halaman Utama</a>
    </div>
</body>
</html>