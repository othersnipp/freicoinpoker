<?php /* Smarty version Smarty-3.1.3, created on 2014-03-05 12:19:43
         compiled from "./templates/deposit.tpl" */ ?>
<?php /*%%SmartyHeaderCode:18563388675317070b3ede83-14787581%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    '361a39af849b8eed356c2d3d668f7d37e7b192d9' => 
    array (
      0 => './templates/deposit.tpl',
      1 => 1394018380,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '18563388675317070b3ede83-14787581',
  'function' => 
  array (
  ),
  'version' => 'Smarty-3.1.3',
  'unifunc' => 'content_5317070b47926',
  'variables' => 
  array (
    '_PG' => 0,
    '_PAGE_TITLE' => 0,
    'err_msg' => 0,
    'ok_msg' => 0,
    'result' => 0,
  ),
  'has_nocache_code' => false,
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_5317070b47926')) {function content_5317070b47926($_smarty_tpl) {?><?php if (!is_callable('smarty_modifier_truncate')) include '/home/fedde/beta.freicoinpoker.com/admin/includes/modules/smarty/plugins/modifier.truncate.php';
?><!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Strict//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-strict.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta name="keywords" content="" />
<meta name="description" content="" />
<meta http-equiv="content-type" content="text/html; charset=utf-8" />
<title>Deposit | Deposit</title>
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
				<h1><a href="#">Deposit</a></h1>
				<p>Deposit</p>
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
	<legend class="infoArea">Table Deposit</legend>		
		<table style="width:100%;" cellspacing=0>
			<tr class="tableHead">
				<td valign=top>
					Account
				</td>
				<td valign=top>
					Address
				</td>
				<td valign=top>
					Amount
				</td>
				<td valign=top>
					Confirmation
				</td>				
			</tr>
			<tbody>		
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
						<td valign=top>
						<?php echo $_smarty_tpl->tpl_vars['result']->value[$_smarty_tpl->getVariable('smarty')->value['section']['result']['index']]['account_name'];?>

							
						</td>
						<td valign=top class="info">
							<?php echo $_smarty_tpl->tpl_vars['result']->value[$_smarty_tpl->getVariable('smarty')->value['section']['result']['index']]['address'];?>

						</td>
						<td valign=top>
							<?php echo smarty_modifier_truncate($_smarty_tpl->tpl_vars['result']->value[$_smarty_tpl->getVariable('smarty')->value['section']['result']['index']]['amount'],10,"---");?>

						</td>
						<td valign=top>
							<?php echo $_smarty_tpl->tpl_vars['result']->value[$_smarty_tpl->getVariable('smarty')->value['section']['result']['index']]['confirmation'];?>

						</td>						
					</tr>
				<?php endfor; endif; ?>			
			<tbody>
		</table>
</fieldset>

<!---->
<script src="includes/js/jquery.js" type="text/javascript"></script>
<script language="JavaScript" type="text/JavaScript"> 
<!-- 
function doredirect(a) { 
	var wid = $("#wid").val();	
	if(option != "")
	{
	$.ajax({
		url:"updatewithdraw.php",		
		type:"POST",
		data:"option="+a+"&wid="+wid,
		success:function(html){
			//alert(html);						
			alert("Status changed successfully");
			window.location.href="withdraw.php";					
		}
		});		
	}
	else
	{
		alert("Choose your status");
	}
} 
--> 
</script><!----><?php }} ?>