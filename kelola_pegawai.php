<?php
    include ('cek_login.php');
    include 'koneksi.php';

    if (isset($_SESSION['admin'])) {
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
    <h2 class="text-center">Pegawai </h2>
    <a class="btn btn-primary btn-sm" role="" name="tambah" href="form_tambah_pegawai.php"><strong> </strong><i class="glyphicon glyphicon-plus"></i><strong>Tambah</strong></a>
    <header></header>
    <div class="table-responsive">
        <table class="table table-bordered">
            <thead>
                <tr>
                    <th>Nama </th>
                    <th>Username </th>
                    <th id="jabatan">Jabatan </th>
                    <th id="pinjam">Password </th>
                </tr>
            </thead>
            <tbody>
                <?php 
                    $query=mysqli_query($koneksi,"SELECT * FROM user where level=2");
                    while ($pegawai= mysqli_fetch_array($query)) {
                        echo "<tr>";
                        echo "<td>".$pegawai['nama']."</td>";
                        echo "<td>".$pegawai['username']."</td>";
                        echo "<td>".$pegawai['jabatan']."</td>";
                        echo "<td>";
                        echo "<a class='btn btn-default btn-xs' type='button' href='update_password.php?user=".$pegawai['username']."'>✓ Ganti</a>";
                        echo "</td>";

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
}
 ?>