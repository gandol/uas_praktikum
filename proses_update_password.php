<?php 
error_reporting(0);
	include 'koneksi.php';
	include 'cek_login.php';
	if(isset($_POST['update_pass'])){
		$username=$_POST['kode'];
		$sama=$_POST['password'];
		$dengan=$_POST['konfirm_password'];
		if ($sama == $dengan) {
			if ($_SESSION['admin']) {
				$query=mysqli_query($koneksi,"UPDATE user SET password='$dengan' WHERE username=$username");
				if ($query) {
					header("Location: index.php");
				}else{
					?>
	    		 	<script type="text/javascript">
	    		 		alert("gagal");
	    		 	</script>
	    		 	<?php 
				}
			}elseif ($_SESSION['pegawai']) {
				if ($_POST['level']==3) {
					$query=mysqli_query($koneksi,"UPDATE user SET password='$dengan' WHERE username=$username AND level=3");
					if ($query) {
							header("Location: index.php");
						}else{
							?>
			    		 	<script type="text/javascript">
			    		 		alert("gagal");
			    		 		window.history.back();
			    		 	</script>
			    		 	<?php
						}
				}else{
					?>
			    		<script type="text/javascript">
			    		 	alert("anda tidak berhak disini");
			    		 	// window.history.back();
			    		 	window.location.href ="index.php";
			    		 </script>
			    	<?php
			    	// header("Location: index.php");
				}
				
			}
		}else{
			?>
    		 	<script type="text/javascript">
    		 		alert("Password Tidak Sama Bos");
    		 		 window.history.back();
    		 	</script>
    		 <?php
    		 // header("Location: update_password.php?user=")
		}
	}else{
		header("Location: index.php");
	}
 ?>