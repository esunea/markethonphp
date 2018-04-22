<?php
require_once("functions.php");
$page = new Page();
$entreprise = new Entreprise();
// si le formulaire existe
if(isset($_POST['OK'])){
	// si l'objet a été sauvegardé
	if($entreprise->processForm()){
		$page->renderEntrepriseSucces(1);
	}else{
		$page->renderEntrepriseFail(1);
	}
}
// si le fomulaire n'esiste pas, on vérifie $_GET 
else{
	if(isset($_GET['id']) ){
		if($_GET['id'] != "" && is_numeric($_GET['id'])){
			$entreprise = new Entreprise($_GET['id']);
			if($_GET['id'] != -1){ 	 	
			// l'entreprise peut s'fficher aka id existe et est numerique. si la bdd ne retourne rien, entreprise->id = -1;
				$page->renderEntrepriseUpdate($entreprise->entrepriseById($_GET['id']));

			}
		}else{
			$page->renderEntrepriseNotFound();
		}
	}
}
