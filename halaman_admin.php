<?php
    include ('cek_login.php');

    if (!isset($_SESSION['admin'])) {
        header("Location: index.php");
    }else{
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
                    <li role="presentation"><a href="Logout.php">Logout </a></li>
                </ul>
            </div>
        </div>
    </nav>
    <div class="container pilih" id="selamat">
        <h1 class="text-center">Welcome to Admin Panel</h1>
        <div class="col-md-3"><i class="glyphicon glyphicon-book"></i>
            <h3 class="text-center">Buku </h3><a class="btn btn-primary" role="button" href="buku_admin.php" target="_parent">Lihat </a></div>
        <div class="col-md-3"><i class="glyphicon glyphicon-user"></i>
            <h3 class="text-center">Pegawai </h3>
            <button class="btn btn-primary" type="button">Lihat </button>
        </div>
        <div class="col-md-3"><i class="fa fa-user"></i>
            <h3 class="text-center">Anggota </h3>
            <button class="btn btn-primary" type="button">Lihat </button>
        </div>
        <div class="col-md-3"></div>
        <div class="col-md-3" id="transaksi"><i class="fa fa-th-list"></i>
            <h3 class="text-center">Transaksi </h3>
            <button class="btn btn-primary" type="button">Lihat </button>
        </div>
        <div class="col-md-3"></div>
    </div>
    <script src="assets/js/jquery.min.js"></script>
    <script src="assets/bootstrap/js/bootstrap.min.js"></script>
</body>

</html>
<?php 
} ?>