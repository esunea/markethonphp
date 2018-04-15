<?php
require_once("Class/Bdd.class.php");

class Entreprise{
	private $bdd;
	private $id=-1;
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
		return $this;
	}
	function entrepriseByProperties($name, $id=-1){
		$this->name = $name;
		$this->id = $id;
		return $this;
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
			if(isset($_POST['id'])&&$_POST['id'] !=""){
				$this->entrepriseByProperties($_POST['name'],$_POST['id']);
			}else{
				$this->entrepriseByProperties($_POST['name']);
			}
			$this->save();
			return $this;
		}
		return false;
	}
	function processUpdateForm(){

	}
	function getId(){
		return $this->id;
	}

}