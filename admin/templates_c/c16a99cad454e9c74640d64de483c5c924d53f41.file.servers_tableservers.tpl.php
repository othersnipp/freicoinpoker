<?php /* Smarty version Smarty-3.1.3, created on 2014-02-06 15:13:15
         compiled from "./templates/bits/servers_tableservers.tpl" */ ?>
<?php /*%%SmartyHeaderCode:29977409452f3987bc7ddf0-97831181%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    'c16a99cad454e9c74640d64de483c5c924d53f41' => 
    array (
      0 => './templates/bits/servers_tableservers.tpl',
      1 => 1383938932,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '29977409452f3987bc7ddf0-97831181',
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
  'unifunc' => 'content_52f3987bcce05',
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_52f3987bcce05')) {function content_52f3987bcce05($_smarty_tpl) {?><?php  $_smarty_tpl->tpl_vars['server'] = new Smarty_Variable; $_smarty_tpl->tpl_vars['server']->_loop = false;
 $_from = $_smarty_tpl->tpl_vars['servers']->value; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array');}
foreach ($_from as $_smarty_tpl->tpl_vars['server']->key => $_smarty_tpl->tpl_vars['server']->value){
$_smarty_tpl->tpl_vars['server']->_loop = true;
?>				
	<tr class="tableData">
		<td valign=top class="info">
			<?php echo $_smarty_tpl->tpl_vars['server']->value->title;?>

		</td>
		<td valign=top class="info">
			<?php if ($_smarty_tpl->tpl_vars['server']->value->up==1){?>
				<img src="templates/images/ok.png"> Online
			<?php }else{ ?>
				<div class="error"><img src="templates/images/error.png"> Offline</div>
			<?php }?>
		</td>
		<td valign=top>
			<?php echo $_smarty_tpl->tpl_vars['server']->value->ip;?>
:<?php if ($_smarty_tpl->tpl_vars['server']->value->port==0){?>11211<?php }else{ ?><?php echo $_smarty_tpl->tpl_vars['server']->value->port;?>
<?php }?>
		</td>
		<td valign=top>
			<label class="info"><?php echo $_smarty_tpl->tpl_vars['server']->value->online;?>
</label>
			<img src="templates/images/icons/online.png" style="width:20px;height:20px;"> Online
			|
			<label class="info"><?php echo $_smarty_tpl->tpl_vars['server']->value->offline;?>
</label>
			<img src="templates/images/icons/offline.png" style="width:20px;height:20px;"> Offline
		</td>
		<td valign=top style="width:100px;text-align:center;">
			<button class="btn3d" style="width:80px;" onclick="ajaxWindow('servers_edit_server','Edit Server \'<?php echo $_smarty_tpl->tpl_vars['server']->value->title;?>
\'','id=<?php echo $_smarty_tpl->tpl_vars['server']->value->id;?>
');">Edit</button>
		</td>
	</tr>
<?php } ?><?php }} ?>