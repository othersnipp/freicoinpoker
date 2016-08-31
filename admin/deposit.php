<?php
error_reporting(-1);
session_start();

 if( $_SESSION['admin']->id!=1 &&  $_SESSION['admin']->user!="admin")
 {
	 header("location:index.php");
	 
 }



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

	$freicoin 	=	new jsonRPCClient('http://poker:killer@127.0.0.1:9999/');
	$result		= $freicoin->listaccounts();
	foreach($result as $account  => $balance)
	{
		$Checkedaddress	= $freicoin->getaccountaddress($account);
		$playable_chips	=	$balance*100;
		$updateQuery 	= "update deposit set address='$Checkedaddress', amount='$playable_chips' where account_name='$account'";
		$updateSecond 	= "update player set balance='$playable_chips' where email='$account'";
		mysql_query($updateQuery);
		mysql_query($updateSecond); 
	}
$dep_list=mysql_query("select *from deposit");
while($row=mysql_fetch_array($dep_list)) {
   $your_array[] = $row;
}

//print_r($your_array);
$smarty->assign('result',$your_array);
//$smarty->display('header.tpl');
$smarty->display('deposit.tpl');
$smarty->display('footer.tpl');


?>
    
    
