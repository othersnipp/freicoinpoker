<?php
class table{
	public $id=0;
	public $title='';
	private $max_seats=0;
	public $used_seats=0;
	public $max_buy=0;
	public $min_buy=0;
	private $blinds='0/0';
	public $player_timeout=30;
	public $server_id=0;
	public $available=0;

	public $seats=array(0,0,0,0,0,0,0,0,0,0); 		// array of seats has player id 0-9 (treated as 1 to 9 in all loops - index zero dropped)
	
	public $turn=0;				// what seats turn
	public $blind_turn=0;			// whos turn is it
	
	public $game_state=0;			// 0 waiting for players , 1 dealing cards , 2 betting , 3 ending round
	public $game_round=0;			//bet round
	public $game_pots=array();		//game pots / pot amount-eligible players to take the pot
	
	public $tableDeck=array();		// deck of cards

	public $round_flip=array();		// array of 5 cards that lay down on the table
	
	public $dealer_chat=array();
	public $table_chat=array();
	
	/*
	loads table and connects to real_time_storage server to get rest info of table
	input int $id
	output void
	*/
	function __construct($id){
		if ($id>'0'){
			$this->id=$id;
			global $db;
			$tmp=$db->getRows("select * from tables where id='$id'");
			foreach ($tmp[0] as $key=>$val){
				$this->{$key}=$val;				
			}
			
			$this->loadRTS();	// load storage , on this sever (default) or specefic server
			//get seats
				$this->getSeats();
			//get seats
				$this->getState();
			//get pot, turns - turns/blind/round,flip
				$this->getTurns();
				
			
			if (!is_array($this->seats)){$this->seats=array();}
			
			if (!is_array($this->game_pots)){$this->game_pots=array();}
			if (!is_array($this->tableDeck)){$this->tableDeck=array();}
			if (!is_array($this->round_flip)){$this->round_flip=array();}
			
			
		}
	}//end constructor
	
	public function getSeats(){
		if ($t_info=$this->rts->read('table.seats_'.$this->id)){ // load other data
			foreach ($t_info as $key=>$val){
				$this->{$key}=$val;
			}
		}
	}
	public function saveSeats(){
			$table_data->seats=$this->seats;
			$this->rts->write('table.seats_'.$this->id,$table_data);
	}//////////////////////////
	
	public function getState(){
		if ($t_info=$this->rts->read('table.state_'.$this->id)){ // load other data
			foreach ($t_info as $key=>$val){
				$this->{$key}=$val;
			}
		}
	}
	public function saveState(){
			$table_data->game_state=$this->game_state;
			$this->rts->write('table.state_'.$this->id,$table_data);
	}//////////////////////////
	
	public function getTurns(){
		if ($t_info=$this->rts->read('table.turns_'.$this->id)){ // load other data
			foreach ($t_info as $key=>$val){
				$this->{$key}=$val;
			}
		}
	}
	public function saveTurns(){
			$table_data->game_round=$this->game_round;
			$table_data->turn=$this->turn;
			$table_data->blind_turn=$this->blind_turn;
			$table_data->tableDeck=$this->tableDeck;
			$table_data->round_flip=$this->round_flip;
			$table_data->game_pots=$this->game_pots;
			
			$this->rts->write('table.turns_'.$this->id,$table_data);
	}//////////////////////////////////////////////////
	
	public function getDealerChat(){
		if ($t_info=$this->rts->read('table.dchat_'.$this->id)){ // load other data
				$this->dealer_chat=$t_info;
		}
	}//
	
	public function dealerChat($chat){
		$this->getDealerChat();
		$dateNow=date("h:i A");
		array_unshift ($this->dealer_chat,'<label title="'.$dateNow.'">'.$chat.'</label>');
		$tmp_chat=array();
		$tmp_count=0;
		foreach ($this->dealer_chat as $chatter){
			$tmp_count++;
			if ($tmp_count<=5){
				$tmp_chat[]=$chatter;
			}
		}
		$this->dealer_chat=$tmp_chat;
		$this->rts->write('table.dchat_'.$this->id,$this->dealer_chat);
	}//
	
