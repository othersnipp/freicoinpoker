<?php
error_reporting(1);
session_start();
//Load Configuration
include 'includes/config.php';
//include 'includes/functions.php';
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
include_once('../includes/classes/jsonRPCClient.php');



mysql_connect($_DB_SERVER,$_DB_USER,$_DB_PASS);
mysql_select_db($_DB_NAME);


if(isset($_REQUEST['submit']))
{	
	extract($_REQUEST);
	if($coinname!="")
	{			
		$ins		=	"insert into coin(`coin`)values('$coinname')";
		$exe		=	mysql_query($ins);
		if($exe)
		{
			
			$smarty->assign('message','Coin added successfully');			
			 header('Location: coin.php');
		}
		else
		{
			 die('Could not connect: ' . mysql_error());
		}		
	}
	else
	{
		
		$smarty->assign('error','Enter your valid information');
		
	}
}


//print_r($your_array);
$smarty->assign('result',$your_array);
//$smarty->display('header.tpl');
$smarty->display('addcoin.tpl');
$smarty->display('footer.tpl');


?>
    
    
