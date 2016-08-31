<?php
include "includes/config.php"; 
include "includes/functions.php"; 
include "includes/modules/file_manager/download.class.php"; 
$token=clean($_GET["id"]);
$path=$_STORAGE_PATH.$token;

	$fichier = new Bf_Download($path,$token) ;   // rename the file, allow resuming, speed limit 80ko/s 
	$fichier->download_file(); 
?>