<?php /* Smarty version Smarty-3.1.3, created on 2014-02-06 15:11:50
         compiled from "./templates/bits/tables_tables.tpl" */ ?>
<?php /*%%SmartyHeaderCode:127815720752f3982679f8d0-13821882%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    '5979d1cab4dfee9a947d8476e8554edf7e11f22b' => 
    array (
      0 => './templates/bits/tables_tables.tpl',
      1 => 1383938933,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '127815720752f3982679f8d0-13821882',
  'function' => 
  array (
  ),
  'variables' => 
  array (
    'tables' => 0,
    'table' => 0,
  ),
  'has_nocache_code' => false,
  'version' => 'Smarty-3.1.3',
  'unifunc' => 'content_52f39826808e9',
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_52f39826808e9')) {function content_52f39826808e9($_smarty_tpl) {?><?php  $_smarty_tpl->tpl_vars['table'] = new Smarty_Variable; $_smarty_tpl->tpl_vars['table']->_loop = false;
 $_from = $_smarty_tpl->tpl_vars['tables']->value; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array');}
foreach ($_from as $_smarty_tpl->tpl_vars['table']->key => $_smarty_tpl->tpl_vars['table']->value){
$_smarty_tpl->tpl_vars['table']->_loop = true;
?>				
	<tr class="tableData">
		<td valign=top class="info" style="width:20px;">
			<?php if ($_smarty_tpl->tpl_vars['table']->value->available==1){?>
				<img src="templates/images/ok.png">
			<?php }else{ ?>
				<img src="templates/images/error.png">
			<?php }?>
		</td>
		<td valign=top class="info">
			<?php echo $_smarty_tpl->tpl_vars['table']->value->title;?>

		</td>
		<td valign=top>
			<?php echo $_smarty_tpl->tpl_vars['table']->value->used_seats;?>

		</td>
		<td valign=top>
			<?php echo $_smarty_tpl->tpl_vars['table']->value->server->title;?>

		</td>
		<td valign=top>
			<?php if ($_smarty_tpl->tpl_vars['table']->value->serverUp==1){?>
				<img src="templates/images/ok.png"> Online
			<?php }else{ ?>
				<div class="error"><img src="templates/images/error.png"> Offline !</div>
			<?php }?>
		</td>
		<td valign=top style="width:200px;text-align:center;">
			<?php if ($_smarty_tpl->tpl_vars['table']->value->available==1){?>
				<button class="btn3d" style="width:184px;" id="kick_players_feedback_<?php echo $_smarty_tpl->tpl_vars['table']->value->id;?>
" onclick="exec('tables_kick_players','id=<?php echo $_smarty_tpl->tpl_vars['table']->value->id;?>
');clearTimeout(refTimer);this.innerHTML='<img style=\'height:20px;\' src=\'templates/images/loading2.gif\'>';">Kick Players (<?php echo $_smarty_tpl->tpl_vars['table']->value->used_seats;?>
)</button>
			<?php }else{ ?>
				<button class="btn3d" style="width:90px;" id="enable_table_feedback_<?php echo $_smarty_tpl->tpl_vars['table']->value->id;?>
" onclick="exec('tables_enable_table','id=<?php echo $_smarty_tpl->tpl_vars['table']->value->id;?>
');clearTimeout(refTimer);this.innerHTML='<img style=\'height:20px;\' src=\'templates/images/loading2.gif\'>';">Enable Table</button>
				<button class="btn3d" style="width:90px;" onclick="ajaxWindow('tables_edit_table','Edit Table \'<?php echo $_smarty_tpl->tpl_vars['table']->value->title;?>
\'','id=<?php echo $_smarty_tpl->tpl_vars['table']->value->id;?>
');">Edit Table</button>
			<?php }?>
		</td>
	</tr>
<?php } ?><?php }} ?>