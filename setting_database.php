<?php
/*
	@Created : 24 September 2019 1.52 PM
*/

$website = "http://localhost/Impal/";
$title_website = "IMPAL";
$judul_1 = "IMP";
$judul_2 = "AL";

$username_db = "root";
$password_db = "";
$name_db = "db_impal";

$koneksi = mysqli_connect("localhost",$username_db,$password_db,$name_db);
 
if (mysqli_connect_errno()){
	echo "Koneksi database gagal : " . mysqli_connect_error();
	die();
}

?>