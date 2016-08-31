<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Strict//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-strict.dtd">
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
							<h2 class="title"><a href="index.php?pg={$_PG}">{$_PAGE_TITLE}</a></h2>
			
							
							<p class="meta"><hr></p>
							{if isset($message)}
							<div id="message" style="color:#53850A;">{$message}</div>
							{/if}
							{if isset($error)}
							<div id="error" style="color:#E51E33;">{$error}</div>
							{/if}	
							<div class="entry">
							{if $err_msg ne ''}<div class="error_div">{$err_msg}</div>{/if}
							{if $ok_msg ne ''}<div class="ok_div">{$ok_msg}</div>{/if}
							<fieldset class="infoArea" style="width:auto;padding-left:20px;">
								<legend class="infoArea">Table Coins</legend>	
								<a href="coin.php" id="logo"><p>Manage Coin</p></a>
								<form name="addcoin" id="addcoin" method="post">
								<table>
									<tr>
										<td>Coin Name</td>
										<td><input type="text" id="coinname" name="coinname"></td>
									</tr>
									<tr>
										<td>&nbsp;</td>
										<td><input type="submit" name="submit" value="submit"></td>
									</tr>
								</table>
								</form>
							</fieldset>
