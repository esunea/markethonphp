<?php
require_once("functions.php");
$page = new Page();
$user = User::getInstance();
// si le formulaire existe
if(isset($_POST['OK'])){
	// si l'objet a été sauvegardé
	if($user->processForm()){
		$page->renderUserSucces();
	}else{
		$page->renderUserFail();
	}
}	

$page->renderUserForm();
