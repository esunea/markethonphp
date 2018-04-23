<?php
session_start();
define("OFFSET",10);
require_once("Class/Bdd.class.php");
require_once("Class/Page.class.php");
require_once("Class/Offre.class.php");
require_once("Class/Entreprise.class.php");
require_once("Class/User.class.php");



function getMapNameIdEntreprise(){
	$array = Bdd::getInstance()->AllEntreprise();
	
	$returnArray = array();
	foreach ($array as $key => $value) {
		$returnArray[$value['id']] = $value['name']; 
	}
	
	return $returnArray;
}

function getEntrepriseList($page=1){
	if($page <= 0)
		$page=1;
	$array = Bdd::getInstance()->getEntrepriseList($page-1);
	$entrepriseArray=array();
	foreach ($array as $index => $entreprise) {
		$entrepriseTemp = new Entreprise();
		$entrepriseTemp->entrepriseByProperties($entreprise['name'],$entreprise['id']);
		$entrepriseArray[$index] = $entrepriseTemp;
	}
	return $entrepriseArray;
}

function getOffreList($page=1){
	if($page <= 0)
		$page=1;
	$array = Bdd::getInstance()->getOffreList($page-1);
	$offreArray=array();
	foreach ($array as $index => $offre) {
		$offreTemp = new Offre();
		$offreTemp->offreByProperties($offre['name'],$offre['idEntreprise'],$offre['id']);
		$offreArray[$index] = $offreTemp;
	}
	return $offreArray;
}