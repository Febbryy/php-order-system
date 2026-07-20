<?php
session_start();

include 'config.php';

$konfirmasi = 4;

$satu = 1 ;

$tiga = 3 ;

$jumlah = $satu + $tiga;

if($jumlah == $konfirmasi){
    echo "<script>alert('pembayaran berhasil dan data anda tersimpan!');</script";
    exit();
}

?>