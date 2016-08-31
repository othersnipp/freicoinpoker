function hideFull(){
	checked=$('#lobby_hide_full').attr('class');
	if (checked=='' || typeof(checked)=='undefined'){
		//alert(checked);
		checked=false;
		$('#lobby_hide_full').attr('class',"lobby_checked");
		$('#poker_tables .tableData').each(function() {
			usedSeats=$(this).attr('tag');
			maxSeats=$(this).attr('title');
			if (usedSeats>=maxSeats){
				$(this).attr('style','display:none;');
			}
		 });
	}else{
		checked=true;
		$('#lobby_hide_full').attr('class',"");
		$('#poker_tables .tableData').each(function() {
			usedSeats=$(this).attr('tag');
			maxSeats=$(this).attr('title');
			if (usedSeats>=maxSeats){
				$(this).attr('style','');
			}
		 });
	}
}////////////////////

function hideEmpty(){
	checked=$('#lobby_hide_empty').attr('class');
	if (checked=='' || typeof(checked)=='undefined'){
		//alert(checked);
		checked=false;
		$('#lobby_hide_empty').attr('class',"lobby_checked");
		$('#poker_tables .tableData').each(function() {
			usedSeats=$(this).attr('tag');
			if (parseInt(usedSeats)==0){
				$(this).attr('style','display:none;');
			}
		 });
	}else{
		checked=true;
		$('#lobby_hide_empty').attr('class',"");
		$('#poker_tables .tableData').each(function() {
			usedSeats=$(this).attr('tag');
			if (parseInt(usedSeats)==0){
				$(this).attr('style','');
			}
		 });
	}
}////////////////////

function showSpeed(min,max,obj){
	min=parseInt(min);
	max=parseInt(max);
	
	
	checked=$('#'+obj.id).attr('class');

	$('#lobby_show_slow').attr('class',"");
	$('#lobby_show_fast').attr('class',"");
	$('#'+obj.id).attr('class',"lobby_selected");
	
	if (checked!=''){
		min=0;
		max=300000;
		$('#'+obj.id).attr('class',"");
	}
			
		
		
		$('#poker_tables .tableData').each(function() {
			tableSpeed=$(this).attr('data');
			if (parseInt(tableSpeed)>=min && parseInt(tableSpeed)<=max ){
				$(this).attr('style','');
			}else{
				$(this).attr('style','display:none;');
			}
		 });
	
}////////////////////