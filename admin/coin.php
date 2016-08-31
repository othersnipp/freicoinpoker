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

$sel	=	"select * from coin";
$res	=	mysql_query($sel);

while($row=mysql_fetch_array($res)) {
   $your_array[] = $row;
}
//print_r($your_array);
$smarty->assign('result',$your_array);
//$smarty->display('header.tpl');
$smarty->display('coin.tpl');
$smarty->display('footer.tpl');


?>
    
    
