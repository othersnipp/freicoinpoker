<?php
	ini_set('display_errors',false);
	$_SYSTEM_PATH='/home/fedde/beta.freicoinpoker.com/'; // ends with /
	$_MODULES_PATH='includes/modules/';		// end with /
	$_SYSTEM_DOMAIN='beta.freicoinpoker.com'; 			// Only Domain ; no HTTP:// or trailing slash
	$_SYSTEM_DOMAIN_PATH='';	// Ends with / or empty
	$_STORAGE_PATH='/home/fedde/beta.freicoinpoker.com/poker_files/';
	$_SITE_URL='http://'.$_SYSTEM_DOMAIN.'/'.$_SYSTEM_DOMAIN_PATH;
	$_PAYMENTS_IPN='http://'.$_SYSTEM_DOMAIN.'/'.$_SYSTEM_DOMAIN_PATH.'payments.php';

	$_PAYMENT_EMAIL = 'fredrikbod@gmail.com'; // your paypal email
	
	$_DB_SERVER='localhost';
	//$_DB_SERVER='database.sqlite';
	$_DB_NAME='poker';
	$_DB_USER='root';
	$_DB_PASS='';
	$_DB_ENGINE='mysql'; 	// available database engines are in includes/modules/db/engines ... build your own class ;)
	
	$_RTS_ENGINE='memcache';	// real time storage engine (cache like) currenty memcached only , build any others into includes/modules/real_time_storage/engines
	
	// User Settings
		
		$_AUTO_LOGIN=false;				//call player login automatically 
		$_USER_TYPE='normal';				// user type normal,facebook,phpfox
		$_USER_TYPE_PARAMS=array();		// normal array()
		
		/*
		$_AUTO_LOGIN=true;				//call player login automatically 
		$_USER_TYPE='facebook';				// user type normal,facebook,phpfox
		$_USER_TYPE_PARAMS=array('facebook app_id','facebook SECRET','https url');		// normal array()
											// facebook array(APP_ID,SECRET,redirect_uri)
		*/
											// phpfox array(TOKEN_URL,API_URL)
		//$_AUTO_LOGIN=true;								
		//$_USER_TYPE='phpfox';
	
	mysql_connect($_DB_SERVER,$_DB_USER,$_DB_PASS);
	mysql_select_db($_DB_NAME);
