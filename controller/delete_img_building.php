<?php 

error_reporting(0);

include('../connection/connection.php');
if(isset($_GET['get_id'])){
	$id = $_GET['get_id'];
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
}else{	//jika tidak terdeteksi tombol simpan di klik

	//redirect atau dikembalikan ke halaman edit
	echo '<script>window.history.back()</script>';

}
?>