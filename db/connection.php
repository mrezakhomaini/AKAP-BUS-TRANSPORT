<?php

$server = "localhost";
$port = '3306';
$user = "root";
$password = "";
$nama_database = "akap";

$conn = mysqli_connect($server, $user, $password, $nama_database, $port);

if( !$conn ){
    die("Gagal terhubung dengan database: " . mysqli_connect_error());
}

?>
