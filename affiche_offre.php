<?php
require_once("functions.php");
$page = new Page();
if(isset($_GET['id']) ){
	if($_GET['id'] != "" && is_numeric($_GET['id'])){
		$offre = new Offre($_GET['id']);
		if($offre->getId() != -1){
			// l'offre peut s'fficher aka id existe et est numerique. si la bdd ne retourne rien, offre->id = -1;
			$page->renderOffreDetail($offre);
		}else{
			$page->renderOffreNotFound();
		}
	}else{
		$page->renderOffreNotFound();
	}
}else{
	$page->renderNotFound();
}