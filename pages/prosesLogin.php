<?php
session_start();
include 'config.php';

if(isset($_POST['login'])){

$username = $_POST['username'];
$password = $_POST['password'];

$query = mysqli_query($connect_db, "SELECT * FROM pelanggan WHERE username_pelanggan = '$username'");

if(mysqli_num_rows($query)){
    $data_pelanggan = mysqli_fetch_assoc($query);

    if($password == $data_pelanggan['password_pelanggan']){
        $_SESSION['id_user'] = $data_pelanggan['id_pelanggan'];
        $_SESSION['nama_user'] = $data_pelanggan['nama'];
        $_SESSION['no_user'] = $data_pelanggan['no_telepon'];
        $_SESSION['email_user'] = $data_pelanggan['email'];
        $_SESSION['alamat_user'] = $data_pelanggan['alamat'];
        header("Location: ../index.php");
        exit;
    }else{
        echo "<script>alert('Password Salah!'); window.history.back();</script>";
        exit();
    }
}else{
     echo "<script>alert('username tidak di temukan!'); window.history.back();</script>";
     exit();
    }
}
?>