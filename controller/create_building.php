<?php

error_reporting(0);

if(isset($_POST['tambah'])){
    //inlcude atau memasukkan file koneksi ke database
  session_start();
  include('../connection/connection.php');

  $id_user = $_SESSION['id'];
    //jika tombol tambah benar di klik maka lanjut prosesnya
  $title = mysql_real_escape_string($_POST['name']);
  $city = mysql_real_escape_string($_POST['city']);
  $province = mysql_real_escape_string($_POST['province']);
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
  $img = mysql_real_escape_string($_FILES["filename"]["name"]);
  
  $exp = date('Y-m-d H:m:s', strtotime('+3 weeks'));

  if ($_FILES['filename']['type'] == 'image/jpeg' || $_FILES['filename']['type']=="image/jpg" || $_FILES['filename']['type']=="image/gif" || $_FILES['filename']['type']=="image/x-png") {
    
    //melakukan query dengan perintah INSERT INTO untuk memasukkan data ke database
    $input = mysql_query("INSERT INTO buildings VALUES(NULL, $id_user, '$title', '$luas_bangunan', '$luas_tanah', '$tahun_dibangun', '$jml_lantai', '$jml_watt', '$description', '$sertifikat', '$city', '$province', '$address', '$type', '$jml_garasi', '$jml_kmr_mandi', '$jml_kmr_tdr', '$fasilitas', '$price', '$sumber_air', '$img', Now(), Now(), '$exp')")
    or die();
    
    $get_id = mysql_insert_id();

    $structure = './../assets/building_files/'.$get_id;

    if (!file_exists($structure)) {
      mkdir($structure, 0777, true);
    }

    $tmp_name_bg = $_FILES["filename"]["tmp_name"];
    $img_bg = basename($_FILES["filename"]["name"]);
    move_uploaded_file($tmp_name_bg, "../assets/building_files/$get_id/$img_bg");

      #CREATE UPLOAD FOR IMAGE
        foreach ($_FILES["image"]["error"] as $key => $error) {
          if ($_FILES['image']['type'][$key] == 'image/jpeg' || $_FILES['image']['type'][$key]=="image/jpg" || $_FILES['image']['type'][$key]=="image/gif" || $_FILES['image']['type'][$key]=="image/x-png") {
            
              if ($error == UPLOAD_ERR_OK) {
                // To create the nested structure, the $recursive parameter 
                // to mkdir() must be specified.
                $structure = './../assets/building_files/'.$get_id;

                if (!file_exists($structure)) {
                  mkdir($structure, 0777, true);
                }

                $tmp_name_bg = $_FILES["filename"]["tmp_name"];
                $img_bg = basename($_FILES["filename"]["name"]);
                move_uploaded_file($tmp_name_bg, "../assets/building_files/$get_id/$img_bg");

                $tmp_name = $_FILES["image"]["tmp_name"][$key];
                // basename() may prevent filesystem traversal attacks;
                // further validation/sanitation of the filename may be appropriate
                $name = basename($_FILES["image"]["name"][$key]);
                move_uploaded_file($tmp_name, "../assets/building_files/$get_id/$name");


                $path_name = 'assets/building_files/'.$get_id.'/'.$name;
                $input_image = mysql_query("INSERT INTO building_files VALUES(NULL, '$path_name', '$name', '$get_id', Now(), Now())") or die();
              }

            }
        }

      }else {
        echo "Type File Must Image <br>";
      }

  if($input){
    
    echo 'Data berhasil di tambahkan! <br> Iklan anda akan ditampilkan selama 3 minggu setelah itu iklan akan expired';    //Pesan jika proses tambah sukses
    echo '<a href="../index.php">Kembali</a>';  //membuat Link untuk kembali ke halaman tambah
    
  }else{
        echo 'Gagal menambahkan data! ';    //Pesan jika proses tambah gagal
    echo '<a href="../index.php?page=views/buildings/create">Kembali</a>';  //membuat Link untuk kembali ke halaman tambah
  }

}else{  //jika tidak terdeteksi tombol tambah di klik

  //redirect atau dikembalikan ke halaman tambah
  echo '<script>window.history.back()</script>';

}
?>