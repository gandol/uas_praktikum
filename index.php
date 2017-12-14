<?php 
    //session_start();
    include ('cek_login.php');
    if (isset($_SESSION['saya'])) {
        echo "wkwkwk";
    }
    elseif (isset($_SESSION['admin'])) {
        header("Location: halaman_admin.php");
    }elseif (isset($_SESSION['pegawai'])) {
        header("Location: halaman_pegawai.php");
    }elseif (isset($_SESSION['anggota'])) {
        header("Location: halaman_utama_anggota.php");
    }
    elseif (!isset($_SESSION['admin']) || !isset($_SESSION['pegawai']) || !isset($_SESSION['anggota'])) {
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
    <div class="row register-form">
        <div class="col-md-6 col-md-offset-3">
            <form class="form-horizontal custom-form" action="cek_login.php" method="POST">
                <h1>Login Form</h1>
                <div class="form-group">
                    <div class="col-sm-4 label-column">
                        <label class="control-label" for="name-input-field">Username </label>
                    </div>
                    <div class="col-sm-6 input-column">
                        <input class="form-control" type="text" required="" maxlength="12" minlength="12" inputmode="numeric" name="username">
                    </div>
                </div>
                <div class="form-group">
                    <div class="col-sm-4 label-column">
                        <label class="control-label" for="pawssword-input-field">Password </label>
                    </div>
                    <div class="col-sm-6 input-column">
                        <input name="password" class="form-control" type="password" required="">
                    </div>
                </div>
                <div class="checkbox">
                    <label>
                        <input type="checkbox">I've read and accept the terms and conditions</label>
                </div>
                <button class="btn btn-default submit-button" name="login" type="submit">Login </button>
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