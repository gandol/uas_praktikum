<?php
    include ('cek_login.php');
    include 'koneksi.php';

    if (isset($_SESSION['admin'])|| isset($_SESSION['pegawai'])) {
        if (!isset($_GET['u'])) {
            header("Location: buku_admin.php");
            
        }else{
            $id=$_GET['u'];
            $query=mysqli_query($koneksi,"SELECT * FROM buku WHERE id='$id'");
            $data_buku=mysqli_fetch_assoc($query);

            if (mysqli_num_rows($query)<1) {
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
                    <li role="presentation"><a href="logout.php">Logout </a></li>
                </ul>
            </div>
        </div>
    </nav>
    <div class="row register-form">
        <div class="col-md-8 col-md-offset-2">
            <form class="form-horizontal custom-form" action="proses_edit_buku.php" method="POST">
                <h1>Edit Buku</h1>
                <input class="form-control" type="hidden" name="kode" value="<?php echo $data_buku['id'] ?>">
                <div class="form-group">
                    <div class="col-sm-4 label-column">
                        <label class="control-label" for="name-input-field">Judul </label>
                    </div>
                    <div class="col-sm-6 input-column">
                        <input class="form-control" type="text" name="edit_judul_buku" value="<?php echo $data_buku['judul'] ?>">
                    </div>
                </div>
                <div class="form-group">
                    <div class="col-sm-4 label-column">
                        <label class="control-label" for="email-input-field">Pengarang </label>
                    </div>
                    <div class="col-sm-6 input-column">
                        <input class="form-control" type="text" name="edit_author" value="<?php echo $data_buku['Pengarang'] ?>">
                    </div>
                </div>
                <div class="form-group">
                    <div class="col-sm-4 label-column">
                        <label class="control-label" for="pawssword-input-field">Tahun Terbit</label>
                    </div>
                    <div class="col-sm-6 input-column">
                        <input class="form-control" type="number" name="edit_tahun_terbit" min="1000" max="2018" value="<?php echo $data_buku['tahun_terbit'] ?>">
                    </div>
                </div>
                <div class="form-group">
                    <div class="col-sm-4 label-column">
                        <label class="control-label" for="repeat-pawssword-input-field">Jumlah </label>
                    </div>
                    <div class="col-sm-6 input-column">
                        <input class="form-control" type="number" name="edit_jumlah" min="1" value="<?php echo $data_buku['jumlah'] ?>">
                    </div>
                </div>
                <div class="form-group"></div>
                <button class="btn btn-default submit-button" type="submit" name="update_buku">Input </button>
            </form>
        </div>
    </div>
    <script src="assets/js/jquery.min.js"></script>
    <script src="assets/bootstrap/js/bootstrap.min.js"></script>
</body>

</html>
<?php 
        }
            }
    }else{
        header("Location: index.php");
 
}
 ?>