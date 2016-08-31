<?php /* Smarty version Smarty-3.1.3, created on 2014-02-08 21:21:35
         compiled from "./templates/windows/servers/edit_server.tpl" */ ?>
<?php /*%%SmartyHeaderCode:159465392752f691cf7c9b41-98668008%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    'd42b2bfe97d89c43a31d1b045b0e61ca9e6d5647' => 
    array (
      0 => './templates/windows/servers/edit_server.tpl',
      1 => 1383938987,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '159465392752f691cf7c9b41-98668008',
  'function' => 
  array (
  ),
  'variables' => 
  array (
    'server' => 0,
  ),
  'has_nocache_code' => false,
  'version' => 'Smarty-3.1.3',
  'unifunc' => 'content_52f691cf81868',
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_52f691cf81868')) {function content_52f691cf81868($_smarty_tpl) {?><div class="infoArea" style="width:auto;">

	<input type=hidden value="<?php echo $_smarty_tpl->tpl_vars['server']->value->id;?>
" id="es_id"> 
	Server Name : <input type=text class="textArea" value="<?php echo $_smarty_tpl->tpl_vars['server']->value->title;?>
" id="es_title"> 
	<button class="btn3d" onclick="servers_save_title();" id="save_title_feedback">Save</button>
	
</div>
<Br>
<div class="infoArea" style="width:auto;" id="lock_for_edit_feedback">
	In order to edit server port or address , all tables hosted on this server should be shut down , and all players on the table should be kicked .<br>
	<center><button class="btn3d error" style="width:300px;" onclick="exec('servers_lock_for_edit','id=<?php echo $_smarty_tpl->tpl_vars['server']->value->id;?>
');this.innerHTML='<img style=\'height:20px;\' src=\'templates/images/loading2.gif\'>';">Kick all players and close tables</button></center>
</div><?php }} ?>