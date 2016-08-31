	<script>
	 	{if $player->table_id eq 0}
			player.state=1;
			exec('game_get_tables','');
		{else}
			exec('game_load_table','id={$player->table_id}');
		{/if}
		
		
	</script>
	<div id="please_wait" style="display:none;"><img src="templates/images/big_loading.gif" style="filter:alpha(opacity=70);opacity:0.7;width:100%;height:100%;"></div>
	<div id="content" style="">
		<img src="templates/images/big_loading.gif" style="filter:alpha(opacity=70);opacity:0.7;width:100%;height:100%;">
	</div>
<div id="infobox">
                {if isset($player->id) && $player->id>0}
                <div id="table_profile" class="infoArea">
                                <table style="width:100%;">
                                        <tr>
                                                <td valign=top rowspan=3 style="width:65px;">
                                                        {if $player->user_type eq 'normal'}
								<img src="{$player->avatar}" class="profile_image" id="avatar" onmouseover="hideObject('avatar_edit',false);" onmouseout="hideObject('avatar_edit',true);">
								<div id="avatar_edit" onmouseover="hideObject('avatar_edit',false);" onmouseout="hideObject('avatar_edit',true);" onclick="ajaxWindow('player_change_avatar','Change Avatar');">Change avatar</div>
                                                        {else}
                                                        <img src="{$player->avatar}" class="profile_image" id="avatar">
                                                        {/if}
                                                </td>
                                                <td valign=top align=center class="profile_player_name">
                                                        {$player->display_name}
                                                </td>
                                        </tr>
                                        <tr>
                                                <td valign=top align=left>
                                                        <span id="balance_span_2" class="balance">{$player->balance/100}</span>
							<img src="templates/images/btn/add.png" class="add_cash_btn" title="Buy Chips" onclick="ajaxWindow('lobby_deposit','Buy Chips');">
                                                </td>
                                        </tr>
                                        <tr>
                                                <td valign=top align=left>
                                                        <table>
                                                                <tr>
                                                                        <td>
                                                                                Points :
                                                                        </td>
                                                                        <td>
                                                                                <label id="points">{$player->points}</label>
                                                                        </td>
                                                                </tr>
                                                        </table>
                                                </td>
                                        </tr>
                                        <tr>
                                                <td valign=top align=center>
                                                        <label style="font-size:14px;font-weight:bold;">#{$player->rank}</label>
                                                </td>
                                        </tr>
                                </table>
                </div>
                {/if}

                <div id="side_bar" style="display:none;">

                        <div id="dealer_chat" title="Dealer Chat"></div>
                        <div id="chat_div">
                                <div id="table_chat"></div>
                                <div id="chat_send_div" class="infoArea">
                                        <table cellspacing=0 cellpadding=0><tr>
                                                <td valign=top>
                                                        <input type=text class="btn3d" id="txt_chat_send" onkeypress="if(event.keyCode==13) player.chat();">
                                                </td>
                                                <td valign=top>
                                                        <button class="btn3d" onclick="player.chat();">Send</button>
                                                </td>
                                        </table>
                                </div>
                        </div>
                </div>

</div>
