﻿<?php

class UserModel extends Model{

	protected static $table_name = 'USER';
	
	public static function isLoginUsed($login){
		
		return count(parent::exec('LOGIN_USED', array(':login' => $login))) != 0;
		
	}
	
	
	public static function create($login, $pwd, $mail,$nom) {
		
		
		$sth = parent::exec('USER_CREATE',
		array(':login' => $login,
		':email' => $mail,
		':role' => 1,
		':pwd' => $pwd,
		':name' => $nom,
		));
		
		return static::tryLogin($login, $pwd);
	}
	
	public static function tryLogin($login, $pwd){
		$sth = parent::exec('USER_LOGIN',
		array( ':login' => $login,
		':password' => $pwd));	
		
		//var_dump($sth);
		//var_dump($sth[0]);
		//var_dump($sth[0]->PSEUDO);
		
		if(count($sth) > 0)
		{
			$user = $sth[0];
			$_SESSION['role'] = $user->ROLE;
			$_SESSION['nom'] = $user->PSEUDO;
			$_SESSION['password'] = $user->PASSWORD;
			$_SESSION['email'] = $user->EMAIL;
			$_SESSION['login'] = $user->LOGIN;
			return $user;
			

		}

		return NULL;
	}
	
	public function id() {return $this->props[self::$table_name.'_LOGIN']; }
	
	public function roleId() {return $this->props[self::$table_name.'_ROLE']; }
	
	public function role() {return Role::getWithId($this->roleId()); }
	
	public function isAdmin() { return ($this->role()->isAdmin()) ; }

	public static function getAllUsers(){
		return $sth = parent::exec('TOUS_LES_USERS',NULL);	
		
	}
	
    public static function getAllAccount(){
		return $sth=self::exec('TOUS_LES_USERS',NULL);
		
	}
	
       

}