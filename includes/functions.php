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
	
	function p($var){
		
		return $_POST[$var];
	}//
?>