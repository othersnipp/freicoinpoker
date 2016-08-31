<?php error_reporting(0);
	$_SYSTEM_PATH='home/fedde/beta.freicoinpoker.com/admin/'; // ends with /
	$_GAME_PATH='home/fedde/beta.freicoinpoker.com/'; // ends with /
	$_MODULES_PATH='includes/modules/';		// end with /
	$_SYSTEM_DOMAIN='beta.freicoinpoker.com'; 			// Only Domain ; no HTTP:// or trailing slash
	$_SYSTEM_DOMAIN_PATH='admin/';	// Ends with /
	$_STORAGE_PATH='home/fedde/beta.freicoinpoker.com/poker_files/';	// Ends with / . contains images and other
	$_SITE_URL='http://'.$_SYSTEM_DOMAIN.'/'.$_SYSTEM_DOMAIN_PATH;
	
	$_DB_SERVER='localhost';
	//$_DB_SERVER='database.sqlite';
	$_DB_NAME='poker';
	$_DB_USER='root';
	$_DB_PASS='';
	$_DB_ENGINE='mysql'; 	// available database engines are in includes/modules/db/engines ... build your own class ;)
	
	$_RTS_ENGINE='memcache';	// real time storage engine (cache like) currenty memcached only , build any others into includes/modules/real_time_storage/engines
	
	//$_RTS_MAIN_SERVER->ip='127.0.0.1';
	//$_RTS_MAIN_SERVER->port='11211';
	$_RTS_MAIN_SERVER->ip='';
	$_RTS_MAIN_SERVER->port='';
	ini_set('display_errors',false);
	//ini_set('error_reporting',E_ALL);
