function Seat(id){ // creates a seat , creates positions
	var id=id;
	var image_positions_x=new Array(0,'392','448','413','389','200','65','41','9','63');
	var image_positions_y=new Array(0,'38','55','150','237','247','237','150','55','38');
		var image = document.createElement('img');
	
	var name_positions_x=new Array(0,'303','397','397','333','202','68','8','8','100');
	var name_positions_y=new Array(0,'43','95','193','280','290','280','193','95','43');
		var player_name = document.createElement('div');
	
	var balance_positions_x=new Array(0,'303','397','397','333','202','68','8','8','100');
	var balance_positions_y=new Array(0,'53','105','203','290','300','290','203','105','53');
		var balance = document.createElement('div');
	
	var card1_positions_x=new Array(0,'270','329','329','324','239','102','99','99','158');
	var card1_positions_y=new Array(0,'79','118','180','237','247','237','180','118','79');
		var card_1 = document.createElement('img');
		
	var card2_positions_x=new Array(0,'301','360','360','355','270','133','130','130','189');
	var card2_positions_y=new Array(0,'79','118','180','237','247','237','180','118','79');
		var card_2 = document.createElement('img');
		
	var timebar_positions_x=new Array(0,'303','397','397','333','202','68','8','8','100');
	var timebar_positions_y=new Array(0,'69','121','219','306','316','306','219','121','69');
		var timebar = document.createElement('div');
		var seattime = document.createElement('div');
		
	var sitdown_positions_x=new Array(0,'309','404','404','339','209','75','14','14','107');
	var sitdown_positions_y=new Array(0,'24','77','174','260','270','260','174','77','24');
		var sit_down = document.createElement('img');
		
	var bet_positions_x=new Array(0,'270','329','329','324','239','102','99','99','158');
	var bet_positions_y=new Array(0,'109','148','210','267','277','267','210','148','109');
		var user_bet = document.createElement('div');
		
	var bet_name_positions_x=new Array(0,'317','411','411','347','216','82','22','22','114');
	var bet_name_positions_y=new Array(0,'69','121','219','306','316','306','219','121','69');
		var user_bet_name = document.createElement('div');
		
	this.create=function(){
		createSeat(id);
	}
	
	this.showBuyIn=function(){
		sit_down.style.display='';
		this.unsetPlayer();
	}
	
	this.hideBuyIn=function(){
		if (sit_down.style.display!='none'){sit_down.style.display='none';}
	}
	
	this.setPlayer=function(name,cash,avatar,bet,bet_name,in_turn){
		if (in_turn){
			player_name.style.color='white';
		}else{
			player_name.style.color='#9f7aa3';
		}
		player_name.innerHTML=name;
		image.title=name;
		balance.innerHTML=cash;
		if (avatar==''){avatar='templates/images/no_player.png';}
		if (image.src!=avatar){
			image.src=avatar;
		}
		if (bet>0){
			if (user_bet.style.display!=''){user_bet.style.display='';}
			if (user_bet.innerHTML!=bet){user_bet.innerHTML=bet;}
		}else{
			if (user_bet.style.display!='none'){user_bet.style.display='none';}
		}
		
		if (bet_name!=''){
			if (user_bet_name.style.display!=''){user_bet_name.style.display='';}
			if (user_bet_name.innerHTML!=bet_name){user_bet_name.innerHTML=bet_name;}
		}else{
			if (user_bet_name.style.display!='none'){user_bet_name.style.display='none';}
		}
	}//
	
	this.setBar=function(volume){ // set 5 of bar
		if (volume>'0'){
			if (timebar.style.display!=''){timebar.style.display='';}
			seattime.style.width=volume+'%';
		}else{
			if (timebar.style.display!='none'){timebar.style.display='none';}
		}
	}//
	
	this.showPlayer=function(){
		player_name.style.display='';
		balance.style.display='';
		image.style.display='';
		sit_down.style.display='none';
	}//
	
	this.showCards=function(card1,card2){
		if (card_1.style.display!=''){card_1.style.display='';}
		if (card_2.style.display!=''){card_2.style.display='';}
		if (card_1.src!='templates/images/cards/'+card1+'.png'){card_1.src='templates/images/cards/'+card1+'.png';}
		if (card_2.src!='templates/images/cards/'+card2+'.png'){card_2.src='templates/images/cards/'+card2+'.png';}
	}
	
	this.hideCards=function(){
		if (card_1.style.display!='none'){card_1.style.display='none';}
		if (card_2.style.display!='none'){card_2.style.display='none';}
		if (card_1.src!='templates/images/card_back.png'){card_1.src='templates/images/card_back.png';}
		if (card_2.src!='templates/images/card_back.png'){card_2.src='templates/images/card_back.png';}
		
	}
	
	this.unsetPlayer=function(){
		if (player_name.style.display!='none'){player_name.style.display='none';}
		if(balance.style.display!='none'){balance.style.display='none';}
		if (image.style.display!='none'){image.style.display='none';}
		if (card_1.style.display!='none'){card_1.style.display='none';}
		if (card_2.style.display!='none'){card_2.style.display='none';}
		if (timebar.style.display!='none'){timebar.style.display='none';}
		if (user_bet.style.display!='none'){user_bet.style.display='none';}
		if (user_bet_name.style.display!='none'){user_bet_name.style.display='none';}
	}
// ------ Private ------ //	
	function createSeat(id){
		createImage(id);
		createName(id);
		createBalance(id);
		createTimeBar(id);
		createCards(id);
		createSitdown(id);
		createBet(id);
		createBetName(id);
	}
	
	var createImage=function(id){
		var area=getObj('in_table');
		image.setAttribute('id','seat_image_'+id);
		image.setAttribute('class','seat_image');
		image.setAttribute('style','display:none;left:'+image_positions_x[id]+'px;top:'+image_positions_y[id]+'px;');
		image.setAttribute('src','templates/images/no_player.png');
		area.appendChild(image);
	}
	
	var createName=function(id){
		var area=getObj('in_table');
		player_name.setAttribute('id','seat_name_'+id);
		player_name.setAttribute('class','seat_name');
		player_name.setAttribute('style','display:none;left:'+name_positions_x[id]+'px;top:'+name_positions_y[id]+'px;');
		area.appendChild(player_name);
	}
	var createBalance=function(id){
		var area=getObj('in_table');
		balance.setAttribute('id','seat_balance_'+id);
		balance.setAttribute('class','seat_balance');
		balance.setAttribute('style','display:none;left:'+balance_positions_x[id]+'px;top:'+balance_positions_y[id]+'px;');
		area.appendChild(balance);
	}
	
	var createTimeBar=function(id){
		var area=getObj('in_table');
		timebar.setAttribute('id','seat_timebar_'+id);
		timebar.setAttribute('class','seat_timebar');
		timebar.setAttribute('style','left:'+timebar_positions_x[id]+'px;top:'+timebar_positions_y[id]+'px;');
		
		seattime.setAttribute('id','seat_time_'+id);
		seattime.setAttribute('class','seat_time');
		
		timebar.appendChild(seattime);
		area.appendChild(timebar);
	}
	
	var createCards=function(id){
		var area=getObj('in_table');
		card_1.setAttribute('id','seat_card1_'+id);
		card_1.setAttribute('class','seat_card');
		card_1.setAttribute('style','display:none;left:'+card1_positions_x[id]+'px;top:'+card1_positions_y[id]+'px;');
		card_1.setAttribute('src','templates/images/card_back.png');

		card_2.setAttribute('id','seat_card2_'+id);
		card_2.setAttribute('class','seat_card');
		card_2.setAttribute('style','display:none;z-index:100;left:'+card2_positions_x[id]+'px;top:'+card2_positions_y[id]+'px;');
		card_2.setAttribute('src','templates/images/card_back.png');
		
		area.appendChild(card_1);
		area.appendChild(card_2);
	}
	
		
	var createSitdown=function(id){
		var area=getObj('in_table');
		sit_down.setAttribute('id','sitdown_image_'+id);
		sit_down.setAttribute('class','sitdown_image');
		sit_down.setAttribute('style','display:none;cursor:pointer;left:'+sitdown_positions_x[id]+'px;top:'+sitdown_positions_y[id]+'px;');
		sit_down.setAttribute('src','templates/images/sitdown.png');
		sit_down.setAttribute('title','Buy chips and sit here');
		sit_down.setAttribute('onclick',"table.sitOn('"+id+"');");
		area.appendChild(sit_down);
	}
	
	var createBet=function(id){
		var area=getObj('in_table');
		user_bet.setAttribute('id','seat_bet_'+id);
		user_bet.setAttribute('class','seat_bet');
		user_bet.setAttribute('style','display:none;left:'+bet_positions_x[id]+'px;top:'+bet_positions_y[id]+'px;');
		area.appendChild(user_bet);
	}
	
	var createBetName=function(id){
		var area=getObj('in_table');
		user_bet_name.setAttribute('id','seat_bet_name_'+id);
		user_bet_name.setAttribute('class','seat_bet');
		user_bet_name.setAttribute('style','display:none;left:'+bet_name_positions_x[id]+'px;top:'+bet_name_positions_y[id]+'px;');
		area.appendChild(user_bet_name);
	}
	
}