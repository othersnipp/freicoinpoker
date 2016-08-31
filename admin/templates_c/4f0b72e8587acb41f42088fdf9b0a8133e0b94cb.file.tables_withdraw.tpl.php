<?php /* Smarty version Smarty-3.1.3, created on 2014-03-03 09:38:01
         compiled from "./templates/bits/tables_withdraw.tpl" */ ?>
<?php /*%%SmartyHeaderCode:169175426253143f69a45425-48134527%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    '4f0b72e8587acb41f42088fdf9b0a8133e0b94cb' => 
    array (
      0 => './templates/bits/tables_withdraw.tpl',
      1 => 1393835195,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '169175426253143f69a45425-48134527',
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
  'unifunc' => 'content_53143f69a73fc',
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_53143f69a73fc')) {function content_53143f69a73fc($_smarty_tpl) {?><?php  $_smarty_tpl->tpl_vars['table'] = new Smarty_Variable; $_smarty_tpl->tpl_vars['table']->_loop = false;
 $_from = $_smarty_tpl->tpl_vars['tables']->value; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array');}
foreach ($_from as $_smarty_tpl->tpl_vars['table']->key => $_smarty_tpl->tpl_vars['table']->value){
$_smarty_tpl->tpl_vars['table']->_loop = true;
?>				
	<tr class="tableData">		
		<td valign=top class="info">
			<?php echo $_smarty_tpl->tpl_vars['table']->value->user_id;?>

		</td>
		<td valign=top>
			<?php echo $_smarty_tpl->tpl_vars['table']->value->address;?>

		</td>
		<td valign=top>
			<?php echo $_smarty_tpl->tpl_vars['table']->value->withdraw_amt;?>

		</td>
		<td valign=top>
			<?php echo $_smarty_tpl->tpl_vars['table']->value->receive_amt;?>

		</td>
		<td valign=top>
			<?php echo $_smarty_tpl->tpl_vars['table']->value->status;?>

		</td>
		
	</tr>
<?php } ?><?php }} ?>