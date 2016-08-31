<?php
include_once('../includes/classes/jsonRPCClient.php');
$freicoin	= 	new jsonRPCClient('http://poker:killer@127.0.0.1:9999/');

$isvalid =  $freicoin->gettransaction("eb4a4eccfccfd96dcf45489781d6a9c3b1195b5408d97684d0dac804b3d7459b");

$amount_array = $freicoin->listreceivedbyaddress(1,false);
/*
$to=Array(
   "17EjripV9Z5nEH8qBEhvoL6cWVBm3cneUf" => 10,
   "1GSubVehhXW8AKAkVBmk7QDARotp3rZVgL" => 0.001
);

 $isvalid = $freicoin->sendfrom('krishna@osiztechnologies.com','17EjripV9Z5nEH8qBEhvoL6cWVBm3cneUf',0.001,1,'Testing sendmany'); */
 echo "<pre>\n";
 print_r($isvalid);
 echo "</pre>";
 
//$help 		= $freicoin->help();


/*eb4a4eccfccfd96dcf45489781d6a9c3b1195b5408d97684d0dac804b3d7459b -txnID
echo "<pre>\n";
$testing = array();
try {
     $testing["17EjripV9Z5nEH8qBEhvoL6cWVBm3cneUf"] = "50";
     print_r($freicoin->sendmany("krishna@osiztechnologies.com", $testing, 1, "Testing sendmany"));
} catch(Exception $e) {
     var_dump($e);
}
echo "</pre>";*/
?>