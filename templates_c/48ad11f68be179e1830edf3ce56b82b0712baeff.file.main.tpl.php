<?php /* Smarty version Smarty-3.1.3, created on 2014-03-22 13:24:25
         compiled from "./templates/main.tpl" */ ?>
<?php /*%%SmartyHeaderCode:1317110934531416a5eac131-73563810%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    '48ad11f68be179e1830edf3ce56b82b0712baeff' => 
    array (
      0 => './templates/main.tpl',
      1 => 1395489335,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '1317110934531416a5eac131-73563810',
  'function' => 
  array (
  ),
  'version' => 'Smarty-3.1.3',
  'unifunc' => 'content_531416a5f16dd',
  'variables' => 
  array (
    'player' => 0,
  ),
  'has_nocache_code' => false,
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_531416a5f16dd')) {function content_531416a5f16dd($_smarty_tpl) {?>	<script>
	 	<?php if ($_smarty_tpl->tpl_vars['player']->value->table_id==0){?>
			player.state=1;
			exec('game_get_tables','');
		<?php }else{ ?>
			exec('game_load_table','id=<?php echo $_smarty_tpl->tpl_vars['player']->value->table_id;?>
');
		<?php }?>
		
		
	</script>
	<div id="please_wait" style="display:none;"><img src="templates/images/big_loading.gif" style="filter:alpha(opacity=70);opacity:0.7;width:100%;height:100%;"></div>
	<div id="content" style="">
		<img src="templates/images/big_loading.gif" style="filter:alpha(opacity=70);opacity:0.7;width:100%;height:100%;">
	</div>
<div id="infobox">
                <?php if (isset($_smarty_tpl->tpl_vars['player']->value->id)&&$_smarty_tpl->tpl_vars['player']->value->id>0){?>
                <div id="table_profile" class="infoArea">
                                <table style="width:100%;">
                                        <tr>
                                                <td valign=top rowspan=3 style="width:65px;">
                                                        <?php if ($_smarty_tpl->tpl_vars['player']->value->user_type=='normal'){?>
								<img src="<?php echo $_smarty_tpl->tpl_vars['player']->value->avatar;?>
" class="profile_image" id="avatar" onmouseover="hideObject('avatar_edit',false);" onmouseout="hideObject('avatar_edit',true);">
								<div id="avatar_edit" onmouseover="hideObject('avatar_edit',false);" onmouseout="hideObject('avatar_edit',true);" onclick="ajaxWindow('player_change_avatar','Change Avatar');">Change avatar</div>
                                                        <?php }else{ ?>
                                                        <img src="<?php echo $_smarty_tpl->tpl_vars['player']->value->avatar;?>
" class="profile_image" id="avatar">
                                                        <?php }?>
                                                </td>
                                                <td valign=top align=center class="profile_player_name">
                                                        <?php echo $_smarty_tpl->tpl_vars['player']->value->display_name;?>

                                                </td>
                                        </tr>
                                        <tr>
                                                <td valign=top align=left>
                                                        <span id="balance_span_2" class="balance"><?php echo $_smarty_tpl->tpl_vars['player']->value->balance/100;?>
</span>
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
                                                                                <label id="points"><?php echo $_smarty_tpl->tpl_vars['player']->value->points;?>
</label>
                                                                        </td>
                                                                </tr>
                                                        </table>
                                                </td>
                                        </tr>
                                        <tr>
                                                <td valign=top align=center>
                                                        <label style="font-size:14px;font-weight:bold;">#<?php echo $_smarty_tpl->tpl_vars['player']->value->rank;?>
</label>
                                                </td>
                                        </tr>
                                </table>
                </div>
                <?php }?>

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
<?php }} ?>