	////////////////////////////////////////////////////
	
	// returns max seat number
	function getMaxSeats(){
		$seats=$this->max_seats;
		if ($seats<5){$seats=5;}
		if ($seats>5){$seats=9;}
		return $seats;
	}//
	
	// returns max buy-in value
	function getMaxBuy(){
		return $this->max_buy;
	}//
	
	// returns min buy-in value
	function getMinBuy(){
		return $this->min_buy;
	}//
	
	// returns table Id
	function getId(){
		return $this->id;
	}//
	
	
	/* get amount needed to call
		input : void
		output : int $amount
	*/
	public function getPlayAmount(){
		//get largest bet in this round
		$toCall=0;
		$players=$this->getPlayers();
		foreach ($players as $player){
			if ($player->bet > $toCall){
				$toCall=$player->bet;
			}
		}
		if ($toCall=='0' && $this->game_round=='0'){
			$toCall=$this->getBigBlind();
		}
		return $toCall;
	}//
	
	
	public function kickPlayers(){
			$players=$this->getPlayers();
		foreach ($players as $player){
			$this->seats[$player->seat_id]=0;
			$this->saveSeats();
			
			
	
			$player->loadTableData();
			$player->loadData();
			$player->balance+=$player->amount;
			$player->save();
			$player->amount=0;
			$player->in_turn=false;
			$player->seat_id=0;
			$player->table_id=0;
			$player->bet=0;
			$player->bet_name='';
			$player->saveTableData(true);					// Save table info (money and seat id)
			$player->saveBetData();					// Save table info (money and seat id)
		}
			
			
			$this->used_seats=0;
			$this->saveTable();
				
		
			
			$this->dealerChat('Table has been shut down');
		
	}
	
	public function getPlayers(){ // returns array of Player
		$tablePlayers=array();
		foreach ($this->seats as $pid){
			if ($pid>0){
				$tablePlayers[$pid]=new Player($pid);
				//echo '-----------'.$tablePlayers[$pid]->display_name.' = '.$tablePlayers[$pid]->last_action_ts."\n";
			}
		}
		return $tablePlayers;
	}//
	
	public function count_players(){ // returns number of users
		$total=0;
		foreach($this->seats as $pid){
			if ($pid>'0'){$total++;}
		}
		return $total;
	}//
	
