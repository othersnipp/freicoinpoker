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
    <div id="register_div" style="margin: 139px 0 33px 354px; width:535px; height:100px";>
		<table>
		<tbody><tr>
			<td >Your Unique  Freicoin Address:
			</td>

			<td>{$coin_address}	</td></tr>
			<tr><td>&nbsp;</td></tr>
			<tr><td>Date :</td><td>{$your_array[0].dateCreated}</td></tr>
<tr><td>&nbsp;</td></tr>
			<tr><td>Amount :</td>
			<td>{if $your_array[0].amount eq 0 }  0 {else} {($your_array[0].amount|string_format:"%.2f")*100} {/if} Chips</td>
			</tr>
			<tr>
			<td>FC : {$your_array[0].amount|string_format:"%.4f"}</td>			
			</tr>		
		</tbody></table>
		</div>
        
        
        
    {/if}