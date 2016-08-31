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
{if isset($player->id) && $player->id>0}

	<div id="head_action">

	<div id="user_info"><b>
		<span id="welcome_span">Welcome {$player->display_name} </span> :: 
		<span id="balance_span555">{$player->balance} Chips</span> :: 
		<a href="javascript:void(0);" id='depositlink' onclick="loadDepositWindow('lobby_deposit','Buy Coins');">Deposit</a> :: <a href="javascript:void(0);" onclick="ajaxWindow('lobby_withdraw','Withdraw');">Withdraw</a> :: <a href="#">Settings</a><img src="templates/images/blankspace10.png" align="top"></b>
        	{if $player->user_type eq 'normal'}<span id="logout_span"><a href="javascript:;" onclick="set_loading();player.logout();"><img src="templates/images/btn/Logout.png" onmouseover="this.src='templates/images/btn/Logout_hover.png';" onmouseout="this.src='templates/images/btn/Logout.png';" style="position: relative; top: -3px; right: -3px;"></a></span>{/if}
	</div>
	</div>
{else}
	<div id="login_head">
	<table>
	<tr>
		<td colspan="4" style="height:50px">
		</td>
	</tr>
	<tr>
		<td style="width:150px; height:24px;">
		</td>
		<td style="width:200px; height:24px;">E-mail: <input type="text" id="login_email">
		</td>
		<td style="width:200px; height:24px;">Password: <input type="password" id="login_pass" onkeypress="if(event.keyCode==13) player.login();">
		</td>
		<td style="width:50px; height:24px;"><img src="templates/images/btn/login.png" onclick="player.login();" onmouseover="this.src='templates/images/btn/login_hover.png';" onmouseout="this.src='templates/images/btn/login.png';">
		</td>
	</tr>
	<tr>
		<td colspan="4" align="right" valign="top">
		<div class="forgotpwd"><a href="javascript:void(0);" onclick="player.resetpwd();">Forgot Password?</a></div>
		</td>
	</tr>
	</table>
	</div>
{/if}
	
    {if $message_with neq ''} 
   <p style="width: 297px; margin: 146px 0px 0px 150px; color: green;"> {$message_with}</p>
    {/if}
{literal}
<script>


</script>
{/literal}
