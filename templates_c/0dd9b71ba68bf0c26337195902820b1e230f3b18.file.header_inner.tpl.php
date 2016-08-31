<?php /* Smarty version Smarty-3.1.3, created on 2014-03-06 13:51:20
         compiled from "./templates/header_inner.tpl" */ ?>
<?php /*%%SmartyHeaderCode:346256056531416d59a5463-55531639%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    '0dd9b71ba68bf0c26337195902820b1e230f3b18' => 
    array (
      0 => './templates/header_inner.tpl',
      1 => 1394110277,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '346256056531416d59a5463-55531639',
  'function' => 
  array (
  ),
  'version' => 'Smarty-3.1.3',
  'unifunc' => 'content_531416d5a074e',
  'variables' => 
  array (
    'javascript_files' => 0,
    'file' => 0,
    'MSG' => 0,
    'player' => 0,
    'coin_address' => 0,
    'your_array' => 0,
  ),
  'has_nocache_code' => false,
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_531416d5a074e')) {function content_531416d5a074e($_smarty_tpl) {?><!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
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
    

<?php if (isset($_smarty_tpl->tpl_vars['player']->value['player']->id)&&$_smarty_tpl->tpl_vars['player']->value['player']->id>0){?>

	<div id="head_action">

	<div id="user_info"><b>
		<span id="welcome_span">Welcome <?php echo $_smarty_tpl->tpl_vars['player']->value['player']->display_name;?>
</span> :: 
		<span id="balance_span">($<?php echo $_smarty_tpl->tpl_vars['player']->value['player']->balance;?>
)</span> :: 
		<a href="deposit_coin.php" id='depositlink' >Deposit</a> :: <a href="withdraw.php">Withdraw</a> :: <a href="#">Settings</a><img src="templates/images/blankspace10.png" align="top"></b>
        	<span id="logout_span"><a href="javascript:;" onclick="set_loading();player.logout();"><img src="templates/images/btn/Logout.png" onmouseover="this.src='templates/images/btn/Logout_hover.png';" onmouseout="this.src='templates/images/btn/Logout.png';" style="position: relative; top: -3px; right: -3px;"></a></span>
	</div>
	</div>
    
    <div>&nbsp; </div>
    
    <br />
    <br />
    <br />
    <div id="register_div" style="margin: 139px 0 33px 354px; width:535px; height:100px";>
		<table>
		<tbody><tr>
			<td >Your Unique  Freicoin Address:
			</td>

			<td><?php echo $_smarty_tpl->tpl_vars['coin_address']->value;?>
	</td></tr>
			<tr><td>&nbsp;</td></tr>
			<tr><td>Date :</td><td><?php echo $_smarty_tpl->tpl_vars['your_array']->value[0]['dateCreated'];?>
</td></tr>
<tr><td>&nbsp;</td></tr>
			<tr><td>Amount :</td>
			<td><?php if ($_smarty_tpl->tpl_vars['your_array']->value[0]['amount']==0){?>  0 <?php }else{ ?> <?php echo (sprintf("%.2f",$_smarty_tpl->tpl_vars['your_array']->value[0]['amount']))*100;?>
 <?php }?> Chips</td>
			</tr>
			<tr>
			<td>FC : <?php echo sprintf("%.4f",$_smarty_tpl->tpl_vars['your_array']->value[0]['amount']);?>
</td>			
			</tr>		
		</tbody></table>
		</div>
        
        
        
    <?php }?><?php }} ?>