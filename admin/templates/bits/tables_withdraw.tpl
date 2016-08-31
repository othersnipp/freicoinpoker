{foreach from=$tables item=table}				
	<tr class="tableData">		
		<td valign=top class="info">
			{$table->user_id}
		</td>
		<td valign=top>
			{$table->address}
		</td>
		<td valign=top>
			{$table->withdraw_amt}
		</td>
		<td valign=top>
			{$table->receive_amt}
		</td>
		<td valign=top>
			{$table->status}
		</td>
		
	</tr>
{/foreach}