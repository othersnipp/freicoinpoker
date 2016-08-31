<?php
//get tables
	if ($act=='get_tables'){
		$game->loadTables();
	}// end get tables
	
//load the table
	if ($act=='load_table'){
		$game->loadTable(p('id'));
	}// end get tables
	
//update the table
	if ($act=='update_table'){
		$game->refreshTable(true);
	}// end get tables
	
?>