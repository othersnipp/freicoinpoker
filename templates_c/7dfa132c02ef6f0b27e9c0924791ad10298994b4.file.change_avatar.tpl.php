<?php /* Smarty version Smarty-3.1.3, created on 2014-03-19 15:23:54
         compiled from "./templates/windows/player/change_avatar.tpl" */ ?>
<?php /*%%SmartyHeaderCode:936896425329a87a1454b9-90667497%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    '7dfa132c02ef6f0b27e9c0924791ad10298994b4' => 
    array (
      0 => './templates/windows/player/change_avatar.tpl',
      1 => 1383938837,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '936896425329a87a1454b9-90667497',
  'function' => 
  array (
  ),
  'has_nocache_code' => false,
  'version' => 'Smarty-3.1.3',
  'unifunc' => 'content_5329a87a1559b',
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_5329a87a1559b')) {function content_5329a87a1559b($_smarty_tpl) {?>	<form method="post" enctype="multipart/form-data" action="ajax.php" target="uploader">
		Please select an image to upload as your avatar . JPG and PNG onyl allowed<br>
		<input type=file name="avatar">
		<input type=hidden name="action" value="player_update_avatar">
		<input type=submit value="Upload" class="btn3d">
	</form>
	<iframe name="uploader" id="uploader" style="display:none;"><?php }} ?>