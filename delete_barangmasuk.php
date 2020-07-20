<?php
include 'koneksi.php';
$id=$_GET['kd_masuk'];
mysqli_query($kon,"delete from tbl_barangmasuk where kd_masuk='$id'");
header("location:index.php?id=13.php");
?>
