<?php
class Dealer{
	private $deck=array();
	
	public function setDeck($cards=''){ 	//set deck , input : array of Card | output : void
		if (is_array($cards)){
			$this->deck=$cards;
		}
	}//
	
	public function reset(){	// resets the deck ; input void , output array $deck
		$this->deck='';
		for ($suitId=0 ; $suitId<=3 ;$suitId++){
			switch($suitId){
				case 0:$suit='c';break;
				case 1:$suit='d';break;
				case 2:$suit='h';break;
				case 3:$suit='s';break;
			}
			for ($numId=2 ; $numId<=14 ; $numId++){
				$cardNum=$numId;
				switch($cardNum){
					case 10:$cardNum='t';break;
					case 11:$cardNum='j';break;
					case 12:$cardNum='q';break;
					case 13:$cardNum='k';break;
					case 14:$cardNum='a';break;
				}
				
				$newCard=new Card($cardNum.$suit);
				$this->deck[]=$newCard;
			}//end for nmber
		}//end for suit
		return $this->deck;
	}//end reset
	
	public function picCard(){		// gets a random card from deck , input void , output : Card $card;
		$max=count($this->deck)-1;
		$cardId=rand(0,$max);
		$curId=0;
		foreach($this->deck as $key=>$card){
			if ($curId==$cardId){
				unset($this->deck[$key]);
				return $card;
			}
			$curId++;
		}//end foreach
	}//end picCard	
	
	public function getDeck(){	// return the array of available cards , input void , output array $deck
		return $this->deck;
	}//
	
	public function getWinners(& $decks){
		$winners=array();
		
		foreach ($decks as $playerDeck){
			//echo $pId."\n";
			$pId=$playerDeck->id;
			$pDeck=$playerDeck->deck;
			$handPoints=$this->evaluateHand($pDeck);
			//echo "\n";
			if (!isset($winners[$handPoints])){
				$winners[$handPoints]=array();
			}
			$winners[$handPoints][]=$pId;
		}//
		krsort($winners);
		return $winners;
	}// end get winners
	
