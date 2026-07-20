<?php
$host = 'db';             
$user = 'myuser';         
$password = 'mypassword'; 
$database = 'mydatabase';  
$connect_db = mysqli_connect($host, $user, $password, $database);

if(mysqli_connect_error()){
    echo"koneksi gagal" .mysqli_connect_erro();
}else{
}
?>