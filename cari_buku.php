<?php 
include 'koneksi.php';
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
                        
                        if (isset($_POST['cari'])) {
                            $kata_kunci=$_POST['kata_kunci'];
                            $query=mysqli_query($koneksi,"SELECT * FROM buku WHERE judul LIKE '%$kata_kunci%' ");
                            while ($buku=mysqli_fetch_array($query)) {
                                echo "<tr>";
                                echo "<td>".$buku['id']."</td>";
                                echo "<td>".$buku['judul']."</td>";
                                echo "<td>".$buku['Pengarang']."</td>";
                                echo "<td>".$buku['tahun_terbit']."</td>";
                                echo "<td>".$buku['jumlah']."</td>";
                                echo "<td><a class='btn btn-default btn-xs' type='button' href='pinjam.php?kode=".$buku['id']."'>▶ Pinjam</a></td>";
                                echo "</tr>";
                                 }
                                
                        }
                        
                     ?>
                    
                
            </tbody>
        </table>
    </div>
    <script src="assets/js/jquery.min.js"></script>
    <script src="assets/bootstrap/js/bootstrap.min.js"></script>
</body>
</html>