<?php
interface ICache{
	const module_name='cache';
	
	/* construct
	input : 	rts_server $server | if false , load memcache
	output : 	mixed
	*/
	function __construct($cache_engine='memcache');
	
// -------------- \\
// --- Public --- \\
// -------------- \\
	/* read storage 
	input : 	string $storage_name
	output : 	mixed
	*/
	public function read($storage_name); //connrct to database
	
	/* write to storage
	input : 	string $storage_name,mixed $value
	output : 	boolean
	*/
	public function write($storage_name,$value); //
	
	/* delete from storage
	input : 	string $storage_name
	output : 	boolean
	*/
	public function delete($storage_name); //
	
	
}//end class
?>