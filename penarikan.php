<?php
session_start();
include 'setting_database.php';
$session = $_SESSION['ses_impal'];
$query = mysqli_query($koneksi, "SELECT * FROM d_pengguna WHERE id = '$session'");
$data = mysqli_fetch_array($query);
if(!isset($_SESSION['ses_impal'])){
  header("Location: login.php");
  die();
}
include 'lib/bag_atas.php';
?>
  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <div class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1 class="m-0 text-dark">Penarikan Saldo</h1>
          </div><!-- /.col -->
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="#">Home</a></li>
              <li class="breadcrumb-item active">Penarikan Saldo</li>
            </ol>
          </div><!-- /.col -->
        </div><!-- /.row -->
      </div><!-- /.container-fluid -->
    </div>
    <!-- /.content-header -->

    <!-- Main content -->
    <section class="content">
      <div class="container-fluid">
        <!-- Main row -->
        <div class="row">
          <!-- Left col -->
          <section class="col-lg-12 connectedSortable">
          <div class="col-md-12">
            <?php
   if (isset($_GET['tarik'])) {
        date_default_timezone_set('Asia/Jakarta');
        $uid = $_GET['tarik'];
        $kode = "#TENTU-".rand(00000,99999)."-TARIK-".rand(00000,99999);        
        $session = $_SESSION['ses_impal'];
        $query = mysqli_query($koneksi, "SELECT * FROM d_pengguna WHERE id = '$session'");
        $data = mysqli_fetch_array($query);
        $saldo = $data['e_saldo'];
        if($saldo >= "20000"){
        $user = $data['username'];
          $tanggal = date('d F Y - H : i')." WIB";
          $insert = mysqli_query($koneksi, "INSERT INTO `pemasukan_web`(`id_tx`, `kodeUnikDepo`, `totalDeposit`, `status`, `waktuDepo`, `username`, `jenis`) VALUES ('','$kode','$saldo','PENDING','$tanggal','$user','PENARIKAN')");
          $insert = mysqli_query($koneksi, "UPDATE d_pengguna SET e_saldo = 0 WHERE username = '$data[username]'");
                    echo'<div class="callout callout-success">
                      <p>Penarikan berhasil mohon tunggu konfirmasi pembayaran.</p>
                    </div>';
        } else {
                    echo'<div class="callout callout-danger">
                      <p>Saldo anda harus melebihi IDR 20.000 untuk melakukan penarikan.</p>
                    </div>';
        }
      }
?>   
            <div class="info-box">
              <span class="info-box-icon bg-warning"><i class="fa fa-money-bill-wave"></i></span>

              <div class="info-box-content">
                <span class="info-box-text">Total Saldo</span>
                <span class="info-box-number">RP <?=number_format($data["e_saldo"],0,',','.')?></span>
        <div class="row">
          <div class="col-9">
          </div>
          <!-- /.col -->
          <div class="col-3">
            <a href="?tarik=true" class="btn btn-primary btn-block btn-flat">Tarik Dana</a>
          </div>
          <!-- /.col -->
        </div>
              </div>
              <!-- /.info-box-content -->
            </div>
            <!-- /.info-box -->
          </div>
          <!-- /.col -->
            </div>
          <div class="col-md-12">
            <!-- general form elements -->
            <div class="card card-primary">
              <div class="card-header">
                <h3 class="card-title">Riwayat Penarikan Saldo</h3>
              </div>
              <!-- /.card-header -->
              <!-- form start -->
                <div class="card-body">
                  <table class="table table-bordered table-striped">
                  <thead>
                    <tr>
                      <th data-toggle="true">Kode Deposit</th>
                      <th>Tanggal</th>
                      <th data-hide="all">Total Deposit</th>
                      <th>Status Penarikan</th>
                    </tr>
                  </thead>
                  <tbody>                 
<?php
  $i=0;
        $session = $_SESSION['ses_impal'];
        $query = mysqli_query($koneksi, "SELECT * FROM d_pengguna WHERE id = '$session'");
        $data = mysqli_fetch_array($query);
  $sql = mysqli_query($koneksi, "select * from pemasukan_web where jenis = 'PENARIKAN' AND username = '$data[username]'");
  $total_hasil = mysqli_num_rows($sql);if($total_hasil<1)
     print '                                        <tr>
                      <td>No Data</td>
                      <td>No Data</td>
                      <td>No Data</td>
                      <td>No Data</td>
                      </tr>'; 
  else {
  while($data = mysqli_fetch_array($sql)){
  $i++; ?>
                    <tr>
                      <td><?php echo $data['kodeUnikDepo']; ?></td>
                      <td><span class="label label-success"><?php echo $data['waktuDepo']; ?></span></td>
                      <td>RP <?=number_format($data['totalDeposit'],0,',','.')?></td>
                      <td><?=$data['status'];?></td>
                    </tr>
<?php } } ?>
                  </tbody>
                </table>
            </div>
            <!-- /.card -->
          </div>
          </section>
          <!-- right col -->
        </div>
        <!-- /.row (main row) -->
      </div><!-- /.container-fluid -->
    </section>
    <!-- /.content -->
  </div>
  <!-- /.content-wrapper -->
<?php
include 'lib/bag_bawah.php';
?>