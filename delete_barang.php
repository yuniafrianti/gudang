<?php
include 'koneksi.php';
$id=$_GET['kd_barang'];
mysqli_query($kon,"delete from tbl_barang where kd_barang='$id'");
header("location:index.php?id=1.php");
?>