	public function evaluateHand(& $hand){
		$hand->sortDeck();
		
		$jumps=$this->getJumps($hand);
		$cards=$hand->getCards();
		//check for straight flush 9000 points //points : #-##-## hand_strength-high_card-high_kicker
			$bestKicer=$this->check_straightFlush($jumps->straights);
				if ($bestKicer!==false)
				{return 90000+$bestKicer->value;}
		//check for 4 of a kind 8000 points
			$bestKicer=$this->check_4ofKind($jumps->doubles,$cards);
				if ($bestKicer!==false)
				{return 80000+$bestKicer->value;}
		//check for full house 7000 points
			$bestKicer=$this->check_fullHouse($jumps->doubles);
				if ($bestKicer!==false)
				{return 70000+$bestKicer->value;}
		//check for flush 6000 points
			$bestKicer=$this->check_flush($cards);
				if ($bestKicer!==false)
				{return 60000+$bestKicer->value;}
		//check for straight 5000 points
			$bestKicer=$this->check_straight($jumps->straights);
				if ($bestKicer!==false)
				{return 50000+$bestKicer->value;}
		//check for 3 of a kind 4000 points
			$bestKicer=$this->check_3ofKind($jumps->doubles,$cards);
				if ($bestKicer!==false)
				{return 40000+$bestKicer->value;}
		//check for 2 pairs 3000 points
			$bestKicer=$this->check_2pair($jumps->doubles,$cards);
				if ($bestKicer!==false)
				{return 30000+$bestKicer->value;}
		//check for pair 2000 points
			$bestKicer=$this->check_pair($jumps->doubles,$cards);
				if ($bestKicer!==false)
				{return 20000+$bestKicer->value;}
		//check for high card 1000 points
			$x=$this->countSuites($cards);
				return (10000 + $x["kicker"]->value);
		
	}//end evaluate hand
	
	
	/* give pots to eligible winners
		input : & mixed $wins , & mixed $table
		output : void
	*/
	public function rewardWinners(& $wins,& $table){
		$pots=& $table->game_pots;
		$leftOvers=$pots["left_overs"]->amount;
		$x.=print_r($wins,true);
		$x.="\n\n";
		foreach ($wins as $points=>$winners){// loop through winners by highest points , search for elegible pot then add that pot to the users'amount'
			$pot_on=count($winners); // how many winners for single pot ?
			$x.= "got $pot_on winners with score of $points\n";
			if ($pon_on=='1'){
				$table->dealerChat($pot_on.' winner .');
			}elseif($pon_on>'1'){
				$table->dealerChat($pot_on.' winners .');
			}
			$winName=$this->getWinName($points);
			//generate win text
			$winText=' With <label class="hand_name">'.$winName->handName.'</label>' ;
			if ($winName->handName=='High Card'){
				$winText.=' '.$winName->normalKicker ;
			}else{
				if (isset($winName->doubleKicker)){
					$winText.=' of '.$winName->doubleKicker ;
				}
				if ((isset($winName->normalKicker) && !isset($winName->doubleKicker)) || isset($winName->normalKicker) && isset($winName->doubleKicker) && $winName->doubleKicker!=$winName->normalKicker){
					$winText.=' and '.$winName->normalKicker.' kicker' ;
				}
			}
			
			foreach ($winners as $winnerId){
				$x.= " - checking winner $winnerId :\n";
				//search for pots who has this player id
				$winPlayer=new Player($winnerId);
					$x.= " - Winner is $winPlayer->display_name $winPlayer->seat_id has $ $winPlayer->amount :\n";
					foreach ($pots as $id=>$pot){
						if ($pot->amount>0 && $id!=='left_overs'){
							$pot->amount+=$leftOvers;
							$leftOvers=0;
							if (!isset($pot->original_amount)){$pot->original_amount=$pot->amount;}
							$winAmount=round($pot->original_amount/$pot_on);
							if (in_array($winnerId,$pot->eligible)!==false){
								$pots[$id]->amount-=$winAmount;
								$winPlayer->amount+=$winAmount;
								$table->dealerChat($winPlayer->profile_link.' has won the pot <label class="cash_win">($'.$winAmount.')</label> '.$winText.' .');
								if ($winAmount>0){$winPlayer->won=5;}else{$winPlayer->won=0;}
								if (substr($winPlayer->bet_name,0,6)=='<label'){
									$oldAmount=substr($winPlayer->bet_name,26,strpos($winPlayer->bet_name,'</label>')-26);
									$oldAmount+=$winAmount;
									$winPlayer->bet_name='<label class="winLabel">+$'.$oldAmount.'</label>';
								}else{
									$winPlayer->bet_name='<label class="winLabel">+$'.$winAmount.'</label>';
								}
								$winPlayer->saveBetData();
							}
						}//
					}//
				
					
			}//
			
		}//
		file_put_contents('wins.txt',$x);
	
	}//end reward winners
// --------------------------------------------------------------- //
// ----------------------------- PRIVATE ------------------------- //
// --------------------------------------------------------------- //

