<?php
session_start();
include 'setting_database.php';
$session = $_SESSION['ses_impal'];
$query = mysqli_query($koneksi, "SELECT * FROM d_pengguna WHERE id = '$session'");
$data = mysqli_fetch_array($query);
if(!isset($_SESSION['ses_impal'])){
  header("Location: login.php");
  die();
} else if (($data['level'] != "Member") AND ($data['level'] != "Admin")) {
  include 'error.php';
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
            <h1 class="m-0 text-dark">Pesan Pengajar</h1>
          </div><!-- /.col -->
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="#">Home</a></li>
              <li class="breadcrumb-item active">Pesan Pengajar</li>
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
            <!-- Custom tabs (Charts with tabs)-->
          <div class="col-md-12">
            <!-- general form elements -->
            <div class="card card-primary">
              <div class="card-header">
                <h3 class="card-title">Pesan Pengajar</h3>
              </div>
              <!-- /.card-header -->
              <!-- form start -->
                <div class="card-body">
<?php
            if (isset($_POST['pesan_sekarang'])){
              date_default_timezone_set('Asia/Jakarta');
              $id_pkul = $_POST['mk_pesan'];
              $tanggal  = date('d F Y - H : i');
              if($data['e_saldo'] >= 15000){
              $dataz = mysqli_query($koneksi, "SELECT * FROM daftar_ngajar WHERE id_pn = '$id_pkul'");
              $inpoh = mysqli_fetch_array($dataz);
              $informasi = mysqli_query($koneksi, "SELECT * FROM riwayat_semua WHERE username = '$data[username]' AND status = 'PENDING' AND matkul == '$inpoh[nama_pk]'");
              $cek_mat = mysqli_num_rows($informasi);
              if($cek_mat<1){
              $daftar = mysqli_query($koneksi, "INSERT INTO `riwayat_semua`(`id_rs`, `tgl_psn`, `matkul`, `username`, `status`, `diterima`, `tgl_diterima`) VALUES ('','$tanggal','$inpoh[nama_pk]','$data[username]','PENDING','','')");
              echo'<div class="callout callout-success">
                    <p>Berhasil memesan, silahkan tunggu konfirmasi layanan.</p>
                  </div>';
              }else{
              echo'<div class="callout callout-danger">
                    <p>Error ada pesanan yang sedang pending di dalam mata kuliah yang sama.</p>
                  </div>';
                }
            } else {
              echo'<div class="callout callout-danger">
                    <p>Saldo anda kurang mohon lakukan deposit/top-up.</p>
                  </div>';
            }
          }
         ?>
      <form class = "form-signin" role = "form" 
            action = "<?php echo htmlspecialchars($_SERVER['PHP_SELF']); 
            ?>" method = "post" autocompleted="off">
                  <div class="form-group">
                    <label for="exampleInputEmail1">Mata Kuliah</label>
                    <select name="mk_pesan" class="form-control" required="required" id="username">
                       <?php
                       $dataz = mysqli_query($koneksi, "SELECT * FROM daftar_ngajar");
                       $ew = mysqli_num_rows($dataz);
                       if($ew<1)
                       print'<option value="">Kamu belum pernah mendaftarkan member</option>';
                       else{
                       while ($ambilin = mysqli_fetch_array($dataz)){
                       ?>
                       <option value="<?php echo $ambilin["id_pn"]; ?>"><?php echo $ambilin["nama_pk"]; ?></option>
                       <?php
                       }
                       }
                       ?>
      </select>
                  </div>
                </div>
                <!-- /.card-body -->
                <div class="card-footer">
                  <button type="submit" name="pesan_sekarang" class="btn btn-primary">PESAN PENGAJAR</button>
                </div>
              </form>

            </div>
            </div>
            <!-- /.card -->
          <div class="col-md-12">
            <!-- general form elements -->
            <div class="card card-primary">
              <div class="card-header">
                <h3 class="card-title">Riwayat Pemesanan Tentor</h3>
              </div>
              <!-- /.card-header -->
              <!-- form start -->
                <div class="card-body">
                  <table class="table table-bordered table-striped">
                  <thead>
                    <tr>
                      <th>Tanggal</th>
                      <th data-hide="all">Mata Kuliah</th>
                      <th>Status Tentor</th>
                    </tr>
                  </thead>
                  <tbody>                 
<?php
  $i=0;
        $session = $_SESSION['ses_impal'];
        $query = mysqli_query($koneksi, "SELECT * FROM d_pengguna WHERE id = '$session'");
        $data = mysqli_fetch_array($query);
  $sql = mysqli_query($koneksi, "select * from riwayat_semua where username = '$data[username]'");
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
                      <td><?php echo $data['tgl_psn']; ?></td>
                      <td><span class="label label-success"><?php echo $data['matkul']; ?></span></td>
                      <td><?=$data['status']?></td>
                    </tr>
<?php } } ?>
                  </tbody>
                </table>
            </div>
            <!-- /.card -->
          </div>
            <!-- /.card -->
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