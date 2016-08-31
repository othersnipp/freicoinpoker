<?php /* Smarty version Smarty-3.1.3, created on 2014-03-03 09:01:52
         compiled from "./templates/windows/tables/add_table.tpl" */ ?>
<?php /*%%SmartyHeaderCode:653292836531436f0190dc4-73472088%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    '2300c09218a025f25716bee841e5f1cfd13fef91' => 
    array (
      0 => './templates/windows/tables/add_table.tpl',
      1 => 1383938991,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '653292836531436f0190dc4-73472088',
  'function' => 
  array (
  ),
  'variables' => 
  array (
    'servers' => 0,
    'server' => 0,
  ),
  'has_nocache_code' => false,
  'version' => 'Smarty-3.1.3',
  'unifunc' => 'content_531436f01e6fe',
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_531436f01e6fe')) {function content_531436f01e6fe($_smarty_tpl) {?><table class="infoArea" style="width:100%;">
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
				<?php  $_smarty_tpl->tpl_vars['server'] = new Smarty_Variable; $_smarty_tpl->tpl_vars['server']->_loop = false;
 $_from = $_smarty_tpl->tpl_vars['servers']->value; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array');}
foreach ($_from as $_smarty_tpl->tpl_vars['server']->key => $_smarty_tpl->tpl_vars['server']->value){
$_smarty_tpl->tpl_vars['server']->_loop = true;
?>
					<option value="<?php echo $_smarty_tpl->tpl_vars['server']->value->id;?>
"><?php echo $_smarty_tpl->tpl_vars['server']->value->title;?>
</option>
				<?php } ?>
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
</table><?php }} ?>