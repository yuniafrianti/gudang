<?php
include 'koneksi.php';
$id=$_GET['kd_pegawai'];
mysqli_query($kon,"delete from tbl_pegawai where kd_pegawai='$id'");
header("location:index.php?id=2.php");
?>
