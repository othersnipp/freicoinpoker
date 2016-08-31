<?php /* Smarty version Smarty-3.1.3, created on 2014-03-03 06:44:05
         compiled from "./templates/windows/header.tpl" */ ?>
<?php /*%%SmartyHeaderCode:1106436080531416a5f2d1b4-55893251%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    '3c025d85ba87a87f30adc737759735df0c69be75' => 
    array (
      0 => './templates/windows/header.tpl',
      1 => 1393102703,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '1106436080531416a5f2d1b4-55893251',
  'function' => 
  array (
  ),
  'variables' => 
  array (
    'window_title' => 0,
  ),
  'has_nocache_code' => false,
  'version' => 'Smarty-3.1.3',
  'unifunc' => 'content_531416a5f33e2',
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_531416a5f33e2')) {function content_531416a5f33e2($_smarty_tpl) {?><div class="window_header">
	<div class="window_header_title" id="window_title"><?php echo $_smarty_tpl->tpl_vars['window_title']->value;?>
</div>
	<img src="templates/images/close.png" class="window_header_close" onclick="this.parentNode.parentNode.style.display='none';">
</div><?php }} ?>