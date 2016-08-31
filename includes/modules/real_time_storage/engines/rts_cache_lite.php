<?php
class rts_cache_lite implements ICache{
	private $engine='';
	
	private $server='cache_files';	// directory of cache files , no ending slash 
	private $port='';
	private $user='';
	private $pass='';
	
	private $connected=false;
	
	function __construct($rts_engine='cache_lite',$rts_server_id=0){
		if ($rts_server_id>0){
			
			$this->server=$rts->server;
			$this->port=$rts->port;
			$this->user=$rts->user;
		}
		
	}//end constructor	
	
// -------------- \\
// --- Public --- \\
// -------------- \\

	public function read($storage_name){ // string , returns mixed
		$filename="$this->server/$storage_name";
			$fp = fopen($filename, "w");
			if (@filesize($filename)>0){
				flock($fp, LOCK_SH);
				$result=fread ( $fp , filesize($filename));
			}else{
				$result='';
			}
			fclose($fp);
		return unserialize($result);
	}// end read	
	
	public function write($storage_name,$value){ // query , returns db handler
		$fp = fopen("$this->server/$storage_name", "w+");
			flock($fp, LOCK_EX);
				$value=serialize($value);
				fwrite ($fp, $value);
			
		fclose($fp);
		
	}// end write
	
	public function delete($storage_name){ // query , returns bool
		return unlink("$this->server/$storage_name");
	}// end write
// -------------- \\
// --- Private --- \\
// -------------- \\	
	/* connect to sever if it has some kind of server like memcached
		input void
		output void
	*/
	private function connect(){
		
	}//end connect
}//end class
?>