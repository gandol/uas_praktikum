<?php 
	include 'koneksi.php';
	include 'cek_login.php';

	$query_user=mysqli_query($koneksi,"SELECT * FROM user where username='".$_SESSION['admin']."'");
	$data_user=mysqli_fetch_assoc($query_user);

	$kode=$_GET['kode'];
	$query_buku=mysqli_query($koneksi,"SELECT * FROM buku where id='$kode'");
	$data_buku=mysqli_fetch_assoc($query_buku);

	$tgl=date('d/m/Y');
	if ($query_user && $query_buku) { 

	?>	

 <!DOCTYPE html>
<html>

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Untitled</title>
    <link rel="stylesheet" href="assets/bootstrap/css/bootstrap.min.css">
    <link rel="stylesheet" href="assets/fonts/font-awesome.min.css">
    <link rel="stylesheet" href="assets/css/styles.css">
    <link rel="stylesheet" href="assets/css/Pretty-Registration-Form.css">
    <link rel="stylesheet" href="assets/css/Bootstrap-Payment-Form.css">
    <link rel="stylesheet" href="assets/css/Mockup-iPhone-6.css">
    <link rel="stylesheet" href="assets/css/Material-Card.css">
</head>

<body>
    <nav class="navbar navbar-default">
        <div class="container-fluid">
            <div class="navbar-header"><a class="navbar-brand navbar-link" href="index.php"><strong>P</strong>erpustakaan <strong>S</strong>ys<strong>A</strong>dmin</a>
                <button class="navbar-toggle collapsed" data-toggle="collapse" data-target="#navcol-1"><span class="sr-only">Toggle navigation</span><span class="icon-bar"></span><span class="icon-bar"></span><span class="icon-bar"></span></button>
            </div>
            <div class="collapse navbar-collapse" id="navcol-1">
                <ul class="nav navbar-nav navbar-right">
                    <li class="active" role="presentation"><a href="index.php">Home </a></li>
                    <li role="presentation"><a href="logout.php">Logout </a></li>
                </ul>
            </div>
        </div>
    </nav>
    <div class="row register-form">
        <div class="col-md-8 col-md-offset-2">
            <form class="form-horizontal custom-form">
                <h1>Pinjam </h1>
                <div class="form-group">
                    <div class="col-sm-4 label-column">
                        <label class="control-label" for="name-input-field">Judul </label>
                    </div>
                    <div class="col-sm-6 input-column">
                    <?php echo "<input class='form-control' type='text' disabled='' value='".$data_buku['judul']."'>"; ?>
                    </div>
                </div>
                <div class="form-group">
                    <div class="col-sm-4 label-column">
                        <label class="control-label" for="name-input-field">Peminjam </label>
                    </div>
                    <div class="col-sm-6 input-column">
                    <?php echo "<input class='form-control' type='text' disabled='' value='".$data_user['username']."'>"; ?>
                    </div>
                </div>
                <div class="form-group">
                    <div class="col-sm-4 label-column">
                        <label class="control-label" for="name-input-field">Tanggal Pinjam</label>
                    </div>
                    <div class="col-sm-6 input-column">
                        <?php echo "<input class='form-control' type='text' disabled='' value='".$tgl."'>"; ?>
                    </div>
                </div>
                <button class="btn btn-default submit-button" type="button">Confirm </button>
                <button class="btn btn-default submit-button" type="button">Cancel </button>
            </form>
        </div>
    </div>
    <script src="assets/js/jquery.min.js"></script>
    <script src="assets/bootstrap/js/bootstrap.min.js"></script>
</body>
</html>
<?php 
}
 ?>