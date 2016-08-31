<?php /* Smarty version Smarty-3.1.3, created on 2014-02-06 14:55:37
         compiled from "./templates/header.tpl" */ ?>
<?php /*%%SmartyHeaderCode:132941541052f39459c12a36-89938124%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    '97c13ae6868bbc459509c9f1b968154acd23eecc' => 
    array (
      0 => './templates/header.tpl',
      1 => 1383938934,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '132941541052f39459c12a36-89938124',
  'function' => 
  array (
  ),
  'variables' => 
  array (
    '_PAGE_TITLE' => 0,
    '_SITE_TITLE' => 0,
    'user' => 0,
    '_PG' => 0,
    'err_msg' => 0,
    'ok_msg' => 0,
  ),
  'has_nocache_code' => false,
  'version' => 'Smarty-3.1.3',
  'unifunc' => 'content_52f39459ca0ea',
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_52f39459ca0ea')) {function content_52f39459ca0ea($_smarty_tpl) {?><!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Strict//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-strict.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta name="keywords" content="" />
<meta name="description" content="" />
<meta http-equiv="content-type" content="text/html; charset=utf-8" />
<title><?php echo $_smarty_tpl->tpl_vars['_PAGE_TITLE']->value;?>
 | <?php echo $_smarty_tpl->tpl_vars['_SITE_TITLE']->value;?>
</title>
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
				<h1><a href="#"><?php echo $_smarty_tpl->tpl_vars['_PAGE_TITLE']->value;?>
</a></h1>
				<p><?php echo $_smarty_tpl->tpl_vars['_SITE_TITLE']->value;?>
</p>
			</div>
		</div>
	</div>
	<!-- end #header -->
	<div id="menu-wrapper">
		<div id="menu">
			<ul>
				<li><a href="index.php">Main</a></li>
				<?php if ($_smarty_tpl->tpl_vars['user']->value->logged==true){?>
					<li><a href="#">Daily Report</a></li>
					<li><a href="#">Reports</a></li>
					<li><a href="#">Stats</a></li>
					<li><a href="#">Servers Map</a></li>
					<li><a href="index.php?action=logout">Logout</a></li>
				<?php }else{ ?>
					<li><a href="index.php?pg=login">Login</a></li>
				<?php }?>
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
</div><?php }?><?php }} ?>