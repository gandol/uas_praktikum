<?php 
include ('koneksi.php');
include ('cek_login.php');

    if (isset($_SESSION['admin'])|| isset($_SESSION['pegawai'])) {
    	if (isset($_POST['update_buku'])) {
            $kode=$_POST['kode'];
    		$judul=$_POST['edit_judul_buku'];
    		$pengarang=$_POST['edit_author'];
    		$tahun=$_POST['edit_tahun_terbit'];
    		$jumlah=$_POST['edit_jumlah'];
    		$query=mysqli_query($koneksi,"UPDATE buku SET judul='$judul',Pengarang='$pengarang',tahun_terbit=$tahun,jumlah='$jumlah' WHERE id='$kode'");
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