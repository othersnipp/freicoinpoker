<?php /* Smarty version Smarty-3.1.3, created on 2014-03-03 06:44:06
         compiled from "./templates/tables.tpl" */ ?>
<?php /*%%SmartyHeaderCode:2006660214531416a6a71a50-72485287%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    '89ab83ebb7546e509d6f79315535758f9efb056d' => 
    array (
      0 => './templates/tables.tpl',
      1 => 1393278571,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '2006660214531416a6a71a50-72485287',
  'function' => 
  array (
  ),
  'variables' => 
  array (
    'tables' => 0,
    'table' => 0,
  ),
  'has_nocache_code' => false,
  'version' => 'Smarty-3.1.3',
  'unifunc' => 'content_531416a6ae204',
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_531416a6ae204')) {function content_531416a6ae204($_smarty_tpl) {?><div id="vindu">
	<table style="width: 411px;left: 50px;top: 40px;position: relative;" cellspacing=0>
		<tr class="tableHead">
			<td style="width:160px;">
				Table
			</td>
			<td style="width:64px;">
				Players
			</td>
			<td style="width:123px;">
				Min/Max buy-in
			</td>
			<td>
				Blinds
			</td>
		</tr>
	</table>
	<div style="overflow: auto;height: 155px;position: relative;top: 45px;left: 50px;width: 410px;">
		<table style="width:100%;" cellspacing=0 id="poker_tables">
			<?php  $_smarty_tpl->tpl_vars['table'] = new Smarty_Variable; $_smarty_tpl->tpl_vars['table']->_loop = false;
 $_from = $_smarty_tpl->tpl_vars['tables']->value; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array');}
foreach ($_from as $_smarty_tpl->tpl_vars['table']->key => $_smarty_tpl->tpl_vars['table']->value){
$_smarty_tpl->tpl_vars['table']->_loop = true;
?>
			<tr class="tableData" tag="<?php echo $_smarty_tpl->tpl_vars['table']->value->used_seats;?>
" title="<?php echo $_smarty_tpl->tpl_vars['table']->value->max_seats;?>
" data="<?php echo $_smarty_tpl->tpl_vars['table']->value->player_timeout;?>
">
				<td style="width:160px;" title="<?php echo $_smarty_tpl->tpl_vars['table']->value->title;?>
">
					<div style="width:100%;cursor:pointer;" onclick="set_loading();exec('player_join_table','id=<?php echo $_smarty_tpl->tpl_vars['table']->value->id;?>
');"><?php echo $_smarty_tpl->tpl_vars['table']->value->title;?>
</div>
				</td>
				<td style="width:60px;" title="<?php echo $_smarty_tpl->tpl_vars['table']->value->used_seats;?>
/<?php echo $_smarty_tpl->tpl_vars['table']->value->max_seats;?>
">
					<?php echo $_smarty_tpl->tpl_vars['table']->value->used_seats;?>
/<?php echo $_smarty_tpl->tpl_vars['table']->value->max_seats;?>

				</td>
				<td style="width:120px;" title="<?php echo $_smarty_tpl->tpl_vars['table']->value->min_buy;?>
/<?php echo $_smarty_tpl->tpl_vars['table']->value->max_buy;?>
">
					<?php echo $_smarty_tpl->tpl_vars['table']->value->min_buy;?>
/<?php echo $_smarty_tpl->tpl_vars['table']->value->max_buy;?>

				</td>
				<td title="<?php echo $_smarty_tpl->tpl_vars['table']->value->blinds;?>
">
					<?php echo $_smarty_tpl->tpl_vars['table']->value->blinds;?>

				</td>
			</tr>
			<?php } ?>
		</table>
	</div>

	<div id="lobby_play_now"  onclick="set_loading();exec('player_join_random_table','');"><img src="/templates/images/play-now.png">
	</div>


	<div id="lobby_hide_full" class="" onclick="hideFull();">
	</div>

	<div id="lobby_hide_empty" class="" onclick="hideEmpty();">
	</div>

	<div id="lobby_show_slow" class="" onclick="showSpeed(16,60,this);">
	</div>

	<div id="lobby_show_fast" class="" onclick="showSpeed(0,15,this);">
	</div>
</div>	

<?php }} ?>