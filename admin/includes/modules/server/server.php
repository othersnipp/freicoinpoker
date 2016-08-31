<?php
class Server{
	
	
	public function __construct($id=0){
		global $rts;
		$this->rts=&$rts;
		$this->id=$id;
		if ($id>0){
				$this->readRTS();
		}
		
		if (isset($this->port) && $this->port==0){
			$this->port=11211;
		}
	}
	
	public function save(){
		global $db;
		$alex=$db->getFunction("select count(*) from server where ip='".$this->ip."' and port='".$this->port."' and id<>'".$this->id."'");
		if ($alex==0){
			$db->query("update server set title='".$this->title."' , ip='".$this->ip."' , port='".$this->port."' where id='".$this->id."'");
			$this->updateRTS();
			return true;
		}else{
			$this->error='Server Already Exist';
			$this->readRTS();
			return false;
		}
	}
	
	public function create(){
		global $db;
		$alex=$db->getFunction("select count(*) from server where ip='".$this->ip."' and port='".$this->port."'");
		if ($alex==0){
			$db->query("insert into server (ip,port) values ('".$this->ip."','".$this->port."')");
			$this->id=$db->newId();
			$this->updateRTS();
			return true;
		}else{
			$this->error='Server Already Exist';
			$this->readRTS();
			return false;
		}
	}
	
	public function refresh(){
		$this->readDB();
	}
	
	public function checkOnline(){
		$tmp=new Memcache();
		$isOnline=$tmp->connect($this->ip,$this->port);
		
		if ($isOnline){
			$tmp->close();
			$this->online=true;
			return true;
		}else{
			$tmp->close();
			$this->online=false;
			return false;
		}
	}
	
///////////////////
///// Private /////
///////////////////

	private function updateRTS(){
		$tmp=new stdClass;
		$tmp->id=$this->id;
		$tmp->ip=$this->ip;
		$tmp->port=$this->port;
		$tmp->title=$this->title;
		$this->rts->write('server.'.$this->id,$tmp);
	}
	
	private function readRTS(){
		$t_info=$this->rts->read('server.'.$this->id);
			if ($t_info===false){ // no info in rts , read from database
				$this->readDB();
			}else{
				//read rts
				foreach ($t_info as $key=>$val){
					$this->{$key}=$val;
				}
			}
	}
	
	private function readDB(){
				global $db;
				$servinfoA=$db->getRows("select * from server where id='".$this->id."'");
				$servinfo=$servinfoA[0];
				foreach ($servinfo as $key=>$val){
					$this->{$key}=$val;
				}
				$this->updateRTS();
	}
}//