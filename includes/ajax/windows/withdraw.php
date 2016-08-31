<?php

	$str = "It is %a on %b %d, %Y, %X - Time zone: %Z";
	
	$account=$player->email;
	$id=$player->id;

	$query  = "SELECT wallet FROM player WHERE email='".$player->email."'";
	$result = $db->getRows($query);
	
	if(count($result) > 0) {
		
			
			$sel	=	"select balance from player where id='$id'";
			$exec = $db->getRows($sel);				
			if(count($exec) > 0) 
			{
				$chips=$exec[0]->balance;
				$frc=$exec[0]->balance/100;
				
				
			}
			
			}
				
			$smarty->assign('FRC',$frc);
			$smarty->assign('CHIPS',$chips); 
			$smarty->assign('ADDR',$result);
			$smarty->assign('NEWTIME',gmstrftime($str,time()));
			
			
			// from here a rcp call move to system account and insert chips into players balance in database.
		
	
	
	
?>