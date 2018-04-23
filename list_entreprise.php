<?php
require_once("functions.php");
$page = new Page();
$entrepriseList = getEntrepriseList(0);
foreach ($entrepriseList as $index => $entreprise) {
	$page->renderEntrepriseDetail($entreprise);
}

		