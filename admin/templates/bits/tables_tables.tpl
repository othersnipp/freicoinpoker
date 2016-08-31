{foreach from=$tables item=table}				
	<tr class="tableData">
		<td valign=top class="info" style="width:20px;">
			{if $table->available eq 1}
				<img src="templates/images/ok.png">
			{else}
				<img src="templates/images/error.png">
			{/if}
		</td>
		<td valign=top class="info">
			{$table->title}
		</td>
		<td valign=top>
			{$table->used_seats}
		</td>
		<td valign=top>
			{$table->server->title}
		</td>
		<td valign=top>
			{if $table->serverUp eq 1}
				<img src="templates/images/ok.png"> Online
			{else}
				<div class="error"><img src="templates/images/error.png"> Offline !</div>
			{/if}
		</td>
		<td valign=top style="width:200px;text-align:center;">
			{if $table->available eq 1}
				<button class="btn3d" style="width:184px;" id="kick_players_feedback_{$table->id}" onclick="exec('tables_kick_players','id={$table->id}');clearTimeout(refTimer);this.innerHTML='<img style=\'height:20px;\' src=\'templates/images/loading2.gif\'>';">Kick Players ({$table->used_seats})</button>
			{else}
				<button class="btn3d" style="width:90px;" id="enable_table_feedback_{$table->id}" onclick="exec('tables_enable_table','id={$table->id}');clearTimeout(refTimer);this.innerHTML='<img style=\'height:20px;\' src=\'templates/images/loading2.gif\'>';">Enable Table</button>
				<button class="btn3d" style="width:90px;" onclick="ajaxWindow('tables_edit_table','Edit Table \'{$table->title}\'','id={$table->id}');">Edit Table</button>
			{/if}
		</td>
	</tr>
{/foreach}