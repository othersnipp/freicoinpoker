<?php

	$str = "It is %a on %b %d, %Y, %X - Time zone: %Z";
	
	$account=$player->email;
	$id=$player->id;

	$query  = "SELECT wallet FROM player WHERE email='".$player->email."'";
	$result = $db->getRows($query);
	
	if(count($result) > 0) {
			$addr =  stripslashes($result[0]->wallet); // wallet address
			
			$freicoin = new jsonRPCClient('http://poker:killer@localhost:9999/');
			/*$chips 	= $freicoin->getreceivedbyaddress("$addr",6) * 100; // convert the freicoins into chips
			$frc 	= $freicoin->getreceivedbyaddress("$addr",6);*/
			
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
			$sel	=	"select amount from deposit where user_id='$id'";
			$exec = $db->getRows($sel);				
			if(count($exec) > 0) 
			{
				$frc=$exec[0]->amount;
				$chips=$frc*100;
			}
			
			}
	
	
	
			
			
			$smarty->assign('FRC',floor($frc));
			$smarty->assign('CHIPS',floor($chips)); 
			$smarty->assign('ADDR',$result);
			$smarty->assign('NEWTIME',gmstrftime($str,time()));
			
			
			// from here a rcp call move to system account and insert chips into players balance in database.
		
	}
	else {
		$smarty->assign('ADDR',0);
	}	
	
?>