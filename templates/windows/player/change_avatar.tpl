	<form method="post" enctype="multipart/form-data" action="ajax.php" target="uploader">
		Please select an image to upload as your avatar . JPG and PNG onyl allowed<br>
		<input type=file name="avatar">
		<input type=hidden name="action" value="player_update_avatar">
		<input type=submit value="Upload" class="btn3d">
	</form>
	<iframe name="uploader" id="uploader" style="display:none;">