	private function getJumps(& $deck){
		$cards=$deck->getCards();
		
		$straight=array();	//array for straight , ace is copied as 1
		$doubles=array();	//array for dublicates
		$lastCardVal=0;
		// generate counters
			foreach ($cards as $card){
			//echo $card->value.',';
				if ($lastCardVal==0){
					$lastCardVal=$card->value;
					$jump->card=$card;
					$jump->val=1;
					$straight[]=$jump;
					$doubles[]=$jump;
				}else{
					$lastCardVal=$card->value - $lastCardVal;
					$jump->card=$card;
					$jump->val=$lastCardVal;
					$lastCardVal=$card->value;
					$straight[]=$jump;
					$doubles[]=$jump;
				}
				unset($jump);
				// if ace , add to start of [straight]ers
				if ($card->value==14){
					$x=$straight[0]->card->value;
					if($x==14){$x=1;}
					$newJump=$x-1;
					$straight[0]->val=$newJump;
					
					$jump->card=$card;
					$jump->val=1;
					array_unshift($straight,$jump);
				}
			}//end foreach
			
			$sCount=count($straight)-1;
			$new_straight=array();
			$lastNStraighter=0;
		// flip straights values (inverse the diffirence)
			for ($i=$sCount ; $i>=0 ; $i--){
				$card=$straight[$i]->card;
				
				if ($lastNStraighter==0){
					$lastNStraighter=$card->value;
					$jump->card=$card;
					$jump->val=1;
					$new_straight[]=$jump;
				}else{
					$lastNStraighter=$lastNStraighter - $card->value;
					$jump->card=$card;
					$jump->val=$lastNStraighter;
					$lastNStraighter=$card->value;
					$new_straight[]=$jump;
				}
				unset($jump);
			}//
			
			unset($straight);
			$straight = $new_straight;
		// get straights
			$sCount=count($straight);
			$straightCounters=array();
			$lastStraightCounter=0;
			//echo "\n";
			for ($i=0 ; $i<$sCount ; $i++){
				//echo $i.'-';
				if (!isset($straightCounters[$lastStraightCounter]->cards)){ // create cards array
					$straightCounters[$lastStraightCounter]->cards=array();
				}//
				if ($straight[$i]->val==1){	// if next card , add it and count it
					$straightCounters[$lastStraightCounter]->count=$straightCounters[$lastStraightCounter]->count+1;
					$straightCounters[$lastStraightCounter]->cards[]=$straight[$i]->card;
				}//
				
				if ($straight[$i]->val==0 && $straightCounters[$lastStraightCounter]->count>0){	// if same card , just add it to know the suites
					$straightCounters[$lastStraightCounter]->cards[]=$straight[$i]->card;
				}//
				
				if ($straight[$i]->val>1 && $straightCounters[$lastStraightCounter]->count>0){
					$lastStraightCounter++;
				}//
				
			}//end for
			
		// get doubles (count how many zeros series)
			$dCount=count($doubles);
			$doubleCounters=array();
			$lastDblCounter=0;
			for ($i=0 ; $i<$dCount ; $i++){
				if (!isset($doubleCounters[$lastDblCounter]->cards)){ // create cards array
					$doubleCounters[$lastDblCounter]->cards=array();
				}//
				
				if ($doubles[$i]->val==0){	// if same card , add it and count it
					$doubleCounters[$lastDblCounter]->count=$doubleCounters[$lastDblCounter]->count+1;
					$doubleCounters[$lastDblCounter]->cards[]=$doubles[$i]->card;
				}//
				
				if ($doubles[$i]->val>0 && $doubleCounters[$lastDblCounter]->count>0){	// if diffirent card , generate next counter
					$lastDblCounter++;
				}//
			}//end for
			
			
		$result->straights=$straightCounters;
		$result->doubles=$doubleCounters;
		
		//print_r($straight);
		//print_r($result);
		
		return $result;
	}//end get jumps
	
	
	private function countSuites($cards){ // get count of card suites and max card value
		if (!is_array($cards)){return false;}
		$suites=array();
		$max_card_val=0;
		$max_suit_count=0;
		foreach ($cards as $card){
			$suites[$card->suit]++;
			if ($card->value > $max_card_val){
				$max_card_val=$card->value;
				$suites['kicker']=$card;
			}//
			if ($suites[$card->suit] > $max_suit_count){
				$max_suit_count=$suites[$card->suit];
				$suites['max_suit_count']=$max_suit_count;
			}
		}//end for
		
		
		return $suites;
		
	}//
	
	private function check_straightFlush($straights){
		$bestKicker=false;					// Highest kicker
		foreach ($straights as $set){ 	// loof through straights , find where straight count >=5 and count it's suites
			if ($set->count>=5){
				$suites=$this->countSuites($set->cards);
				if ($suites['max_suit_count']>=5){
					$bestKicker = $suites['kicker'];
				}
			}//
		}//
		
		return $bestKicker;
	}//
	
	private function check_4ofKind($doubles,$cards){
		$bestKicker=false;					// Highest kicker
		$suites=$this->countSuites($cards);
		foreach ($doubles as $set){ 	// loop through doubles , find where doubles count >=3 . since we have 4 cards , the kicer might be any other card inthe hand
			if ($set->count>=3){
				$points=$suites['kicker']->value+($set->cards[0]->value * 100); //points : #-##-## hand_strength-high_card-high_kicker
				if ($points > $bestKicker->value){ 
					$bestKicker->value= $points;
				}
			}//
		}//
		
		return $bestKicker;
	}//
	
	private function check_fullHouse($doubles){
		$bestKicker=false;					// Highest kicker
		$found_1=false;
		$found_2=false;
		foreach ($doubles as $set){ 	// loop through doubles , find a double of count 2 and 1 , get kicker or double 2
			$suites=$this->countSuites($set->cards);	// get kicker
			if ($set->count==1){
				$found_1=true;
			}//
			if ($set->count==2){
				$found_2=true;
				$bestKicker=$suites['kicker'];
			}//
		}//
		
		if ($found_1==false || $found_2==false){ // did not find a fullhouse
			$bestKicker=false;
		}
		
		return $bestKicker;
	}//
	
