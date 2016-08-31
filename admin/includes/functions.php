<?php
	function out($string){ // function to read string and translate to other language (future work)
		return $string;
	}
	
	function clean($var){ // clean variable from SQL injection and escapes whats needed
		$var=strip_tags($var,'<a><img><b><i><u><p><li><br><ol><em><blockquote><address><object><param><embed><h1><h2><h3><div><span><label><font><table><tr><td><th><thead><tfoot><hr><sub><sup>');
		$var=str_replace('"','&quot;',$var);
		$var=str_replace("'",'&#039;',$var);
		$badwords= array("union ", "select ", "show ", "insert ", "update ", "delete ", "drop " , "truncate ", "create ", "load_file ", "exec ", "# ", "-- ");
		$var=str_replace($badwords, "", $var);
		
		
		return $var;
	}//end clean
	
	function cleanPostVars(){
		foreach($_POST as $key=>$value){
			$_POST[$key]=clean($_POST[$key]);
		}
	}//
	
	function ip(){ // forwarded addresses and many others ...
		if (getenv("HTTP_CLIENT_IP") && strcasecmp(getenv("HTTP_CLIENT_IP"), "unknown"))
		$ip = getenv("HTTP_CLIENT_IP");

		else if (getenv("HTTP_X_FORWARDED_FOR") && strcasecmp(getenv("HTTP_X_FORWARDED_FOR"), "unknown"))
		$ip = getenv("HTTP_X_FORWARDED_FOR");

		else if (getenv("REMOTE_ADDR") && strcasecmp(getenv("REMOTE_ADDR"), "unknown"))
		$ip = getenv("REMOTE_ADDR");

		else if (isset($_SERVER['REMOTE_ADDR']) && $_SERVER['REMOTE_ADDR'] && strcasecmp($_SERVER['REMOTE_ADDR'], "unknown"))
		$ip = $_SERVER['REMOTE_ADDR'];

		else
		$ip = "unknown";

		return($ip);
	}// end function get ip
	
	function p($var){
		return $_POST[$var];
	}//
	
	function cp($var){
		return clean($_POST[$var]);
	}//
	
	function g($var){
		return $_GET[$var];
	}//
	
	function cg($var){
		return clean($_GET[$var]);
	}//
	
	function checkServerUp(&$server){
	
		$tmp=new Memcache();
		$isOnline=$tmp->connect($server->ip,$server->port);
		
		if ($isOnline){
			$tmp->close();
			return true;
		}else{
			$tmp->close();
			return false;
		}
		
	}//
?>