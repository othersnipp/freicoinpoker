<?php
//Load Configuration
	include 'includes/config.php';
	include 'includes/functions.php';
// Load modules then setup ones used by system
	
	//Load Smarty
		include 'includes/modules/smarty/Smarty.class.php';
		$smarty = new Smarty;
		$smarty->caching = 0;
		//$smarty->registerPlugin("function","SMARTY_DESIRED_FUNCTION","FUNCTION_NAME"); 
	
	//Load Database
		include 'includes/modules/db/interface.php';
		include 'includes/modules/db/database.php';
		$db = new Database($_DB_SERVER,$_DB_NAME,$_DB_USER,$_DB_PASS,false,false,$_DB_ENGINE);
		
	//Load user
		include 'includes/modules/user/user.php';
	//load RTS	
		include 'includes/modules/real_time_storage/interface.php';
		include 'includes/modules/real_time_storage/rts.php';
	
	//load server management
		include 'includes/modules/server/server.php';	
		
	//Load Ajax
		include 'includes/modules/ajax/ajax.php';
	
		$rts=new rts($_RTS_ENGINE); // load real time storage (default memcached)
		
		$user=new User();	//generate user
		
		
	
////////// GPV
	//action
		if (isset($_POST["action"])){
			$action=cp('action');
		}else{
			if (isset($_GET["action"])){
				$action=cg('action');
			}
		}
	// pg
		if (!isset($_GET["pg"]) || cg('pg')==''){
			$pg='main';
		}else{
			$pg=cg('pg');
		}
		
		if ($user->logged==false){
			$pg='login';
		}else{
			if ($pg=='login'){$pg='main';}
		}
		
		if (!file_exists('system/'.$pg.'.php') || strtolower(substr($pg,0,4))=='http'){
			$pg='not_found';
		}
		
		$_SITE_TITLE='Freicoin Poker Administration';
	
// User
		
		$smarty->assign('user',$user);
?>
