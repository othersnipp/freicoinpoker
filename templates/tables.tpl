<div id="vindu">
	<table style="width: 411px;left: 50px;top: 40px;position: relative;" cellspacing=0>
		<tr class="tableHead">
			<td style="width:160px;">
				Table
			</td>
			<td style="width:64px;">
				Players
			</td>
			<td style="width:123px;">
				Min/Max buy-in
			</td>
			<td>
				Blinds
			</td>
		</tr>
	</table>
	<div style="overflow: auto;height: 155px;position: relative;top: 45px;left: 50px;width: 410px;">
		<table style="width:100%;" cellspacing=0 id="poker_tables">
			{foreach from=$tables item=table}
			<tr class="tableData" tag="{$table->used_seats}" title="{$table->max_seats}" data="{$table->player_timeout}">
				<td style="width:160px;" title="{$table->title}">
					<div style="width:100%;cursor:pointer;" onclick="set_loading();exec('player_join_table','id={$table->id}');">{$table->title}</div>
				</td>
				<td style="width:60px;" title="{$table->used_seats}/{$table->max_seats}">
					{$table->used_seats}/{$table->max_seats}
				</td>
				<td style="width:120px;" title="{$table->min_buy}/{$table->max_buy}">
					{$table->min_buy}/{$table->max_buy}
				</td>
				<td title="{$table->blinds}">
					{$table->blinds}
				</td>
			</tr>
			{/foreach}
		</table>
	</div>

	<div id="lobby_play_now"  onclick="set_loading();exec('player_join_random_table','');"><img src="/templates/images/play-now.png">
	</div>


	<div id="lobby_hide_full" class="" onclick="hideFull();">
	</div>

	<div id="lobby_hide_empty" class="" onclick="hideEmpty();">
	</div>

	<div id="lobby_show_slow" class="" onclick="showSpeed(16,60,this);">
	</div>

	<div id="lobby_show_fast" class="" onclick="showSpeed(0,15,this);">
	</div>
</div>	

