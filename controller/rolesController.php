<?php

	session_start();
	error_reporting(0);
	$id_user = $_SESSION['id'];
	$role_id = $_SESSION['role_id'];
	include('../connection/connection.php');

if ($role_id == 1) {
	
	// FUNCTION FOR CREATE ROLE

	if(isset($_POST['save'])){

	    //jika tombol tambah benar di klik maka lanjut prosesnya
	  $name = mysql_real_escape_string($_POST['name']);
	  
	  $input = mysql_query("INSERT INTO roles VALUES(NULL, '$name', Now(), Now())")
	  or die();
	  
	  if($input){
	    
	    echo 'Data berhasil di tambahkan! ';    //Pesan jika proses tambah sukses
	    echo '<a href="../index.php?page=views/admin/_index_role&get_id='.$id_user.'">Kembali</a>';  //membuat Link untuk kembali ke halaman tambah
	    
	  }else{
	        echo 'Gagal menambahkan data! ';    //Pesan jika proses tambah gagal
	    echo '<a href="../index.php?page=views/roles/create">Kembali</a>';  //membuat Link untuk kembali ke halaman tambah
	  }


	 // FUNCTION FOR EDIT ROLE
	}else if(isset($_POST['edit-role'])){

		$id 	= mysql_real_escape_string($_POST['get_id']);

		$name	= mysql_real_escape_string($_POST['name']);

		$update = mysql_query("UPDATE roles SET name='$name' WHERE id='$id'") or die();

		if($update){
			echo 'Data berhasil di simpan! ';
			echo '<a href="../index.php?page=views/admin/_index_role&get_id='.$id_user.'">Kembali</a>';  //membuat Link untuk kembali ke halaman tambah
		}else{
			echo 'Gagal menyimpan data! ';		//Pesan jika proses simpan gagal
			echo '<a href="../index.php?page=views/roles/edit&get_id='.$id_user.'">Kembali</a>';	//membuat Link untuk kembali ke halaman edit
			
		}

	// FUNCTION FOR DELETE ROLE

	}else if(isset($_GET['get_id'])){
		$id = $_GET['get_id'];
		
		$cek = mysql_query("SELECT id FROM roles WHERE id='$id'") or die();
		
		if(mysql_num_rows($cek) == 0){
			
			echo '<script>window.history.back()</script>';
		
		}else{
			
			$del = mysql_query("DELETE FROM roles WHERE id='$id'");

			if($del){
				echo 'Data berhasil di hapus! ';		//Pesan jika proses hapus berhasil
				echo '<a href="../index.php?page=views/admin/_index_role&get_id='.$id_user.'">Kembali</a>';  //membuat Link untuk kembali ke halaman tambah
				
			}else{
				
				echo 'Gagal menghapus data! ';		//Pesan jika proses hapus gagal
				echo '<a href="../index.php?page=views/admin/_index_role&get_id='.$id_user.'">Kembali</a>';  //membuat Link untuk kembali ke halaman tambah
			
			}
		}
	}else{ 

	  echo '<script>window.history.back()</script>';

	}

}
?>