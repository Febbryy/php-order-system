<?php
session_start();
include 'config.php';

if (isset($_POST['submit'])) {
    // Ambil data dari form
    $id_pelanggan = $_POST['nama_pelanggan'];
    $jenis_produk = $_POST['jenis_produk'];
    $warna_produk = $_POST['warna'];
    $ukuran_produk = $_POST['ukuran'];
    $jumlah_produk = (int)$_POST['jumlah'];

    $jaket = 'Hoodie';
    $kaos = 'Kaos';
    $kemeja = 'Kemeja';

    $harga_jaket = 250000;
    $harga_kaos = 150000;
    $harga_kemeja = 200000;

    $harga = 0;

    if($jenis_produk == $jaket){
        $harga = $harga_jaket;
    }elseif($jenis_produk  == $kaos){
        $harga = $harga_kaos;
    }elseif ($jenis_produk == $kemeja) {
        $harga = $harga_kemeja;
    }else{
        $harga = 0;
    }
    



    // Validasi data
    if (empty($id_pelanggan) || empty($jenis_produk) || empty($warna_produk) || 
        $jumlah_produk < 1 || empty($ukuran_produk) ){
        exit();
    }

    // Query insert
    $query = "INSERT INTO keranjang (id_pelanggan, jenis_produk, warna_produk, stock_keranjang, ukuran_produk, harga_produk_pesanan) 
              VALUES ('$id_pelanggan','$jenis_produk', '$warna_produk', '$jumlah_produk','$ukuran_produk', '$harga')";

    if (mysqli_query($connect_db, $query)) {
        header("Location: pembayaran.php?status=sukses");
        exit;
    } else {
        echo "<script>alert('Data GAGAL Disimpan!');</script>";
    }
}
?>