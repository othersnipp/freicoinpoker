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
	//print_r($player_info); 
if($player_info['player']->display_name=="" && $player_info['player']->id=="")
{
	header("location:index.php");
}

$user_id	=	$player_info['player']->id;
$name		=	$player_info['player']->display_name;
$toemail	=	$player_info['player']->email;
$lastId		=	base64_decode($_REQUEST['Lastid']);

	
$today		=	date('Y-m-d H:i:s');
$ins		=	"delete from withdraw where id='$lastId'";
$exe		=	mysql_query($ins);
if($exe)
{							
	$smarty->assign('message','Your withdraw request was cancelled');
}
else
{
	 die('Could not connect: ' . mysql_error());
}
				



/*echo "<pre>";
print_r($your_array);*/
$smarty->assign('coin_address',$result);
$smarty->assign('your_array',$your_array);
$smarty->assign('player',$player_info);

$smarty->display('withdraw.tpl');


?>
    
    
