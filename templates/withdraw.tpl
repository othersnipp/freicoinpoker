<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html>
<head>
	<meta http-equiv="content-type" content="text/html; charset=UTF-8" />
	<script src="includes/js/functions.js" type="text/javascript"></script>
	<script src="includes/js/ajax.js" type="text/javascript"></script>
	<script src="includes/js/new/jquery.min.js" type="text/javascript"></script>
	<script src="includes/js/new/jquery-ui.min.js" type="text/javascript"></script>

	{foreach from=$javascript_files item=file}
		<script src="includes/js/{$file}" type="text/javascript"></script>
	{/foreach}

	<script src="includes/js/soundManager/soundmanager2-nodebug-jsmin.js" type="text/javascript"></script>


	<script src="includes/js/system.js" type="text/javascript"></script>
	<script src="includes/js/events.js" type="text/javascript"></script>
	<script src="includes/js/game/tables.js" type="text/javascript"></script>

	<link rel="stylesheet" href="templates/css/style.css"/> 
	<link rel="stylesheet" href="templates/css/vader/jquery-ui-1.8.18.custom.css"/> 

	<title>Freicoin Poker</title>
	<script>
	{if $MSG neq ''}
		alert('{$MSG}');
		window.location='/';
	{/if}
	</script>
</head>
<body>

<div id="outline">
<div id="header">
        <div id="logo"><img src="../images/fplogo.png">
	</div>
    

{if isset($player['player']->id) && $player['player']->id>0}

	<div id="head_action">

	<div id="user_info"><b>
		<span id="welcome_span">Welcome {$player['player']->display_name}</span> :: 
		<span id="balance_span">(${$player['player']->balance})</span> :: 
		<a href="deposit_coin.php" id='depositlink' >Deposit</a> :: <a href="withdraw.php">Withdraw</a> :: <a href="#">Settings</a><img src="templates/images/blankspace10.png" align="top"></b>
        	<span id="logout_span"><a href="javascript:;" onclick="set_loading();player.logout();"><img src="templates/images/btn/Logout.png" onmouseover="this.src='templates/images/btn/Logout_hover.png';" onmouseout="this.src='templates/images/btn/Logout.png';" style="position: relative; top: -3px; right: -3px;"></a></span>
	</div>
	</div>
    
    <div>&nbsp; </div>
    
    <br />
    <br />
    <br />
    <div id="register_div" style="margin: 139px 0 33px 354px;">
		{if isset($message)}
		<div id="message" style="color:#53850A;">{$message}</div>
		{/if}
		{if isset($error)}
		<div id="error" style="color:#E51E33;">{$error}</div>
		{/if}
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
		<td>{if $your_array[0].amount eq 0 }  0 {else} {($your_array[0].amount|string_format:"%.2f")*100} {/if} Chips</td>
		</tr>
		<tr>
		<td>Your FC: </td>
		<td>{if $your_array[0].amount eq 0 }  0 {else} {$your_array[0].amount|string_format:"%.4f"} {/if} Chips</td>
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
        
        
        
    {/if}
	
<!--{literal}--><script language="JavaScript" type="text/JavaScript"> 
<!-- 
function coins_withdraw_calc(a) { 
  var b=/^[0-9.]{1,}$/i,c=Number($("#sum").val()),d=Number($("#wd_sum").val()),e=$("#coin_fee").html();b.test(d)&&1==a?(a=d+e,0>a&&(a=0),$("#sum").val(1*a.toFixed(8))):b.test(c)&&b.test(d)?(a=c-e,0>a&&(a=0),$("#wd_sum").val(1*a.toFixed(8))):a?$("#sum").val("0"):$("#wd_sum").val("0")
} 
--> 
</script><!--{/literal}-->