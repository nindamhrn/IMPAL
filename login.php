<?php
session_start();
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
  <title><?=$title_website?> | Log in</title>
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
            if (isset($_POST['login_kuy'])){
              $u_dia = $_POST['u_login'];
              $check = mysqli_query($koneksi, "SELECT * FROM d_pengguna  WHERE username = '$u_dia'");
              if(mysqli_num_rows($check)<1) {
                echo'<div class="callout callout-danger">
                  <p>Akun anda belum terdaftar, silahkan mendaftar terlebih dahulu, untuk menikmati pelayanan kami.</p>
                </div>';
              } else {
                $hasil = mysqli_fetch_assoc($check);
                if(trim($_POST['p_login'])<>$hasil['password']){
                  echo'<div class="callout callout-danger">
                    <p>Password anda salah, silahkan masukkan data yang valid.</p>
                  </div>';
                } else {
                  $_SESSION['ses_impal'] = $hasil['id'];
                    echo'<div class="callout callout-success">
                      <p>Selamat datang, anda berhasil masuk selamat menikmati layanan kami.<script>window.location = "./";</script></p>
                    </div>';
                }
              }

            }
         ?>
      <form class = "form-signin" role = "form" 
            action = "<?php echo htmlspecialchars($_SERVER['PHP_SELF']); 
            ?>" method = "post">
        <div class="input-group mb-3">
          <input type="text" name="u_login" class="form-control" placeholder="Username">
          <div class="input-group-append">
            <div class="input-group-text">
              <span class="fas fa-envelope"></span>
            </div>
          </div>
        </div>
        <div class="input-group mb-3">
          <input type="password" class="form-control" name="p_login" placeholder="Password">
          <div class="input-group-append">
            <div class="input-group-text">
              <span class="fas fa-lock"></span>
            </div>
          </div>
        </div>
        <div class="row">
          <div class="col-8">
          </div>
          <!-- /.col -->
          <div class="col-4">
            <button type="submit" name="login_kuy" class="btn btn-primary btn-block btn-flat">Sign In</button>
          </div>
          <!-- /.col -->
        </div>
      </form>

      <div class="social-auth-links text-center mb-3">
        <p>- OR -</p>
        <a href="register.php" class="btn btn-block btn-primary">
          <i class="fa fa-users mr-2"></i> Register a new membership
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
