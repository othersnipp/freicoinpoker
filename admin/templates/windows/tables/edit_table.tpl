<table class="infoArea" style="width:100%;">
	<input type=hidden class="textArea" id="et_id" value="{$table->id}">
	<tr>
		<td valign=top>
			Table Name : 
		</td>
		<td valign=top style="width:150px;">
			<input type=text class="textArea" id="et_title" value="{$table->title}">
		</td>
	</tr>
	<tr>
		<td valign=top>
			Max Players : 
		</td>
		<td valign=top>
			<input type=text class="textArea" id="et_max_seats" value="{$table->max_seats}">
		</td>
	</tr>
	<tr>
		<td valign=top>
			Minimum Buy-In : 
		</td>
		<td valign=top>
			<input type=text class="textArea" id="et_min_buy" value="{$table->min_buy}">
		</td>
	</tr>
	<tr>
		<td valign=top>
			Maximum Buy-In : 
		</td>
		<td valign=top>
			<input type=text class="textArea" id="et_max_buy" value="{$table->max_buy}">
		</td>
	</tr>
	<tr>
		<td valign=top>
			Blinds (lower blind): 
		</td>
		<td valign=top>
			<input type=text class="textArea" id="et_blinds" value="{$table->small_blind}">
		</td>
	</tr>
	<tr>
		<td valign=top>
			Player Timeout (Seconds):
		</td>
		<td valign=top>
			<input type=text class="textArea" id="et_pto" value="{$table->player_timeout}">
		</td>
	</tr>
	<tr>
		<td valign=top>
			Hosting Server :
		</td>
		<td valign=top>
			<select id="et_server_id" class="btn3d" style="width:150px;">
				<option value="-1" disabled selected>[Please Select]</option>
				<option value="0">Main Server</option>
				{foreach from=$servers item=server}
					<option value="{$server->id}" {if $table->server_id eq $server->id}selected{/if}>{$server->title}</option>
				{/foreach}
			</select>
		</td>
	</tr>
	<tr>
		<td valign=top>
			
		</td>
		<td valign=top align=center>
			<button class="btn3d" id="edit_table_feedback" style="width:150px;" onclick="save_edit_table();">Save Table</button>
		</td>
	</tr>
</table>