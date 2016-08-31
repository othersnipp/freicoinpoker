<table class="infoArea" style="width:100%;">
	<tr>
		<td valign=top>
			Table Name : 
		</td>
		<td valign=top style="width:150px;">
			<input type=text class="textArea" id="nt_title">
		</td>
	</tr>
	<tr>
		<td valign=top>
			Max Players : 
		</td>
		<td valign=top>
			<input type=text class="textArea" id="nt_max_seats">
		</td>
	</tr>
	<tr>
		<td valign=top>
			Minimum Buy-In : 
		</td>
		<td valign=top>
			<input type=text class="textArea" id="nt_min_buy">
		</td>
	</tr>
	<tr>
		<td valign=top>
			Maximum Buy-In : 
		</td>
		<td valign=top>
			<input type=text class="textArea" id="nt_max_buy">
		</td>
	</tr>
	<tr>
		<td valign=top>
			Blinds (lower blind): 
		</td>
		<td valign=top>
			<input type=text class="textArea" id="nt_blinds">
		</td>
	</tr>
	<tr>
		<td valign=top>
			Player Timeout (Seconds):
		</td>
		<td valign=top>
			<input type=text class="textArea" id="nt_pto">
		</td>
	</tr>
	<tr>
		<td valign=top>
			Hosting Server :
		</td>
		<td valign=top>
			<select id="server_id" class="btn3d" style="width:150px;">
				<option value="-1" disabled selected>[Please Select]</option>
				{foreach from=$servers item=server}
					<option value="{$server->id}">{$server->title}</option>
				{/foreach}
			</select>
		</td>
	</tr>
	<tr>
		<td valign=top>
			
		</td>
		<td valign=top align=center>
			<button class="btn3d" id="add_table_feedback" style="width:150px;" onclick="save_new_table();">Add New Table</button>
		</td>
	</tr>
</table>