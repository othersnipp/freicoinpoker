<table style="width:100%;" cellpadding="10">
<tr>
	<td>New Password</td><td><input type="text" id='newpwd' size="30" maxlength="30" value="" placeholder="Enter New Password" /></td>
</tr>
<tr>
	<td>Confirm New Password</td><td><input type="text" size="30" id='confirmpwd' maxlength="30" value="" placeholder="Confirm New Password" /></td>
</tr>
<tr>
	<td colspan="2">
	<input type="hidden" id='hidid' value="{$smarty.request.userid}" />
	<input type="button" id='resetpwd' value="Update Password"  onclick="player.updatepassword();" /></td>
</tr>
</table>