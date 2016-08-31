function Table(seats){
	//editables
		var leaveTable_position=new Array('634','5','102','20');
		var standUp_position=new Array('634','30','102','20');
		var pots_position=new Array('296','278','152','56');
		
		var flip_positions_x=new Array('294','326','358','390','422');
		var flip_positions_y=new Array('234','234','234','234','234');
		
		this.FPX=parseInt(pots_position[0])+50;
		this.FPY=parseInt(pots_position[1])+50;
		
		var refresh_interval=1000; // milliseconds
		var disconnected_int=setTimeout("exec('game_update_table','');",5000);
		var disconnected=false;
		
	//runtime
		this.id=0;
		this.max_buy=0;
		this.min_buy=0;
		this.player_timeout=0;
		var game_state=0;
		
	//on creation
		this.seat=new Array();
		for (var i=1 ; i<=9 ; i++){
			this.seat[i]=new Seat(i);
			this.seat[i].create();
		}
		
		createLeaveTable();
		createStandUp();
		createFlop();
		createPots();
// ------ Methods ------ //	
	/* 	display buy-in dialog
		input : seatId 0-8/0-4
		output void;
	*/
	
	this.sitOn=function(seatId){ 
		getObj('buy_in_seat').value=seatId;
		getObj('buy_in_div').style.display='block';
	}//
	
	this.setDealerChat=function(chat){ 
		if (getObj('dealer_chat').innerHTML!=chat){
			getObj('dealer_chat').innerHTML=chat;
		}
	}//
	
	this.setTableChat=function(chat){ 
		var tableChat=getObj('table_chat');
		if (tableChat.innerHTML!=chat){
			tableChat.innerHTML=chat;
			//document.title=tableChat.scrollTop +'-'+ (tableChat.scrollHeight-168-20);
			if (tableChat.scrollTop >= tableChat.scrollHeight-168-40){
				tableChat.scrollTop=tableChat.scrollHeight;
			}
		}
	}//
	
	this.setState=function(state){
		if (state!=this.game_state){
			if (state=='1'){
				soundManager.play('shuffle');
			}
			this.game_state=state;
		}
	}
	
	this.hideBuyIn=function(){
		if (getObj('buy_in_div').style.display!='none'){getObj('buy_in_div').style.display='none';}
	}
	/* 	show/hide flop
		input : int flop id 0-4 , card name
		output void;
	*/
	this.setFlop=function(id,card){ 
		if (card==''){
			if (getObj('flop_'+id).style.display!='none'){getObj('flop_'+id).style.display='none';}
			if (getObj('flop_'+id).src!='templates/images/card_back.png'){getObj('flop_'+id).src='templates/images/card_back.png';}
		}else{
			if (getObj('flop_'+id).style.display!=''){getObj('flop_'+id).style.display='';}
			if (getObj('flop_'+id).src!='templates/images/cards/'+card+'.png'){getObj('flop_'+id).src='templates/images/cards/'+card+'.png';}
		}
	}//
	
	/* seat player on seat (reads data from buy_in_seat,buy_in_table,buy_in_amount DOM
		input void
		output void
	*/
	this.seatPlayer=function(){
		bis=getObj('buy_in_seat').value;
		bia=getObj('buy_in_amount').value;
		var params='bis='+bis;
		params+='&bia='+bia;
		exec('player_sit_on',params);
	}
	
	/* 	leave table , load tables
		input : void
		output void;
	*/
	this.leaveTable=function(){ 
		set_loading();
		clearTimeout(disconnected_int);
		exec('player_leave_table','');
	}//
	
	/* 	show turn div
		input : bool $isCall , int $amount
		output void;
	*/
	this.showTurn=function(isCall,amount,toRise){ 
		if (isCall==true){
			getObj('btn_check').style.display='none';
			getObj('btn_call').innerHTML='Call $'+amount;
			getObj('btn_call').style.display='';
		}else{
			getObj('btn_check').style.display='';
			getObj('btn_call').style.display='none';
		}
		
		if (getObj('turn_div').style.display!='block'){
			getObj('txt_rise').value=toRise;
			$('#txt_rise').attr('tag',toRise);
			getObj('turn_div').style.display='block';
			soundManager.play('turn');
			$(function(){
				$( "#slider" ).slider({
				value:parseInt($('#txt_rise').attr('tag')),
				min: parseInt($('#txt_rise').attr('tag')),
				max: parseInt($('#seat_balance_1').text()),
				step: parseInt($('#txt_rise').attr('tag')),
				slide: function( event, ui ) {
					$( "#txt_rise" ).val( ui.value );
				}
				});
				$( "#txt_rise" ).val(  $( "#slider" ).slider( "value" ) );
			});
		}
	}//
	
	/* 	hide turn div
		input : void
		output void;
	*/
	this.hideTurn=function(){ 
		if (getObj('turn_div').style.display!='none'){getObj('turn_div').style.display='none';}
		
	}//
	
	/* 	stand up
		input : void
		output void;
	*/
	this.standUp=function(){ 
		exec('player_stand_up','');
	}//
	
	this.showStandUp=function(show){ // show/hide the "Stand Up" button
		if (show){
			getObj('stand_up').style.display='';
			this.hideBuyIn();
		}else{
			getObj('stand_up').style.display='none';
		}
	}//
	
	this.showPots=function(show,pots){ // show/hide the "Stand Up" button
		if (show){
			if (getObj('pots').style.display!=''){getObj('pots').style.display='';}
			getObj('pots').innerHTML=pots;
		}else{
			if (getObj('pots').style.display!='none'){getObj('pots').style.display='none';}
		}
	}//
	
	this.reload=function(){ // reloads the table info
		clearTimeout(disconnected_int);
		setTimeout("exec('game_update_table','');",refresh_interval);
		disconnected_int=setTimeout("table.reconnect();",5000);
	}
	
	this.reconnect=function(){
		exec('game_update_table','');
		disconnected_int=setTimeout("table.reconnect();",10000);
	}
// ------ Private ------ //	
	
	function createLeaveTable(){
		var area=getObj('in_table');
		var newImage = document.createElement('div');
		newImage.setAttribute('id','leave_table');
		newImage.setAttribute('class','btn3d');
		newImage.setAttribute('style','position: absolute;cursor:pointer;left:'+leaveTable_position[0]+'px;top:'+leaveTable_position[1]+'px;width:'+leaveTable_position[2]+'px;height:'+leaveTable_position[3]+'px;');
		newImage.setAttribute('onclick','table.leaveTable();');
		newImage.innerHTML='Leave Table';
		area.appendChild(newImage);
	}//
	
	function createStandUp(){
		var area=getObj('in_table');
		var newImage = document.createElement('div');
		newImage.setAttribute('id','stand_up');
		newImage.setAttribute('class','btn3d');
		newImage.setAttribute('style','display:none;position: absolute;cursor:pointer;left:'+standUp_position[0]+'px;top:'+standUp_position[1]+'px;width:'+standUp_position[2]+'px;height:'+standUp_position[3]+'px;');
		newImage.setAttribute('onclick','table.standUp();');
		newImage.innerHTML='Stand Up';
		area.appendChild(newImage);
	}//
	
	function createFlop(){
		var area=getObj('in_table');
		for (var i=1 ; i<=5 ; i++){
			var newImage = document.createElement('img');
			newImage.setAttribute('id','flop_'+i);
			newImage.setAttribute('class','flop_card');
			newImage.setAttribute('style','display:none;position: absolute;cursor:pointer;left:'+flip_positions_x[i-1]+'px;top:'+flip_positions_y[i-1]+'px;');
			area.appendChild(newImage);
		}//end for
	}//
	function createPots(){
		var area=getObj('in_table');
		for (var i=1 ; i<=5 ; i++){
			var newImage = document.createElement('div');
			newImage.setAttribute('id','pots');
			newImage.setAttribute('class','pots');
			newImage.setAttribute('title','Game Pots');
			newImage.setAttribute('style','display:none;position: absolute;left:'+pots_position[0]+'px;top:'+pots_position[1]+'px;width:'+pots_position[2]+'px;height:'+pots_position[3]+'px;');
			area.appendChild(newImage);
		}//end for
	}//
	
}// end class


