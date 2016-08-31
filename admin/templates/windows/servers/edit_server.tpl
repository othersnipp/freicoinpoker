<div class="infoArea" style="width:auto;">

	<input type=hidden value="{$server->id}" id="es_id"> 
	Server Name : <input type=text class="textArea" value="{$server->title}" id="es_title"> 
	<button class="btn3d" onclick="servers_save_title();" id="save_title_feedback">Save</button>
	
</div>
<Br>
<div class="infoArea" style="width:auto;" id="lock_for_edit_feedback">
	In order to edit server port or address , all tables hosted on this server should be shut down , and all players on the table should be kicked .<br>
	<center><button class="btn3d error" style="width:300px;" onclick="exec('servers_lock_for_edit','id={$server->id}');this.innerHTML='<img style=\'height:20px;\' src=\'templates/images/loading2.gif\'>';">Kick all players and close tables</button></center>
</div>