<table style="width:100%;">
	<tr>
		<td valign=top>
			Server Address : 
		</td>
		<td valign=top align=center>
			<input type=text class="textArea" id="es_ip" value="{$server->ip}">
		</td>
	</tr>
	<tr>
		<td valign=top>
			Server Port : 
		</td>
		<td valign=top align=center>
			<input type=text class="textArea" id="es_port" value="{$server->port}">
		</td>
	</tr>
	<tr>
		<td valign=top>
			
		</td>
		<td valign=top align=center>
			<button id="save_server_feedback" class="btn3d" style="width:150px;" onclick="save_edit_server();" id="">Save</button>
		</td>
	</tr>
</table>