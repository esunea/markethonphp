<?php
require_once("functions.php");
$page = new Page();
$offreList = getOffreList(0);
foreach ($offreList as $index => $offre) {
	$page->renderOffreDetail($offre);
}

		