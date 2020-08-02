<?php 
session_start();
include 'koneksi.php';

$username = $_POST['username'];
$password = $_POST['password'];
 
 
$login = mysqli_query($kon,"select * from tbl_login where username='$username' and password='$password'");


$cek = mysqli_num_rows($login);
 

if($cek > 0){
 
	$data = mysqli_fetch_assoc($login);

	if($data['level']=="admin"){
 
		$_SESSION['username'] = $username;
		$_SESSION['level'] ="admin";
		header("location:index.php");
 
	}else if($data['level']=="supervasior"){
		$_SESSION['username'] = $username;
		$_SESSION['level'] = "supervasior";
		header("location:index2.php");
	}else{
		header("location:login.php?pesan=gagal");
	}
}else{
	header("location:login.php?pesan=gagal");
}
?>