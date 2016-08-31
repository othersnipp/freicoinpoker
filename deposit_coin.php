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

else
{

//print_r($_SESSION);

	$name=$player_info['player']->display_name;
	$id=$player_info['player']->id;
	$balance=$player_info['player']->balance;
	$email=$player_info['player']->email;
	$name_id=$name.$id;

	$freicoin = new jsonRPCClient('http://poker:killer@localhost:9999/');
	$account=$email;
	$result=$freicoin->getaccountaddress($account);
	
	$sel	=	"select * from deposit where address='$result' and  user_id='$id'";
	$res	=	mysql_query($sel);
	$num	=	mysql_num_rows($res);
	if($num==0)
	{	
	mysql_query("insert into deposit (`account_name`,`user_id`,`address`)values('$account','$id','$result')");	
	}
	else
	{
	$sel	=	"select * from deposit where user_id='$id'";
	$res	=	mysql_query($sel);
	$num_rows=mysql_num_rows($res);
	$row=mysql_fetch_array($res);
	if($num_rows>0)
	{
	$your_array[] = $row;
	}
	
	}
	
}
/*echo "<pre>";
print_r($your_array);*/
$smarty->assign('coin_address',$result);
$smarty->assign('your_array',$your_array);
$smarty->assign('player',$player_info);

$smarty->display('header_inner.tpl');


?>
    
    
