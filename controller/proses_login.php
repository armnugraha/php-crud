<?php
session_start();
error_reporting(0);
// include '../connection/connection.php';
$hostname  = "localhost";
   $username  = "root";
   $password  = "";
   $dbname  = "home_hunter";
   $db = new mysqli($hostname, $username, $password, $dbname);

//mengambil data dari form login
$username=mysqli_real_escape_string($db, $_POST['user_name']);
$password=mysqli_real_escape_string($db, md5($_POST['password']));

//query untuk mengambil data yang sesuai
$query="SELECT * from users where user_name='$username' and password='$password'";
// $hasil=mysql_query($query);

$hasil = $db->query($query);
$kode = $hasil->fetch_assoc();

// $kode = mysqli_fetch_array($hasil);

$cek=mysqli_num_rows($hasil);

if ($cek==1){
	$_SESSION['id']=$kode['id'];
	$_SESSION['user_name']=$kode['user_name'];
	$_SESSION['name']=$kode['name'];
	$_SESSION['email']=$kode['email'];
	$_SESSION['role_id']=$kode['role_id'];
    
    if ($kode['role_id']==1) {
        header("Location:../index.php");
    }
    elseif ($kode['role_id']==2) {
        header("Location:../index.php");
    }
    
}
else{
 echo("User dan password salah");
}
?> 
<br>
<a href="../views/auth/login.php">Coba Lagi</a>