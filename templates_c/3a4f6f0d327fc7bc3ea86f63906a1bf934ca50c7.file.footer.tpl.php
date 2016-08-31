<?php /* Smarty version Smarty-3.1.3, created on 2014-03-03 06:44:05
         compiled from "./templates/footer.tpl" */ ?>
<?php /*%%SmartyHeaderCode:1654569252531416a5f1a103-66079376%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    '3a4f6f0d327fc7bc3ea86f63906a1bf934ca50c7' => 
    array (
      0 => './templates/footer.tpl',
      1 => 1393662964,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '1654569252531416a5f1a103-66079376',
  'function' => 
  array (
  ),
  'has_nocache_code' => false,
  'version' => 'Smarty-3.1.3',
  'unifunc' => 'content_531416a5f2a93',
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_531416a5f2a93')) {function content_531416a5f2a93($_smarty_tpl) {?>		<div id="msg_window" style="display:none;">
			<?php echo $_smarty_tpl->getSubTemplate ("windows/header.tpl", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, null, null, array(), 0);?>

			<div id="window_content" class="window_content"></div>
			<?php echo $_smarty_tpl->getSubTemplate ("windows/footer.tpl", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, null, null, array(), 0);?>

		</div>
		</div><!-- End Screen Div -->
                <textarea onclick="table.reload();" id="debugz" multiline style="display:none;top:450px;height:500px;width:100%;background-color:white;color:black;position:absolute;">
                </textarea>
		
		<img src="templates/images/chips_stack.png" style="display:none;">
</body>
</html> 
<?php }} ?>