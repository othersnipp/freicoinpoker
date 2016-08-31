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

$option		=	$_REQUEST['option'];
$id			=	$_REQUEST['wid'];
$user_id	=	$_REQUEST['user_id'];

if($option==	"approved")
{
$sel		=	"select * from deposit where user_id='$user_id'";
$res		=	mysql_query($sel);
$num_rows=mysql_num_rows($res);
$row=mysql_fetch_array($res);
if($num_rows>0)
{
	$account_name	=	$row['account_name'];
	$address		=	$row['address'];
	$amount			=	$row['amount'];
}

$sel		=	"select * from withdraw where user_id='$user_id'";
$res		=	mysql_query($sel);
$num_rows=mysql_num_rows($res);
$row=mysql_fetch_array($res);
if($num_rows>0)
{
	$toaddress		=	$row['address'];
	$withdraw_amt	=	$row['withdraw_amt'];
}

//echo $toaddress."&&".$withdraw_amt."&&".$account_name;

$freicoin	= 	new jsonRPCClient('http://poker:killer@127.0.0.1:9999/');
/*$attribute  =   array($toaddress=>$withdraw_amt,$adminAddress=>"0.001");
$isvalid 	= 	$freicoin->sendmany($account_name,$attribute,1,$comment);*/

echo "<pre>\n";
$testing = array();
try {
     $testing[$toaddress] = $withdraw_amt;
     print_r($freicoin->sendmany($account_name, $testing, 1, "Testing sendmany"));
} catch(Exception $e) {
     var_dump($e);
}
echo "</pre>";

}
exit;
$today		=	date('Y-m-d H:i:s');
$update		=	"update withdraw set status='$option',dateModified='$today' where id='$id'";
$res		=	mysql_query($update);
echo "1";

?>
    
    
