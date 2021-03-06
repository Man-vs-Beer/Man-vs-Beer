<?php

class UserController extends Controller
{

	public function __construct($request) {
		
		parent::__construct($request);
		$userId = NULL;
		if(($request->has('user')))
		$userId = $request->read('user');
		if(!is_null($userId))
		$this->user = User::getWithId($userId);
		
	}
	
	public function validateInscription() {
		
		$login=$_POST['inscLogin'];
		
		if(UserModel::isLoginUsed($login)) {
			$view = new View($this,'inscription');
			$view->setArg('inscErrorText','This login is already used');
			$view->render();
		} 
		
		else {
			$password = $_POST['inscPassword'];
			$nom = $_POST['nickname'];
			$mail = $_POST['mail'];
			$user = UserModel::create($login, $password,$mail,$nom);
			if(!isset($user)) {
				$view = new View($this,'inscription');
				$view->setArg('inscErrorText', 'Cannot complete inscription');
				$view->render();
			} else {
				$newRequest = new Request();
				$newRequest = $newRequest->construireLien('user','','');
				Dispatcher::getCurrentDispatcher()->dispatch($newRequest);
			}
		}
	}
	
	// action
	public function profile($args) {
		$v = new UserView($this->user);
		$v->renderProfile();
	}
	
	// action de lancer le jeu preciser numero de partie et login

	
	public function about(){
		$view = new AboutUserView($this,'about');
		$view->render();
	}
        	
	public function monProfil(){
		$view = new MonProfilView($this,'monProfil');
		$view->render();
	}
	
	public function connected(){
		
		$view = new UserView($this,'Anonymous');
		$view->render();}
		
	public function adminUser(){
		
		$view = new AdminUserView($this,'Anonymous', (UserModel::getAllUsers()));
		$view->render();}
	
	public function defaultAction()
	{		
		$view = new UserView($this,'contenuUser');
		$view->render();		
	}
	
	
	public function disconnect() {

		$view = new AnonymousView($this,'Anonymous');
		$view->render();
		session_destroy();
    }
	
	


}