<?php 
    include 'koneksi.php';
    if (isset($_POST['cari_kode'])) {
        $kode=$_POST['cari'];
        $query=mysqli_query($koneksi,"SELECT buku.judul,date_format(pinjam.tgl_pinjam,'%d/%m/%Y') as tgl,pinjam.tgl_pinjam,pinjam.status from (user usr join peminjaman pinjam on usr.username=pinjam.username) LEFT JOIN buku buku on pinjam.id_buku=buku.id where pinjam.id='$kode' AND pinjam.status='belum dikembalikan'");
        if (mysqli_num_rows($query)<=0) {
            
        $data_peminjaman=mysqli_fetch_array($query);
        $tgl_pinjam=new DateTime($data_peminjaman['tgl_pinjam']);
        $tgl_skrng=new DateTime();
        $tgl_kembali=date('d/m/Y');
        $tgl_kembali_db=date('Y-m-d');
        $selisih= $tgl_skrng-> diff($tgl_pinjam)->d;
        $denda=$selisih*10000;
        echo $tgl_kembali_db;




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
            <form class="form-horizontal custom-form" action="proses_pengembalian.php" method="POST">
                <h1>Pengembalian Buku</h1>
                <div class="form-group">
                    <div class="col-sm-4 label-column">
                        <label class="control-label" for="name-input-field">ID Peminjaman</label>
                    </div>
                    <div class="col-sm-6 input-column">
                        <?php  echo "<input class='form-control' type='text' name='id_pinjam' value='".$kode."'>" ?>
                    </div>
                </div>
                <div class="form-group">
                    <div class="col-sm-4 label-column">
                        <label class="control-label" for="name-input-field">Judul </label>
                    </div>
                    <div class="col-sm-6 input-column">
                        <?php  echo "<input class='form-control' type='text' value='".$data_peminjaman['judul']."'>" ?>
                    </div>
                </div>
                <div class="form-group">
                    <div class="col-sm-4 label-column">
                        <label class="control-label" for="name-input-field">Tanggal Pinjam</label>
                    </div>
                    <div class="col-sm-6 input-column">
                        <?php  echo "<input class='form-control' type='text' value='".$data_peminjaman['tgl']."'>" ?>
                    </div>
                </div>
                <div class="form-group">
                    <div class="col-sm-4 label-column">
                        <label class="control-label" for="name-input-field">Tanggal Kembali</label>
                    </div>
                    <div class="col-sm-6 input-column">
                        <?php  echo "<input class='form-control' type='text' value='".$tgl_kembali."'>" ?>
                        <?php  echo "<input class='form-control' name='tgl_kembali' type='text' value='".$tgl_kembali_db."'>" ?>
                        <?php  echo "<input class='form-control' name='kode' type='hidden' value='".$kode."'>" ?>
                    </div>
                </div>
                <div class="form-group">
                    <div class="col-sm-4 label-column">
                        <label class="control-label" for="name-input-field">Denda </label>
                    </div>
                    <div class="col-sm-6 input-column">
                        <?php  echo "<input class='form-control' name='denda' type='text' value='".$denda."'>" ?>
                    </div>
                </div>
                <button class="btn btn-default submit-button" type="submit" name="kembalikan">Submit Form</button>
            </form>
        </div>
    </div>
    <script src="assets/js/jquery.min.js"></script>
    <script src="assets/bootstrap/js/bootstrap.min.js"></script>
</body>
</html>
<?php 
}else{
    ?>
                <script type="text/javascript">
                    alert("Gagal");
                    window.location.href="transaksi.php";
                </script>
                <?php 
}
}else{
    header("Location: index.php");
}
 ?>
