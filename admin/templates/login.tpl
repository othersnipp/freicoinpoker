<div class="infoArea" style="margin:auto;height:200px;width:400px;">

	<form method="post">
		<input type=hidden name="action" value="login">
		<table style="margin:auto;">
			<tr>
				<td valign=top>
					Administrator :
				</td>
				<td valign=top>
					<input type=text class="textArea" name="login_user" value="{$login_user}">
				</td>
			</tr>
			<tr>
				<td valign=top>
					Password :
				</td>
				<td valign=top>
					<input type=password class="textArea" name="login_pass" value="{$login_pass}">
				</td>
			</tr>
			<tr>
				<td valign=top>
					<a href="index.php?pg=forgot" class="note">[?] Forgot Password</a>
				</td>
				<td valign=top align=center>
					<input type=submit class="btn3d" value="Login">
				</td>
			</tr>
		</table>
	</form>

</div>