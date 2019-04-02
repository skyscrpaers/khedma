<?php
	include "../../core/Categorie.php";
	include "../../entities/categorie-classe.php";
	
	$updatecol= new Categorie_classe($_POST['nomc'],$_POST['an'],"");
	$id=$_POST['id'];
	CollectionR::modifiercollection($updatecol,$id);
	header("location:category-list.php");
	
	
?>