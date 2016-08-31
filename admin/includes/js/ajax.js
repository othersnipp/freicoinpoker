function exec(action,parameters){

	if (window.XMLHttpRequest){// code for IE7+, Firefox, Chrome, Opera, Safari
		xmlhttp=new XMLHttpRequest();
	}else{// code for IE6, IE5
		xmlhttp=new ActiveXObject("Microsoft.XMLHTTP");
	}
	debug=false;
	//debug=true;
	
	//xmlhttp.overrideMimeType('text/html');
	xmlhttp.onreadystatechange=function(){
		if (xmlhttp.readyState==4 && xmlhttp.status==200){
			var rtrv_data=xmlhttp.responseText;
			//alert (parameters);
			if (debug==true){
				alert(rtrv_data);
			}
			//document.getElementById('description').value=rtrv_data;
			//document.write(rtrv_data);
			// split to data
			datas=rtrv_data.split('~^*^~');
			//////
			for (i=0 ; i<datas.length-1 ; i++){//
			//alert (datas[i]);
				datum=datas[i].split('(._._.)');////
					var msg='';//
					var redirect='';//////
					var command='';///////
					var object='';////////
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
	
	parameters='action=' + action + '&' + parameters;
	//alert(parameters);
	if (debug==true){
		
		xmlhttp.open("POST","ajax.php?debug" ,true);
		
	}else{
		xmlhttp.open("POST","ajax.php" ,true);
	}
	
	xmlhttp.setRequestHeader("Content-type", "application/x-www-form-urlencoded");
    xmlhttp.setRequestHeader("Content-length", parameters.length);
    xmlhttp.setRequestHeader("Connection", "close");
	xmlhttp.send(parameters);
}