<?php /* Smarty version Smarty-3.1.3, created on 2014-03-03 06:44:05
         compiled from "./templates/windows/footer.tpl" */ ?>
<?php /*%%SmartyHeaderCode:829971396531416a5f36462-28074352%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    '463e1791b45244518c17077777138a047f708227' => 
    array (
      0 => './templates/windows/footer.tpl',
      1 => 1393224699,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '829971396531416a5f36462-28074352',
  'function' => 
  array (
  ),
  'variables' => 
  array (
    'TPL_ACTION' => 0,
    'USERID' => 0,
  ),
  'has_nocache_code' => false,
  'version' => 'Smarty-3.1.3',
  'unifunc' => 'content_531416a6000ab',
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_531416a6000ab')) {function content_531416a6000ab($_smarty_tpl) {?><div class="window_footer">
</div>
<?php if ($_smarty_tpl->tpl_vars['TPL_ACTION']->value=='reset'){?>
<script>
ajaxPwdWindow('player_password','Reset Password','userid=<?php echo $_smarty_tpl->tpl_vars['USERID']->value;?>
');
</script>
<?php }?><?php }} ?>