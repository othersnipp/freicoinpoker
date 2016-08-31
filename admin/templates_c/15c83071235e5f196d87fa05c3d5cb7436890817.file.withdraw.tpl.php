<?php /* Smarty version Smarty-3.1.3, created on 2014-03-07 13:29:03
         compiled from "./templates/withdraw.tpl" */ ?>
<?php /*%%SmartyHeaderCode:17441890005314372c7cd477-58657597%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    '15c83071235e5f196d87fa05c3d5cb7436890817' => 
    array (
      0 => './templates/withdraw.tpl',
      1 => 1394195339,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '17441890005314372c7cd477-58657597',
  'function' => 
  array (
  ),
  'version' => 'Smarty-3.1.3',
  'unifunc' => 'content_5314372c8247e',
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
<?php if ($_valid && !is_callable('content_5314372c8247e')) {function content_5314372c8247e($_smarty_tpl) {?><!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Strict//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-strict.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta name="keywords" content="" />
<meta name="description" content="" />
<meta http-equiv="content-type" content="text/html; charset=utf-8" />
<title>Withdraw | Withdraw</title>
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
				<h1><a href="#">Withdraw</a></h1>
				<p>Withdraw</p>
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
	<legend class="infoArea">Table Withdraw</legend>		
		<table style="width:100%;" cellspacing=0>
			<tr class="tableHead">
				<td valign=top>
					User Name
				</td>
				<td valign=top>
					Address
				</td>
				<td valign=top>
					Withdraw Amount
				</td>
				<td valign=top>
					Receive Amount
				</td>
				<td valign=top>
					DateCreated
				</td>
				<td valign=top>
					Status
				</td>
				<td valign=top>
					Action
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
						<?php echo $_smarty_tpl->tpl_vars['result']->value[$_smarty_tpl->getVariable('smarty')->value['section']['result']['index']]['display_name'];?>

							
						</td>
						<td valign=top class="info">
							<?php echo $_smarty_tpl->tpl_vars['result']->value[$_smarty_tpl->getVariable('smarty')->value['section']['result']['index']]['address'];?>

						</td>
						<td valign=top>
							<?php echo $_smarty_tpl->tpl_vars['result']->value[$_smarty_tpl->getVariable('smarty')->value['section']['result']['index']]['withdraw_amt'];?>

						</td>
						<td valign=top>
							<?php echo $_smarty_tpl->tpl_vars['result']->value[$_smarty_tpl->getVariable('smarty')->value['section']['result']['index']]['receive_amt'];?>

						</td>
						<td valign=top>
							<?php echo $_smarty_tpl->tpl_vars['result']->value[$_smarty_tpl->getVariable('smarty')->value['section']['result']['index']]['dateCreated'];?>

						</td>
						<td valign=top>
							<?php echo $_smarty_tpl->tpl_vars['result']->value[$_smarty_tpl->getVariable('smarty')->value['section']['result']['index']]['status'];?>

						</td>
						<td valign=top>
							<select name="option" id="option" onChange="doredirect(this.value);">
								<option value="">Select</option>
								<option value="approved">Approved</option>
								<option value="cancel">Cancel</option>
							</select>
							<input type="hidden" name="wid" id="wid" value="<?php echo $_smarty_tpl->tpl_vars['result']->value[$_smarty_tpl->getVariable('smarty')->value['section']['result']['index']]['id'];?>
">
							<input type="hidden" name="user_id" id="user_id" value="<?php echo $_smarty_tpl->tpl_vars['result']->value[$_smarty_tpl->getVariable('smarty')->value['section']['result']['index']]['user_id'];?>
">
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
	var user_id = $("#user_id").val();	
	if(option != "")
	{
	$.ajax({
		url:"updatewithdraw.php",		
		type:"POST",
		data:"option="+a+"&wid="+wid+"&user_id="+user_id,
		success:function(html){
			alert(html);						
			//alert("Status changed successfully");
			//window.location.href="withdraw.php";					
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