<?php /* Smarty version Smarty-3.1.3, created on 2014-02-06 15:13:15
         compiled from "./templates/servers.tpl" */ ?>
<?php /*%%SmartyHeaderCode:2123049952f3987b9b8a26-45902820%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    '1720ce586afccf25c31ac136c658ac259c9a8e1c' => 
    array (
      0 => './templates/servers.tpl',
      1 => 1383938928,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '2123049952f3987b9b8a26-45902820',
  'function' => 
  array (
  ),
  'variables' => 
  array (
    '_DB_SERVER' => 0,
    '_DB_QPM' => 0,
    '_DB_QET' => 0,
    '_RTS_SERVER' => 0,
    '_RTS_UP' => 0,
    '_RTS_CPU' => 0,
    '_RTS_RAM' => 0,
  ),
  'has_nocache_code' => false,
  'version' => 'Smarty-3.1.3',
  'unifunc' => 'content_52f3987ba43dd',
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_52f3987ba43dd')) {function content_52f3987ba43dd($_smarty_tpl) {?><fieldset class="infoArea" style="width:auto;padding-left:20px;">
	<legend class="infoArea">Database Server</legend>
	
		<table>
			<tr>
				<td valign=top>
					Server Address :
				</td>
				<td valign=top>
					<input type=text class="textArea" readonly value="<?php echo $_smarty_tpl->tpl_vars['_DB_SERVER']->value;?>
">
				</td>
			</tr>
			<tr>
				<td valign=top>
					Queries :
				</td>
				<td valign=top>
					<label class="info"><?php echo $_smarty_tpl->tpl_vars['_DB_QPM']->value;?>
 Per Minute</label>
				</td>
			</tr>
			<tr>
				<td valign=top>
					Query Execution Time :
				</td>
				<td valign=top>
					<label class="info"><?php echo $_smarty_tpl->tpl_vars['_DB_QET']->value;?>
 Second Average</label>
				</td>
			</tr>
		</table>
</fieldset>
<Br>
<fieldset class="infoArea" style="width:auto;padding-left:20px;">
	<legend class="infoArea">Main RTS Server</legend>
	
		<table>
			<tr>
				<td valign=top>
					Server Address :
				</td>
				<td valign=top>
					<input type=text class="textArea" readonly value="<?php echo $_smarty_tpl->tpl_vars['_RTS_SERVER']->value;?>
">
				</td>
			</tr>
			<tr>
				<td valign=top>
					<img src="templates/images/icons/up.png" style="width:15px;"> Status :
				</td>
				<td valign=top>
					<?php if ($_smarty_tpl->tpl_vars['_RTS_UP']->value==1){?>
						<img src="templates/images/ok.png"> Online
					<?php }else{ ?>
						<div class="error"><img src="templates/images/error.png"> Offline</div>
					<?php }?>
				</td>
			</tr>
			<tr>
				<td valign=top>
					<img src="templates/images/icons/cpu.png" style="width:20px;height:15px;"> CPU :
				</td>
				<td valign=top>
					<label class="info"><?php echo $_smarty_tpl->tpl_vars['_RTS_CPU']->value;?>
%</label>
				</td>
			</tr>
			<tr>
				<td valign=top>
					<img src="templates/images/icons/ram.png" style="width:20px;height:15px;"> RAM :
				</td>
				<td valign=top>
					<label class="info"><?php echo $_smarty_tpl->tpl_vars['_RTS_RAM']->value;?>
%</label>
				</td>
			</tr>
		</table>
</fieldset>

<Br>
<fieldset class="infoArea" style="width:auto;padding-left:20px;">
	<legend class="infoArea">Table Servers</legend>
		<button class="btn3d" style="width:150px;" onclick="ajaxWindow('servers_add_server','Add New Server','');">Add Server</button>
		<table style="width:100%;" cellspacing=0>
			<tr class="tableHead">
				<td valign=top>
					Server Name
				</td>
				<td valign=top>
					Status
				</td>
				<td valign=top>
					Parameters
				</td>
				<td valign=top>
					Tables
				</td>
				<td valign=top>
					Options
				</td>
			</tr>
			<tbody id="tables_servers_content">
			
			<tbody>
		</table>
</fieldset>


<script language="JavaScript">
	function refresh_servers(){
		exec('servers_list_servers','');
	}
	refresh_servers();
	
	function save_new_server(){
		
		var title=getObj('ns_title').value;
		var addr=getObj('ns_ip').value;
		var port=getObj('ns_port').value;
		
		if (title=='' || addr=='' || port==''){
			myAlert('Error','Please fill all data');
			return 0;
		}
		
		var params='title='+title;
		params+='&ip='+addr;
		params+='&port='+port;

		setObjectHTML('add_server_feedback','<div class="ok_div">Connecting to server ...</div>');
		exec('servers_add_server',params);
		
	}
	
	function servers_save_title(){
		var title=getObj('es_title').value;
		var id=getObj('es_id').value;
		
		var params='title='+title;
		params+='&id='+id;
		
		setObjectHTML('save_title_feedback','<img style=\'height:20px;\' src=\'templates/images/loading2.gif\'>');
		exec('servers_save_title',params);
	}
	
	function save_edit_server(){
		var ip=getObj('es_ip').value;
		var port=getObj('es_port').value;
		var id=getObj('es_id').value;
		
		var params='ip='+ip;
		params+='&id='+id;
		params+='&port='+port;
		
		setObjectHTML('save_server_feedback','<img style=\'height:20px;\' src=\'templates/images/loading2.gif\'>');
		exec('servers_save_server',params);
	}
</script>
<?php }} ?>