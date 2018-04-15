<?php
require_once("functions.php");
$page = new Page();
if(isset($_GET['id']) ){
	if($_GET['id'] != "" && is_numeric($_GET['id'])){
		$entreprise = new Entreprise($_GET['id']);
		if($entreprise->getId() != -1){
			// l'offre peut s'fficher aka id existe et est numerique. si la bdd ne retourne rien, offre->id = -1;
			$page->renderEntrepriseDetail($entreprise);
		}else{
			$page->renderEntrepriseNotFound();
		}
	}else{
		$page->renderEntrepriseNotFound();
	}
}else{
	$page->renderNotFound();
}