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
// si le fomulaire n'esiste pas, on vérifie $_GET 
else{
	if(isset($_GET['id']) ){
		if($_GET['id'] != "" && is_numeric($_GET['id'])){
			$offre = new Offre($_GET['id']);
			if($offre->getId() != -1){
			// l'offre peut s'fficher aka id existe et est numerique. si la bdd ne retourne rien, offre->id = -1;
				$page->renderOffreUpdate(getMapNameIdEntreprise(),$offre);
			}
		}else{
			$page->renderOffreNotFound();
		}
	}
}

