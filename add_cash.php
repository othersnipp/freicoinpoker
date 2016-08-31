<?php
	include 'includes/system.php';
	if (isset($_GET["amount"])){
		$amount=clean($_GET["amount"]);
		$db->query("update player set balance=balance+$amount");
	}
?>