<?php
class User{
	public $logged=false;
	public $id=0;
	public $user='';
	private $ip='';
	
	public function __construct(){
		if (cp('action')=='login'){
			$login_user=cp('login_user');
			$login_pass=cp('login_pass');
			global $smarty,$err_msg;
			
			if (!$this->login($login_user,$login_pass)){
				$err_msg='Wrong Login Details';
			}
			$smarty->assign('login_user',$login_user);
			$smarty->assign('login_pass',$login_pass);
			return;
		}
		
		if (cg('action')=='logout'){
			$this->logout();
			return;
		}
		
			$this->getLoggedIn();
		
	}
	
	public function getLoggedIn(){
		session_start();
		if (isset($_SESSION["admin"])){
			$admin=$_SESSION["admin"];
			if ($admin->id>0 && $admin->ip == ip()){
				$this->id=$admin->id;
				$this->user=$admin->user;
				$this->ip=$admin->ip;
				$this->logged=true;
				session_write_close();
				return true;
			}
		}
		$this->logged=false;
		session_write_close();
	}
	
	public function login($user,$pass){
		global $db;
		$userA=$db->getRows("select * from administration where user='$user' and pass='".md5($pass)."'");
		$user=$userA[0];
		if (isset($user->id) && $user->id>0){
			$this->id=$user->id;
			$this->user=$user->user;
			$this->ip=ip();
			$this->logged=true;
			$this->updateSession();
			return true;
		}else{
			$this->id=0;
			$this->user='';
			$this->ip='';
			$this->logged=false;
			return false;
		}
	}//
	
	public function logout(){
		session_start();
		session_destroy();
		session_write_close();
		$this->id=0;
		$this->user='';
		$this->ip='';
		$this->logged=false;
	}//
	
	private function updateSession(){
		session_start();
			$admin->id=$this->id;
			$admin->user=$this->user;
			$admin->ip=$this->ip;
			$_SESSION["admin"]=$admin;
		session_write_close();
	}
}//