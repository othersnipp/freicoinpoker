<?php
class Card{
	public $suit='';
	public $value='';
	public $name='';

	function __construct($card=''){ // if constructor parameter was not empty , set the card , but if you want to check if the card is valid , use setCard() instead
		if ($card!=''){
			$this->setCard($card);
		}
	}
	function setCard($card){
		$card=trim($card);
		$this->name=$card;
		//get suit and check if allowed
			$suit=strtolower(substr($card,-1)); // get last char of card | 3d = 3 of diamonds \ returns d
		//get value and check if allowed
			$value=strtolower(substr($card,0,1)); // get 1st char of card | 3d = 3 of diamonds \ returns 3
		//create card object
			$this->suit=$suit;
			//edit value
				switch ($value){
					case 't':
						$value='10';
						break;
					case 'j':
						$value='11';
						break;
					case 'q':
						$value='12';
						break;
					case 'k':
						$value='13';
						break;
					case 'a':
						$value='14';
						break;
				}
				$value=(int)$value; // take the integer value
			$this->value=$value;
		return true;			
	}
}
?>