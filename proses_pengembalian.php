<?php 
include 'koneksi.php';
if (isset($_POST['kembalikan'])) {
	$query_cek_panjang=mysqli_query($koneksi,"SELECT * FROM pengembalian");
	$cek_panjang=mysqli_num_rows($query_cek_panjang);
	$panjang=$cek_panjang+1;
	$id_pengembalian="KM-No".$panjang;
	$id_pinjam=$_POST['kode'];
	$tgl_kembali=$_POST['tgl_kembali'];
	echo $tgl_kembali;
	$denda=$_POST['denda'];
	$query_pengembalian=mysqli_query($koneksi,"INSERT INTO pengembalian(id,id_pinjam,tgl_kembali,denda) VALUE ('$id_pengembalian','$id_pinjam','$tgl_kembali','$denda')");

	if ($query_pengembalian) {
		$query_jml=mysqli_query($koneksi,"select bk.jumlah,pinjam.id_buku,pinjam.id from buku bk join peminjaman pinjam on bk.id=pinjam.id_buku where pinjam.id='$id_pinjam'");
		if ($query_jml) {
			$data_buku=mysqli_fetch_assoc($query_jml);
			$id_buku=$data_buku['id_buku'];
			$id_pinjam=$data_buku['id'];
			$jml_buku_skr=$data_buku['jumlah']+1;
			$query_update_jml=mysqli_query($koneksi,"UPDATE buku SET jumlah='$jml_buku_skr' where id='$id_buku'");
			$query_peminjaman=mysqli_query($koneksi,"UPDATE peminjaman SET status='sudah dikembalikan' where id='$id_pinjam'");	
			if ($query_update_jml && $query_peminjaman) {
				?>
    		 	<script type="text/javascript">
    		 		alert("Berhasil");
    		 		window.location.href="transaksi.php";
    		 	</script>
    		 	<?php 
			}else{
				?>
    		 	<script type="text/javascript">
    		 		alert("gagal");
    		 		//window.location.href="transaksi.php";
    		 	</script>
    		 	<?php 
			}
			
		}else{
			?>
    		 	<script type="text/javascript">
    		 		alert("Gagal");
    		 		window.location.href="index.php";
    		 	</script>
    		 	<?php 
		}
	}else{
		?>
    		 	<script type="text/javascript">
    		 		alert("Gagal");
    		 		window.location.href="index.php";
    		 	</script>
    		 	<?php 
	}
}
 ?>