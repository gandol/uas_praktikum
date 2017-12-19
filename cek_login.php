<?php 
session_start();
include ("koneksi.php");
    if (isset($_POST["login"])) {
        $username=$_POST["username"];
        $pass =$_POST["password"];
        $cek=$pass;

        $query=mysqli_query($koneksi,"SELECT * FROM user WHERE username='$username' AND password='$pass'");
        if (mysqli_num_rows($query)==1) {
            $hasil = mysqli_fetch_array($query);
            switch ($hasil['level']) {
                case '1':
                    header("Location: halaman_admin.php");
                    $_SESSION['admin'] = $hasil['username'];
                    break;
                case '2':
                    header("Location: halaman_pegawai.php");
                    $_SESSION['pegawai'] = $hasil['username'];
                    break;
                case '3':
                    header("Location: halaman_anggota.php");
                    $_SESSION['anggota'] = $hasil['username'];
                    break;
                default:
                    echo "hayy";
                    echo $hasil['level'];
                    break;
            }
        }else{
            //header("Location: percobaan/index.php");
            echo "salah";
        }

    }else{
        //echo "saya";
        header("Locatiom: index.php");
    }
 ?>