<?php session_start();
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
include_once('includes/classes/jsonRPCClient.php');

mysql_connect($_DB_SERVER,$_DB_USER,$_DB_PASS);
mysql_select_db($_DB_NAME);

$lastId		=	base64_decode($_REQUEST['Lastid']);

$sel		=	"select * from withdraw where id='$lastId'";
$res		=	mysql_query($sel);
$num_rows=mysql_num_rows($res);
$row=mysql_fetch_array($res);
if($num_rows>0)
{
	$toaddress			=	$row['address'];
	$withdraw_amt		=	$row['withdraw_amt'];
	$receive_amt		=	($row['receive_amt'])/100;
	$user_id			=	$row['user_id'];
	$sel				=	"select * from deposit where user_id='$user_id'";
	$res				=	mysql_query($sel);
	$num_rows			=	mysql_num_rows($res);
	$row				=	mysql_fetch_array($res);
	if($num_rows>0)
	{
		$account_name	=	$row['account_name'];
		$address		=	$row['address'];
		$amount			=	$row['amount'];
		$freicoin = new jsonRPCClient('http://poker:killer@localhost:9999/');
		
		$adminaddr	=	"1MbVt464jk7VGkH28GJwQV4ZZu6HG1GBEk";
		$testing	=	array();
		try {			
			$to = array($toaddress=>$receive_amt);
			$TXid = $freicoin->sendmany($account_name, $to);			
		} catch(Exception $e) {
			 //var_dump($e);
		}
		$today		=	date('Y-m-d H:i:s');
		$update		=	"update withdraw set status='approved',dateModified='$today' where id='$lastId'";
		$res		=	mysql_query($update);
		//$smarty->assign('message','Your withdraw request is processing please wait...');
		header("location:index.php?msg_with=1");
	}	
}
else
{
//$smarty->assign('message','You already cancelled your withdraw request');
		header("location:index.php?msg_with=2");
}






?>
    
    
