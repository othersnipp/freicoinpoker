function exec(action,parameters){

	if (window.XMLHttpRequest){// code for IE7+, Firefox, Chrome, Opera, Safari
		xmlhttp=new XMLHttpRequest();
	}else{// code for IE6, IE5
		xmlhttp=new ActiveXObject("Microsoft.XMLHTTP");
	}
	debug=false;
	debug=true;
	
	//xmlhttp.overrideMimeType('text/html');
	xmlhttp.onreadystatechange=function(){
		if (xmlhttp.readyState==4 && xmlhttp.status==200){
			var rtrv_data=xmlhttp.responseText;
			if(rtrv_data=='pwdsucc'){
			document.location='/?pwd=succ';
			}
			if (debug==true){
				//document.getElementById('debugz').innerHTML=rtrv_data;
			}
			//document.getElementById('description').value=rtrv_data;
			//document.write(rtrv_data);
			// split to data
			datas=rtrv_data.split('~^*^~');
			//////
			for (i=0 ; i<datas.length-1 ; i++){//
			
				datum=datas[i].split('(._._.)');////
					var msg='';//
					var redirect='';	//
					var command='';		//
					var object='';		//
					var vars=new Array();//
					for (ii=0 ; ii<datum.length-1 ; ii++){
						jqm=datum[ii].split('"_TMR_"');///////
						the_var=jqm[0];
						the_val=(jqm[1]);
						//alert (the_var+'='+the_val);
						if (the_val!='undefined'){
							//vars[the_var]=the_val;//
							eval('var '+the_var+'=the_val;');
							//alert(the_var);
							//eval('vars["'+the_var+'"]=the_val;');
							
						}
						////
					}//enf for////////
					
					if (msg!=''){alert(msg);}////
					if (redirect!=''){document.location=redirect;}/////
					switch(command){///////
						case 'exec':
							eval(data);
							break;
						case 'json_exec':
							dData=JSON.parse(data);
							eval(dData);
							break;
						case 'createWindow':
							createWindow(data);
							break;
						case 'set_object_value':
							document.getElementById(object).value=data;
							break;
						case 'reload':
							window.location.reload();
							break;
						case 'set_object_html':
							document.getElementById(object).innerHTML=data;
							break;
						case 'hide_object':
							document.getElementById(object).style.display='none';
							break;
						case 'show_object':
							document.getElementById(object).style.display='';
							break;
						case 'enable_object':
							document.getElementById(object).disabled=false;
							break;
					}//end switch/////
			}//end for /////
			//////
			//////
			//////
			////// 
		}
	}
	if(action=='windows_lobby_withdraw')
	{
			
		parameters='action=windows_lobby_withdraw' + '&' + parameters+'&page=withdraw';
	
	}
	else
	{
				
	parameters='action=' + action + '&' + parameters;
	
	}
	
	if (debug==true){
		
		xmlhttp.open("POST","ajax.php?debug" ,true);
		
	}else{
		xmlhttp.open("POST","ajax.php" ,true);
	}
	
	xmlhttp.setRequestHeader("Content-type", "application/x-www-form-urlencoded");
	xmlhttp.send(parameters);
}


function coins_withdraw_calc(a) { 

  var b=/^[0-9.]{1,}$/i,c=Number($("#sum").val()),d=Number($("#wd_sum").val()),e=$("#coin_fee").html();b.test(d)&&1==a?(a=d+e,0>a&&(a=0),$("#sum").val(1*a.toFixed(8))):b.test(c)&&b.test(d)?(a=c-e,0>a&&(a=0),$("#wd_sum").val(1*a.toFixed(8))):a?$("#sum").val("0"):$("#wd_sum").val("0")

}

function validate_withdraw()
{
	var dataString=	$("#withdraw").serialize();
	$.ajax({
	type: "POST",
    url: "../../withdraw.php",
    data: dataString,
    success: function(data){
	//alert(data);
	$("#id_error").html(data);
   }
});

}