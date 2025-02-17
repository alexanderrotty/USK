<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Sistem Antrian Pasien</title>
    <link rel="stylesheet" href="styles.css">
</head>
<body>
    <div class="container">
        <h1>Sistem Antrian Pasien</h1>

        <!-- Form untuk menambahkan pasien -->
        <form method="POST" action="">
            <label for="nama">Nama Pasien:</label>
            <input type="text" id="nama" name="nama" required>

            <label for="umur">Umur:</label>
            <input type="number" id="umur" name="umur" required>

            <label for="poli">Poli Tujuan:</label>
            <input type="text" id="poli" name="poli" required>

            <button type="submit" name="tambah">Tambahkan Pasien</button>
        </form>

        <?php
        // Proses tambah pasien
        if (isset($_POST['tambah'])) {
            $nama = $_POST['nama'];
            $umur = $_POST['umur'];
            $poli = $_POST['poli'];
            tambahPasien($nama, $umur, $poli);
            echo "<div class='message success'>Pasien berhasil ditambahkan!</div>";
        }

        // Proses panggil pasien
        if (isset($_GET['panggil'])) {
            panggilPasien();
        }

        // Proses pencarian
        if (isset($_GET['cari'])) {
            $kriteria = $_GET['kriteria'];
            $nilai = $_GET['nilai'];
            cariPasien($kriteria, $nilai);
        }
        ?>

        <!-- Tombol untuk memanggil pasien -->
        <form method="GET" action="">
            <button type="submit" name="panggil">Panggil Pasien Berikutnya</button>
        </form>

        <!-- Form untuk pencarian -->
        <form method="GET" action="">
            <label for="kriteria">Cari Berdasarkan:</label>
            <select id="kriteria" name="kriteria">
                <option value="nama">Nama</option>
                <option value="poli">Poli</option>
            </select>
            <input type="text" name="nilai" placeholder="Masukkan nilai..." required>
            <button type="submit" name="cari">Cari</button>
        </form>

        <!-- Tampilkan daftar antrian -->
        <h2>Daftar Antrian Pasien</h2>
        <?php tampilkanAntrian(); ?>
    </div>
</body>
</html>