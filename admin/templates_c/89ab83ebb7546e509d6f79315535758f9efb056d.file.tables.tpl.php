<?php /* Smarty version Smarty-3.1.3, created on 2014-02-06 15:11:50
         compiled from "./templates/tables.tpl" */ ?>
<?php /*%%SmartyHeaderCode:51689963152f398265bf5b2-53331651%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    '89ab83ebb7546e509d6f79315535758f9efb056d' => 
    array (
      0 => './templates/tables.tpl',
      1 => 1383938981,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '51689963152f398265bf5b2-53331651',
  'function' => 
  array (
  ),
  'has_nocache_code' => false,
  'version' => 'Smarty-3.1.3',
  'unifunc' => 'content_52f398266183d',
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_52f398266183d')) {function content_52f398266183d($_smarty_tpl) {?><fieldset class="infoArea" style="width:auto;padding-left:20px;">
	<legend class="infoArea">Table Servers</legend>
		<button class="btn3d" style="width:150px;" onclick="ajaxWindow('tables_add_table','Add New Table','');">Add Table</button>
		<table style="width:100%;" cellspacing=0>
			<tr class="tableHead">
				<td valign=top colspan=2>
					Table
				</td>
				<td valign=top>
					Players
				</td>
				<td valign=top>
					Server
				</td>
				<td valign=top>
					Server Status
				</td>
				<td valign=top>
					Options
				</td>
			</tr>
			<tbody id="tables_content">
			
			<tbody>
		</table>
</fieldset>


<script language="JavaScript">
	function refresh_tables(){
		exec('tables_list_tables','');
	}
	
	function save_new_table(){
		
		var title=getObj('nt_title').value;
		var max_seats=getObj('nt_max_seats').value;
		var min_buy=getObj('nt_min_buy').value;
		var max_buy=getObj('nt_max_buy').value;
		var blinds=getObj('nt_blinds').value;
		var pto=getObj('nt_pto').value;
		var server_id=getObj('server_id').value;
		
		if (title=='' || max_seats=='' || min_buy=='' || blinds=='' || pto=='' || server_id==''){
			myAlert('Error','Please fill all data');
			return 0;
		}
		if (max_seats > 9){
			myAlert('Error','Max Seats can\'t be more than 9');
			return 0;
		}
		if (max_seats < 2){
			myAlert('Error','Max Seats can\'t be less than 2');
			return 0;
		}
		if (blinds < 1){
			myAlert('Error','Blinds can\'t be less than 1');
			return 0;
		}
		if (pto < 5){
			myAlert('Error','Timeout can\'t be less than 5 seconds');
			return 0;
		}
		
		var params='title='+title;
		params+='&max_seats='+max_seats;
		params+='&min_buy='+min_buy;
		params+='&max_buy='+max_buy;
		params+='&blinds='+blinds;
		params+='&pto='+pto;
		params+='&server_id='+server_id;

		setObjectHTML('add_table_feedback','<img src="templates/images/loading2.gif"> Saving ...');
		exec('tables_add_table',params);
		
	}
	
	function save_edit_table(){
		
		var id=getObj('et_id').value;
		var title=getObj('et_title').value;
		var max_seats=getObj('et_max_seats').value;
		var min_buy=getObj('et_min_buy').value;
		var max_buy=getObj('et_max_buy').value;
		var blinds=getObj('et_blinds').value;
		var pto=getObj('et_pto').value;
		var server_id=getObj('et_server_id').value;
		
		if (title=='' || max_seats=='' || min_buy=='' || blinds=='' || pto=='' || server_id==''){
			myAlert('Error','Please fill all data');
			return 0;
		}
		if (max_seats > 9){
			myAlert('Error','Max Seats can\'t be more than 9');
			return 0;
		}
		if (max_seats < 2){
			myAlert('Error','Max Seats can\'t be less than 2');
			return 0;
		}
		if (blinds < 1){
			myAlert('Error','Blinds can\'t be less than 1');
			return 0;
		}
		if (pto < 5){
			myAlert('Error','Timeout can\'t be less than 5 seconds');
			return 0;
		}
		
		var params='title='+title;
		params+='&id='+id;
		params+='&max_seats='+max_seats;
		params+='&min_buy='+min_buy;
		params+='&max_buy='+max_buy;
		params+='&blinds='+blinds;
		params+='&pto='+pto;
		params+='&server_id='+server_id;
		//alert(params);return;
		setObjectHTML('edit_table_feedback','<img src="templates/images/loading2.gif"> Saving ...');
		exec('tables_save_table',params);
		
	}
	
	refresh_tables();
</script>
<?php }} ?>