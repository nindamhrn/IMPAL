<?php
session_start();
date_default_timezone_set('Asia/Jakarta');
require("setting_database.php");
$session = $_SESSION['ses_impal'];
$waktu = date('d F Y');
$update = mysqli_query($koneksi, "UPDATE d_pengguna SET last_login = '$waktu' WHERE id = '$session'");
session_destroy();
header("Location: ".$website);
?>