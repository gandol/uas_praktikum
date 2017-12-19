<?php 
$tgl_skrg = new DateTime("2017/12/10");
$tgl_2	= new DateTime();

$perbedaan = $tgl_2 -> diff($tgl_skrg)->format("%a");

echo $perbedaan;


// include 'cek_login.php';
// include 'koneksi.php';

// $query=mysqli_query($koneksi,"SELECT * FROM user where username='".$_SESSION['admin']."'");
// $data_user=mysqli_fetch_assoc($query);
// if ($query) {
// 	echo "berhasil";
// 	echo $data_user['username'];
// }else {
// 	echo "salah";
// }

// $tgl= date('Y/m/d');
// echo $tgl;
 ?>