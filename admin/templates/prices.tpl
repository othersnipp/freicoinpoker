<fieldset class="infoArea" style="width:auto;padding-left:20px;">
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
			{foreach from=$prices item=package}
			<tr class="tableData">
				<td valign=top colspan=2>
					<input type=text id="pack_title_{$package->id}" value="{$package->title}" class="textArea" style="width:100px;">
				</td>
				<td valign=top>
					<input type=text id="pack_chips_{$package->id}" value="{$package->chips}" class="textArea" style="width:70px;">
				</td>
				<td valign=top>
					$<input type=text id="pack_price_{$package->id}" value="{$package->price}" class="textArea" style="width:50px;">
				</td>
				<td valign=top>
					<button id="save_package_feedback_{$package->id}" style="width:50px;" class="btn3d" onclick="savePackage('{$package->id}');">Save</button>
					| <a href="javascript:;" onclick="prices_delete('{$package->id}');">Delete</a>
				</td>
			</tr>	
			{/foreach}
		</table>
</fieldset>

{literal}
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
{/literal}