<?php
class Ajax{
	private $output=array(); // output contains arrays of $data["msg"]	
	private $bigsplitter='~^*^~'; // to split between commands			
	private $splitter='(._._.)'; // to split between commands			
	private $equal='"_TMR_"'; // to split between commands		
	
	public function add($data){
		$this->output[]=$data;
	}
	
	public function sendData($closeConnection=false){
		if (is_array($this->output) && count($this->output)>0){
			$stream=$this->bigsplitter;
			foreach ($this->output as $datum){
				foreach ($datum as $key => $val){
					$stream.=$key.$this->equal.$val.$this->splitter;
				}//end inner foreach
				$stream.=$this->bigsplitter;
			}// end foreach
			if ($closeConnection==false){
				echo $stream;
			}else{
				ignore_user_abort(true);
				//check if output is shorter than 256 and make it 256
					$sLength=strlen($stream);
					if ($sLength<256){
						$stream.=str_repeat(' ',(256-$sLength)+5);
					}
				header("Content-Length: ".strlen($stream));
				header("Connection: close");
				echo $stream;
				@ob_flush();
				@flush();
				@ob_end_flush();
			}
		}
		$this->output=array();
	}//end sendData
}//end class
?>