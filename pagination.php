<?php
function genererLien($text, $page){
	echo("<a href='pagination.php?page=".$page."&max=".$_GET['max']."&offset=".$_GET['offset']."'>".$text."</a>");
}


$page = $_GET['page'];
$max = $_GET['max'];
$offset = $_GET['offset'];
if($page > $offset){
	genererLien("<< ",1);
}
if($page != 1){
	genererLien("  <  ",$page-1);
}

$minOffset = 0;
$maxOffset = $max;
if($page > $offset){
	$minOffset = $page-$offset;
}else{
	$minOffset = 1;
}

if($max-$page<= $offset){
	$maxOffset = $max;
} else{
	$maxOffset = $page + $offset;
}


for ($i=$minOffset; $i <= $maxOffset; $i++) { 
	if($i!=$page){
		genererLien("  ".$i."  ",$i);
		
	}else{
		genererLien(" (".$i.") ",$i);
	}
}
if($page != $max){
	genererLien("  >  ",$page+1);
}

if($max - $page >$offset){
	genererLien(" >>",$max);
}