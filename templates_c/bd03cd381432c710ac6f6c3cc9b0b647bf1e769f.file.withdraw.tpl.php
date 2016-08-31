<?php /* Smarty version Smarty-3.1.3, created on 2014-03-24 11:03:18
         compiled from "./templates/windows/lobby/withdraw.tpl" */ ?>
<?php /*%%SmartyHeaderCode:9841356885329858f42fa04-37392626%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    'bd03cd381432c710ac6f6c3cc9b0b647bf1e769f' => 
    array (
      0 => './templates/windows/lobby/withdraw.tpl',
      1 => 1395655387,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '9841356885329858f42fa04-37392626',
  'function' => 
  array (
  ),
  'version' => 'Smarty-3.1.3',
  'unifunc' => 'content_5329858f45678',
  'variables' => 
  array (
    'ADDR' => 0,
    'NEWTIME' => 0,
    'FRC' => 0,
    'CHIPS' => 0,
  ),
  'has_nocache_code' => false,
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_5329858f45678')) {function content_5329858f45678($_smarty_tpl) {?><!--<?php if ($_smarty_tpl->tpl_vars['ADDR']->value!=0){?>
<?php echo $_smarty_tpl->tpl_vars['NEWTIME']->value;?>

<br>
<br>
Address: <?php echo $_smarty_tpl->tpl_vars['ADDR']->value;?>
</br>
Freicoins deposited: <?php echo $_smarty_tpl->tpl_vars['FRC']->value;?>
<br>
Chips o the way to your account :<?php echo $_smarty_tpl->tpl_vars['CHIPS']->value;?>

<?php }else{ ?>
No Data Available.
<?php }?>-->
<p id="id_error" style="color:red;"></p>
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
		<td><?php echo $_smarty_tpl->tpl_vars['CHIPS']->value;?>
 Chips</td>
		</tr>
		<tr>
		<td>Your FC: </td>
		<td><?php echo $_smarty_tpl->tpl_vars['FRC']->value;?>
</td>
		</tr>
		<tr>
		<td>Chips to withdrawal:</td>
		<td><input type="text" onchange="coins_withdraw_calc()" maxlength="15" onkeyup="coins_withdraw_calc()" id="sum" name="sum" autocomplete="off"><span id="err"> Chips</span></td>
		</tr>
		<tr>
		<td>You will receive:</td>
		<td><input type="text" onchange="coins_withdraw_calc(1)" onkeyup="coins_withdraw_calc(1)" id="wd_sum" name="wd_sum" maxlength="15" autocomplete="off"> Chips</td>
		</tr>
		</tbody></table>
		<input type="hidden" id="token" value="82db1ce7e5a34556f64f2b1378cf4ce986d9bf2e7222e695f81a649de6941c3c">
		<input type="hidden" id="cryptocurrency" value="Chips">
		<input type="button" name="submit" value="Withdrawal" onclick="validate_withdraw();">
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
<?php }} ?>