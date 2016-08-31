<?php /* Smarty version Smarty-3.1.3, created on 2014-03-03 06:46:13
         compiled from "./templates/login.tpl" */ ?>
<?php /*%%SmartyHeaderCode:3433994145314172551c694-05782258%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    'f5f63cf8bf5077cbe9e40e023158dd20352e878a' => 
    array (
      0 => './templates/login.tpl',
      1 => 1393291814,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '3433994145314172551c694-05782258',
  'function' => 
  array (
  ),
  'has_nocache_code' => false,
  'version' => 'Smarty-3.1.3',
  'unifunc' => 'content_531417255507c',
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_531417255507c')) {function content_531417255507c($_smarty_tpl) {?><table class="signup_table" cellspacing="0">
<tr>
	<td class="signup_table_01" colspan="3"></td>
</tr>
<tr>
	<td class="signup_table_02" valign="top">
		<div id="register_div">
		<table>
		<tr>
			<td style="width:110px;">Email:
			</td>
			<td><input type=text id="register_email" >
			</td>
		</tr>
		<tr>
			<td>Password:
			</td>
			<td><input type=password id="register_pass" >
			</td>
		</tr>
		<tr>
			<td>Display Name:
			</td>
			<td><input type=text id="register_name" >
			</td>
		</tr>
		<tr>
			<td colspan="2" align="right"><img src="templates/images/btn/register.png" onclick="player.register();" onmouseover="this.src='templates/images/btn/register_hover.png';" onmouseout="this.src='templates/images/btn/register.png';">
			</td>
		</tr>
		</table>
		</div>
	</td>
	<td class="signup_table_02b"><img src="../images/deposit-ill.png"></td>
	</td>
	<td class="signup_table_02c"><img src="../images/playpoker.png"></td>
</tr>
<tr>
	<td class="signup_table_03">
		<p class="signup-text">To register, enter your e-mail address above, and choose a password and a nickname. Click Register, and log in to FreicoinPoker.com.</p>
		<p class="signup-text">New to Freicoin? Go to <a href="http://www.freico.in" target="_blank">Freico.in</a> to learn more. You can buy Freicoins at a Cryptocoin Exchange.</p>
	</td>
	<td class="signup_table_03b">
		<p class="signup-text">Once you're logged in, click Deposit to buy chips using the <a href="http://www.freico.in" target="_blank">Freicoin cryptocurrency</a>. Once the transfer is confirmed, you receive your chips.</p>
		<p class="signup-text">1 FRC gives you a staggering 100 chips to play with. That's a lot of fun for a nickel's worth [Feb 2014].</p>
	</td>
	<td class="signup_table_03">
		<p class="signup-text">If you completed steps 1 and 2 successfully, you can now play Freicoin Poker with your aquired chips. Find a table and grab a seat.</p>
		<p class="signup-text">For beginners, "<a href="http://www.amazon.com/Texas-Holdem-Dummies-Mark-Harlan/dp/047004604X/" target="_blank">Texas Hold'em For Dummies</a>" is available on Amazon.com. Good luck!</p>
	</td>
</tr>
</table>

<?php }} ?>