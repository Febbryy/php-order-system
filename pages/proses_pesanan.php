<?php

session_start();

// proses_pelanggan.php
include 'config.php';

// Hubungkan ke database (gunakan file config/database.php)
if(isset($_POST['submit'])){

// Ambil data dari form
if(isset($_SESSION['id_user'])){
$id_pelanggan = $_POST['id_pelanggan'];
}else{
        $no = 1;
$id_pelanggan = $no++;
}
$nama = $_POST['nama_pelanggan'];
$no_telepon = $_POST['no_telepon'];
$email = $_POST['email'];
$alamat = $_POST['alamat'];
$nama_produk = $_POST ['nama_produk'];
$deskripsi = $_POST ['deskripsi'];
$ukuran = $_POST ['ukuran'];
$stock = (INT) $_POST ['stock'];
$nama_desain = $_POST['nama_desain'];
$keterangan = $_POST['keterangan_desain'];
$harga_produk = $_POST['harga_produk'] * $stock;


// Validasi sederhana
if ( empty($nama) || empty($no_telepon) || empty($nama_produk) || empty($deskripsi) || empty($ukuran) || empty($stock)) {
    die("Nama dan No Telepon wajib diisi!");
}

//pengambilan gambar dari html ke folder
$nama_file = $_FILES['gambar_desain']['name'];
$tmp_file = $_FILES['gambar_desain']['tmp_name'];
$error_file = $_FILES['gambar_desain']['error'];

//gambar bukti pembayaran
$nama_bukti = $_FILES['bukti_pembayaran']['name'];
$tmp_bukti = $_FILES['bukti_pembayaran']['tmp_name'];
$error_file_pembayaran = $_FILES['bukti_pembayaran']['error'];

if($error_file_pembayaran === 0){
        $ekstensi_valid = ['jpg', 'jpeg', 'png', 'webp'];
        $ekstensi_gambar = explode('.', $nama_bukti);
        $ekstensi_gambar = strtolower(end($ekstensi_gambar));

        move_uploaded_file($tmp_bukti, "../buktiTransfer/" . $nama_bukti);
}else {
        echo "<script>alert('Format file bukti harus berupa JPG, JPEG, PNG, atau WEBP!'); window.history.back();</script>";
        exit;
    }

    if($error_file === 0){

        //gambar yang di dapat
        $ekstensi_valid = ['jpg', 'jpeg', 'png', 'webp'];
        $ekstensi_gambar = explode('.', $nama_file);
        $ekstensi_gambar = strtolower(end($ekstensi_gambar));

        //lokasi file gambar
        $folde_tujuan = '../desainProduk/' . $nama_file;

        //validasi format file
        if (!in_array($ekstensi_gambar, $ekstensi_valid)) {
            echo "<script>alert('Format gambar harus JPG, JPEG, PNG, atau WEBP!'); window.location='index.html';</script>";
            exit;
        }

        if(move_uploaded_file($tmp_file,$folde_tujuan)){
            }

        //ini function untuk menambahkan biaya harga produk jika dan tanpa desain

        if(isset($nama_file)){
                $harga_tambahan = 20000;

                $harga_produk += $harga_tambahan;
        }else {
            echo "<script>alert('Gagal mengupload gambar!'); window.location='pesanan.php';</script>";
            exit;
                }
        }


// Simpan ke database
$query_desain = "INSERT INTO desain (id_pelanggan, nama_desain, gambar_desain, keterangan)
        VALUES('$id_pelanggan', '$nama_desain', '$nama_file', '$keterangan')";
if(isset($_SESSION['nama_user'])){
        }else{
        $query ="INSERT INTO pelanggan (nama, no_telepon, email, alamat)
                VALUES('$nama', '$no_telepon', '$email', '$alamat')";
        $save = mysqli_query($connect_db, $query);
        }
$query_produk = "INSERT INTO produk (id_pelanggan, nama_produk,deskripsi , ukuran, stok,harga_produk, bukti_pembayaran)
        VALUES('$id_pelanggan','$nama_produk', '$deskripsi', '$ukuran','$stock', '$harga_produk', '$nama_bukti')";

$save_produk = mysqli_query($connect_db, $query_produk);
$save_desain = mysqli_query($connect_db, $query_desain);

header("Location: daftarPesanan.php?status=sukses");
exit;
}
?>