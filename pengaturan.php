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
            <h1 class="m-0 text-dark">Pengaturan Akun</h1>
          </div><!-- /.col -->
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="#">Home</a></li>
              <li class="breadcrumb-item active">Pengaturan Akun</li>
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
                <h3 class="card-title">Pengaturan Akun</h3>
              </div>
              <!-- /.card-header -->
              <!-- form start -->
                <div class="card-body">
<?php
            if (isset($_POST['change_akun'])){
              $nama = $_POST['n_admin'];
              $p_dia = $_POST['p_admin'];
              $p2_dia = $_POST['p2_admin'];
                if (strlen($nama) < 6) {
                  echo'<div class="callout callout-danger">
                    <p>Username minimal memiliki 6 karakter atau lebih.</p>
                  </div>';
                } else if (strlen($p_dia) < 8) {
                  echo'<div class="callout callout-danger">
                    <p>Username minimal memiliki 8 karakter atau lebih.</p>
                  </div>';
                } else if ($p_dia <> $p2_dia) {
                  echo'<div class="callout callout-danger">
                    <p>Password konfirmasi yang anda masukan salah.</p>
                  </div>';
                } else {
                  $date = date('j-M-Y');
                  $daftar = mysqli_query($koneksi, "UPDATE `d_pengguna` SET `nama_pengguna`='$nama',`password`='$p2_dia' WHERE username = '$data[username]'");
                  echo'<div class="callout callout-success">
                    <p>Akun berhasil di daftar, silahkan login untuk mendapatkan layanan kami.</p>
                  </div>';
                }
            }
         ?>
      <form class = "form-signin" role = "form" 
            action = "<?php echo htmlspecialchars($_SERVER['PHP_SELF']); 
            ?>" method = "post" autocompleted="off">
                  <div class="form-group">
                    <label for="exampleInputEmail1">Nama Lengkap</label>
                    <input type="text" class="form-control" id="exampleInputEmail1" name="n_admin" value="<?=$data["nama_pengguna"]?>">
                  </div>
                  <div class="form-group">
                    <label for="exampleInputPassword1">Username</label>
                    <input type="text" class="form-control" value="<?=$data["username"]?>" disabled>
                  </div>
                  <div class="form-group">
                    <label for="exampleInputPassword1">Password Baru <small>*masukan password lama jika ingin mengganti nama saja</small></label>
                    <input type="password" class="form-control" name="p_admin" placeholder="Password">
                  </div>
                  <div class="form-group">
                    <label for="exampleInputPassword1">Konfirmasi Password Baru <small>*masukan password lama jika ingin mengganti nama saja</small></label>
                    <input type="password" class="form-control" name="p2_admin" placeholder="Password">
                  </div>
                </div>
                <!-- /.card-body -->
                <div class="card-footer">
                  <button type="submit" name="change_akun" class="btn btn-primary">Submit</button>
                </div>
              </form>

            </div>
            <!-- /.card -->

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