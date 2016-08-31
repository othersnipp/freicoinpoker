<?php /* Smarty version Smarty-3.1.3, created on 2014-03-06 12:59:57
         compiled from "./templates/coin.tpl" */ ?>
<?php /*%%SmartyHeaderCode:462811131531859369f3473-57311446%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    '86d6cd7cbd7fab3b45c13d2673c0c91af673cde7' => 
    array (
      0 => './templates/coin.tpl',
      1 => 1394107195,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '462811131531859369f3473-57311446',
  'function' => 
  array (
  ),
  'version' => 'Smarty-3.1.3',
  'unifunc' => 'content_53185936a56f2',
  'variables' => 
  array (
    '_PG' => 0,
    '_PAGE_TITLE' => 0,
    'err_msg' => 0,
    'ok_msg' => 0,
    'result' => 0,
    'i' => 0,
  ),
  'has_nocache_code' => false,
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_53185936a56f2')) {function content_53185936a56f2($_smarty_tpl) {?><!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Strict//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-strict.dtd">
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
								
							<div class="entry">
							<?php if ($_smarty_tpl->tpl_vars['err_msg']->value!=''){?><div class="error_div"><?php echo $_smarty_tpl->tpl_vars['err_msg']->value;?>
</div><?php }?>
							<?php if ($_smarty_tpl->tpl_vars['ok_msg']->value!=''){?><div class="ok_div"><?php echo $_smarty_tpl->tpl_vars['ok_msg']->value;?>
</div><?php }?>
<fieldset class="infoArea" style="width:auto;padding-left:20px;">
	<legend class="infoArea">Table Coins</legend>	
	<a href="addcoin.php" id="logo"><p>Add Coin</p></a>
		<table style="width:100%;" cellspacing=0>
			<tr class="tableHead">
				<td valign=top>
					No 
				</td>
				<td valign=top>
					Coin 
				</td>	
				<td valign=top>
					Action 
				</td>					
			</tr>
			<tbody>		
				<?php $_smarty_tpl->tpl_vars['i'] = new Smarty_variable(1, null, 0);?>
				<?php if (isset($_smarty_tpl->tpl_vars['smarty']->value['section']['result'])) unset($_smarty_tpl->tpl_vars['smarty']->value['section']['result']);
$_smarty_tpl->tpl_vars['smarty']->value['section']['result']['name'] = 'result';
$_smarty_tpl->tpl_vars['smarty']->value['section']['result']['loop'] = is_array($_loop=$_smarty_tpl->tpl_vars['result']->value) ? count($_loop) : max(0, (int)$_loop); unset($_loop);
$_smarty_tpl->tpl_vars['smarty']->value['section']['result']['show'] = true;
$_smarty_tpl->tpl_vars['smarty']->value['section']['result']['max'] = $_smarty_tpl->tpl_vars['smarty']->value['section']['result']['loop'];
$_smarty_tpl->tpl_vars['smarty']->value['section']['result']['step'] = 1;
$_smarty_tpl->tpl_vars['smarty']->value['section']['result']['start'] = $_smarty_tpl->tpl_vars['smarty']->value['section']['result']['step'] > 0 ? 0 : $_smarty_tpl->tpl_vars['smarty']->value['section']['result']['loop']-1;
if ($_smarty_tpl->tpl_vars['smarty']->value['section']['result']['show']) {
    $_smarty_tpl->tpl_vars['smarty']->value['section']['result']['total'] = $_smarty_tpl->tpl_vars['smarty']->value['section']['result']['loop'];
    if ($_smarty_tpl->tpl_vars['smarty']->value['section']['result']['total'] == 0)
        $_smarty_tpl->tpl_vars['smarty']->value['section']['result']['show'] = false;
} else
    $_smarty_tpl->tpl_vars['smarty']->value['section']['result']['total'] = 0;
if ($_smarty_tpl->tpl_vars['smarty']->value['section']['result']['show']):

            for ($_smarty_tpl->tpl_vars['smarty']->value['section']['result']['index'] = $_smarty_tpl->tpl_vars['smarty']->value['section']['result']['start'], $_smarty_tpl->tpl_vars['smarty']->value['section']['result']['iteration'] = 1;
                 $_smarty_tpl->tpl_vars['smarty']->value['section']['result']['iteration'] <= $_smarty_tpl->tpl_vars['smarty']->value['section']['result']['total'];
                 $_smarty_tpl->tpl_vars['smarty']->value['section']['result']['index'] += $_smarty_tpl->tpl_vars['smarty']->value['section']['result']['step'], $_smarty_tpl->tpl_vars['smarty']->value['section']['result']['iteration']++):
$_smarty_tpl->tpl_vars['smarty']->value['section']['result']['rownum'] = $_smarty_tpl->tpl_vars['smarty']->value['section']['result']['iteration'];
$_smarty_tpl->tpl_vars['smarty']->value['section']['result']['index_prev'] = $_smarty_tpl->tpl_vars['smarty']->value['section']['result']['index'] - $_smarty_tpl->tpl_vars['smarty']->value['section']['result']['step'];
$_smarty_tpl->tpl_vars['smarty']->value['section']['result']['index_next'] = $_smarty_tpl->tpl_vars['smarty']->value['section']['result']['index'] + $_smarty_tpl->tpl_vars['smarty']->value['section']['result']['step'];
$_smarty_tpl->tpl_vars['smarty']->value['section']['result']['first']      = ($_smarty_tpl->tpl_vars['smarty']->value['section']['result']['iteration'] == 1);
$_smarty_tpl->tpl_vars['smarty']->value['section']['result']['last']       = ($_smarty_tpl->tpl_vars['smarty']->value['section']['result']['iteration'] == $_smarty_tpl->tpl_vars['smarty']->value['section']['result']['total']);
?>	
					<tr>
						<td valign=top style="text-align: center;">
						<?php echo $_smarty_tpl->tpl_vars['i']->value;?>
							
						</td>		
						<td valign=top style="text-align: center;">
						<?php echo $_smarty_tpl->tpl_vars['result']->value[$_smarty_tpl->getVariable('smarty')->value['section']['result']['index']]['coin'];?>
							
						</td>
						<td style="text-align: center;"><a href="deletecoin.php?id=<?php echo $_smarty_tpl->tpl_vars['result']->value[$_smarty_tpl->getVariable('smarty')->value['section']['result']['index']]['id'];?>
"><img src="templates/images/error.png" alt="delete" title="delete this coin"></a></td>						
					</tr>	
					<input type="hidden" value="<?php echo $_smarty_tpl->tpl_vars['i']->value++;?>
">
				
				<?php endfor; endif; ?>			
			<tbody>
		</table>
</fieldset>
<?php }} ?>