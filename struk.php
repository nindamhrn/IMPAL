<?php
date_default_timezone_set('Asia/Jakarta');
session_start();
include 'setting_database.php';
if(!isset($_SESSION['ses_impal'])){
  header("Location: login.php");
  die();
}
$session = $_SESSION['ses_impal'];
$kode = $_SESSION['ses_deposit'];
$check = mysqli_query($koneksi, "SELECT * FROM pemasukan_web WHERE kodeUnikDepo = '$kode'");
$status = mysqli_fetch_array($check);
$query = mysqli_query($koneksi, "SELECT * FROM d_pengguna WHERE id = '$session'");
$data = mysqli_fetch_array($query);
if($status['username'] != $data['username']){
  header("Location: deposit_saldo.php");
  die();
}
?>
<!DOCTYPE html>
<html>
<head>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <title>IMPAL | Belajar Pintar</title>
  <!-- Tell the browser to be responsive to screen width -->
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <!-- Font Awesome -->
  <link rel="stylesheet" href="http://localhost/plugins/fontawesome-free/css/all.min.css">
  <!-- Ionicons -->
  <link rel="stylesheet" href="https://code.ionicframework.com/ionicons/2.0.1/css/ionicons.min.css">
  <!-- Tempusdominus Bbootstrap 4 -->
  <link rel="stylesheet" href="http://localhost/plugins/tempusdominus-bootstrap-4/css/tempusdominus-bootstrap-4.min.css">
  <!-- iCheck -->
  <link rel="stylesheet" href="http://localhost/plugins/icheck-bootstrap/icheck-bootstrap.min.css">
  <!-- JQVMap -->
  <link rel="stylesheet" href="http://localhost/plugins/jqvmap/jqvmap.min.css">
  <!-- Theme style -->
  <link rel="stylesheet" href="http://localhost/dist/css/adminlte.min.css">
  <!-- overlayScrollbars -->
  <link rel="stylesheet" href="http://localhost/plugins/overlayScrollbars/css/OverlayScrollbars.min.css">
  <!-- Daterange picker -->
  <link rel="stylesheet" href="http://localhost/plugins/daterangepicker/daterangepicker.css">
  <!-- summernote -->
  <link rel="stylesheet" href="http://localhost/plugins/summernote/summernote-bs4.css">
  <!-- Google Font: Source Sans Pro -->
  <link href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700" rel="stylesheet">
