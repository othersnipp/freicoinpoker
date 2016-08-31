<?php
class Database implements IDatabase{
	private $engine='';
	
	function __construct($server,$db,$user,$pass,$connect=false,$pers=false,$type='mysql'){
		global $_MODULES_PATH;
		include $_MODULES_PATH.'db/engines/'.$type.'.php';
		$this->engine=new $type($server,$db,$user,$pass,$connect,$pers,$type);
	}//end constructor	
	
// -------------- \\
// --- Public --- \\
// -------------- \\

	public function connect(){ // void
		$this->engine->connect();
	}// end connect	
	
	public function query($q){ // query , returns db handler
		return $this->engine->query($q);
	}// end query
	
	public function getRows($q){ // get array of rows objects
		return $this->engine->getRows($q);
	}//end getRows
	
	public function getRow($q){ // get array of rows objects
		return $this->engine->getRow($q);
	}//end getRows
	
	public function newId(){ // get array of rows objects
		return $this->engine->newId();
	}//end getRows
	
	public function getFunction($q){
		return $this->engine->getFunction($q);
	}	
}//end class
?>