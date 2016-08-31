<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Strict//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-strict.dtd">
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
							<h2 class="title"><a href="index.php?pg={$_PG}">{$_PAGE_TITLE}</a></h2>
			
							
							<p class="meta"><hr></p>
								
							<div class="entry">
							{if $err_msg ne ''}<div class="error_div">{$err_msg}</div>{/if}
							{if $ok_msg ne ''}<div class="ok_div">{$ok_msg}</div>{/if}
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
				{section name=result loop=$result}					
					<tr>
						<td valign=top>
						{$result[result].display_name}
							
						</td>
						<td valign=top class="info">
							{$result[result].address}
						</td>
						<td valign=top>
							{$result[result].withdraw_amt}
						</td>
						<td valign=top>
							{$result[result].receive_amt}
						</td>
						<td valign=top>
							{$result[result].dateCreated}
						</td>
						<td valign=top>
							{$result[result].status}
						</td>
						<td valign=top>
							<select name="option" id="option" onChange="doredirect(this.value);">
								<option value="">Select</option>
								<option value="approved">Approved</option>
								<option value="cancel">Cancel</option>
							</select>
							<input type="hidden" name="wid" id="wid" value="{$result[result].id}">
							<input type="hidden" name="user_id" id="user_id" value="{$result[result].user_id}">
						</td>
					</tr>
				{/section}			
			<tbody>
		</table>
</fieldset>

<!--{literal}-->
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
</script><!--{/literal}-->