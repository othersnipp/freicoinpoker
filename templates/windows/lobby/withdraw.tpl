<!--{if $ADDR neq 0}
{$NEWTIME}
<br>
<br>
Address: {$ADDR}</br>
Freicoins deposited: {$FRC}<br>
Chips o the way to your account :{$CHIPS}
{else}
No Data Available.
{/if}-->
<p id="id_error" style="color:red;"></p>
		<form name="withdraw" id="withdraw" method="post">
		<div class="cls_main_block">
		<h3>Withdrawal Chips</h3>
		<div class="row-fluid">
		<div class="span7">
		<table>
		<tbody>		
		<tr>
		<td>Address:</td>
		<td><input type="text" name="address" id="address" autocomplete="off"></td>
		</tr>
		<tr>
		<td>Your Chips: </td>
		<td>{$CHIPS} Chips</td>
		</tr>
		<tr>
		<td>Your FC: </td>
		<td>{$FRC}</td>
		</tr>
		<tr>
		<td>Chips to withdrawal:</td>
		<td><input type="text" onchange="coins_withdraw_calc()" maxlength="15" onkeyup="coins_withdraw_calc()" id="sum" name="sum" autocomplete="off"><span id="err"> Chips</span></td>
		</tr>
		<tr>
		<td>You will receive:</td>
		<td><input type="text" onchange="coins_withdraw_calc(1)" onkeyup="coins_withdraw_calc(1)" id="wd_sum" name="wd_sum" maxlength="15" autocomplete="off"> Chips</td>
		</tr>
		</tbody></table>
		<input type="hidden" id="token" value="82db1ce7e5a34556f64f2b1378cf4ce986d9bf2e7222e695f81a649de6941c3c">
		<input type="hidden" id="cryptocurrency" value="Chips">
		<input type="button" name="submit" value="Withdrawal" onclick="validate_withdraw();">
		<!--<button type="button" class="btn btn-warning" onclick="Coinwithdrawal(0);">Withdrawal</button>
		<button type="button" class="btn btn-success">make BTC-E CODE</button>-->
		</div>
		<div class="span4 pull-right">
		<div class="withdrawal_rht">
		<p>* Min amount for withdrawal - <span id="min_value">50</span> Chips.</p>
		<p>* Be patient, transfer of funds will be before the first confirmation.</p>
		<p>* Fee for withdrawal is <span id="coin_fee">1</span> Chips.</p>		
		</div>
		</div>
		</div>
		</div>
		</form>
