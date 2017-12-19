<?php 
include ('koneksi.php');
include ('cek_login.php');

    if (isset($_SESSION['admin'])|| isset($_SESSION['pegawai'])) {
    	if (isset($_POST['input'])) {
    		$nama=$_POST['nama_anggota'];
    		$user=$_POST['username_anggota'];
    		$password=$_POST['password_anggota'];
    		$query=mysqli_query($koneksi,"INSERT INTO user(username,nama,password,level) VALUE ('$user','$nama','$password','3')");
    		if ($query) {
    			header("Location: kelola_anggota.php");
    		 }else{
    		 	?>
    		 	<script type="text/javascript">
    		 		alert("gagal");
    		 	</script>
    		 	<?php 
    	}
    	}else{
    		 header("Location: kelola_anggota.php");
    	}
    }else{
    	header("Location: index.php");
    }
    ?>