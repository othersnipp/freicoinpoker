<?php /* Smarty version Smarty-3.1.3, created on 2014-02-27 09:17:09
         compiled from "./templates/footer.tpl" */ ?>
<?php /*%%SmartyHeaderCode:111026177852f39459cc7214-13160314%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    '3a4f6f0d327fc7bc3ea86f63906a1bf934ca50c7' => 
    array (
      0 => './templates/footer.tpl',
      1 => 1393489026,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '111026177852f39459cc7214-13160314',
  'function' => 
  array (
  ),
  'version' => 'Smarty-3.1.3',
  'unifunc' => 'content_52f39459ce4e8',
  'has_nocache_code' => false,
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_52f39459ce4e8')) {function content_52f39459ce4e8($_smarty_tpl) {?>	</div>
</div>

<div style="clear: both;">&nbsp;</div>
</div>

<?php echo $_smarty_tpl->getSubTemplate ('blocks/side_bar.tpl', $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, null, null, array(), 0);?>

</div>
				<div style="clear: both;">&nbsp;</div>
			</div>
		</div>
	</div>
	<!-- end #page -->
</div>


						<div id="footer">
	<p>Copyright (c) 2012 Freicoinpoker</p>
</div>

	<div id="msg_window" style="display:none;">
		<?php echo $_smarty_tpl->getSubTemplate ("windows/header.tpl", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, null, null, array(), 0);?>

		<div id="window_content" class="window_content"></div>
		<?php echo $_smarty_tpl->getSubTemplate ("windows/footer.tpl", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, null, null, array(), 0);?>

	</div>
<!-- end #footer -->
</body>
</html>
<?php }} ?>