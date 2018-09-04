<?php

error_reporting(0);

include ('../connection/connection.php');

//FUNCTION FOR EDIT USER
if(isset($_POST['edit-user'])){

	$id 		= mysql_real_escape_string($_POST['get_id']);
	$nama		= mysql_real_escape_string($_POST['fullName']);
	$alamat		= mysql_real_escape_string($_POST['address']);
	$kota		= mysql_real_escape_string($_POST['city']);
	$provinsi	= mysql_real_escape_string($_POST['province']);
	$kode_pos	= mysql_real_escape_string($_POST['postcode']);
	$no_telp	= mysql_real_escape_string($_POST['phoneNumber']);
	$username	= mysql_real_escape_string($_POST['username']);
	$email		= mysql_real_escape_string($_POST['email']);

	if (!isset($_POST['role_id'])) {
		$update = mysql_query("UPDATE users SET name='$nama', user_name='$username', email='$email', contact='$no_telp', address='$alamat', city='$kota', province='$provinsi', postcode='$kode_pos' WHERE id='$id'") or die();
	}else{
		$role_id = mysql_real_escape_string($_POST['role_id']);
		$update = mysql_query("UPDATE users SET name='$nama', user_name='$username', email='$email', contact='$no_telp', address='$alamat', city='$kota', role_id='$role_id', province='$provinsi', postcode='$kode_pos' WHERE id='$id'") or die();
	}
	if($update){
		
		echo 'Data berhasil di simpan! ';
		echo '<a href="../index.php?page=views/users/edit&get_id='.$id.'">Kembali</a>';
		
	}else{
		
		echo 'Gagal menyimpan data! ';		//Pesan jika proses simpan gagal
		echo '<a href="../index.php?page=views/users/edit&get_id='.$id.'">Kembali</a>';	//membuat Link untuk kembali ke halaman edit
		
	}

//FUNCTION FOR EDIT PASSWORD USER
} else if(isset($_POST['edit-user-password'])){
	$id 		= mysql_real_escape_string($_POST['get_id']);
	$password 	= mysql_real_escape_string(md5($_POST["password"]));
	$old_password 	= mysql_real_escape_string(md5($_POST["old_password"]));

	$query="SELECT * from users where password='$old_password' and id='$id'";

	$hasil=mysql_query($query);

	$kode = mysql_fetch_array($hasil);

	$cek=mysql_num_rows($hasil);
	if ($cek == 0) {
		echo 'Password Lama Salah, Silahkan masukan password dengan benar <br> ';
		echo '<a href="../index.php?page=views/users/edit&get_id='.$id.'">Kembali</a>';
	}else{
		$update = mysql_query("UPDATE users SET password='$password' WHERE id='$id'") or die();

		if($update){
			
			echo 'Data berhasil di simpan! ';
			echo '<a href="../index.php?page=views/users/edit&get_id='.$id.'">Kembali</a>';
			
		}else{
			
			echo 'Gagal menyimpan data! ';
			echo '<a href="../index.php?page=views/users/edit&get_id='.$id.'">Kembali</a>';
			
		}
	}


//FUNCTION FOR EDIT IMAGE USER

}else if(isset($_POST['edit-user-img'])){
	$id 	= mysql_real_escape_string($_POST['get_id']);
	$img 	= mysql_real_escape_string($_FILES["img_user"]["name"]);

	if ($_FILES['img_user']['type'] == 'image/jpeg' || $_FILES['img_user']['type']=="image/jpg" || $_FILES['img_user']['type']=="image/gif" || $_FILES['img_user']['type']=="image/x-png") {

		$structure = './../assets/user_files/'.$id;

	    if (!file_exists($structure)) {
	      mkdir($structure, 0777, true);
	    }

	    $tmp_name_bg = $_FILES["img_user"]["tmp_name"];
	    $img_bg = basename($_FILES["img_user"]["name"]);
	    move_uploaded_file($tmp_name_bg, "../assets/user_files/$id/$img_bg");

	    $update = mysql_query("UPDATE users SET img='$img' WHERE id='$id'") or die();
	    
	}

    if($update){
		
		echo 'Data berhasil di simpan! ';
		echo '<a href="../index.php?page=views/users/edit&get_id='.$id.'">Kembali</a>';
		
	}else{
		
		echo 'Gagal menyimpan data! ';
		echo '<a href="../index.php?page=views/users/edit&get_id='.$id.'">Kembali</a>';
		
	}

//Function For Delete USER

}else if (isset($_GET['get_id'])){
	session_start();
	$id = $_GET['get_id'];
	$id_user = $_SESSION['id'];
	$cek = mysql_query("SELECT id FROM users WHERE id='$id'") or die();
	
	if(mysql_num_rows($cek) == 0){
		
		echo '<script>window.history.back()</script>';
	
	}else{
		
		$del = mysql_query("DELETE FROM users WHERE id='$id'");

		if($del){
			echo 'Data rumah berhasil di hapus! ';		//Pesan jika proses hapus berhasil
			echo '<a href="../index.php?page=views/admin/_index_user&get_id='.$id_user.'">Kembali</a>';	//membuat Link untuk kembali ke halaman beranda
			
		}else{
			
			echo 'Gagal menghapus data! ';		//Pesan jika proses hapus gagal
			echo '<a href="../index.php?page=views/admin/_index_user&get_id='.$id_user.'">Kembali</a>';	//membuat Link untuk kembali ke halaman beranda
		
		}
	}
}else{
	echo '<script>window.history.back()</script>';
}

?>