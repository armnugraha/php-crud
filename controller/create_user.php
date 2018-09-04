<?php

error_reporting(0);

session_start();
if(isset($_POST['register-user'])){
	include ('../connection/connection.php');
	$nama		= mysql_real_escape_string($_POST['fullName']);
	$alamat		= mysql_real_escape_string($_POST['address']);
	$kota		= mysql_real_escape_string($_POST['city']);
	$provinsi	= mysql_real_escape_string($_POST['province']);
	$kode_pos	= mysql_real_escape_string($_POST['postcode']);
	$no_telp	= mysql_real_escape_string($_POST['phoneNumber']);
	$username	= mysql_real_escape_string($_POST['username']);
	$email		= mysql_real_escape_string($_POST['email']);
	$password 	= mysql_real_escape_string(md5($_POST["password"]));
	$role_id 	= 2;

	$query="SELECT * from users where user_name='$username' or email='$email'";

	$hasil=mysql_query($query);

	$kode = mysql_fetch_array($hasil);

	$cek=mysql_num_rows($hasil);
	if ($cek != 0) {
		echo 'Email / Username Sudah digunakan <br> ';
		echo '<a href="../views/auth/login.php">Kembali untuk registrasi ulang</a>';
	}else{
		$input = mysql_query("INSERT INTO users VALUES(NULL, '$nama', '$username', '$email', '$password', '$no_telp', '$alamat', '$kota', '$provinsi', '$kode_pos', NULL, '$role_id', now(), now())")
		or die();
		
		$id = mysql_insert_id();
		$query="SELECT * from users where id='$id'";
		
		$hasil=mysql_query($query);

		$kode = mysql_fetch_array($hasil);

		if($input){

			$_SESSION['id']=$kode['id'];
			$_SESSION['user_name']=$kode['user_name'];
			$_SESSION['name']=$kode['name'];
			$_SESSION['email']=$kode['email'];
			$_SESSION['role_id']=$kode['role_id'];
			header("Location:../index.php");
		}else{
			echo 'Gagal menambahkan data! ';
			echo '<a href="../views/auth/login.php">Kembali</a>';
		}
	}

}else{
	echo '<script>window.history.back()</script>';
}
?>