<?php
interface IDatabase{
	const module_name='db';
	
	function __construct($server,$db,$user,$pass,$connect=false,$pers=false,$type='mysql');
	
// -------------- \\
// --- Public --- \\
// -------------- \\
	/* Connect to database
	input : 	void
	output : 	void
	*/
	public function connect(); //connrct to database
	
	/* Execute a query
	input : 	string $q
	output : 	void
	*/
	public function query($q); //
	
	/* 2d-array of table rows with colum name as indexies
	input : 	string $q
	output : 	array ()
	*/
	public function getRows($q); // get array of rows objects
	public function getRow($q); // get array of rows objects
		
	/* return new array of 'INSERT' query
	input : 	void
	output : 	int $ID
	*/
	public function newId(); // get array of rows objects

	/* return the function value (sum/count/min) of a query
	input : 	string query
	output : 	mixed
	*/
	public function getFunction($q);

	
}//end class
?>