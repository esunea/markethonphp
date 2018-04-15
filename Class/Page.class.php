<?php

// classe de base, avec des propriétés et des méthodes membres
class Page {
	private $content = "";

	function __construct()
	{

		$this->content .="
		<!DOCTYPE html>
		<html lang='en'>
		<head>
		<meta charset='UTF-8'>
		<title>Markethon</title>
		</head>
		<body>
		<h1>PAGE</h1>
		";
		$this->renderMenu();
	}
	function __destruct(){

		$this->content .="
		</body>
		</html>
		";
		echo($this->content);
	}

	// offre *******************************************************


	
	function renderOffreUpdate($listOfEntreprises, $offre){
		// $this->content .="
		// <form action='' method='post'>
		// <input type='text' name='name' value='".$offre->getName()."'>
		// <input type='submit' name='OK'>
		// </form>
		// ";

		$this->content .="
		<form action='' method='post'>
		<select name='idEntreprise'>
		<option value='-1'>None</option>
		";

		foreach ($listOfEntreprises as $id => $name) {

			if($id== $offre->getIdEntreprise()){
				$this->content .="
				<option value='".$id."' selected>".$name."</option>
				";
			}else{
				$this->content .="
				<option value='".$id."'>".$name."</option>
				";
			}
		}
		$this->content .="
		</select>
		<input type='text' name='name' value='".$offre->getName()."'>
		<input type='submit' name='OK'>
		</form>
		";
	}
	function renderOffreForm($array){
		$this->content .="
		<form action='' method='post'>
		<select name='idEntreprise'>";

		foreach ($array as $key => $value) {
			$this->content .="
			<option value='".$key."'>".$value."</option>
			";
		}
		$this->content .="
		</select>
		<input type='text' name='name'>
		<input type='submit' name='OK'>
		</form>
		";
	}
	function renderOffreSucces($id=0){
		$this->content .="
		<p>l'offre a été correctement ajoutée</p>
		";
		if($id==1)$this->content .= "(modifications)";
	}
	function renderOffreFail($id=0){
		$this->content .="
		<p>l'offre n'as pas été ajoutée</p>
		";
		if($id==1)$this->content .= "(modifications)";
	}
	function renderOffreDetail($offre){
		$this->content .="
		<section>
		<h1>offre: ".$offre->getName()."</h1>
		<p>entreprise: ".$offre->getEntrepriseName()."</p>
		<a href='edit_offre.php?id=".$offre->getId()."'>Edit</a>
		</section>
		";
	}
	function renderOffreNotFound(){
		$this->content .= "
		<p>Cette offre n'existe pas </p>
		";
	}
	function renderConfirmDeleteOffre(){
		$this->content .="
		<p>L'offre a bien été supprimée</p>
		";	
	}













	function renderEntrepriseUpdate($entreprise){
		$this->content .="
		<form action='' method='post'>
		<input type='hidden' name='id' value=".$entreprise->getId().">
		<input type='text' name='name' value='".$entreprise->getName()."'>
		<input type='submit' name='OK'>
		</form>
		<a href='delete_entreprise.php?id=".$entreprise->getId()."'>Delete</a>
		";
	}
	function renderEntrepriseForm(){
		$this->content .="
		<form action='' method='post'>
		<input type='text' name='name'>
		<input type='submit' name='OK'>
		</form>
		";
	}
	function renderEntrepriseSucces($id=0){
		$this->content .="
		<p>l'entreprise a été correctement ajoutée</p>
		";
		if($id==1)$this->content .= "(modifications)";
	}
	function renderEntrepriseFail($id=0){
		$this->content .="
		<p>l'entreprise n'as pas été ajoutée</p>
		";
		if($id==1)$this->content .= "(modifications)";
	}
	
	

	function renderEntrepriseDetail($entreprise){
		$this->content .="
		<section>
		<h1>Entreprise: ".$entreprise->getName()."</h1>
		<a href='edit_entreprise.php?id=".$entreprise->getId()."'>Edit</a>
		</section>
		";
	}
	
	function renderEntrepriseNotFound(){
		$this->content .= "
		<p>Cette entreprise n'existe pas </p>
		";
	}



	function renderConfirmDeleteEntreprise(){
		$this->content .="
		<p>L'entreprise a bien été supprimée</p>
		";	
	}


	function renderNotFound(){
		$this->content .="
		<p>Stop asking for this page or you'll create a f**kin space-time rift that will annihilate the  human race and maybe the whole universe</p>
		";
	}
	function renderMenu(){
		$this->content .="
		<nav>
		<a href='ajout_entreprise.php'> Ajout entreprise</a>
		<a href='ajout_offre.php'> Ajout offre</a>
		<a href='affiche_offre.php?id=1'> Affiche offre</a>
		<a href='affiche_entreprise.php?id=1'> Affiche entreprise</a>
		</nav>
		";
	}





} // fin de la classe Vegetable


