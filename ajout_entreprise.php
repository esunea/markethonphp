<?php
require_once("functions.php");
$page = new Page();
$entreprise = new Entreprise();
// si le formulaire existe
if(isset($_POST['OK'])){
	// si l'objet a été sauvegardé
	if($entreprise->processForm()){
		$page->renderEntrepriseSucces();
	}else{
		$page->renderEntrepriseFail();
	}
}	

$page->renderEntrepriseForm();
