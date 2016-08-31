<?php /* Smarty version Smarty-3.1.3, created on 2014-03-22 09:00:01
         compiled from "./templates/header.tpl" */ ?>
<?php /*%%SmartyHeaderCode:2067950688531416a5e3dec3-34907009%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    '97c13ae6868bbc459509c9f1b968154acd23eecc' => 
    array (
      0 => './templates/header.tpl',
      1 => 1395475200,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '2067950688531416a5e3dec3-34907009',
  'function' => 
  array (
  ),
  'version' => 'Smarty-3.1.3',
  'unifunc' => 'content_531416a5ea85a',
  'variables' => 
  array (
    'javascript_files' => 0,
    'file' => 0,
    'MSG' => 0,
    'player' => 0,
    'message_with' => 0,
  ),
  'has_nocache_code' => false,
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_531416a5ea85a')) {function content_531416a5ea85a($_smarty_tpl) {?><!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html>
<head>
	<meta http-equiv="content-type" content="text/html; charset=UTF-8" />
	<script src="includes/js/functions.js" type="text/javascript"></script>
	<script src="includes/js/ajax.js" type="text/javascript"></script>
	<script src="includes/js/new/jquery.min.js" type="text/javascript"></script>
	<script src="includes/js/new/jquery-ui.min.js" type="text/javascript"></script>

	<?php  $_smarty_tpl->tpl_vars['file'] = new Smarty_Variable; $_smarty_tpl->tpl_vars['file']->_loop = false;
 $_from = $_smarty_tpl->tpl_vars['javascript_files']->value; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array');}
foreach ($_from as $_smarty_tpl->tpl_vars['file']->key => $_smarty_tpl->tpl_vars['file']->value){
$_smarty_tpl->tpl_vars['file']->_loop = true;
?>
		<script src="includes/js/<?php echo $_smarty_tpl->tpl_vars['file']->value;?>
" type="text/javascript"></script>
	<?php } ?>

	<script src="includes/js/soundManager/soundmanager2-nodebug-jsmin.js" type="text/javascript"></script>


	<script src="includes/js/system.js" type="text/javascript"></script>
	<script src="includes/js/events.js" type="text/javascript"></script>
	<script src="includes/js/game/tables.js" type="text/javascript"></script>

	<link rel="stylesheet" href="templates/css/style.css"/> 
	<link rel="stylesheet" href="templates/css/vader/jquery-ui-1.8.18.custom.css"/> 

	<title>Freicoin Poker</title>
	<script>
	<?php if ($_smarty_tpl->tpl_vars['MSG']->value!=''){?>
		alert('<?php echo $_smarty_tpl->tpl_vars['MSG']->value;?>
');
		window.location='/';
	<?php }?>
	</script>
</head>
<body>

<div id="outline">
<div id="header">
        <div id="logo"><img src="../images/fplogo.png">
	</div>
<?php if (isset($_smarty_tpl->tpl_vars['player']->value->id)&&$_smarty_tpl->tpl_vars['player']->value->id>0){?>

	<div id="head_action">

	<div id="user_info"><b>
		<span id="welcome_span">Welcome <?php echo $_smarty_tpl->tpl_vars['player']->value->display_name;?>
 </span> :: 
		<span id="balance_span555"><?php echo $_smarty_tpl->tpl_vars['player']->value->balance;?>
 Chips</span> :: 
		<a href="javascript:void(0);" id='depositlink' onclick="loadDepositWindow('lobby_deposit','Buy Coins');">Deposit</a> :: <a href="javascript:void(0);" onclick="ajaxWindow('lobby_withdraw','Withdraw');">Withdraw</a> :: <a href="#">Settings</a><img src="templates/images/blankspace10.png" align="top"></b>
        	<?php if ($_smarty_tpl->tpl_vars['player']->value->user_type=='normal'){?><span id="logout_span"><a href="javascript:;" onclick="set_loading();player.logout();"><img src="templates/images/btn/Logout.png" onmouseover="this.src='templates/images/btn/Logout_hover.png';" onmouseout="this.src='templates/images/btn/Logout.png';" style="position: relative; top: -3px; right: -3px;"></a></span><?php }?>
	</div>
	</div>
<?php }else{ ?>
	<div id="login_head">
	<table>
	<tr>
		<td colspan="4" style="height:50px">
		</td>
	</tr>
	<tr>
		<td style="width:150px; height:24px;">
		</td>
		<td style="width:200px; height:24px;">E-mail: <input type="text" id="login_email">
		</td>
		<td style="width:200px; height:24px;">Password: <input type="password" id="login_pass" onkeypress="if(event.keyCode==13) player.login();">
		</td>
		<td style="width:50px; height:24px;"><img src="templates/images/btn/login.png" onclick="player.login();" onmouseover="this.src='templates/images/btn/login_hover.png';" onmouseout="this.src='templates/images/btn/login.png';">
		</td>
	</tr>
	<tr>
		<td colspan="4" align="right" valign="top">
		<div class="forgotpwd"><a href="javascript:void(0);" onclick="player.resetpwd();">Forgot Password?</a></div>
		</td>
	</tr>
	</table>
	</div>
<?php }?>
	
    <?php if ($_smarty_tpl->tpl_vars['message_with']->value!=''){?> 
   <p style="width: 297px; margin: 146px 0px 0px 150px; color: green;"> <?php echo $_smarty_tpl->tpl_vars['message_with']->value;?>
</p>
    <?php }?>

<script>


</script>

<?php }} ?>