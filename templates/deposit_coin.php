<?php
error_reporting(1);
session_start();
//Load Configuration
	include 'includes/config.php';
	include 'includes/functions.php';
	// Load modules then setup ones used by system
	
	//Load Smarty
		include 'includes/modules/smarty/Smarty.class.php';
		$smarty = new Smarty;
		
		
		
	//Load Database
		include 'includes/modules/db/interface.php';
		include 'includes/modules/db/database.php';
		$db = new Database($_DB_SERVER,$_DB_NAME,$_DB_USER,$_DB_PASS,false,false,$_DB_ENGINE);
	//Load htmlMimeMail
		include_once('includes/classes/htmlMimeMail.php');		
		include_once('includes/classes/jsonRPCClient.php');
	$player_info=$_SESSION;
if($player_info['player']->display_name=="" && $player_info['player']->id=="")
{
	header("location:index.php");
}

//print_r($_SESSION);

print_r($player_info); 

$smarty->assign('player',$player_info);

$smarty->display('header_inner.tpl');


?>
    
    
