<?php /* Smarty version Smarty-3.1.3, created on 2014-02-06 14:55:37
         compiled from "./templates/login.tpl" */ ?>
<?php /*%%SmartyHeaderCode:208071052752f39459ca5812-58114220%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    'f5f63cf8bf5077cbe9e40e023158dd20352e878a' => 
    array (
      0 => './templates/login.tpl',
      1 => 1383938934,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '208071052752f39459ca5812-58114220',
  'function' => 
  array (
  ),
  'variables' => 
  array (
    'login_user' => 0,
    'login_pass' => 0,
  ),
  'has_nocache_code' => false,
  'version' => 'Smarty-3.1.3',
  'unifunc' => 'content_52f39459cc487',
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_52f39459cc487')) {function content_52f39459cc487($_smarty_tpl) {?><div class="infoArea" style="margin:auto;height:200px;width:400px;">

	<form method="post">
		<input type=hidden name="action" value="login">
		<table style="margin:auto;">
			<tr>
				<td valign=top>
					Administrator :
				</td>
				<td valign=top>
					<input type=text class="textArea" name="login_user" value="<?php echo $_smarty_tpl->tpl_vars['login_user']->value;?>
">
				</td>
			</tr>
			<tr>
				<td valign=top>
					Password :
				</td>
				<td valign=top>
					<input type=password class="textArea" name="login_pass" value="<?php echo $_smarty_tpl->tpl_vars['login_pass']->value;?>
">
				</td>
			</tr>
			<tr>
				<td valign=top>
					<a href="index.php?pg=forgot" class="note">[?] Forgot Password</a>
				</td>
				<td valign=top align=center>
					<input type=submit class="btn3d" value="Login">
				</td>
			</tr>
		</table>
	</form>

</div><?php }} ?>