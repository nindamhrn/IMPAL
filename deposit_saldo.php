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
            <h1 class="m-0 text-dark">Deposito Saldo</h1>
          </div><!-- /.col -->
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="#">Home</a></li>
              <li class="breadcrumb-item active">Deposito Saldo</li>
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
            <!-- general form elements -->
            <div class="card card-primary">
              <div class="card-header">
                <h3 class="card-title">Deposito Saldo</h3>
              </div>
              <!-- /.card-header -->
              <!-- form start -->
                <div class="card-body">
<?php
            if (isset($_POST['depoterima'])){
              date_default_timezone_set('Asia/Jakarta');
              $saldo = $_POST['saldo'];
              if(($saldo == "50000") || ($saldo == "100000") || ($saldo == "200000")){
                $kode = "#TENTU-".rand(00000,99999)."-TARIK-".rand(00000,99999);        
                $session = $_SESSION['ses_impal'];
                $query = mysqli_query($koneksi, "SELECT * FROM d_pengguna WHERE id = '$session'");
                $data = mysqli_fetch_array($query);
                $user = $data['username'];
                  $tanggal = date('d F Y - H : i')." WIB";
                  $insert = mysqli_query($koneksi, "INSERT INTO `pemasukan_web`(`id_tx`, `kodeUnikDepo`, `totalDeposit`, `status`, `waktuDepo`, `username`, `jenis`) VALUES ('','$kode','$saldo','PENDING','$tanggal','$user','DEPOSIT')");
                  $_SESSION['ses_deposit'] = $kode;
                  echo"<script>window.location = './struk.php?id={$kode}';</script>";
                } else {
                            echo'<div class="callout callout-danger">
                              <pTerdapat kesalahan dalam melakukan deposito.</p>
                            </div>';
                }
              }
         ?>
      <form class = "form-signin" role = "form" 
            action = "<?php echo htmlspecialchars($_SERVER['PHP_SELF']); 
            ?>" method = "post" autocompleted="off">
                  <div class="form-group">
                    <label for="exampleInputEmail1">Deposito Saldo</label>
                    <select name="saldo" class="form-control" required="required">
                       <option value="50000">RP. 50.000</option>
                       <option value="100000">RP. 100.000</option>
                       <option value="200000">RP. 200.000</option>
                    </select>
                  </div>
                </div>
                <!-- /.card-body -->
                <div class="card-footer">
                  <button type="submit" name="depoterima" class="btn btn-primary">Deposito Saldo</button>
                </div>
              </form>
            <!-- /.card -->

            <!-- /.card -->
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
                      <th data-toggle="true">Kode Deposito</th>
                      <th>Tanggal</th>
                      <th data-hide="all">Total Deposito</th>
                      <th>Status Deposito</th>
                    </tr>
                  </thead>
                  <tbody>                 
<?php
  $i=0;
        $session = $_SESSION['ses_impal'];
        $query = mysqli_query($koneksi, "SELECT * FROM d_pengguna WHERE id = '$session'");
        $data = mysqli_fetch_array($query);
  $sql = mysqli_query($koneksi, "select * from pemasukan_web where jenis = 'DEPOSIT' AND username = '$data[username]'");
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