<?php
require_once("Class/Bdd.class.php");



class Offre{
	//apeller les methodes statiques pour initialiser un objet
	private $bdd;
	private $id = -1;
	private $idEntreprise;
	private $name;
	function __construct($id = 0){
		$this->bdd = Bdd::getInstance();
		if($id !=0){
			$this->offreById($id);
		}
	}
	function offreById($id){
		$result = $this->bdd->getOffreById($id);
		if(count($result) == 1 ){
			$this->id=$id;
			$this->name = $result[0]["name"];
			$this->idEntreprise = $result[0]["idEntreprise"];
		}else{
			$this->id = -1;
		}
	}
	function offreByProperties($name, $idEntreprise=0, $id=-1){
		$this->name = $name;
		$this->idEntreprise = $idEntreprise;
		$this->id = $id;
	}
	function save(){
		$this->bdd->saveOffre($this);
	}
	function getName(){
		return $this->name;
	}
	function getIdEntreprise(){
		return $this->idEntreprise;

	}
	function getId(){
		return $this->id;
	}
	function getEntrepriseName(){
		$result = $this->bdd->getNameEntrepriseById($this->getIdEntreprise());
		if(count($result) == 1){
			return $result[0]['name'];
		}
	}
	function processForm(){
		if(isset($_POST['name'])&&$_POST['name'] !=""){
			$this->offreByProperties($_POST['name'], $_POST["idEntreprise"]);
			$this->save();
			return true;
		}
		return false;
	}

}