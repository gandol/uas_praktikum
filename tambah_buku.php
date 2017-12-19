<?php 
include ('koneksi.php');
include ('cek_login.php');

    if (isset($_SESSION['admin'])|| isset($_SESSION['pegawai'])) {
    	if (isset($_POST['input'])) {
    		$judul=$_POST['judul_buku'];
    		$pengarang=$_POST['author'];
    		$tahun=$_POST['tahun_terbit'];
    		$jumlah=$_POST['jumlah'];
    		$queri=mysqli_query($koneksi,"SELECT * FROM buku");
    		$jumlah_ambil=mysqli_num_rows($queri);
    		$jumlah_data=$jumlah_ambil+1;
    		$id_buku="BK-NO".$jumlah_data;
    		$query=mysqli_query($koneksi,"INSERT INTO buku(id,judul,pengarang,tahun_terbit,jumlah) VALUE ('$id_buku','$judul','$pengarang',$tahun,$jumlah)");
    		if ($query) {
    			header("Location: buku_admin.php");
    		 }else{
    		 	?>
    		 	<script type="text/javascript">
    		 		alert("gagal");
    		 	</script>
    		 	<?php 
    	}
    	}else{
    		 header("Location: form_input_buku.php");
    	}
    }else{
    	header("Location: index.php");
    }
    ?>