	public function saveTable(){ // save seats (whos sitting on table)
		global $db;
		if ($this->id>'0'){
			
			$db->query("update tables set	used_seats='".$this->used_seats."' ,
											available='".$this->available."'
										where id='".$this->id."'");
		}
	}// end saveSubscribers
	
	public function nextTurn(){ // whos turn next ?
		// get first and last seats
			$first_seat=0;
			$first_used_seat=0;
			$last_seat=0;
			$last_used_seat=0;
			$players=$this->getPlayers();
			
			//check if all players are all in , force game end
			// get first and last seat
			$all_are_in=true;
			foreach ($this->seats as $seatId=>$playerId){
				if ($playerId>'0'){
					$last_seat=$seatId;
					if ($first_seat==0){$first_seat=$seatId;}
					
					if ($players[$playerId]->in_turn==true){
						$last_used_seat=$seatId;
						if ($first_used_seat==0){$first_used_seat=$seatId;}
						if ($players[$playerId]->amount > '0'){$all_are_in=false;}
					}
				}
			}//
			
			// if all are in , force game end
			if ($all_are_in==true){
				$this->forceGameEnd($players);
				return false;
			}//
			
			echo "Lat used seat :$last_used_seat\n";
		//fresh game or last seats turn , give turn to first seat	
			if ($this->turn=='0' || $this->turn==$last_used_seat){ 
				if ($this->turn=='0'){
					$this->turn=$first_seat;
				}else{
					$this->turn=$first_used_seat;
				}
				$this->saveTurns();
				$player=new Player($this->seats[$this->turn]);
				$player->turn_ts=date("U");
				$player->saveTableData();
				return true;
			}
		
		//get next seat here 
			$currentSeat=false;
			foreach ($this->seats as $seatId=>$playerId){
				if ($currentSeat==true && $playerId>0 && $players[$playerId]->in_turn==true){ // this is the next seat
					$this->turn=$seatId;
					$this->saveTurns();
					$player=new Player($this->seats[$this->turn]);
					$player->turn_ts=date("U");
					$player->saveTableData();
					return true;
				}
				if ($seatId==$this->turn){
					$currentSeat=true;
				}
			}//
		
		echo "Turn error" ; // we have an error in getting next turn !shows only in debug
		echo $this->turn.' '.$first_used_seat.' '.$last_used_seat."\n";//return;
		$this->turn=$first_used_seat;
		$this->saveTurns();
	}//
	
	public function checkGameStart(){ // checks if to start the game or not
		echo "Checking game start , player found : ".$this->count_players()."\n";
		$this->getSeats();
		echo "Checking game start , player found : ".$this->count_players()."\n";
		if ($this->game_state==0){
			if ($this->count_players()>='2'){
				$this->deal();
				return true;
			}
		}else{ // game already started exit
			return false;
		}
		
		if ($this->count_players()==1){
			//echo "Resetting game \n";
			$this->resetGame();
		}
		return false;
	}//end ceck game start
	
	public function checkGameEnd(){ // checks if to start the game or not
		$this->getSeats();
		if ($this->game_state>'0'){
			if ($this->count_seated_players()<='1'){
				$this->endRound();
			}
		}
	}//end check game end
	
	public function getTableChat(){
		if ($t_info=$this->rts->read('table.chat_'.$this->id)){ // load other data
				$this->table_chat=$t_info;
		}
	}//
	
	public function tableChat(& $player,$chat){
		if (trim($chat)!=''){
			$this->getTableChat();
			$chatUnit->user=$player->profile_link;
			$chatUnit->user_seat=$player->seat_id;
			$chatUnit->ts=date("U");
			$chatUnit->text=$chat;
			
			array_unshift($this->table_chat,$chatUnit);
			$tmp_chat=array();
			$tmp_count=0;
			
			foreach ($this->table_chat as $chatter){
				if (($chatter->ts+3600)>date("U")){
					$tmp_count++;
					if ($tmp_count<=45){
						$tmp_chat[]=$chatter;
					}
				}
			}
			$this->table_chat=$tmp_chat;
			//$this->table_chat=array();
			$this->rts->write('table.chat_'.$this->id,$this->table_chat);
		}
	}//
//---------------------------------------------- //
//------------------- Private ------------------ //
//---------------------------------------------- //
	

	private function count_seated_players(){
		$total=0;
		$players=$this->getPlayers();
		foreach($players as $sp){
			if ($sp->seat_id>'0'){$total++;}
		}//
		return $total;
	}//
	
	private function count_round_players(){
		$total=0;
		$players=$this->getPlayers();
		foreach($players as $sp){
			if ($sp->in_turn==true){$total++;}
		}//
		return $total;
	}//
	
	private function getSmallBlind(){ //get the small blind of the table , return Int $blind
		$xer=explode('/',$this->blinds);
		return (int)$xer[0];
	}//
	
	public function getBigBlind(){ //get the big blind of the table , return Int $blind
		$xer=explode('/',$this->blinds);
		return (int)$xer[1];
	}//
	
	
	
	private function deal(){ // deals cards
		echo "Entering deal\n";
		$this->resetGame();
		// get players on table
			$players=$this->getPlayers();
		//loop through players , if some player has amount=0 kick him of the table and exit
			foreach ($players as $player){
				if ($player->amount<=0){
					global $game;
					echo "haha Gotcha ".$player->display_name.' '.$player->amount."\n";
					$game->unseatPlayer($player);
					$this->checkGameStart();
					return false;
				}
			}//
		
		// loop through players , put them in round and deal 2 cards
			foreach ($players as $player){
				$player->in_turn=true;
				$player->card_1=$this->dealer->picCard(); // have to put the deck left with dealer on table and save later
				$player->card_2=$this->dealer->picCard();
				$player->saveTableData();
			}//
		
		// set game state and save it
			$this->game_state='1';
			$this->saveState();
			
		// this is the first round of this game 
			$this->game_round=0; // will be saved with saveTurns
			
		// deal 3 cards set table deck from dealer save table deck
			$this->round_flip[]=$this->dealer->picCard();
			$this->round_flip[]=$this->dealer->picCard();
			$this->round_flip[]=$this->dealer->picCard();
			
			$this->tableDeck=$this->dealer->getDeck(); // get whats left in deck to save it with the table 	[saveTurns]
			
		// get blind turn
			//$this->nextTurn();				//current turn in 0 , next turn=first player , set blind turn to that one
			$this->turn=$this->blind_turn;
			$this->nextTurn();
			$this->blind_turn=$this->turn;
			
		//	play Blinds
			$small_blind=$this->getSmallBlind();
			$this->blindBet($small_blind);
			
			$big_blind=$this->getBigBlind();
			$this->blindBet($big_blind);
		
			$this->saveTurns();
			//$this->checkNextRound();
		
	}// end deal
	
	private function resetGame(){ // reset game
		//clear table
			$this->game_state=0;
				$this->saveState();
				
			$this->game_round=0;
			$this->turn=0;
			//$this->blind_turn=0;
			$this->game_pots=array();				//clear pots
			$this->round_flip=array();				//clear cards on table
			//create new deck 
			
				$this->saveTurns();
			
		// reset players
			$players=$this->getPlayers();
			foreach ($players as $player){
				$player->bet=0;
				$player->bet_name='';
				$player->in_turn=false;
				$player->card_1='';
				$player->card_2='';
				//$player->last_action_ts=0;
				
					$player->saveTableData();
					$player->saveBetData();
					$player->saveData();
			}//
		
	}// end deal
	
	
	private function blindBet($betAmount){ // make a bet
		$player=new Player($this->seats[$this->turn]);
		if ($betAmount > $player->amount){
			$betAmount = $player->amount;
		}
		//echo $betAmount."xxx\n";
		$player->bet=$betAmount;
		$player->amount=$player->amount - $betAmount;
		$player->bet_name='';
		
		$player->saveBetData();
		$this->nextTurn();
		
	}//end blindBet
	
	public function checkNextRound(){ // check if this round has ended or is it time for next round
		$max_bet=0;
		$nexter=true;
		$players=$this->getPlayers();

		// if only one player left end it
			if ($this->count_round_players()<=1){
				$this->savePot($players);
				$this->endRound();
				return;
			}

		// get max bets and check if diffirent bets still exist
		foreach ($players as $player){
			if ($player->in_turn==true && $player->amount>0){
				if (($max_bet != $player->bet && $max_bet!=0) || $player->bet_name==''){
					$nexter=false;
				}
				if ($player->bet > $max_bet){
					$max_bet=$player->bet;
				}
				
			}//
		}//
			//print_r($this);
		// if next round
		if ($nexter==true){
			$this->savePot($players);
			if ($this->game_round == 2){
				$this->endRound();
			}else{
				$this->nextRound();
			}
		}//
		
	}//end check next round
	
	
	private function savePot(& $players,$depth=0){	// create pots , each pot with eligible players
		$min_bet=-1;
		
			//get the minimum bet 	
				foreach ($players as $player){
					if ($player->bet>0){
						if ($min_bet==-1 || $player->bet<$min_bet){
							$min_bet=$player->bet;
						}
					}
				}//
		
				
		$curPot=0;
		$has_more=false;
		$eligible=array();
			//	create pot
				foreach ($players as $player){
					if ($player->bet >= $min_bet){
						$curPot+=$min_bet;
						$player->bet=$player->bet - $min_bet;
						$eligible[]=$player->id;
						$player->saveBetData();
						if ($player->bet>'0'){
							$has_more=true;		// no all bets are emptied into pots , call the function again , later 
						}
					}
				}//
		
		sort($eligible);
		
		$post_is=md5(print_r($eligible,true));			//create md5 index of an array which represents unique eligible players
		
		$this->game_pots[$pot_is]->original+=$curPot;
		$this->game_pots[$pot_is]->amount+=$curPot;
		$this->game_pots[$pot_is]->eligible=$eligible;
		$this->saveTurns();
		if ($depth>=9){ // depth can't be >9 players
			exit;
		}
		if ($has_more==true){
			$depth++;
			$this->savePot($players,$depth);
		}
	}//end create pots
	
	public function savePlayerPot(& $foldPlayer){	// create pots , each pot with eligible players
		$min_bet=-1;
		$players=$this->getPlayers();
		
		//get the minimum bet 	
				foreach ($players as $player){
					if ($player->bet>0){
						if ($min_bet==-1 || $player->bet<$min_bet){
							$min_bet=$player->bet;
						}
					}
				}//
				
		$curPot=$foldPlayer->bet;
		foreach ($players as $player){
			if ($player->bet >= $min_bet && $player->in_turn == true && $player->id != $foldPlayer->id){
				$eligible[]=$player->id;
			}
		}//
		
		sort($eligible);
		
		$post_is=md5(print_r($eligible,true));			//create md5 index of an array which represents unique eligible players
		
		$this->game_pots[$pot_is]->original+=$curPot;
		$this->game_pots[$pot_is]->amount+=$curPot;
		$this->game_pots[$pot_is]->eligible=$eligible;
		$this->saveTurns();
		
	}//end create pots
	
	private function nextRound(){	// set turn back to blind turn , deal another card
		$this->turn=$this->blind_turn;
		//echo "Entering Next Round\n";
		if ($this->game_round<'2'){
			//deal another card
			$this->dealer->setDeck($this->tableDeck);
			$this->round_flip[]=$this->dealer->picCard();
			$this->game_round++;
			$this->saveTurns();
			// reset players bet names
			$players=$this->getPlayers();
			foreach ($players as $player){
				$player->bet_name='';
				$player->saveBetData();
			}//
		}else{
			$this->endRound();
		}
	}//
	
	private function endRound(){ // end the game , get the winners , give them their money and start another game
		$this->game_state=2;
		$this->saveState();
		// Get Players and generate decks
			$players=$this->getPlayers();
			$decks=array();
			foreach ($players as $player){
				if ($player->in_turn==true){
					$pDeck=new Deck();
					$pDeck->setCards($this->round_flip);
					$pDeck->setCard($player->card_1);
					$pDeck->setCard($player->card_2);
					
					$playerDeck->id=$player->id;
					$playerDeck->deck=$pDeck;
					
					$decks[]=$playerDeck;
					unset($pDeck);
					unset($playerDeck);
				}
			}//
			
		// get Winners from dealer
			$winners=$this->dealer->getWinners($decks);
	
			$this->dealer->rewardWinners($winners,$this);
		// send refresh table-------------------------
			global $game;
			$game->refreshTable(false,true);
		sleep(5);
		$this->resetGame();
		$this->checkGameStart();
	}//end endGame
	
	private function forceGameEnd(& $players){
		$this->savePot($players);
		$dealtCards=count($this->round_flip);
		$leftCards=5-$dealtCards;	// 2 or 1 or 0
		for ($i=0 ; $i<$leftCards ; $i++){
			$this->round_flip[]=$this->dealer->picCard();
		}//
		$this->tableDeck=$this->dealer->getDeck();
		$this->saveTurns();
		$this->endRound();
	}//end forceGameEnd
	
	private function loadRTS(){
		// this function is here to be used as following :
		// assuming there's a table in the database called servers , which has information to servers (ip / username/password ...)
		// if the table is set to a server_id , rts (which is memcached by default) will use the specified server in the database
		// otherwise will use the global one which the core uses .
		// here implemented is only core one .
		if ($this->server_id>0){
			global $_RTS_ENGINE;
			$this->rts=new rts($_RTS_ENGINE,$this->server_id);
		}else{
			global $rts;
			$this->rts=& $rts;
		}
	}
 }//
?>