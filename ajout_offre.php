<?php
require_once("functions.php");
$page = new Page();
$offre = new Offre();
// si le formulaire existe
if(isset($_POST['OK'])){
	// si l'objet a été sauvegardé
	if($offre->processForm()){
		$page->renderOffreSucces();
	}else{
		$page->renderOffreFail();
	}
}
$page->renderOffreForm(getArrayNameIdEntreprise());
