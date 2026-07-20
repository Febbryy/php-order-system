<?php
include 'config.php';
if(isset($_POST['submit'])){

$nama = $_POST['nama'];
$no_telepon = $_POST['no_telepon'];
$email = $_POST['email'];
$username = $_POST['username'];
$password = $_POST['password'];
$alamat = $_POST['alamat'];

if(empty($nama) || empty($no_telepon) || empty($email) || empty($alamat) ||empty($username) || empty($password)){
    die("pastikan mengisi semua form");
}

$query = "INSERT INTO pelanggan(nama,no_telepon,email, alamat, username_pelanggan,password_pelanggan)
VALUE ('$nama','$no_telepon','$email', '$alamat','$username','$password')";
$result = mysqli_query($connect_db,$query);

header("Location: formLogin.php?status=sukses");
exit;
}
?>