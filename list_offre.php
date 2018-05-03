<?php
require_once("functions.php");
$page = new Page();

if(!isset($_GET['id'])){
	$id=1;
}else{
	$id=$_GET['id'];
}
if($id != "" && is_numeric($id)){
	$offreList = getOffreList($id);
	if(count($offreList) != 0){
		$max = getMaxOffrePagination();
		pagination($id,$max, $page);
		foreach ($offreList as $index => $offre) {
			$page->renderOffreListItem($offre);
		}
		pagination($id,$max, $page);
	}else{
		$page->renderOffreNotFound();
	}
}else{
	$page->renderOffreNotFound();
}