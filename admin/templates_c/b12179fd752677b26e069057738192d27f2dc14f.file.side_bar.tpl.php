<?php /* Smarty version Smarty-3.1.3, created on 2014-02-06 14:55:37
         compiled from "./templates/blocks/side_bar.tpl" */ ?>
<?php /*%%SmartyHeaderCode:203319516652f39459ce7776-16018347%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    'b12179fd752677b26e069057738192d27f2dc14f' => 
    array (
      0 => './templates/blocks/side_bar.tpl',
      1 => 1383938931,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '203319516652f39459ce7776-16018347',
  'function' => 
  array (
  ),
  'variables' => 
  array (
    'user' => 0,
    'stats' => 0,
  ),
  'has_nocache_code' => false,
  'version' => 'Smarty-3.1.3',
  'unifunc' => 'content_52f39459d1f55',
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_52f39459d1f55')) {function content_52f39459d1f55($_smarty_tpl) {?><?php if ($_smarty_tpl->tpl_vars['user']->value->logged==true){?>
<div id="sidebar">
						<ul>
							<li>
								<h2><img src="templates/images/icons/sys_health.png" style="width:26px;"> System health</h2>
									<div class="infoArea" style="width:auto;"><table>
										<tr>
											<td valign="top" style="font-weight:bold;">
												Online Users :
											</td>
											<td valign="top" style="font-size:10px;">
												0
											</td>
										</tr>
										<tr>
											<td valign="top" style="font-weight:bold;">
												Seated Players :
											</td>
											<td valign="top" style="font-size:10px;">
												<?php echo $_smarty_tpl->tpl_vars['stats']->value->seated_players;?>

											</td>
										</tr>
										<tr>
											<td valign="top" style="font-weight:bold;">
												Main Server :
											</td>
											<td valign="top" style="font-size:10px;">
												<img src="templates/images/ok.png"> Running<br>
												<img src="templates/images/icons/cpu.png" style="width:20px;height:15px;"> %00<br>
												<img src="templates/images/icons/ram.png" style="width:20px;height:15px;"> %00
											</td>
										</tr>
										<tr>
											<td valign="top" style="font-weight:bold;">
												Table Servers :
											</td>
											<td valign="top" style="font-size:10px;">
												<table>
													<tr>
														<td valign="top">Server 1</td>
														<td valign="top"><img src="templates/images/ok.png"> Running</td>
													</tr>
													<tr>
														<td valign="top">Server 2</td>
														<td valign="top"><img src="templates/images/alert.png"> Loaded</td>
													</tr>
													<tr>
														<td valign="top">Server 3</td>
														<td valign="top"><img src="templates/images/error.png"> Offline</td>
													</tr>
												</table>
											</td>
										</tr>
									</table></div>
							</li>
						</ul>
					</div>
<?php }?><?php }} ?>