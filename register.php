<?php
session_start();
date_default_timezone_set('Asia/Jakarta');
include 'setting_database.php';
if(isset($_SESSION['ses_impal'])){
  header("Location: ./");
  die();
}
?>
<!DOCTYPE html>
<html>
<head>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <title><?=$title_website?> | Register</title>
  <!-- Tell the browser to be responsive to screen width -->
  <meta name="viewport" content="width=device-width, initial-scale=1">

  <!-- Font Awesome -->
  <link rel="stylesheet" href="<?=$website?>plugins/fontawesome-free/css/all.min.css">
  <!-- Ionicons -->
  <link rel="stylesheet" href="https://code.ionicframework.com/ionicons/2.0.1/css/ionicons.min.css">
  <!-- icheck bootstrap -->
  <link rel="stylesheet" href="<?=$website?>plugins/icheck-bootstrap/icheck-bootstrap.min.css">
  <!-- Theme style -->
  <link rel="stylesheet" href="<?=$website?>dist/css/adminlte.min.css">
  <!-- Google Font: Source Sans Pro -->
  <link href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700" rel="stylesheet">
</head>
<body class="hold-transition login-page">
<div class="login-box">
  <div class="login-logo">
    <a href="<?=$website?>"><b><?=$judul_1?></b><?=$judul_2?></a>
  </div>
  <!-- /.login-logo -->
  <div class="card">
    <div class="card-body login-card-body">
<?php
            if (isset($_POST['reg_mem'])){
              $nama = $_POST['n_rpengguna'];
              $u_dia = $_POST['u_rpengguna'];
              $nohp = $_POST['nomor'];
              $p_dia = $_POST['p_rpengguna'];
              $p2_dia = $_POST['p2_rpengguna'];
              $check = mysqli_query($koneksi, "SELECT * FROM d_pengguna  WHERE username = '$u_dia'");
              if(mysqli_num_rows($check)<1) {
                if (strlen($u_dia) < 6) {
                  echo'<div class="callout callout-danger">
                    <p>Username minimal memiliki 6 karakter atau lebih.</p>
                  </div>';
                } else if ($p_dia <> $p2_dia) {
                  echo'<div class="callout callout-danger">
                    <p>Password konfirmasi yang anda masukan salah.</p>
                  </div>';
                } else {
                  $date = date('j-M-Y');
                  $daftar = mysqli_query($koneksi, "INSERT INTO `d_pengguna`(`id`, `nama_pengguna`, `nohp`, `username`, `password`, `level`, `e_saldo`, `last_login`) VALUES ('','{$nama}','{$nohp}','{$u_dia}','{$p2_dia}','Member','0','{$date}')");
                  echo'<div class="callout callout-success">
                    <p>Akun berhasil di daftar, silahkan login untuk mendapatkan layanan kami.</p>
                  </div>';
                }
              } else {
                  echo'<div class="callout callout-danger">
                    <p>Username sudah terdaftar mohon lakukan perpanjang bukan menambah member.</p>
                  </div>';
              }

            }
         ?>
      <form class = "form-signin" role = "form" 
            action = "<?php echo htmlspecialchars($_SERVER['PHP_SELF']); 
            ?>" method = "post">
       <div class="input-group mb-3">
          <input type="text" class="form-control" name="n_rpengguna" placeholder="Full name">
          <div class="input-group-append">
            <div class="input-group-text">
              <span class="fas fa-user"></span>
            </div>
          </div>
        </div>
       <div class="input-group mb-3">
          <input type="text" class="form-control" name="u_rpengguna" placeholder="Username">
          <div class="input-group-append">
            <div class="input-group-text">
              <span class="fas fa-user"></span>
            </div>
          </div>
        </div>
        <div class="input-group mb-3">
          <input type="text" class="form-control" name="nomor" placeholder="08*****">
          <div class="input-group-append">
            <div class="input-group-text">
              <span class="fas fa-phone"></span>
            </div>
          </div>
        </div>
        <div class="input-group mb-3">
          <input type="password" class="form-control" name="p_rpengguna" placeholder="Password">
          <div class="input-group-append">
            <div class="input-group-text">
              <span class="fas fa-lock"></span>
            </div>
          </div>
        </div>
        <div class="input-group mb-3">
          <input type="password" class="form-control" name="p2_rpengguna" placeholder="Retype password">
          <div class="input-group-append">
            <div class="input-group-text">
              <span class="fas fa-lock"></span>
            </div>
          </div>
        </div>
        <div class="row">
          <div class="col-8">
            <div class="icheck-primary">
              <input type="checkbox" id="agreeTerms" name="terms" value="agree">
              <label for="agreeTerms">
               I agree to the <a href="#">terms</a>
              </label>
            </div>
          </div>
          <!-- /.col -->
          <div class="col-4">
            <button type="submit" name="reg_mem" class="btn btn-primary btn-block btn-flat">Register</button>
          </div>
          <!-- /.col -->
        </div>
      </form>

      <div class="social-auth-links text-center mb-3">
        <p>- OR -</p>
        <a href="./" class="btn btn-block btn-primary">
          <i class="fa fa-user-secret mr-2"></i> I already have a membership
        </a>
      </div>
    </div>
    <!-- /.login-card-body -->
  </div>
</div>
<!-- /.login-box -->

<!-- jQuery -->
<script src="<?=$website?>plugins/jquery/jquery.min.js"></script>
<!-- Bootstrap 4 -->
<script src="<?=$website?>plugins/bootstrap/js/bootstrap.bundle.min.js"></script>

</body>
</html>
