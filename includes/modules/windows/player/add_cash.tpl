<table style="width:100%;">
<tr class="tableHead">
	<td>
		Chips
	</td>
	<td>
		Price
	</td>
	{foreach from=$payments item=payment}
		<td align=center>
			{$payment->title}
		</td>
	{/foreach}
</tr>
{foreach from=$prices item=price}
	<tr class="tableData">
		<td>
			{$price->title}
		</td>
		<td>
			${$price->price}
		</td>
		{foreach from=$payments item=payment}
		<td align=center>
			{include file=$payment->pay_template}
		</td>
		{/foreach}
	</tr>
{/foreach}
</table>