	private function check_flush($cards){
		$bestKicker=false;					// Highest kicker
		$suites=$this->countSuites($set->cards);	// get kicker
		$suitNames=array('c','d','h','s');
		$suitKickers=array();
		// get best kicker of each suit
			foreach ($cards as $card){
				if ($card->value > $suitKickers[$card->suit]){
					$suitKickers[$card->suit]=$card->value;
				}
			}
		// loop through suits , get kickers of suits where count >5 
			foreach ($suitNames as $suitName){
				if ($suites[$suitName]>=5){//get its kicker
					if ($suitKickers[$suitName] > $bestKicker->value){
						$bestKicker->value=$suitKickers[$suitName];
					}
				}
			}//end for
		
		return $bestKicker;
	}//
	
	private function check_straight($straights){
		$bestKicker=false;					// Highest kicker
		foreach ($straights as $set){ 	// loof through straights , find where straight count >=5 and count it's suites
			if ($set->count>=5){
				$suites=$this->countSuites($set->cards);
				$bestKicker = $suites['kicker'];
			}//
		}//
		
		return $bestKicker;
	}//
	
	private function check_3ofKind($doubles,$cards){
		$bestKicker=false;					// Highest kicker
		$suites=$this->countSuites($cards);	// get kicker to set if 3-of-a-kind was found
		foreach ($doubles as $set){ 	// loop through doubles , find where doubles count >=2 . since we have 3 cards , the kicer might be any other card inthe hand
			if ($set->count>=2){
				$points=$suites['kicker']->value+($set->cards[0]->value * 100); //points : #-##-## hand_strength-high_card-high_kicker
				if ($points > $bestKicker->value){ 
					$bestKicker->value= $points;
				}
			}//
		}//
		
		return $bestKicker;
	}//
	
	private function check_2pair($doubles,$cards){
		$bestKicker=false;					// Highest kicker
		$suites=$this->countSuites($cards);	// get kicker to set if 2-pair was found
		$pairs=array();		// array of found pairs to get points
		foreach ($doubles as $set){ 	// loop through doubles , find where doubles count >=2 . since we have 3 cards , the kicer might be any other card inthe hand
			if ($set->count==1){
				$pairs[]=$set->cards[0]->value;
			}//
		}//
		
		if (count($pairs)>=2){	// found 2 pairs , now get their best values
			rsort ($pairs);		//reverse sort the pairs and add highest 2 values
			$kickerLevel=$pairs[0]*100;
			$bestKicker->value=$suites['kicker']->value + $kickerLevel;
		}//
		
		return $bestKicker;
	}//
	
	private function check_pair($doubles,$cards){
		$bestKicker=false;					// Highest kicker
		$suites=$this->countSuites($cards);	// get kicker to set if 2-pair was found
		$pairs=array();		// array of found pairs to get points
		foreach ($doubles as $set){ 	// loop through doubles , find where doubles count >=2 . since we have 3 cards , the kicer might be any other card inthe hand
			if ($set->count==1){
				$pairs[]=$set->cards[0]->value;
			}//
		}//
		
		if (count($pairs)>=1){	// found 2 pairs , now get their best values
			rsort ($pairs);		//reverse sort the pairs and add highest 2 values
			$kickerLevel=($pairs[0])*100;
			$bestKicker->value=$suites['kicker']->value + $kickerLevel;
		}//
		
		return $bestKicker;
	}//
	
	private function getWinName($points){
		$handNamePoint=floor($points/10000);
		$double_kicker=substr($points,1,2);
		$normal_kicker=substr($points,3,2);
		
		switch($handNamePoint){
			case '1':
				$handName='High Card';
				break;
			case '2':
				$handName='One Pair';
				break;
			case '3':
				$handName='Two Pairs';
				break;
			case '4':
				$handName='Three Of A Kind';
				break;
			case '5':
				$handName='Straight';
				break;
			case '6':
				$handName='Flush';
				break;
			case '7':
				$handName='Full House';
				break;
			case '8':
				$handName='Four Of A Kind';
				break;
			case '9':
				$handName='Straight Flush';
				break;
		}//
		
		if ($double_kicker>'0'){
			$doubleKicker=$double_kicker;
			switch($double_kicker){
				case 11:$doubleKicker='Jack';break;
				case 12:$doubleKicker='Queen';break;
				case 13:$doubleKicker='King';break;
				case 14:$doubleKicker='Ace';break;
			}//
		}//
		
		if ($normal_kicker>'0'){
			$normalKicker=$normal_kicker;
			switch($normal_kicker){
				case 11:$normalKicker='Jack';break;
				case 12:$normalKicker='Queen';break;
				case 13:$normalKicker='King';break;
				case 14:$normalKicker='Ace';break;
			}//
		}//
		
		$result->handName=$handName;
		$result->doubleKicker=$doubleKicker;
		$result->normalKicker=$normalKicker;
		
		return $result;
	}//
}//end class
?>