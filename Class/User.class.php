<?php
class User {

	

	private static $_instance = null;
	private $bdd;
	private $login;
	private $pass;
	private $mail;
	private $rank;
	public static function getInstance() {

		if(is_null(self::$_instance)) {
			self::$_instance = new User();  
		}
		
		return self::$_instance;
	}


	function __construct(){
		$this->bdd = Bdd::getInstance();
	}
	
	function processForm(){
		// renvoie vrai si la sauvegader s'est bien passé, faux sinon
		if(isset($_POST['login']) && isset($_POST['pass']) && isset($_POST['mail']) && $_POST['login'] !="" && $_POST['pass'] !="" && $_POST['mail'] !=""){	
			$this->register($_POST['login'],$_POST['pass'],$_POST['mail']);

			$this->save();
			return $this;
		}
		return false;
	}
	function register($login, $pass, $mail){
		$this->login=$login;
		$this->pass =$pass;
		$this->mail = $mail;
		return $this;
	}
	function save(){
		$this->bdd->registerUser($this);
	}
	function getLogin(){
		return $this->login;
	}
	function getPass(){
		return $this->pass;
	}
	function getMail(){
		return $this->mail;
	}
	function isConnected(){
		if(isset($_SESSION['login'])){
			return true;
		}
		return false;
	}
	function userAuthenticate(){
		if(isset($_POST['login']) && isset($_POST['pass'])){
			$result = $this->bdd->authenticate($_POST['login'],$_POST['pass']);

			$this->login = $result['login'];
			$this->pass = $result['pass'];
			$this->mail = $result['mail'];
			$this->rank = $result['rank'];
			$_SESSION['login'] = $result['login'];
			$_SESSION['mail'] = $result['mail'];
			$_SESSION['rank'] = $result['rank'];
		}
	}

}