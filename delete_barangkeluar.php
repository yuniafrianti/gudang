<?php
include 'koneksi.php';
$id=$_GET['kd_brgkeluar'];
mysqli_query($kon,"delete from tbl_barangkeluar where kd_brgkeluar='$id'");
header("location:index.php?id=4.php");
?>
