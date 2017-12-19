<?php
    include ('cek_login.php');
    include 'koneksi.php';

    if (isset($_SESSION['admin'])|| isset($_SESSION['pegawai'])) {
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

    <h2 class="text-center">Buku </h2>
    <form action="cari_bk.php" method="POST">
    <input type="text" placeholder="Masukkan Judul Buku" id="cari" name="cari">
    <button class="btn btn-primary btn-sm cari" name="search" type="submit"><i class="glyphicon glyphicon-search"></i>Cari </button>
    </form>
    <a class="btn btn-primary btn-sm" role="button" href="form_input_buku.php" ><strong> </strong><i class="glyphicon glyphicon-plus"></i><strong>Tambah</strong></a>
    
    <div class="table-responsive">
        <table class="table table-bordered">
            <thead>
                <tr>
                    <th>Kode Buku</th>
                    <th>Judul Buku</th>
                    <th>Pengarang </th>
                    <th id="pinjam">Tahun Terbit</th>
                    <th id="jumlah">Jumlah </th>
                    <th id="pinjam">Option </th>
                </tr>
            </thead>
            <tbody>
                
                    <?php 
                        $query=mysqli_query($koneksi,"SELECT * FROM buku");
                        while ($buku=mysqli_fetch_array($query)) {
                            echo "<tr>";
                            echo "<td>".$buku['id']."</td>";
                            echo "<td>".$buku['judul']."</td>";
                            echo "<td>".$buku['Pengarang']."</td>";
                            echo "<td>".$buku['tahun_terbit']."</td>";
                            echo "<td>".$buku['jumlah']."</td>";
                            echo "<td><a  class='btn btn-default btn-xs' type='button' href='form_edit_buku.php?u=".$buku['id']."'>▶ Update</a>";
                            echo "<a class='btn btn-default btn-xs' type='button' href='pinjam_admin.php?kode=".$buku['id']."'>▶ Pinjam</a></td>";

                         }
                            echo "</tr>";
                     ?>
                    
                
            </tbody>
        </table>
    </div>
    <script src="assets/js/jquery.min.js"></script>
    <script src="assets/bootstrap/js/bootstrap.min.js"></script>
</body>
</html>
<?php 
    }else{
        header("Location: index.php");
 
}
 ?>