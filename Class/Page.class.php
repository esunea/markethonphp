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
    <link rel='stylesheet' href='https://cdnjs.cloudflare.com/ajax/libs/bulma/0.7.0/css/bulma.min.css' />
		</head>
		<body>
      <section class='hero is-info is-bold'>
        <div class='hero-body' style='padding: 1rem 1.5rem;'>
          <div class='container'>
            <h1 class='title'>Markethon 2018</h1>
          </div>
        </div>
      </section>

		";
		$this->renderMenu();
	}
	function __destruct(){

		$this->content .="
    </div>
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
    <form action='' method='post' id='form'>
    <div class='field'>
      <label class='label'>Entreprise</label>
      <div class='control'>
        <div class='select is-fullwidth'>
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
        </div>
      </div>
    </div>
    <div class='field'>
      <label class='label'>Nom de l'offre</label>
      <div class='control'>
		    <input class='input' type='text' name='name' value='".$offre->getName()."'>
      </div>
    </div>
		<input type='submit' name='OK' class='button is-link'>
		</form>
		";
	}
	function renderOffreForm($array){
		$this->content .="
		<form action='' method='post' id='form'>
    <div class='field'>
      <label class='label'>Entreprise</label>
      <div class='control'>
        <div class='select is-fullwidth'>
          <select name='idEntreprise'>
            <option value='-1'>None</option>";

		foreach ($array as $key => $value) {
			$this->content .="
			<option value='".$key."'>".$value."</option>
			";
		}
		$this->content .="
		      </select>
        </div>
      </div>
    </div>
    <div class='field'>
      <label class='label'>Nom de l'offre</label>
      <div class='control'>
        <input class='input' type='text' name='name'>
      </div>
    </div>
    <input type='submit' name='OK' class='button is-link'>
		</form>
		";
	}
	function renderOffreSucces($id=0){
    if ($id==1) {
      $this->content .= $this->renderNotification("L'offre a été correctement modifiée", "success");
    } else {
      $this->content .= $this->renderNotification("L'offre a été correctement ajoutée", "success");
    }
	}
	function renderOffreFail($id=0){
    if ($id==1) {
      $this->content .= $this->renderNotification("L'offre n'a pas été modifiée", "danger");
    } else {
      $this->content .= $this->renderNotification("L'offre n'a pas été ajoutée", "danger");
    }
	}
	function renderOffreDetail($offre){
		$this->content .="
		<section class='content'>
		<h1>Offre: ".$offre->getName()."</h1>
		<p><strong>Entreprise:</strong> ".$offre->getEntrepriseName()."</p>
    <a class='button is-info' href='edit_offre.php?id=".$offre->getId()."'>Edit</a>
		</section>
		";
	}
	function renderOffreNotFound(){
    $this->content .= $this->renderNotification("Cette offre n'existe pas", "warning");
	}
	function renderConfirmDeleteOffre(){
    $this->content .= $this->renderNotification("L'offre a été correctement supprimée", "success");
	}







	function renderEntrepriseUpdate($entreprise){
		$this->content .="
		<form action='' method='post'>
		<input type='hidden' name='id' value=".$entreprise->getId().">
    <div class='field'>
      <label class='label'>Nom de l'entreprise</label>
      <div class='control'>
        <input class='input' type='text' name='name' value='".$entreprise->getName()."'>
      </div>
    </div>
    <input type='submit' name='OK' class='button is-link'>
    <a class='button is-danger' href='delete_entreprise.php?id=".$entreprise->getId()."'>Delete</a>
		</form>
		";
	}
	function renderEntrepriseForm(){
		$this->content .="
    <form action='' method='post' id='form'>
		<div class='field'>
      <label class='label'>Nom de l'entreprise</label>
      <div class='control'>
        <input class='input' type='text' name='name'>
      </div>
    </div>
    <input type='submit' name='OK' class='button is-link'>
		</form>
		";
	}
	function renderEntrepriseSucces($id=0){
    if ($id==1) {
      $this->content .= $this->renderNotification("L'entreprise a été correctement modifiée", "success");
    } else {
      $this->content .= $this->renderNotification("L'entreprise a été correctement ajoutée", "success");
    }
	}
	function renderEntrepriseFail($id=0){
    if ($id==1) {
      $this->content .= $this->renderNotification("L'entreprise n'as pas été modifiée");
    } else {
      $this->content .= $this->renderNotification("L'entreprise n'as pas été ajoutée");
    }
	}



	function renderEntrepriseDetail($entreprise){
		$this->content .="
		<section class='content'>
		<h1>Entreprise: ".$entreprise->getName()."</h1><br/>
		<a class='button is-info' href='edit_entreprise.php?id=".$entreprise->getId()."'>Edit</a>
		</section>
		";
	}

	function renderEntrepriseNotFound(){
    $this->content .= $this->renderNotification("Cette entreprise n'existe pas", "warning");
	}



	function renderConfirmDeleteEntreprise(){
		$this->content .= $this->renderNotification("L'entreprise a bien été supprimée", "success");
	}


	function renderNotFound(){
		$this->content .= $this->renderNotification("Stop asking for this page or you'll create a f**kin space-time rift that will annihilate the  human race and maybe the whole universe");
	}
  function renderNotification($message, $type='danger'){
    // types: danger, success, warning, info
    return "<div class='notification is-".$type."'>".$message."</div>";
  }

  function renderMenu(){
    $this->content .="
    <nav class='tabs is-centered'>
      <ul>
        ".$this->renderMenuLink('affiche_entreprise.php', 'Affiche entreprise')."
        ".$this->renderMenuLink('ajout_entreprise.php', 'Ajout entreprise')."
        ".$this->renderMenuLink('affiche_offre.php', 'Affiche offre')."
        ".$this->renderMenuLink('ajout_offre.php', 'Ajout offre')."
      </ul>
    </nav>
    <div class='container' style='padding: 1rem 1.5rem;'>
    ";
  }
  function renderMenuLink($filename, $label){
    if (basename($_SERVER["SCRIPT_FILENAME"]) == $filename){
      // Lien actif si on est sur la page du lien
      return "<li class='is-active'><a href='".$filename."'>".$label."</a></li>";
    }
    return "<li><a href='".$filename."'>".$label."</a></li>";
  }





} // fin de la classe Vegetable


