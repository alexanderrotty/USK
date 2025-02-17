<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Antrian Rumah Sakit</title>
    <link rel="stylesheet" href="style.css">
</head>
<body>
    <div class="container">
        <h1>Aplikasi Antrian Rumah Sakit</h1>
        
        <!-- Form Tambah Pasien -->
        <form action="process.php" method="POST">
            <h2>Tambah Pasien Baru</h2>
            <input type="text" name="nama" placeholder="Nama Pasien" required>
            <button type="submit" name="tambah">Tambah ke Antrian</button>
        </form>

        <!-- Form Panggil Pasien -->
        <form action="process.php" method="POST">
            <h2>Panggil Pasien Berikutnya</h2>
            <button type="submit" name="panggil">Panggil Pasien</button>
        </form>

        <!-- Tombol Lihat Antrian -->
        <a href="list.php" class="btn">Lihat Daftar Antrian</a>

        <!-- Form Pencarian -->
        <form action="search.php" method="GET">
            <h2>Cari Pasien</h2>
            <input type="text" name="cari" placeholder="Cari Nama Pasien" required>
            <button type="submit">Cari</button>
        </form>
    </div>
</body>
</html>