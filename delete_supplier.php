<?php
include 'koneksi.php';
$id=$_GET['kd_supplier'];
mysqli_query($kon,"delete from tbl_supplier where kd_supplier='$id'");
header("location:index.php?id=11.php");
?>
