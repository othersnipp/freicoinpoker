<?php
class rts_memcache implements ICache{
	private $engine='';
	
	private $server='localhost';
	private $port='11211';
	private $user='';
	private $pass='';
	
	private $connected=false;
	
	function __construct($rts_engine='memcache',$rts_server_id=0){
		if ($rts_server_id>0){
			$rts=new Server($rts_server_id);
			$this->server=$rts->ip;
			$this->port=$rts->port;
		}
		$this->engine=new Memcache();
	}//end constructor	
	
// -------------- \\
// --- Public --- \\
// -------------- \\

	public function read($storage_name){ // string , returns mixed
		if (!$this->connected){
			$this->connect();
		}
		return $this->engine->get($storage_name);
	}// end read	
	
	public function write($storage_name,$value){ // query , returns db handler
		if (!$this->connected){
			$this->connect();
		}
		$this->engine->set($storage_name,$value);
	}// end write
	
	public function delete($storage_name){ // query , returns bool
		if (!$this->connected){
			$this->connect();
		}
		return $this->engine->delete($storage_name);
	}// end write
// -------------- \\
// --- Private --- \\
// -------------- \\	
	/* connect to memcache service if not connected
		input void
		output void
	*/
	private function connect(){
		if ($this->connected==false){
			$this->engine->connect($this->server,$this->port);
			$this->connected=true;
		}//end if
	}//end connect
}//end class
?>