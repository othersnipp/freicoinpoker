<?php /* Smarty version Smarty-3.1.3, created on 2014-02-06 14:55:37
         compiled from "./templates/windows/header.tpl" */ ?>
<?php /*%%SmartyHeaderCode:108469961752f39459d22418-78467929%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    '3c025d85ba87a87f30adc737759735df0c69be75' => 
    array (
      0 => './templates/windows/header.tpl',
      1 => 1383938987,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '108469961752f39459d22418-78467929',
  'function' => 
  array (
  ),
  'variables' => 
  array (
    'window_title' => 0,
  ),
  'has_nocache_code' => false,
  'version' => 'Smarty-3.1.3',
  'unifunc' => 'content_52f39459d295a',
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_52f39459d295a')) {function content_52f39459d295a($_smarty_tpl) {?><div class="window_header">
	<div class="window_header_title" id="window_title"><?php echo $_smarty_tpl->tpl_vars['window_title']->value;?>
</div>
	<img src="templates/images/close.png" class="window_header_close" onclick="this.parentNode.parentNode.style.display='none';">
</div><?php }} ?>