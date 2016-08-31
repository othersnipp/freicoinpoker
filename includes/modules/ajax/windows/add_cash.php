<?php
	$prices=$db->getRows("select * from prices order by price asc");
	$payment=new Payment();
	
	$smarty->assign('_PAYMENTS_IPN',$_PAYMENTS_IPN);
	$smarty->assign('player',$player);
	$smarty->assign('payments',$payment->payments);
	$smarty->assign('prices',$prices);
	
?>