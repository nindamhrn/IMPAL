<?php
session_start();
include 'setting_database.php';
if(!isset($_SESSION['ses_impal'])){
  header("Location: login.php");
  die();
}
$session = $_SESSION['ses_impal'];
$query = mysqli_query($koneksi, "SELECT * FROM d_pengguna WHERE id = '$session'");
$data = mysqli_fetch_array($query);
include 'lib/bag_atas.php';
?>
  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <div class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1 class="m-0 text-dark">Dashboard</h1>
          </div><!-- /.col -->
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="#">Home</a></li>
              <li class="breadcrumb-item active">Dashboard v1</li>
            </ol>
          </div><!-- /.col -->
        </div><!-- /.row -->
      </div><!-- /.container-fluid -->
    </div>
    <!-- /.content-header -->

    <!-- Main content -->
    <section class="content">
      <div class="container-fluid">
        <!-- Small boxes (Stat box) -->
        <div class="row">
          <div class="col-lg-3 col-6">
            <!-- small box -->
            <div class="small-box bg-info">
              <div class="inner">
                <?php if($data['level'] == "Pengajar"){ ?>
                <h3><?=mysqli_num_rows(mysqli_query($koneksi, "select * from riwayat_semua where username ='$data[username]' AND status != 'PENDING'"))?></h3>
                <p>Total Mengajar</p>
              <?php } else { ?>
                <h3><?=mysqli_num_rows(mysqli_query($koneksi, "select * from riwayat_semua where username ='$data[username]' AND status != 'PENDING'"))?></h3>
                <p>Total Belajar</p>
              <?php } ?>
              </div>
              <div class="icon">
                <i class="ion ion-bag"></i>
              </div>
              <a href="#" class="small-box-footer">More info <i class="fas fa-arrow-circle-right"></i></a>
            </div>
          </div>
          <!-- ./col -->
          <!-- ./col -->
          <div class="col-lg-3 col-6">
            <!-- small box -->
            <div class="small-box bg-warning">
              <div class="inner">
                <?php if($data['level'] == "Pengajar"){ ?>
                <h3><?=mysqli_num_rows(mysqli_query($koneksi, "select * from riwayat_semua where diterima ='$data[username]'"))?></h3>
              <?php } else { ?>
                <h3><?=mysqli_num_rows(mysqli_query($koneksi, "select * from riwayat_semua where username ='$data[username]' AND status = 'PENDING'"))?></h3>
              <?php } ?>
                <p>Pending Pesanan</p>
              </div>
              <div class="icon">
                <i class="ion ion-person-add"></i>
              </div>
              <a href="#" class="small-box-footer">More info <i class="fas fa-arrow-circle-right"></i></a>
            </div>
          </div>
          <!-- ./col -->
          <div class="col-lg-3 col-6">
            <!-- small box -->
            <div class="small-box bg-danger">
              <div class="inner">
                <h3>IDR <?=number_format($data['e_saldo'],0,',','.')?></h3>
                <p>E-Saldo</p>
              </div>
              <div class="icon">
                <i class="ion ion-pie-graph"></i>
              </div>
              <a href="#" class="small-box-footer">More info <i class="fas fa-arrow-circle-right"></i></a>
            </div>
          </div>
          <!-- ./col -->
          <div class="col-lg-3 col-6">
            <!-- small box -->
            <div class="small-box bg-indigo">
              <div class="inner">
                <h3><?=$data['last_login']?></h3>
                <p>Terakhir Akses</p>
              </div>
              <div class="icon">
                <i class="ion ion-pie-graph"></i>
              </div>
              <a href="#" class="small-box-footer">More info <i class="fas fa-arrow-circle-right"></i></a>
            </div>
          </div>
          <!-- ./col -->
        </div>
        <!-- /.row -->
        <!-- Main row -->
        <div class="row">
          <!-- Left col -->
          <section class="col-lg-12 connectedSortable">
            <!-- Custom tabs (Charts with tabs)-->
                      <div class="col-12">
            <div class="card">
              <div class="card-header">
                <h3 class="card-title">Pengumuman Website</h3>
              </div>
              <!-- /.card-header -->
              <div class="card-body table-responsive p-0">
                <table class="table table-hover">
                                            <thead>
                                                <tr>
                                                    <th>Tanggal</th>
                                                    <th>Keterangan</th>
                                                </tr>
                                            </thead><tbody>
                              <?php
                  $i=0;
                  $ret = mysqli_query($koneksi, "select * from informasi ORDER BY id_info DESC LIMIT 3");
                  while($funkuy= mysqli_fetch_assoc($ret)){
                  $i++;
                  ?>

                <tr>
                  <td><span class="label label-success"><?=$funkuy['tanggal']?></span></td>
                  <td><?=$funkuy['informasi']?></td>
                </tr><?php } ?>
                  </tbody>
                </table>
              </div>
              <!-- /.card-body -->
            </div>
            <!-- /.card -->
          </div>
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