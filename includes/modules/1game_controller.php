<?php
class Game{
	//private $stage=0; 			// 0=init , 1=no player , 2=logged in 
	private $state=0;			// 0=init/no_player , 1=logged in (display tables) , 2=in table(not seated) , 3=in table(seated)
	
	function __construct(){
		//create player
			$this->player=new Player();
			$this->player->getLoggedInUser();
			$this->ajax=new Ajax();
			
			if ($this->player->table_id>0){
				$this->table=new Table($this->player->table_id);
			}
	}//
	
	public function showInterface(){ // select needed templates and javascript files
		global $smarty,$_USER_TYPE;
		
		$js=$this->loadJavaScript();
		$smarty->assign('javascript_files',$js);
		$smarty->assign('player',$this->player);
		
		if(isset($_REQUEST['act'])){
			$act_decoded = base64_decode($_REQUEST['act']);
			$arrAct = explode("|",$act_decoded);
			$smarty->assign('TPL_ACTION',$arrAct[0]);			
			$smarty->assign('USERID',$arrAct[2]);			
			
		}	
		if(isset($_REQUEST['pwd']) && $_REQUEST['pwd']=='succ'){
			$smarty->assign('MSG','Password updated sucessfully.');
		}
		
		$smarty->display('header.tpl');
		if ($this->player->id==0){
			$smarty->display('login.tpl');
		}else{
			$smarty->display('main.tpl');
		}//end if
			
		$smarty->display('footer.tpl');
	}// end showInterface
	
	
	public function refreshTable($is_main=false,$closeConnection=false){ // loads table html / for use with ajax only
		$javascript='';
		$player=& $this->player;
		$this->checkTable();
		if ($player->table_id>0){
			$table=& $this->table;
			$tableSeats=$table->seats;
			$tablePlayers=$table->getPlayers();
			$maxSeats=9;
			//$table->game_state=1;
			//$table->saveState();
			//echo "Game state : ".$table->game_state."\n";
			//print_r($table);
			//print_r($player);
					// loop through seats
					
						$tablepCount=0;
					for ($seatNum=1 ; $seatNum<=$maxSeats ; $seatNum++){
						$spid=$tableSeats[$seatNum];//seat player id
						//if seated user
						if ($spid>0 && isset($tablePlayers[$spid]->id)){
							$tablepCount++;
							// if last_action_ts is too long
							//echo $tablePlayers[$spid]->display_name.'='.(date("U")-$tablePlayers[$spid]->last_action_ts)."-".$tablePlayers[$spid]->in_turn."\n";
							if ((date("U") - $tablePlayers[$spid]->last_action_ts)>60 ){//kick of the table
								$this->unseatPlayer($tablePlayers[$spid]);
								$tablePlayers[$spid]->leaveTable();
							}//
							//show player info on seat
							$seat_pn=$tablePlayers[$spid]->display_name;
							$seat_pa=$tablePlayers[$spid]->amount;
							$seat_pv=$tablePlayers[$spid]->avatar;
							$seat_c1=$tablePlayers[$spid]->card_1->name;
							$seat_c2=$tablePlayers[$spid]->card_2->name;
							$seat_bt=$tablePlayers[$spid]->bet;
							$seat_bn=$tablePlayers[$spid]->bet_name;
							$seat_balance=$tablePlayers[$spid]->balance;
							$seat_it=$tablePlayers[$spid]->in_turn;
							$javascript.="table.seat['$seatNum'].setPlayer('$seat_pn','$seat_pa','$seat_pv','$seat_bt','$seat_bn','$seat_it','$seat_balance');\n";
							$javascript.="table.seat['$seatNum'].showPlayer();\n";
							// hide all player cards if game status=0
								if ($table->game_state=='0'){ 
									$javascript.="table.seat['$seatNum'].hideCards();\n";
									$javascript.="table.seat['$seatNum'].setBar(0);\n";
									$javascript.="table.hideTurn();\n";
								}
							// display player cards if this is the meant player / hide others cards | game status=1
							if ($table->game_state == '2'){
								if ($tablePlayers[$spid]->in_turn){
									$javascript.="table.seat['$seatNum'].showCards('$seat_c1','$seat_c2');\n";
									$javascript.="table.seat['$seatNum'].setBar(0);\n";
								}
							}//end if 2
							if ($table->game_state >= '1'){ //show pots
								//generate pots output
									$potsHTML='';
									
									foreach($table->game_pots as $potId=>$pot){
										if ($pot->amount>'0'){
											$potsHTML.='<div class="single_pot" id="pot_'.$potId.'">$'.$pot->amount.'</div>';
										}
									}
								
								$javascript.="table.showPots(true,'$potsHTML');\n";
							}// end if >1
							
							
							
							if ($table->game_state == '1'){ 
								//display timer
								//print_r($table);
								//echo $player->seat_id." - ".$table->turn;
								if ($table->turn==$seatNum && $table->turn==$seatNum){
									//calculate left time
										$tablePlayers[$spid]->loadTableData();
										$ltimeP=round((($table->player_timeout - (date("U")-$tablePlayers[$spid]->turn_ts))/$table->player_timeout)*100);
										if ($tablePlayers[$spid]->turn_ts>0){
											$ltime=(int)$table->player_timeout - (date("U")-$tablePlayers[$spid]->turn_ts);
										}else{
											$ltime=(int)$table->player_timeout;
										}
									$javascript.="table.seat['$seatNum'].setBar($ltime);\n";
									if ($ltime<='0'){ // fold user
										$this->playFold($tablePlayers[$spid]);
									}//
								}else{
									$javascript.="table.seat['$seatNum'].setBar(0);\n";
								}
								
								// IF THIS PLAYER ---S-h-o-w---C-a-r-d-s---------------------------//////////////////
								if ($tablePlayers[$spid]->id == $player->id && $seat_c1!='' && $seat_c2!=''){
									$javascript.="table.seat['$seatNum'].showCards('$seat_c1','$seat_c2');\n";
									
									// if  this players turn , show turn bar
									if ($table->turn==$seatNum){
										$toCallTurn=$table->getPlayAmount(); // gets amound to be called
										$toRise=$toCallTurn*2;
										if ($toRise=='0'){$toRise=$table->getBigBlind();}
										$toCall=$toCallTurn-$tablePlayers[$spid]->bet; // get how much left to call
										if ($toCall>$tablePlayers[$spid]->amount){	// if to call is more than what the player has 
											$toCall=$tablePlayers[$spid]->amount;
										}
										if ($toCall>'0'){
											$javascript.="table.showTurn(true,'".$toCall."','".$toRise."');\n";
										}else{
											$javascript.="table.showTurn(false,'0','".$toRise."');\n";
										}
										$javascript.="if (document.title=='Its your turn'){
														document.title='FreicoinPoker';
													}else{
														document.title='Its your turn';
													}\n";
									}else{
										$javascript.="table.hideTurn();\n";
										$javascript.="document.title='FreicoinPoker';\n";
									}
								}else{// hide cards
									$javascript.="table.seat['$seatNum'].hideCards();\n";
									
								}
								
								
							}else{
								$javascript.="table.seat['$seatNum'].setBar(0);\n";
							}
							
							if ($tablePlayers[$spid]->won==5){
								$javascript.="makeWin(".$seatNum.");\n";
							}//end if
							
						}else{//empty seat
							//if player is seated , hide everything , otherwise show "SIt"
							if ($player->seat_id>0){
								$javascript.="table.seat['$seatNum'].hideBuyIn();\n";
								$javascript.="table.seat['$seatNum'].unsetPlayer();\n";
								
							}else{
								$javascript.="table.seat['$seatNum'].showBuyIn();\n";
								$javascript.="table.hideTurn();\n";
								$javascript.="table.hideTurn();\n";
							}
						}
					}//
					if ($tablepCount!=$this->table->used_seats){
						$this->table->used_seats=$tablepCount;
						$this->table->saveTable();
					}
					
					if ($table->game_state=='0'){
						$javascript.="table.showPots(false,'');\n";
						$javascript.="document.title='FreicoinPoker';\n";
					}//
					
					if ($table->game_state=='2'){
						$javascript.="table.hideTurn();\n";
						
						
					}//
					
					//read game flop
						for($i=0 ; $i<5 ; $i++){
							if (isset($table->round_flip[$i])){
								$javascript.="table.setFlop('".($i+1)."','".$table->round_flip[$i]->name."');\n";
							}else{
								$javascript.="table.setFlop('".($i+1)."','');\n";
							}
						}//end foreach
					
					if ($player->seat_id>0){$javascript.="table.showStandUp(true);\n";}else{$javascript.="table.showStandUp(false);\n";}
					
					$javascript.="table.setState($table->game_state);\n";
				if ($is_main==true){
					$javascript.="table.reload();\n";
					//$javascript.="exec('game_get_tables','');\n";
				}
				
				
				// Dealer Chat
					$table->getDealerChat();
					$tableDChat='';
					foreach ($table->dealer_chat as $chat){
						$tableDChat.='<li>'.$chat.'<br>';
					}					
					$javascript.="table.setDealerChat('".addslashes($tableDChat)."')\n";
					
				// Table Chat
					$table->getTableChat();
					$tableChat='';
					foreach ($table->table_chat as $chat){
						if (($chat->ts+3600)>date("U")){
							$tableChat='<li>'.$chat->user.' : '.$chat->text.'<br>'.$tableChat;
						}
					}					
					//$javascript.="table.setTableChat('$tableChat')\n";
					$javascript.="table.setTableChat('".addslashes($tableChat)."')\n";
			
				$javascript.="if (getObj('side_bar').style.display!=''){
								getObj('side_bar').style.display='';
								getObj('table_chat').scrollTop=getObj('table_chat').scrollHeight;
								}";
		}else{
			$javascript.="if (getObj('side_bar').style.display!='none')getObj('side_bar').style.display='none';";
			$javascript.="table.hideTurn();\n";
			$this->loadTables();
		}
		
		if ($player->id>0){
			$javascript.="player.updateBalance(".$player->balance.");\n";
			$javascript.="player.updatePoints(".$player->points.");\n";
			$javascript.="player.updateAvatar('".$player->avatar."');\n";
		}
		
		// set the javascript
			$data["data"]=$javascript;
			$data["command"]='exec';
			$this->ajax->add($data);	
			unset($data); // clear data	
			
			$this->ajax->sendData($closeConnection);
	}//end refresh table
	
	public function loadTable(){ // loads table html / for use with ajax only
		global $smarty;
		if ($this->player->table_id>0){
			$this->checkTable();
			$table=& $this->table;
			
			$smarty->assign('player',$this->player);
			$smarty->assign('table',$table);
			$html= $smarty->fetch('table.tpl');
			
			$maxSeats=$table->getMaxSeats();
			
			$javascript="
				table=new Table('".$maxSeats."');
				table.id='".$table->id."';
				table.max_buy='".$table->getMaxBuy()."';
				table.min_buy='".$table->getMinBuy()."';
				
				";

			// se tthe html
				$data["data"]=$html;
				$data["command"]='set_object_html';
				$data["object"]='content';
				$this->ajax->add($data);
				unset($data); // clear data	
			// set the javascript
				$data["data"]=$javascript;
				$data["command"]='exec';
				$this->ajax->add($data);	
				unset($data); // clear data	
			unset ($javascript);
			
			$this->refreshTable(true);
		}
	}// end load table
	
	public function loadTables(){ // loads list of tables
		global $smarty,$data,$db;
		
		//check for registered email
		$tables=$db->getRows("select * from tables where available=1 order by used_seats desc,min_buy desc,max_buy desc");
		$smarty->assign('tables',$tables);
		$smarty->assign('player',$this->player);
		$content=$smarty->fetch('tables.tpl');

		$data["data"]=$content;
		$data["command"]='set_object_html';
		$data["object"]='content';
		$this->ajax->add($data);
		unset($data); // clear data	
		// set the javascript
			if ($this->player->id>0){
				$this->player->loadData();
				$javascript.="player.updateBalance('".$this->player->balance."')\n";
				$javascript.="player.updatePoints('".$this->player->points."')\n";
				$data["data"]=$javascript;
				$data["command"]='exec';
				$this->ajax->add($data);	
				unset($data); // clear data	
				unset ($javascript);
			}
	}// end load tables
	
	
	
	public function seatPlayer(& $player,$seat_id,$amount=0){ // put player on seat
		//$seat_id++;
		//$player->loadData();
		//echo "loaded $player->last_action_ts\n\n\n";
		$this->player=$player;
		if ($this->checkTable()){
			//fix amount and check if player has enough balance !
				if ($amount > $this->table->max_buy){
					$amount=$this->table->max_buy;
				}
				if ($player->balance > $this->table->min_buy){
					if ($amount > $player->balance){
						$amount = $player->balance;
					}
				}else{
					return 'You do not have enough cash !';
				}
		
			$this->table->getSeats();//load fresh seats
			if ($this->table->getMaxSeats()>0){
				if ($this->table->seats[$seat_id]==0){//no one is sitting here
					if (isset($player->id) && $player->seat_id==0){
						$this->table->seats[$seat_id]=$player->id;	// fill seat with player id

						$this->table->used_seats=$this->table->count_players();
						$this->table->saveTable();

						$player->loadTableData();
						$player->loadData();

						$player->seat_id=$seat_id;					// tell player what seat he is on
						$player->balance=$player->balance-$amount;	// take money from his main balance
						$player->amount=$amount;					// put money on his seat
						$player->bet=0;								// reset bet
						$player->bet_name=0;						// 
						$player->card_1='';						// 
						$player->card_2='';						// 
						$player->last_action_ts=date("U");
						$player->in_turn=false;						// 

						$this->table->saveSeats(); 					// save seats
						$player->saveTableData();					// Save table info (money and seat id)
						$player->saveBetData();						// Save table info (money and seat id)
						$player->save();							// Save balance
						
						$this->table->dealerChat($player->profile_link.' has joined the table .');
						
						$this->table->checkGameStart();
						return '';
					}
				}else{//this seat is already taken
					return 'Sorry , This seat is already taken !';
				}
			}else{
				return 'Sorry , No more players are allowed here !';
			}
		}else{
			return 'You have not joined any table !'; // << should not enter here at all !!!
		}
	}//
	
	public function unseatPlayer(& $usPlayer){ // remove player from seat
		if ($this->checkTable()){
			$this->table->seats[$usPlayer->seat_id]=0;
			$this->table->saveSeats();
			
			$usPlayer->loadData();
			if ($usPlayer->in_turn==true){
				$this->table->game_pots["left_overs"]->amount+=$usPlayer->bet;
				$this->table->saveTurns();
				$this->playFold($usPlayer);
			}
			$usPlayer->balance+=$usPlayer->amount;
			$usPlayer->save();
			
			
			
			$this->table->used_seats=$this->table->count_players();
			$this->table->saveTable();
				
			$usPlayer->amount=0;
			$usPlayer->in_turn=false;
			$usPlayer->seat_id=0;
			$usPlayer->bet=0;
			$usPlayer->bet_name='';
			$usPlayer->saveTableData();					// Save table info (money and seat id)
			$usPlayer->saveBetData();					// Save table info (money and seat id)
			
			$this->table->dealerChat($usPlayer->profile_link.' has left the table .');
			
			$this->table->checkGameEnd();
		}else{
			return false;
		}
	}//end unseat
	
	public function getPlayAmount(){
		$this->checkTable();
		//echo "getPlay Amount\n";
		$players=$this->table->getPlayers();
		$largest_bet=0;
		foreach ($players as $player){
			if ($player->bet > $largest_bet){
				$largest_bet=$player->bet;
			}
		}//
		return $largest_bet;
	}// end get play amount
	
	/* player folds hand
		input : int & $seat_id
		output : void
	*/
	public function playFold(& $foldPlayer,$timer=0){
		$this->checkTable();
		$table=& $this->table;
		$foldPlayer->loadTableData();
		if ($table->id == $foldPlayer->table_id){
			
			//remove player from eligible to take pots
				$table->getTurns();
				foreach ($table->game_pots as $potId=>$pot){
					if (is_array($pot->eligible)){
						$uIndex=array_search($foldPlayer->id,$pot->eligible);
						if ($uIndex!==false){
							unset($table->game_pots[$potId]->eligible[$uIndex]);
							$newPotId=md5(print_r($table->game_pots[$potId]->eligible,true));	
							$table->game_pots[$newPotId]=$table->game_pots[$potId];
							unset ($table->game_pots[$potId]);
						}
					}
				}//
			
			if ($foldPlayer->in_turn==true){
				$foldPlayer->in_turn=false;
				$this->table->dealerChat($foldPlayer->profile_link.' Folded . by '.$this->player->display_name.' '.$timer);
				$foldPlayer->saveTableData();
			}
			
			$table->saveTurns();
			
			if ($table->turn == $foldPlayer->seat_id){
				$table->nextTurn();
				//$table->checkNextRound();
			}
			$table->checkNextRound();
		}//
		
		
	}// end play fold
	
	/* player Calls
		input : & Player
		output : void
	*/
	public function playCall(& $player){
		$this->checkTable();
		$table=& $this->table;
		if ($table->id == $player->table_id && $player->seat_id == $table->turn){
			
			$toBet=$table->getPlayAmount();
			$toCall=$toBet - $player->bet;
			if ($toCall > $player->amount){
				$toCall=$player->amount;
			}
			//echo "Bet was $player->bet\n";
			$player->bet = $player->bet + $toCall;
			//echo "Bet now $player->bet\n";
			$player->amount = $player->amount - $toCall;
			$player->bet_name = 'Call';
			$player->saveBetData();
			
			if ($player->bet>'0'){
				$this->table->dealerChat($player->profile_link.' called <label class="cash_call">'.$player->bet.'</label> .');
			}else{
				$this->table->dealerChat($player->profile_link.' checked .');
			}
			
			$table->nextTurn();
			$table->checkNextRound();
		
		}//
	}// end play Call
	
	/* player Calls
		input : & Player , $amount
		output : void
	*/
	public function playRise(& $player,$amount){
		$this->checkTable();
		$table=& $this->table;
		if ($table->id == $player->table_id && $player->seat_id == $table->turn){
			
			$toBet=$table->getPlayAmount();
			
			if ($amount < $toBet){ // someone is cheating here .. let him try to
				$amount=$toBet;
			}//hehe
			
			$toBet=$amount-$player->bet;
			
			if ($toBet > $player->amount){// the bet amount is bigger than the player have !
				$toBet=$player->amount;
			}
			
			$player->bet=$player->bet + $toBet;
			$player->amount=$player->amount - $toBet;
			
			$player->bet_name = 'Rise';
			$player->saveBetData();
			
			$this->table->dealerChat($player->profile_link.' rised <label class="cash_rise">'.$player->bet.'</label> .');
			
			$table->nextTurn();
			$nextPlayer=new Player($table->seats[$table->turn]);
			$nextPlayer->bet_name='';
			$nextPlayer->saveBetData();
			$table->checkNextRound();
		
		}//
	}// end play Call
	
// ------------- \\
// -- Private -- \\
// ------------- \\
	private function checkTable(){	// check if there's a table to load , loads it or returns false
		if (!isset($this->table->id) && $this->player->table_id>0){
			$this->table=new Table($this->player->table_id);
			return true;
		}
		if (isset($this->table->id)){
			$this->table->getSeats();
			return true;
		}
		return false;
	}//
	
	private function loadJavaScript(){
		$js=array();
		$js[]='json2.js';
		$js[]='player/player.js';
		$js[]='game/game.js';		// tables functions / refresh tables,search,join
		
		if (isset($this->player->id) && $this->player->id>'0'){ // player online
			$js[]='table/table.js';		// table functions / refresh tables,search,join
			$js[]='table/seat.js';		// table functions / refresh tables,search,join
		}/////////////////////////////////
		
		
		
		return $js;
	}
}//end class game
?>
