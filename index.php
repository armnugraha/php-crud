<?php
	include("header.php");

	if(isset($_GET['page'])){
		$page=$_GET['page'].".php";
	} else {
		$page='views/homes/index.php';
	}

	if(isset($_GET['get_id'])){
		$page=$_GET['page'].".php";
	}

	include($page);

	include ("footer.php");
?>