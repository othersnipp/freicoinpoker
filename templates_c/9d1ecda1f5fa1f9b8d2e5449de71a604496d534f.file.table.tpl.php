<?php /* Smarty version Smarty-3.1.3, created on 2014-03-03 15:34:38
         compiled from "./templates/table.tpl" */ ?>
<?php /*%%SmartyHeaderCode:935382183531492ff0030c4-88269038%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    '9d1ecda1f5fa1f9b8d2e5449de71a604496d534f' => 
    array (
      0 => './templates/table.tpl',
      1 => 1383938782,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '935382183531492ff0030c4-88269038',
  'function' => 
  array (
  ),
  'variables' => 
  array (
    'table' => 0,
  ),
  'has_nocache_code' => false,
  'version' => 'Smarty-3.1.3',
  'unifunc' => 'content_531492ff06990',
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_531492ff06990')) {function content_531492ff06990($_smarty_tpl) {?><div id="in_table">
	<div id="buy_in_div">
		<img src="templates/images/close.png" style="float:right;cursor:pointer;" onclick="getObj('buy_in_div').style.display='none';">
		Buy in to table :
			<div style="padding-left:20px;">
				<table>
					<tr><td>Max : </td><td>$<?php echo $_smarty_tpl->tpl_vars['table']->value->getMaxBuy();?>
</td></tr>
					<tr><td>Min : </td><td>$<?php echo $_smarty_tpl->tpl_vars['table']->value->getMinBuy();?>
</td></tr>
				</table>
			</div>
			Amount : <input type=text id="buy_in_amount" class="btn3d" value="<?php echo $_smarty_tpl->tpl_vars['table']->value->getMinBuy();?>
" style="width:200px;border:2px solid #f7f6ea;"><br>
			<button class="btn3d" style="margin-left:65px;margin-top:15px;width:90px;height:35px;font-size:16px;" onclick="table.seatPlayer();soundManager.play('sit');">Buy in</button>
			<input type=hidden id="buy_in_seat" value='0'>
	</div>
	
	<div id="turn_div">
		<table>
			<tr>
				<td align=center>
					<button class="btn3d" id="btn_check" style="display:none;width:130px;height:45px;" onclick="player.call();table.hideTurn();soundManager.play('check');">Check</button>
					<button class="btn3d" id="btn_call" style="width:130px;height:45px;" onclick="player.call();table.hideTurn();soundManager.play('call');">Call $500</button>
				</td>
				<td align=center>
					<button class="btn3d" style="width:130px;height:45px;" onclick="player.fold();table.hideTurn();soundManager.play('fold');">Fold</button>
				</td>
			</tr>
			<tr>
				<td align=center style="position:relative;">
					<input type=text id="txt_rise" class="btn3d" value="1000" style="margin-top:-10px;border:3px solid white;width:115px;height:15px;"><br>
					<div id="slider" style="top: 10px;width:108px;left:-1px;"></div>
				</td>
				<td align=center>
					<button class="btn3d" style="width:130px;height:45px;" onclick="player.rise();table.hideTurn();soundManager.play('check');">Raise</button>
				</td>
			</tr>
		</table>
	</div>
	
</div>
<img src="templates/images/cards/ac.png" style="display:none;">
<img src="templates/images/cards/2c.png" style="display:none;">
<img src="templates/images/cards/3c.png" style="display:none;">
<img src="templates/images/cards/4c.png" style="display:none;">
<img src="templates/images/cards/5c.png" style="display:none;">
<img src="templates/images/cards/6c.png" style="display:none;">
<img src="templates/images/cards/7c.png" style="display:none;">
<img src="templates/images/cards/8c.png" style="display:none;">
<img src="templates/images/cards/9c.png" style="display:none;">
<img src="templates/images/cards/tc.png" style="display:none;">
<img src="templates/images/cards/jc.png" style="display:none;">
<img src="templates/images/cards/qc.png" style="display:none;">
<img src="templates/images/cards/kc.png" style="display:none;">

<img src="templates/images/cards/ad.png" style="display:none;">
<img src="templates/images/cards/2d.png" style="display:none;">
<img src="templates/images/cards/3d.png" style="display:none;">
<img src="templates/images/cards/4d.png" style="display:none;">
<img src="templates/images/cards/5d.png" style="display:none;">
<img src="templates/images/cards/6d.png" style="display:none;">
<img src="templates/images/cards/7d.png" style="display:none;">
<img src="templates/images/cards/8d.png" style="display:none;">
<img src="templates/images/cards/9d.png" style="display:none;">
<img src="templates/images/cards/td.png" style="display:none;">
<img src="templates/images/cards/jd.png" style="display:none;">
<img src="templates/images/cards/qd.png" style="display:none;">
<img src="templates/images/cards/kd.png" style="display:none;">

<img src="templates/images/cards/ah.png" style="display:none;">
<img src="templates/images/cards/2h.png" style="display:none;">
<img src="templates/images/cards/3h.png" style="display:none;">
<img src="templates/images/cards/4h.png" style="display:none;">
<img src="templates/images/cards/5h.png" style="display:none;">
<img src="templates/images/cards/6h.png" style="display:none;">
<img src="templates/images/cards/7h.png" style="display:none;">
<img src="templates/images/cards/8h.png" style="display:none;">
<img src="templates/images/cards/9h.png" style="display:none;">
<img src="templates/images/cards/th.png" style="display:none;">
<img src="templates/images/cards/jh.png" style="display:none;">
<img src="templates/images/cards/qh.png" style="display:none;">
<img src="templates/images/cards/kh.png" style="display:none;">

<img src="templates/images/cards/as.png" style="display:none;">
<img src="templates/images/cards/2s.png" style="display:none;">
<img src="templates/images/cards/3s.png" style="display:none;">
<img src="templates/images/cards/4s.png" style="display:none;">
<img src="templates/images/cards/5s.png" style="display:none;">
<img src="templates/images/cards/6s.png" style="display:none;">
<img src="templates/images/cards/7s.png" style="display:none;">
<img src="templates/images/cards/8s.png" style="display:none;">
<img src="templates/images/cards/9s.png" style="display:none;">
<img src="templates/images/cards/ts.png" style="display:none;">
<img src="templates/images/cards/js.png" style="display:none;">
<img src="templates/images/cards/qs.png" style="display:none;">
<img src="templates/images/cards/ks.png" style="display:none;">


<div id="profile_view">
	<img src="" id="profile_view_image">
	<div id="profile_view_name"></div>
	<div id="profile_view_balance"></div>
</div><?php }} ?>