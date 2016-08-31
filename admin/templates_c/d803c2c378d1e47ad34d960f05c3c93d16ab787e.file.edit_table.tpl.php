<?php /* Smarty version Smarty-3.1.3, created on 2014-02-08 21:22:14
         compiled from "./templates/windows/tables/edit_table.tpl" */ ?>
<?php /*%%SmartyHeaderCode:62835576252f691f681b038-75369717%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    'd803c2c378d1e47ad34d960f05c3c93d16ab787e' => 
    array (
      0 => './templates/windows/tables/edit_table.tpl',
      1 => 1383938989,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '62835576252f691f681b038-75369717',
  'function' => 
  array (
  ),
  'variables' => 
  array (
    'table' => 0,
    'servers' => 0,
    'server' => 0,
  ),
  'has_nocache_code' => false,
  'version' => 'Smarty-3.1.3',
  'unifunc' => 'content_52f691f6898be',
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_52f691f6898be')) {function content_52f691f6898be($_smarty_tpl) {?><table class="infoArea" style="width:100%;">
	<input type=hidden class="textArea" id="et_id" value="<?php echo $_smarty_tpl->tpl_vars['table']->value->id;?>
">
	<tr>
		<td valign=top>
			Table Name : 
		</td>
		<td valign=top style="width:150px;">
			<input type=text class="textArea" id="et_title" value="<?php echo $_smarty_tpl->tpl_vars['table']->value->title;?>
">
		</td>
	</tr>
	<tr>
		<td valign=top>
			Max Players : 
		</td>
		<td valign=top>
			<input type=text class="textArea" id="et_max_seats" value="<?php echo $_smarty_tpl->tpl_vars['table']->value->max_seats;?>
">
		</td>
	</tr>
	<tr>
		<td valign=top>
			Minimum Buy-In : 
		</td>
		<td valign=top>
			<input type=text class="textArea" id="et_min_buy" value="<?php echo $_smarty_tpl->tpl_vars['table']->value->min_buy;?>
">
		</td>
	</tr>
	<tr>
		<td valign=top>
			Maximum Buy-In : 
		</td>
		<td valign=top>
			<input type=text class="textArea" id="et_max_buy" value="<?php echo $_smarty_tpl->tpl_vars['table']->value->max_buy;?>
">
		</td>
	</tr>
	<tr>
		<td valign=top>
			Blinds (lower blind): 
		</td>
		<td valign=top>
			<input type=text class="textArea" id="et_blinds" value="<?php echo $_smarty_tpl->tpl_vars['table']->value->small_blind;?>
">
		</td>
	</tr>
	<tr>
		<td valign=top>
			Player Timeout (Seconds):
		</td>
		<td valign=top>
			<input type=text class="textArea" id="et_pto" value="<?php echo $_smarty_tpl->tpl_vars['table']->value->player_timeout;?>
">
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
				<?php  $_smarty_tpl->tpl_vars['server'] = new Smarty_Variable; $_smarty_tpl->tpl_vars['server']->_loop = false;
 $_from = $_smarty_tpl->tpl_vars['servers']->value; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array');}
foreach ($_from as $_smarty_tpl->tpl_vars['server']->key => $_smarty_tpl->tpl_vars['server']->value){
$_smarty_tpl->tpl_vars['server']->_loop = true;
?>
					<option value="<?php echo $_smarty_tpl->tpl_vars['server']->value->id;?>
" <?php if ($_smarty_tpl->tpl_vars['table']->value->server_id==$_smarty_tpl->tpl_vars['server']->value->id){?>selected<?php }?>><?php echo $_smarty_tpl->tpl_vars['server']->value->title;?>
</option>
				<?php } ?>
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
</table><?php }} ?>