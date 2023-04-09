<?php
$host="localhost";
$user="root";
$pass="";
$database="db_mobil";

// membuat koneksi ke database
$koneksi = mysqli_connect($host, $user, $pass, $database);

// memeriksa koneksi k
if(mysqli_connect_errno()){
    echo "Koneksi database gagal : " . mysqli_connect_error();
}
