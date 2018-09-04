<?php
error_reporting(0);
include('../connection/connection.php');

// Function FOR EDIT BUILDING
if(isset($_POST['edit-building'])){

	$id = mysql_real_escape_string($_POST['get_id']);
	$title = mysql_real_escape_string($_POST['name']);
	$address = mysql_real_escape_string($_POST['alamat']);
	$type = mysql_real_escape_string($_POST['jenis']);
	$price = mysql_real_escape_string($_POST['harga']);
	$description = mysql_real_escape_string($_POST['deskripsi']);
	$jml_kmr_tdr = mysql_real_escape_string($_POST['kamar_tidur']);
	$jml_kmr_mandi = mysql_real_escape_string($_POST['kamar_mandi']);
	$jml_garasi = mysql_real_escape_string($_POST['garasi']);
	$jml_lantai = mysql_real_escape_string($_POST['lantai']);
	$luas_tanah = mysql_real_escape_string($_POST['tanah']);
	$luas_bangunan = mysql_real_escape_string($_POST['bangunan']);
	$tahun_dibangun = mysql_real_escape_string($_POST['thn_bangun']);
	$jml_watt = mysql_real_escape_string($_POST['listrik']);
	$sumber_air = mysql_real_escape_string($_POST['sumber_air']);
	$fasilitas = mysql_real_escape_string($_POST['fasilitas']);
	$sertifikat = mysql_real_escape_string($_POST['sertifikat']);

	//melakukan query dengan perintah UPDATE untuk update data ke database dengan kondisi WHERE siswa_id='$id' <- diambil dari inputan hidden id
	$update = mysql_query("UPDATE buildings SET title='$title', address='$address', type='$type', price='$price', description='$description', jml_kmr_tdr='$jml_kmr_tdr', jml_kmr_mandi='$jml_kmr_mandi', jml_garasi='$jml_garasi', jml_lantai='$jml_lantai', luas_tanah='$luas_tanah', luas_bangunan='$luas_bangunan', tahun_dibangun='$tahun_dibangun', jml_watt='$jml_watt', sumber_air='$sumber_air', fasilitas='$fasilitas', sertifikat='$sertifikat' WHERE id='$id'") or die();

	// $cek1 = mysql_query("SELECT id FROM building_files WHERE building_id='$id'") or die(mysql_error());

	// var_dump($_FILES["filename"]["name"]);
	// die();
	// if ($_FILES["filename"]["name"] != null) {
	// 	$structure = './../assets/building_files/'.$id;

 //        if (!file_exists($structure)) {
 //          mkdir($structure, 0777, true);
 //        }

	// 	$tmp_name_bg = $_FILES["filename"]["tmp_name"];
	//     $img_bg = basename($_FILES["filename"]["name"]);
	//     move_uploaded_file($tmp_name_bg, "../assets/building_files/$id/$img_bg");

	//     $path_name = 'assets/building_files/'.$id.'/'.$img_bg;
        
 //        mysql_query("INSERT INTO building_files VALUES(NULL, '$path_name', '$img_bg', '$id')") or die(mysql_error());
	// }

	// var_dump($id);
	// die();

	#CREATE UPLOAD FOR IMAGE
      foreach ($_FILES["image"]["error"] as $key => $error) {
          if ($error == UPLOAD_ERR_OK) {
            // To create the nested structure, the $recursive parameter 
            // to mkdir() must be specified.
            $structure = './../assets/building_files/'.$id;

            if (!file_exists($structure)) {
              mkdir($structure, 0777, true);
            }

            $tmp_name_bg = $_FILES["filename"]["tmp_name"];
            $img_bg = basename($_FILES["filename"]["name"]);
            move_uploaded_file($tmp_name_bg, "../assets/building_files/$id/$img_bg");

            $tmp_name = $_FILES["image"]["tmp_name"][$key];
            // basename() may prevent filesystem traversal attacks;
            // further validation/sanitation of the filename may be appropriate
            $name = basename($_FILES["image"]["name"][$key]);
            move_uploaded_file($tmp_name, "../assets/building_files/$id/$name");


            $path_name = 'assets/building_files/'.$id.'/'.$name;
            mysql_query("INSERT INTO building_files VALUES(NULL, '$path_name', '$name', '$id', Now(), Now())") or die();
          }
      }

	//jika query update sukses
	if($update){
		
		echo 'Data berhasil di simpan! ';
		echo '<a href="../index.php">Kembali</a>';
		
	}else{
		
		echo 'Gagal menyimpan data!';
		echo '<a href="../index.php?page=views/buildings/edit&get_id='.$id.'">Kembali</a>';	//membuat Link untuk kembali ke halaman edit
		
	}


//Function For Delete Building

}else if (isset($_GET['get_id'])){
	
	$id = $_GET['get_id'];
	
	$cek = mysql_query("SELECT id FROM buildings WHERE id='$id'") or die();
	
	if(mysql_num_rows($cek) == 0){
		
		echo '<script>window.history.back()</script>';
	
	}else{
		
		$del = mysql_query("DELETE FROM buildings WHERE id='$id'");
		
		$cek1 = mysql_query("SELECT id FROM building_files WHERE building_id='$id'") or die();
		
		if(mysql_num_rows($cek1) != 0){

			$del1 = mysql_query("DELETE FROM building_files WHERE building_id='$id'");
			
			$dir = './../assets/building_files/'. $id . DIRECTORY_SEPARATOR;	
				$it = new RecursiveDirectoryIterator($dir, RecursiveDirectoryIterator::SKIP_DOTS);
				$files = new RecursiveIteratorIterator($it,
				             RecursiveIteratorIterator::CHILD_FIRST);
				foreach($files as $file) {
				    if ($file->isDir()){
				        rmdir($file->getRealPath());
				    } else {
				        unlink($file->getRealPath());
				    }
				}
				rmdir($dir);
				
		}


		
		//jika query DELETE berhasil
		if($del){
			echo 'Data rumah berhasil di hapus! ';
			echo '<a href="../index.php">Kembali</a>';
			
		}else{
			
			echo 'Gagal menghapus data! ';
			echo '<a href="../index.php?page=views/buildings/edit&get_id='.$id.'">Kembali</a>';
		
		}
		
	}

// Function FOR delete Image BUILDING
}else if(isset($_GET['get_id_img'])){
	$id = $_GET['get_id_img'];
	var_dump($id);
	die();
	$name = $_GET['name'];
	$id_building = $_GET['nm'];
	
	$cek1 = mysql_query("SELECT id FROM building_files WHERE id='$id'") or die();
	
	if(mysql_num_rows($cek1) != 0){

		$del1 = mysql_query("DELETE FROM building_files WHERE id='$id'");

		$target = 'assets/building_files/'.$id_building.'/'.$name;
		
		if (file_exists($target)) {
			unlink($target);
		}

		echo '<script>window.history.back()</script>';
	
	}

}else{

	echo '<script>window.history.back()</script>';

}
?>