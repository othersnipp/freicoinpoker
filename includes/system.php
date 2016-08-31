<?php
//Load Configuration
	include 'includes/config.php';
	include 'includes/functions.php';
	// Load modules then setup ones used by system
	
	//Load Smarty
		include 'includes/modules/smarty/Smarty.class.php';
		$smarty = new Smarty;
		$smarty->caching = 0;
		//$smarty->registerPlugin("function","SMARTY_DESIRED_FUNCTION","FUNCTION_NAME"); 
	
	//Load Database
		include 'includes/modules/db/interface.php';
		include 'includes/modules/db/database.php';
		$db = new Database($_DB_SERVER,$_DB_NAME,$_DB_USER,$_DB_PASS,false,false,$_DB_ENGINE);
	//Load htmlMimeMail
		include_once('includes/classes/htmlMimeMail.php');		
		include_once('includes/classes/jsonRPCClient.php');		
		
	//Load Player
		include 'includes/modules/player/player.php';
	//load RTS	
		include 'includes/modules/real_time_storage/interface.php';
		include 'includes/modules/real_time_storage/rts.php';
	
	//load server management
		include 'includes/modules/server/server.php';	
			
	//load table	
		include 'includes/modules/table/card.php';
		include 'includes/modules/table/deck.php';
		include 'includes/modules/table/dealer.php';
		include 'includes/modules/table/table.php';
	
	// Load payments
		include 'includes/modules/payment/payment.php';
		
	//Load Ajax
		include 'includes/modules/ajax/ajax.php';
	//Load Game
		include 'includes/modules/game_controller.php';
	

		$rts=new rts($_RTS_ENGINE); // load real time storage (default memcached)
		
		$game = new Game();
		$player=& $game->player;
		if ($_AUTO_LOGIN && !$player->is_logged()){
			$player->login($_USER_TYPE_PARAMS);
		}
		$table=& $game->table;
		
		$id = $player->id;
	
	$sel	=	"select amount from deposit where user_id='$id'";
	$exec = $db->getRows($sel);				
	if(count($exec) > 0) 
	{
		$frc=floor($exec[0]->amount)*100;
	}
	
	$smarty->assign('balance',$frc);
		
		$smarty->assign('_PAYMENT_EMAIL',$_PAYMENT_EMAIL);
		if($_GET['msg_with']==1)
		{
		$smarty->assign('message_with','Your withdraw request is processing please wait...');	
		}
		
		if($_GET['msg_with']==2)
		{
			$smarty->assign('message_with','You already cancelled your withdraw request');
		}
?>
