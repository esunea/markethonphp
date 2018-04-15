<?php
require_once("Class/Bdd.class.php");

class Entreprise{
	private $bdd;
	private $id;
	private $name;
	function __construct($id = 0){
		$this->bdd = Bdd::getInstance();
		if($id !=0){
			$this->entrepriseById($id);
		}
	}
	function entrepriseById($id){
		$result = $this->bdd->getEntrepriseById($id);
		if(count($result) == 1 ){
			$this->id=$id;
			$this->name = $result[0]["name"];
			//$this->idEntreprise = $result[0]["idEntreprise"];
		}else{
			$this->id = -1;
		}
	}
	function entrepriseByProperties($name){
		$this->name = $name;
	}
	function save(){
		$this->bdd->saveEntreprise($this);
	}
	function getName(){
		return $this->name;
	}
	function processForm(){
		// renvoie vrai si la sauvegader s'est bien passé, faux sinon
		if(isset($_POST['name'])&&$_POST['name'] !=""){
			$this->entrepriseByProperties($_POST['name']);
			$this->save();
			return true;
		}
		return false;
	}
	function getId(){
		return $this->id;
	}

}