<?php
session_start();

// Inisialisasi antrian jika belum ada
if (!isset($_SESSION['antrian'])) {
    $_SESSION['antrian'] = [];
}

// Proses Tambah Pasien
if (isset($_POST['tambah'])) {
    $nama = $_POST['nama'];
    array_push($_SESSION['antrian'], $nama);
    header("Location: index.php"); // Kembali ke halaman utama
    exit();
}

// Proses Panggil Pasien
if (isset($_POST['panggil'])) {
    if (!empty($_SESSION['antrian'])) {
        $pasien_terpanggil = array_shift($_SESSION['antrian']);
        $_SESSION['pasien_terpanggil'] = $pasien_terpanggil; // Simpan nama pasien yang dipanggil
        header("Location: panggil.php"); // Arahkan ke halaman panggil
        exit();
    } else {
        echo "<script>alert('Tidak ada pasien dalam antrian.'); window.location.href='index.php';</script>";
    }
    exit();
}
?>