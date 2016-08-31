<?php /* Smarty version Smarty-3.1.3, created on 2014-03-03 06:44:15
         compiled from "./templates/windows/lobby/deposit.tpl" */ ?>
<?php /*%%SmartyHeaderCode:2086643215531416afb70f72-42577977%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    'cb545acbbac4765faf4f72e08829c1ab54a19f44' => 
    array (
      0 => './templates/windows/lobby/deposit.tpl',
      1 => 1393268407,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '2086643215531416afb70f72-42577977',
  'function' => 
  array (
  ),
  'variables' => 
  array (
    'ADDR' => 0,
    'NEWTIME' => 0,
    'FRC' => 0,
    'CHIPS' => 0,
  ),
  'has_nocache_code' => false,
  'version' => 'Smarty-3.1.3',
  'unifunc' => 'content_531416afb92ba',
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_531416afb92ba')) {function content_531416afb92ba($_smarty_tpl) {?><?php if ($_smarty_tpl->tpl_vars['ADDR']->value!=0){?>
<?php echo $_smarty_tpl->tpl_vars['NEWTIME']->value;?>

<br>
<br>
Address: <?php echo $_smarty_tpl->tpl_vars['ADDR']->value;?>
</br>
Freicoins deposited: <?php echo $_smarty_tpl->tpl_vars['FRC']->value;?>
<br>
Chips o the way to your account :<?php echo $_smarty_tpl->tpl_vars['CHIPS']->value;?>

<?php }else{ ?>
No Data Available.
<?php }?><?php }} ?>