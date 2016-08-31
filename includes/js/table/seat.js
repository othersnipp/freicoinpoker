function Seat(id){ // creates a seat , creates positions
	var id=id;
	var thisPlayer=false;
	var lowPlayed=false
	var image_positions_x=new Array(0,'470','594','643','512','347','183','56','107','225');
	var image_positions_y=new Array(0,'153','206','354','405','405','405','354','206','153');
		var image = document.createElement('img');
	
	this.IPX=image_positions_x;
	this.IPY=image_positions_y;
	
	var name_positions_x=new Array(0,'453','577','626','495','330','166','39','90','208');
	var name_positions_y=new Array(0,'205','258','406','457','457','457','406','258','205');
		var player_name = document.createElement('div');
	//									'303','397','397','333','202','68','8','8','100');
	var balance_positions_x=new Array(0,'453','577','626','495','330','166','39','90','208');
	var balance_positions_y=new Array(0,'215','268','416','467','467','467','416','268','215');
		var balance = document.createElement('div');
	
	var card1_positions_x=new Array(0,'465','589','638','507','342','177','51','102','220');
	var card1_positions_y=new Array(0,'111','164','312','363','363','363','312','164','111');
		var card_1 = document.createElement('img');
		
	var card2_positions_x=new Array(0,'495','619','668','537','372','207','81','132','250');
	var card2_positions_y=new Array(0,'111','164','312','363','363','363','312','164','111');
		var card_2 = document.createElement('img');
		
	var timebar_positions_x=new Array(0,'455','579','628','497','332','168','41','92','210');
	var timebar_positions_y=new Array(0,'138','191','339','390','390','390','339','191','138');
		var timebar = document.createElement('div');
		//var seattime = document.createElement('img');
		
	var sitdown_positions_x=new Array(0,'462','589','630','498','338','173','42','86','212');
	var sitdown_positions_y=new Array(0,'136','196','343','391','391','391','343','196','136');
		var sit_down = document.createElement('img');
		
	var bet_positions_x=new Array(0,'466','590','639','509','344','180','53','104','222');
	var bet_positions_y=new Array(0,'226','279','427','478','478','478','429','279','226');
		var user_bet = document.createElement('div');
		
	var bet_name_positions_x=new Array(0,'466','590','639','509','344','180','53','104','222');
	var bet_name_positions_y=new Array(0,'238','291','439','490','490','490','439','291','238');
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
	
	this.setPlayer=function(name,cash,avatar,bet,bet_name,in_turn,player_balance){
		if (in_turn){
			player_name.style.color='white';
		}else{
			player_name.style.color='#9f7aa3';
		}
		player_name.innerHTML=name;
		player_name.setAttribute('tag',player_balance);
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
	
	this.setBar=function(seconds){ // set 5 of bar
		if (parseInt(seconds)>0){
			if (timebar.style.display=='none'){
				timebar.style.display='';
				stopTimer();
				timebar.innerHTML='';
				lowPlayed=false;
			}
			if (timebar.innerHTML==''){
				startTimer(timebar.id,seconds);
			}
			
			if (parseInt(seconds)<5 && lowPlayed==false && thisPlayer==true){
				soundManager.play('low_round');
				lowPlayed=true;
			}
			//alert(volume);
			//seattime.src='templates/images/timer/'+volume+'.png';
		}else{
			if (timebar.style.display!='none'){
				timebar.style.display='none';
				stopTimer();
			}
			if (timebar.innerHTML!=''){
				timebar.innerHTML='';
				
			}
			
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
		thisPlayer=true;
	}
	
	this.hideCards=function(){
		if (card_1.style.display!='none'){card_1.style.display='none';}
		if (card_2.style.display!='none'){card_2.style.display='none';}
		if (card_1.src!='templates/images/card_back.png'){card_1.src='templates/images/card_back.png';}
		if (card_2.src!='templates/images/card_back.png'){card_2.src='templates/images/card_back.png';}
		thisPlayer=false;
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
		image.setAttribute('onmousemove','display_profile_info(this);');
		image.setAttribute('onmouseout','hide_profile_info();');
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
		timebar.setAttribute('class','seat_timebar timer');
		timebar.setAttribute('style','display:none;left:'+timebar_positions_x[id]+'px;top:'+timebar_positions_y[id]+'px;');
		
		//seattime.setAttribute('id','seat_time_'+id);
		//seattime.setAttribute('class','seat_time');
		
		//timebar.appendChild(seattime);
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