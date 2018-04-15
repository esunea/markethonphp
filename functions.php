<?
require_once("Class/Bdd.class.php");
require_once("Class/Page.class.php");
require_once("Class/Offre.class.php");
require_once("Class/Entreprise.class.php");

function getMapNameIdEntreprise(){
	$array = Bdd::getInstance()->AllEntreprise();
	
	$returnArray = array();
	foreach ($array as $key => $value) {
		$returnArray[$value['id']] = $value['name']; 
	}
	
	return $returnArray;
}