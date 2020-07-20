<?php
include 'koneksi.php';
$id=$_GET['kd_kategori'];
mysqli_query($kon,"delete from tbl_kategori where kd_kategori='$id'");
header("location:index.php?id=9.php");
?>
