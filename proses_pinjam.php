<?php 
include 'koneksi.php';
include 'cek_login.php';
if (isset($_SESSION['anggota'])) {
	if (isset($_POST['confirm'])) {
		$id_buku=$_POST['kode_buku'];
		$username=$_POST['username'];
		$tgl_pinjam=$_POST['tgl'];
		$quer=mysqli_query($koneksi,"SELECT * FROM peminjaman");
		$total_tmp=mysqli_num_rows($quer);
		$total=$total_tmp+1;
		$id_pinjam="PJ-No".$total;
		$status=$_POST['status'];
		$query=mysqli_query($koneksi,"INSERT INTO peminjaman(id,id_buku,tgl_pinjam,username,status) VALUE('$id_pinjam','$id_buku','$tgl_pinjam','$username','$status')");
		if ($query) {
			$query_buku=mysqli_query($koneksi,"SELECT * FROM buku WHERE id='$id_buku'");
			$data_buku=mysqli_fetch_assoc($query_buku);
			$jml_now=$data_buku['jumlah']-1;

			
			if ($jml_now<0) {
				?>
	    		<script type="text/javascript">
	    			alert("gagal atau stok buku kosong");
	    		 	window.location.href ="index.php";
	    		 </script>
	    		<?php
				
			}else{
				$query_skrng=mysqli_query($koneksi,"UPDATE buku SET jumlah=$jml_now WHERE id='$id_buku'");
				if ($query_skrng) {
					?>
	    		 	<script type="text/javascript">
	    		 		alert("Berhasil");
	    		 		window.location.href ="buku.php";
	    		 	</script>
	    		 	<?php
				}
			}
			
		}else{
			?>
	    		<script type="text/javascript">
	    			alert("gagal atau stok buku kosong");
	    		 	window.location.href ="index.php";
	    		 </script>
	    	<?php
		}
		
	}else{
		header("Location: index.php");
	}
	
}else{
	header("Location: index.php");
}
 ?>
