<?php
include 'koneksi.php';
$id=$_GET['kd_masuk'];
mysqli_query($kon,"delete from log where kd_masuk='$id'");
header("location:index.php?id=3.php");
?>
