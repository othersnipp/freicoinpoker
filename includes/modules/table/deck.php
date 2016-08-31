<?php
class Deck{
	private $cards=array(); // 
	
	public function setCards($cards){	//set the array of cards
		$this->cards=$cards;
	}//end set cards
	
	public function setCard($card,$index=''){ /// add or replace + check if the added thing is really a 'Card' object
		if (!is_object ($card)){ // if it is not an object , means a new card should be created
			$card=new Card($card);
		}
		
		if ($index!=''){ // if a card index is set , update card . otherwise , push to cards array
			$this->cards[$index]=$card; // add card to specified index
		}else{
			$this->cards[]=$card;		// add card to array (push to array)
		}
	}//end set card
	
	public function getCard($cardId){ // get the card by ID / returns : Card $card/false
		if (isset($this->cards[$cardId])){
			return $this->cards[$cardId];
		}else{
			return false; 	//
		}
	}//end get card
	
	public function getCards(){ // get all cards as array of 'Card's , return array $cards
		return $this->cards;
	}//end get cards
	
	public function sortDeck(){ // sorts the array of cards , input void , outpout void
		usort($this->cards, array($this, 'compare'));
	}//end sort deck
	
	private function compare($a,$b){ // a and b are 'Card' objects
		if ($a->value == $b->value) {
			return 0;
		}
		return ($a->value < $b->value) ? -1 : 1;
	}//end compare
	
}//end class
?>