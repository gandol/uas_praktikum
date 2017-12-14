<?php  
$server = "127.0.0.1";
$user	= "root";
$pass	= "";
$database = "perpus";

$koneksi = mysqli_connect($server,$user,$pass,$database);

if (!$koneksi) {
	die("gagal sambung pak".mysqli_connect_error());
}
?>