<?php
session_start();
include 'config.php';

if (!isset($_SESSION['id_user'])) {
    die("Akses ditolak.");
}

if (isset($_GET['jenis']) && isset($_GET['id'])) {
    $jenis = $_GET['jenis'];
    $id = mysqli_real_escape_string($connect_db, $_GET['id']);
    $id_user = $_SESSION['id_user'];

    // Jalankan query hapus berdasarkan jenisnya untuk keamanan kepemilikan data (id_pelanggan)
    if ($jenis == 'produk') {
        $query = "DELETE FROM produk WHERE id_produk = '$id' AND id_pelanggan = '$id_user'";
    } elseif ($jenis == 'desain') {
        $query = "DELETE FROM desain WHERE id_desain = '$id' AND id_pelanggan = '$id_user'";
    } elseif ($jenis == 'keranjang') {
        $query = "DELETE FROM keranjang WHERE id_keranjang = '$id' AND id_pelanggan = '$id_user'";
    } else {
        die("Jenis data tidak valid.");
    }

    $eksekusi = mysqli_query($connect_db, $query);

    if ($eksekusi) {
        echo "<script>alert('Data berhasil dihapus!'); window.location='daftarPesanan.php';</script>";
    } else {
        echo "<script>alert('Gagal menghapus data.'); window.location='daftarPesanan.php';</script>";
    }
} else {
    header("Location: daftarPesanan.php");
    exit;
}
?>