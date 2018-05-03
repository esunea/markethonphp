<?php
require_once("functions.php");
$page = new Page();

if(!isset($_GET['id'])){
	$id=1;
}else{
	$id=$_GET['id'];
}
if($id != "" && is_numeric($id)){
	$entrepriseList = getEntrepriseList($id);
	if(count($entrepriseList) != 0){
		$max = getMaxEntreprisePagination();
		pagination($id,$max, $page);
		foreach ($entrepriseList as $index => $entreprise) {
			$page->renderEntrepriseListItem($entreprise);
		}
		pagination($id,$max, $page);
	}else{
		$page->renderEntrepriseNotFound();
	}
}else{
	$page->renderEntrepriseNotFound();
}

