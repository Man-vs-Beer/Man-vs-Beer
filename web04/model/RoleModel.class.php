<?php

class RoleModel extends Model{

	public function getWithId($int){
	
		switch ($int){
		
		case 1:
		return 'User';
		break;
		
		case 2:
		return 'Admin';
		break;
		
		default:
		return 'Utilisateur Non Enregistré';
		
		}
	}
	
	public function isAdmin($int){
	
		if ($int==2){
		return true;
		}
	
		return false;
	
	}
	
}