</head>
<body class="hold-transition sidebar-mini layout-fixed">
<div class="wrapper">

  <!-- Navbar -->

  <!-- Main Sidebar Container -->
  <aside class="main-sidebar sidebar-dark-primary elevation-4">
    <!-- Brand Logo -->
    <a href="./" class="brand-link">
      <img src="http://localhost/dist/img/AdminLTELogo.png" alt="AdminLTE Logo" class="brand-image img-circle elevation-3"
           style="opacity: .8">
      <span class="brand-text font-weight-light"> TENTOR U</span>
    </a>

    <!-- Sidebar -->
    <div class="sidebar">
      <!-- Sidebar user panel (optional) -->
      <div class="user-panel mt-3 pb-3 mb-3 d-flex">
        <div class="image">
          <img src="http://localhost/dist/img/user2-160x160.jpg" class="img-circle elevation-2" alt="User Image">
        </div>
        <div class="info">
          <a href="./" class="d-block">Cornelius Alfredo</a>
        </div>
      </div>

      <!-- Sidebar Menu -->
      <nav class="mt-2">
        <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">
        </ul>
      </nav>
      <!-- /.sidebar-menu -->
    </div>
    <!-- /.sidebar -->
  </aside>  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <div class="content-header">
      <div class="container-fluid">
       <div class="row mb-2">
          <div class="col-sm-6">
            <h1>Bukti Pembayaran</h1>
          </div>
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="#">Home</a></li>
              <li class="breadcrumb-item active">Bukti Pembayaran</li>
            </ol>
          </div>
        </div>
      </div><!-- /.container-fluid -->
    </section>

    <section class="content">
      <div class="container-fluid">
        <div class="row">
          <div class="col-12">
            <div class="callout callout-info">
              <h5><i class="fas fa-info"></i> Note:</h5>
              Pembayaran memiliki batas waktu yang diberikan adalah 1x24JAM saat membuat deposito saldo, silahkan transfer sebelum pembayaran berakhir.
            </div>


            <!-- Main content -->
            <div class="invoice p-3 mb-3">
              <!-- title row -->
              <div class="row">
                <div class="col-12">
                  <h4>
                    <i class="fas fa-globe"></i> Tentor Tel-U.
                    <small class="float-right">Date: <?=$status['waktuDepo']?></small>
                  </h4>
                </div>
                <!-- /.col -->
              </div>
              <!-- info row -->
              <div class="row invoice-info">
                <div class="col-sm-4 invoice-col">
                  From
                  <address>
                    <strong>Tentor Tel-U.</strong><br>
                    Jl Telekomunikasi No 1<br>
                    Bandung, Jawa Barat 94107<br>
                    Phone: (804) 123-5432<br>
                    Email: info@tentoru.com
                  </address>
                </div>
                <!-- /.col -->
                <div class="col-sm-4 invoice-col">
                </div>
                <!-- /.col -->
                <div class="col-sm-4 invoice-col">
                  <b>Invoice <?=$status['kodeUnikDepo']?></b><br>
                  <b>Payment Due:</b> 1x24JAM saat pengiriman<br>
                  <b>Account:</b> <?=$status['username']?>
                </div>
                <!-- /.col -->
              </div>
              <!-- /.row -->

              <!-- Table row -->
              <div class="row">
                <div class="col-12 table-responsive">
                  <table class="table table-striped">
                    <thead>
                    <tr>
                      <th>Product</th>
                      <th>Subtotal</th>
                    </tr>
                    </thead>
                    <tbody>
                    <tr>
                      <td>Deposito Saldo sebesar IDR <?=number_format($status['totalDeposit'],0,',','.')?></td>
                      <td>IDR <?=number_format($status['totalDeposit'],0,',','.')?></td>
                    </tr>
                    </tbody>
                  </table>
                </div>
                <!-- /.col -->
              </div>
              <!-- /.row -->

              <div class="row">
                <!-- accepted payments column -->
                <div class="col-6">
                  <p class="lead">Payment Methods:</p>
                  <img src="http://localhost/dist/img/credit/visa.png" alt="Visa">
                  <img src="http://localhost/dist/img/credit/mastercard.png" alt="Mastercard">
                  <img src="http://localhost/dist/img/credit/american-express.png" alt="American Express">
                  <img src="http://localhost/dist/img/credit/paypal2.png" alt="Paypal">

                  <p class="text-muted well well-sm shadow-none" style="margin-top: 10px;">
                    Mohon tunggu jika sudah melakukan pengiriman, karena sistem deposit yang dipakai manual untuk saat ini, silahkan konfirmasi pembayaran dengan mengirimkan struk pembayaran ke email info@tentoru.com.
                  </p>
                </div>
                <!-- /.col -->
                <div class="col-6">
                  <p class="lead">Amount Due 2/22/2014</p>

                  <div class="table-responsive">
                    <table class="table">
                      <tr>
                        <th style="width:50%">Subtotal:</th>
                        <td>IDR <?=number_format($status['totalDeposit'],0,',','.')?></td>
                      </tr>
                      <tr>
                        <th>Tax</th>
                        <td>IDR 10.000</td>
                      </tr>
                      <tr>
                        <th>Total:</th>
                        <td>IDR <?=number_format($status['totalDeposit']+10000,0,',','.')?></td>
                      </tr>
                    </table>
                  </div>
                </div>
                <!-- /.col -->
              </div>
              <!-- /.row -->

              <!-- this row will not appear when printing -->
              <div class="row no-print">
                <div class="col-12">
                  <button type="button" class="btn btn-success float-right"><i class="far fa-credit-card"></i> Submit
                    Payment
                  </button>
                </div>
              </div>
            </div>
            </div>
            </div>
            <!-- /.invoice -->
        </div>
        <!-- /.row (main row) -->
      </div><!-- /.container-fluid -->
    </section>
    <!-- /.content -->
  </div>
  <!-- /.content-wrapper -->
  <footer class="main-footer">
    <strong>Copyright &copy; 2014-2019 <a href="http://adminlte.io">AdminLTE.io</a>.</strong>
    All rights reserved.
    <div class="float-right d-none d-sm-inline-block">
      <b>Version</b> 3.0.0-rc.1
    </div>
  </footer>

  <!-- Control Sidebar -->
  <aside class="control-sidebar control-sidebar-dark">
    <!-- Control sidebar content goes here -->
  </aside>
  <!-- /.control-sidebar -->
</div>
<!-- ./wrapper -->

<!-- jQuery -->
<script src="http://localhost/plugins/jquery/jquery.min.js"></script>
<!-- jQuery UI 1.11.4 -->
<script src="http://localhost/plugins/jquery-ui/jquery-ui.min.js"></script>
<!-- Resolve conflict in jQuery UI tooltip with Bootstrap tooltip -->
<script>
  $.widget.bridge('uibutton', $.ui.button)
</script>
<!-- Bootstrap 4 -->
<script src="http://localhost/plugins/bootstrap/js/bootstrap.bundle.min.js"></script>
<!-- ChartJS -->
<script src="http://localhost/plugins/chart.js/Chart.min.js"></script>
<!-- Sparkline -->
<script src="http://localhost/plugins/sparklines/sparkline.js"></script>
<!-- JQVMap -->
<script src="http://localhost/plugins/jqvmap/jquery.vmap.min.js"></script>
<script src="http://localhost/plugins/jqvmap/maps/jquery.vmap.world.js"></script>
<!-- jQuery Knob Chart -->
<script src="http://localhost/plugins/jquery-knob/jquery.knob.min.js"></script>
<!-- daterangepicker -->
<script src="http://localhost/plugins/moment/moment.min.js"></script>
<script src="http://localhost/plugins/daterangepicker/daterangepicker.js"></script>
<!-- Tempusdominus Bootstrap 4 -->
<script src="http://localhost/plugins/tempusdominus-bootstrap-4/js/tempusdominus-bootstrap-4.min.js"></script>
<!-- Summernote -->
<script src="http://localhost/plugins/summernote/summernote-bs4.min.js"></script>
<!-- overlayScrollbars -->
<script src="http://localhost/plugins/overlayScrollbars/js/jquery.overlayScrollbars.min.js"></script>
<!-- AdminLTE App -->
<script src="http://localhost/dist/js/adminlte.js"></script>
<!-- AdminLTE dashboard demo (This is only for demo purposes) -->
<script src="http://localhost/dist/js/pages/dashboard.js"></script>
<!-- AdminLTE for demo purposes -->
<script src="http://localhost/dist/js/demo.js"></script>
</body>
</html>
