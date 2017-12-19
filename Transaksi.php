<?php 
    include 'koneksi.php';
    include 'cek_login.php';
    if (isset($_SESSION['admin'])|| isset($_SESSION['pegawai'])) {

    }
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
    <form action="cari_kembali.php" method="POST">
    <button class="btn btn-primary btn-sm cari" type="submit" name="cari_kembali">Pengembalian </button>
    </form>
    <!-- <input type="text" placeholder="Masukkan ID Peminjaman" id="cari">
    <button class="btn btn-primary btn-sm cari" type="button"><i class="glyphicon glyphicon-search"></i>Cari </button> -->
    <div class="table-responsive">
        <table class="table">
            <thead>
                <tr>
                    <th>ID Peminjaman</th>
                    <th>Peminjam </th>
                    <th>Judul Buku</th>
                    <th>Tanggal Pinjam</th>
                    <th>Status </th>
                </tr>
            </thead>
            <tbody>
                <?php 
                $query=mysqli_query($koneksi,"SELECT pinjam.id,usr.nama,buku.judul,pinjam.tgl_pinjam,pinjam.status from (user usr join peminjaman pinjam on usr.username=pinjam.username) LEFT JOIN buku buku on pinjam.id_buku=buku.id where pinjam.status='belum dikembalikan'");
                    //$data_pinjam=mysqli_fetch_assoc($query);
                    while ($buku=mysqli_fetch_array($query)) {
                    echo "<tr>";
                    echo "<td>".$buku['id']." </td>";
                    echo "<td>".$buku['nama']." </td>";
                    echo "<td>".$buku['judul']." </td>";
                    echo "<td>".$buku['tgl_pinjam']." </td>";
                    echo " <td> ".$buku['status']."</td>";
                }
                 ?>
                   
                </tr>
                <tr></tr>
            </tbody>
        </table>
    </div>
    <script src="assets/js/jquery.min.js"></script>
    <script src="assets/bootstrap/js/bootstrap.min.js"></script>
</body>

</html>