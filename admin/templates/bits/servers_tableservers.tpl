{foreach from=$servers item=server}				
	<tr class="tableData">
		<td valign=top class="info">
			{$server->title}
		</td>
		<td valign=top class="info">
			{if $server->up eq 1}
				<img src="templates/images/ok.png"> Online
			{else}
				<div class="error"><img src="templates/images/error.png"> Offline</div>
			{/if}
		</td>
		<td valign=top>
			{$server->ip}:{if $server->port eq 0}11211{else}{$server->port}{/if}
		</td>
		<td valign=top>
			<label class="info">{$server->online}</label>
			<img src="templates/images/icons/online.png" style="width:20px;height:20px;"> Online
			|
			<label class="info">{$server->offline}</label>
			<img src="templates/images/icons/offline.png" style="width:20px;height:20px;"> Offline
		</td>
		<td valign=top style="width:100px;text-align:center;">
			<button class="btn3d" style="width:80px;" onclick="ajaxWindow('servers_edit_server','Edit Server \'{$server->title}\'','id={$server->id}');">Edit</button>
		</td>
	</tr>
{/foreach}