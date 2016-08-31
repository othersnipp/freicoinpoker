<?php
class cache implements ICache{
	private $engine='';
	
	private $server='localhost';
	private $port='11211';
	private $user='';
	private $pass='';
	private $path='';
	
	private $connected=false;
	
	function __construct($cache_engine='memcache'){
		$cache_engine='cache_'.$cache_engine;
		require_once 'includes/modules/cache/engines/'.$cache_engine.'.php';
		$this->engine=new $cache_engine;
	}//end constructor	
	
// -------------- \\
// --- Public --- \\
// -------------- \\

	public function read($storage_name){ // string , returns mixed
		return $this->engine->read($storage_name);
	}// end read	
	
	public function write($storage_name,$value){ // query , returns db handler
		$this->engine->write($storage_name,$value);
	}// end write
	
	public function delete($storage_name){ // query , returns bool
		return $this->engine->delete($storage_name);
	}// end write
}//end class
?>