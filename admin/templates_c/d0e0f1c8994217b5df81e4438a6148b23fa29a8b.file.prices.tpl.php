<?php /* Smarty version Smarty-3.1.3, created on 2014-02-06 15:13:00
         compiled from "./templates/prices.tpl" */ ?>
<?php /*%%SmartyHeaderCode:143695394652f3986c361f19-45995478%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    'd0e0f1c8994217b5df81e4438a6148b23fa29a8b' => 
    array (
      0 => './templates/prices.tpl',
      1 => 1383938930,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '143695394652f3986c361f19-45995478',
  'function' => 
  array (
  ),
  'variables' => 
  array (
    'prices' => 0,
    'package' => 0,
  ),
  'has_nocache_code' => false,
  'version' => 'Smarty-3.1.3',
  'unifunc' => 'content_52f3986c3cb85',
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_52f3986c3cb85')) {function content_52f3986c3cb85($_smarty_tpl) {?><fieldset class="infoArea" style="width:auto;padding-left:20px;">
	<legend class="infoArea">Chips Packages</legend>
		<button class="btn3d" style="width:150px;" onclick="ajaxWindow('prices_add_price','Add New Package','');">Add Package</button>
		<div id="save_package_feedback"></div>
		<table style="width:100%;" cellspacing=0>
			<tr class="tableHead">
				<td valign=top colspan=2>
					Package Title
				</td>
				<td valign=top>
					Chips
				</td>
				<td valign=top>
					Price
				</td>
				<td valign=top>
					Options
				</td>
			</tr>
			<?php  $_smarty_tpl->tpl_vars['package'] = new Smarty_Variable; $_smarty_tpl->tpl_vars['package']->_loop = false;
 $_from = $_smarty_tpl->tpl_vars['prices']->value; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array');}
foreach ($_from as $_smarty_tpl->tpl_vars['package']->key => $_smarty_tpl->tpl_vars['package']->value){
$_smarty_tpl->tpl_vars['package']->_loop = true;
?>
			<tr class="tableData">
				<td valign=top colspan=2>
					<input type=text id="pack_title_<?php echo $_smarty_tpl->tpl_vars['package']->value->id;?>
" value="<?php echo $_smarty_tpl->tpl_vars['package']->value->title;?>
" class="textArea" style="width:100px;">
				</td>
				<td valign=top>
					<input type=text id="pack_chips_<?php echo $_smarty_tpl->tpl_vars['package']->value->id;?>
" value="<?php echo $_smarty_tpl->tpl_vars['package']->value->chips;?>
" class="textArea" style="width:70px;">
				</td>
				<td valign=top>
					$<input type=text id="pack_price_<?php echo $_smarty_tpl->tpl_vars['package']->value->id;?>
" value="<?php echo $_smarty_tpl->tpl_vars['package']->value->price;?>
" class="textArea" style="width:50px;">
				</td>
				<td valign=top>
					<button id="save_package_feedback_<?php echo $_smarty_tpl->tpl_vars['package']->value->id;?>
" style="width:50px;" class="btn3d" onclick="savePackage('<?php echo $_smarty_tpl->tpl_vars['package']->value->id;?>
');">Save</button>
					| <a href="javascript:;" onclick="prices_delete('<?php echo $_smarty_tpl->tpl_vars['package']->value->id;?>
');">Delete</a>
				</td>
			</tr>	
			<?php } ?>
		</table>
</fieldset>


<script language="JavaScript">
	function savePackage(id){
		var pid=encodeURIComponent(id);
		var title=encodeURIComponent(getObjectValue('pack_title_'+id));
		var chips=encodeURIComponent(getObjectValue('pack_chips_'+id));
		var price=encodeURIComponent(getObjectValue('pack_price_'+id));
		
		params='id='+id;
		params+='&title='+title;
		params+='&chips='+chips;
		params+='&price='+price;
		
		//alert(params);
		setObjectHTML('save_package_feedback_'+id,'<img src="templates/images/loading2.gif">')
		setObjectHTML('save_package_feedback','')
		
		
		exec('sales_save_package',params);
	}//
	
	function save_new_package(id){
		var title=encodeURIComponent(getObjectValue('pk_title'));
		var chips=encodeURIComponent(getObjectValue('pk_chips'));
		var price=encodeURIComponent(getObjectValue('pk_price'));
		
		var params='&title='+title;
		params+='&chips='+chips;
		params+='&price='+price;
		
		//alert(params);
		setObjectHTML('add_package_feedback_btn','<img src="templates/images/loading2.gif">')
		setObjectHTML('add_package_feedback','')
		
		
		exec('sales_add_package',params);
	}//
	
	function prices_delete(id){
		if (confirm('Are you sure you want to delete this package ?')){
			document.location='index.php?pg=prices&action=delete&package='+id;
		}
	}
</script>
<?php }} ?>