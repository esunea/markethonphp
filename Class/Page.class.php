<?php

// classe de base, avec des propriétés et des méthodes membres
class Page {
	private $content = "";
	private $user ;
	function __construct()
	{
		$user = User::getInstance();
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

		$this->renderMenu($user->isConnected());
		if($user->isConnected()){
			$this->content .= "
			hello there
			";
		}else{
			$this->renderLoginForm();
		}
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

// USER *************************


	function renderUserForm(){
		$this->content .="
		<form action='' method='post'>
		<input type='text' name='login' placeholder='Login'>
		<input type='text' name='pass' placeholder='pass'>
		<input type='mail' name='mail' placeholder='mail'>
		<input type=submit name='OK'>
		</form>
		";	
	}
	function renderUserSucces($id=0){
		$this->content .="
		<p>l'utilisateur a été correctement ajoutée</p>
		";
		if($id==1)$this->content .= "(modifications)";
	}
	function renderUserFail($id=0){
		$this->content .="
		<p>l'utilisateur n'as pas été ajoutée</p>
		";
		if($id==1)$this->content .= "(modifications)";
	}

	function renderLoginForm(){
		$this->content .="
		<form action='login.php' method='post'>
		<input type='text' name='login' placeholder='Login'>
		<input type='text' name='pass' placeholder='pass'>
		<input type=submit name='OK'>
		</form>
		";
	}
	// entreprise *******************************








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
		<form action='' method='post'><br/>
		<input type='text' name='name'><br/>
		<input type='submit' name='OK'><br/>
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
		<p>Stop asking for this page or you'll create a f**kin space-time rift that will annihilate the human race and maybe the whole universe</p>
		";
	}
	function renderMenu($isConnected = false){
		$this->content .="
		<nav>
		";
		if ($isConnected) {
			$this->content .="
			<a href='ajout_entreprise.php'> Ajout entreprise</a>
			<a href='ajout_offre.php'> Ajout offre</a>
			<a href='affiche_offre.php?id=1'> Affiche offre</a>
			<a href='affiche_entreprise.php?id=1'> Affiche entreprise</a>
			<a href='logout.php'>logout</a>
			";
		}else{
			$this->content .="
			<a href='inscription.php'>inscription</a>
			";
		}
		
		
		$this->content .="
		</nav>
		<br/>
		";
	}





} // fin de la classe Vegetable


