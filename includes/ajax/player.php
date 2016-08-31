<?php

//register user
	if ($act=='register_user'){
		//check for registered email
		$reg_count=$db->getFunction("select * from player where email='".p("email")."'");
			if ($reg_count>'0'){ // this email already registered
				$data["data"]="showError('".out('User Registration')."','".out('This email is already used!')."');";
				$data["command"]='exec';
				$ajax->add($data);									
				unset($data); // clear data	
			}else{
				//check for display name
				$dn_count=$db->getFunction("select * from player where display_name='".p("name")."'");
				if ($reg_count>'0'){ // this email already registered
					$data["data"]="showError('".out('User Registration')."','".out('This name is already used!')."');";
					$data["command"]='exec';
					$ajax->add($data);									
					unset($data); // clear data	
				}else{
					if (p('pass')!=''){
						$player->email=p("email");
						$player->setPass(p("pass"));
						$player->display_name=p("name");
						$player->create();
						$player->login($player->email,p('pass'));
						$data["command"]='reload';
						$ajax->add($data);									
						unset($data); // clear data	
					}else{
						$data["data"]="showError('".out('User Registration')."','".out('Please select a password!')."');";
						$data["command"]='exec';
						$ajax->add($data);									
						unset($data); // clear data	
					}
				}
			}//end check email
	}// end register_user
	
	// RESET PASSWORD
	if ($act=='reset_pwd'){
			if(p("email")==''){
				$data["data"]="showError('".out('Empty Email')."','".out('Please enter valid email in login window.')."');";
				$data["command"]='exec';
				$ajax->add($data);									
				unset($data); // clear data			
			}else{
				//check for registered email
				$reg_count=$db->getFunction("select count(*) from player where email='".p("email")."'");
				if ($reg_count=='0'){ // this email already registered
					$data["data"]="showError('".out('User Not exists')."','".out('This email is not registered!')."');";
					$data["command"]='exec';
					$ajax->add($data);									
					unset($data); // clear data	
				}else{
				
					$player->send_resetpwd_email(p("email"));
					$data["data"]="showError('".out('Email Sent')."','".out('Please check your email inbox!')."');";
					$data["command"]='exec';
					$ajax->add($data);									
					unset($data);					
				}//end check email
			}
	}// end RESET PASSWORD	
	
	if($act=='update_pwd'){
			if(p("npwd")=='' || p("cpwd")==''){
				$data["data"]="showError('".out('Empty Fields')."','".out('Please enter New Password and Confirm Password.')."');";
				$data["command"]='exec';
				$ajax->add($data);									
				unset($data); // clear data			
			}else if(p("npwd") != p("cpwd")){
				$data["data"]="showError('".out('Fields Not Matching')."','".out('New Password and Confirm Password should be same.')."');";
				$data["command"]='exec';
				$ajax->add($data);									
				unset($data); // clear data			
			}else{
				//update new password
				if(p("npwd") == p("cpwd")){
				$upd_query = "update player set pass='".md5(p("cpwd"))."' where id= ".p('hidid')."";
				$db->query($upd_query);
				echo "pwdsucc";		
				die;
				}else{
					$data["data"]="showError('".out('Fields Not Matching')."','".out('New Password and Confirm Password should be same.')."');";
					$data["command"]='exec';
					$ajax->add($data);									
					unset($data); // clear data					
				}
			}	
	}
// logout user
	if ($act=='logout_user'){
		$player->logout();
		$data["command"]='reload';
		$ajax->add($data);									
		unset($data); // clear data	
	}//logout

// login user
	if ($act=='login_user'){
		$player->email=p("email");
		$player->setPass(p("pass"));
		$player->login($player->email,p('pass'));
		if ($player->is_logged()){
			$data["command"]='reload';
			$ajax->add($data);									
		}else{
			$data["data"]="showError('".out('Login')."','".out('Wrong username or password!')."');";
			$data["command"]='exec';

			$ajax->add($data);									
			unset($data); // clear data	
		}
		unset($data); // clear data	
	}//login
	
// join table
	if ($act=='join_table'){
		if ($player->is_logged()){
			if ($player->enterTable(p('id'))){ // send table html
				$game->loadTable();
			}else{
				//error could not join table
			}
		}
	}//join table
	
// join table
	if ($act=='leave_table'){
		if ($player->is_logged()){
			$game->unseatPlayer($player);
			$player->leaveTable();			
			$game->loadTables();
		}
	}//join table
	
// use seat
	if ($act=='sit_on'){
		if ($player->is_logged()){
			$error=$game->seatPlayer($player,p('bis'),p('bia'));
			if ($error==''){
				$game->refreshTable();
			}else{
				$data["data"]="showError('".out('Join Table')."','".$error."');";
				$data["command"]='exec';
				$ajax->add($data);									
				unset($data); // clear data	
			}
			$data["command"]='hide_object';
			$data["object"]='buy_in_div';
			$ajax->add($data);									
			unset($data); // clear data	
		}
	}//sit down
	
// use seat
	if ($act=='stand_up'){
		if ($player->is_logged()){
			$error=$game->unseatPlayer($player);
			if ($error==''){
				$game->refreshTable();
			}
		}
	}//sit down
	
	
// join table
	if ($act=='join_random_table'){
		if ($player->is_logged()){
			$random_table_idQ=$db->getRow("select * from tables where available=1 and used_seats<max_seats and min_buy<'".$player->balance."' order by used_seats desc,player_timeout desc");
			$random_table_id=$random_table_idQ->id;
			if ((int)$random_table_id>0){
				if ($player->enterTable($random_table_id)){ // send table html
					$game->loadTable();
				}else{
					//error could not join table
				}
			}
		}
	}//join table
	
// Fold hand
	if ($act=='fold'){
		if ($player->is_logged() && $player->seat_id>0){
			$game->playFold($player);
			$game->refreshTable();
		}
	}//

// Call hand
	if ($act=='call'){
		if ($player->is_logged() && $player->seat_id>0){
			$game->playCall($player);
			$game->refreshTable();
		}
	}//
	
// Rise
	if ($act=='rise'){
		if ($player->is_logged() && $player->seat_id>0){
			$game->playRise($player,p('amount'));
			$game->refreshTable();
		}
	}//
	
// Rise
	if ($act=='chat'){
		if ($player->is_logged() && $player->table_id>0){
			$game->table->tableChat($player,p('chat'));
			$game->refreshTable();
		}
	}//
	
// update avatar
	if ($act=='update_avatar'){
		$file=$_FILES["avatar"];
		require_once('includes/modules/file_manager/fileManager.php');
		require_once('includes/modules/file_manager/imageManager.php');
		$avatarhandler=new fileManager();
		$avatarMan=new imageManager();
		
		$saved=$avatarhandler->saveFile($file,array('jpg','png'),(2*1024*1024));
		if ($saved->error==''){
			$avatarhandler->deleteFile($player->avatar);
			
			$avatarMan->create_thumb($saved->path,$saved->path,100);
			
			$player->updateAvatar($saved->image_url);
			echo 'Saved ! mafrood';
			echo '<script language="JavaScript">
					parent.getObj("msg_window").style.display="none";
					parent.alert(\'New avatar Saved\');
				</script>';
		}else{
			echo '<script language="JavaScript">
					parent.alert(\''.$saved->error.'\');
				</script>';
		}
	}//sit down
?>