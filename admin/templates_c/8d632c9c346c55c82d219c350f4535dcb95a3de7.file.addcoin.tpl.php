<?php /* Smarty version Smarty-3.1.3, created on 2014-03-06 12:51:11
         compiled from "./templates/addcoin.tpl" */ ?>
<?php /*%%SmartyHeaderCode:26264774453186004e89500-09467997%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    '8d632c9c346c55c82d219c350f4535dcb95a3de7' => 
    array (
      0 => './templates/addcoin.tpl',
      1 => 1394106668,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '26264774453186004e89500-09467997',
  'function' => 
  array (
  ),
  'version' => 'Smarty-3.1.3',
  'unifunc' => 'content_53186004eddd5',
  'variables' => 
  array (
    '_PG' => 0,
    '_PAGE_TITLE' => 0,
    'message' => 0,
    'error' => 0,
    'err_msg' => 0,
    'ok_msg' => 0,
  ),
  'has_nocache_code' => false,
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_53186004eddd5')) {function content_53186004eddd5($_smarty_tpl) {?><!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Strict//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-strict.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta name="keywords" content="" />
<meta name="description" content="" />
<meta http-equiv="content-type" content="text/html; charset=utf-8" />
<title>Manage Coin | Manage Coin</title>
<link href="http://fonts.googleapis.com/css?family=Oswald" rel="stylesheet" type="text/css" />
<link href='http://fonts.googleapis.com/css?family=Arvo' rel='stylesheet' type='text/css'>
<link href="templates/style/style.css" rel="stylesheet" type="text/css" media="screen" />
<link href="templates/style/okitoo_style.css" rel="stylesheet" type="text/css" media="screen" />
	<script src="includes/js/functions.js" type="text/javascript"></script>
	<script src="includes/js/ajax.js" type="text/javascript"></script>
</head>
<body>

<div id="wrapper">
	<div id="header-wrapper">
		<div id="header">
			<div id="logo">
				<h1><a href="#">Manage Coin</a></h1>
				<p> Manage Coin</p>
			</div>
		</div>
	</div>
	<!-- end #header -->
	<div id="menu-wrapper">
		<div id="menu">
			<ul>
				<li><a href="index.php">Main</a></li>
				
					<li><a href="#">Daily Report</a></li>
					<li><a href="#">Reports</a></li>
					<li><a href="#">Stats</a></li>
					<li><a href="#">Servers Map</a></li>
					<li><a href="index.php?action=logout">Logout</a></li>
				
			</ul>
		</div>
	</div>
	<!-- end #menu -->
	<div id="page">
		<div id="page-bgtop">
			<div id="page-bgbtm">
				<div id="page-content">
					<div id="content">
			
						<div class="post">
							<h2 class="title"><a href="index.php?pg=<?php echo $_smarty_tpl->tpl_vars['_PG']->value;?>
"><?php echo $_smarty_tpl->tpl_vars['_PAGE_TITLE']->value;?>
</a></h2>
			
							
							<p class="meta"><hr></p>
							<?php if (isset($_smarty_tpl->tpl_vars['message']->value)){?>
							<div id="message" style="color:#53850A;"><?php echo $_smarty_tpl->tpl_vars['message']->value;?>
</div>
							<?php }?>
							<?php if (isset($_smarty_tpl->tpl_vars['error']->value)){?>
							<div id="error" style="color:#E51E33;"><?php echo $_smarty_tpl->tpl_vars['error']->value;?>
</div>
							<?php }?>	
							<div class="entry">
							<?php if ($_smarty_tpl->tpl_vars['err_msg']->value!=''){?><div class="error_div"><?php echo $_smarty_tpl->tpl_vars['err_msg']->value;?>
</div><?php }?>
							<?php if ($_smarty_tpl->tpl_vars['ok_msg']->value!=''){?><div class="ok_div"><?php echo $_smarty_tpl->tpl_vars['ok_msg']->value;?>
</div><?php }?>
							<fieldset class="infoArea" style="width:auto;padding-left:20px;">
								<legend class="infoArea">Table Coins</legend>	
								<a href="coin.php" id="logo"><p>Manage Coin</p></a>
								<form name="addcoin" id="addcoin" method="post">
								<table>
									<tr>
										<td>Coin Name</td>
										<td><input type="text" id="coinname" name="coinname"></td>
									</tr>
									<tr>
										<td>&nbsp;</td>
										<td><input type="submit" name="submit" value="submit"></td>
									</tr>
								</table>
								</form>
							</fieldset>
<?php }} ?>