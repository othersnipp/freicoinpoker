<?php /* Smarty version Smarty-3.1.3, created on 2014-03-06 14:10:19
         compiled from "./templates/withdraw.tpl" */ ?>
<?php /*%%SmartyHeaderCode:1978012351531418421d3b37-41248884%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    '15c83071235e5f196d87fa05c3d5cb7436890817' => 
    array (
      0 => './templates/withdraw.tpl',
      1 => 1394111416,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '1978012351531418421d3b37-41248884',
  'function' => 
  array (
  ),
  'version' => 'Smarty-3.1.3',
  'unifunc' => 'content_5314184223466',
  'variables' => 
  array (
    'javascript_files' => 0,
    'file' => 0,
    'MSG' => 0,
    'player' => 0,
    'message' => 0,
    'error' => 0,
    'your_array' => 0,
  ),
  'has_nocache_code' => false,
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_5314184223466')) {function content_5314184223466($_smarty_tpl) {?><!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
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
    <div id="register_div" style="margin: 139px 0 33px 354px;">
		<?php if (isset($_smarty_tpl->tpl_vars['message']->value)){?>
		<div id="message" style="color:#53850A;"><?php echo $_smarty_tpl->tpl_vars['message']->value;?>
</div>
		<?php }?>
		<?php if (isset($_smarty_tpl->tpl_vars['error']->value)){?>
		<div id="error" style="color:#E51E33;"><?php echo $_smarty_tpl->tpl_vars['error']->value;?>
</div>
		<?php }?>
		<form name="withdraw" id="withdraw" method="post">
		<div class="cls_main_block">
		<h3>Withdrawal Chips</h3>
		<div class="row-fluid">
		<div class="span7">
		<table>
		<tbody>		
		<tr>
		<td>Address:</td>
		<td><input type="text" name="address" id="address" autocomplete="off"></td>
		</tr>
		<tr>
		<td>Your Chips: </td>
		<td><?php if ($_smarty_tpl->tpl_vars['your_array']->value[0]['amount']==0){?>  0 <?php }else{ ?> <?php echo (sprintf("%.2f",$_smarty_tpl->tpl_vars['your_array']->value[0]['amount']))*100;?>
 <?php }?> Chips</td>
		</tr>
		<tr>
		<td>Your FC: </td>
		<td><?php if ($_smarty_tpl->tpl_vars['your_array']->value[0]['amount']==0){?>  0 <?php }else{ ?> <?php echo sprintf("%.4f",$_smarty_tpl->tpl_vars['your_array']->value[0]['amount']);?>
 <?php }?> Chips</td>
		</tr>
		<tr>
		<td>Amout to withdrawal:</td>
		<td><input type="text" onchange="coins_withdraw_calc()" maxlength="15" onkeyup="coins_withdraw_calc()" id="sum" name="sum" autocomplete="off"><span> Chips</span></td>
		</tr>
		<tr>
		<td>You will receive:</td>
		<td><input type="text" onchange="coins_withdraw_calc(1)" onkeyup="coins_withdraw_calc(1)" id="wd_sum" name="wd_sum" maxlength="15" autocomplete="off"> Chips</td>
		</tr>
		</tbody></table>
		<input type="hidden" id="token" value="82db1ce7e5a34556f64f2b1378cf4ce986d9bf2e7222e695f81a649de6941c3c">
		<input type="hidden" id="cryptocurrency" value="Chips">
		<input type="submit" name="submit" value="Withdrawal">
		<!--<button type="button" class="btn btn-warning" onclick="Coinwithdrawal(0);">Withdrawal</button>
		<button type="button" class="btn btn-success">make BTC-E CODE</button>-->
		</div>
		<div class="span4 pull-right">
		<div class="withdrawal_rht">
		<p>* Min amount for withdrawal - <span id="min_value">50</span> Chips.</p>
		<p>* Be patient, transfer of funds will be before the first confirmation.</p>
		<p>* Fee for withdrawal is <span id="coin_fee">1</span> Chips.</p>		
		</div>
		</div>
		</div>
		</div>
		</form>
		</div>
        
        
        
    <?php }?>
	
<!----><script language="JavaScript" type="text/JavaScript"> 
<!-- 
function coins_withdraw_calc(a) { 
  var b=/^[0-9.]{1,}$/i,c=Number($("#sum").val()),d=Number($("#wd_sum").val()),e=$("#coin_fee").html();b.test(d)&&1==a?(a=d+e,0>a&&(a=0),$("#sum").val(1*a.toFixed(8))):b.test(c)&&b.test(d)?(a=c-e,0>a&&(a=0),$("#wd_sum").val(1*a.toFixed(8))):a?$("#sum").val("0"):$("#wd_sum").val("0")
} 
--> 
</script><!----><?php }} ?>