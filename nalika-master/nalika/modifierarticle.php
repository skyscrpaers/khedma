<?php
	include "../../core/Produit.php";
	include "../../entities/produit_classe.php";
	
	$updateArticle = new produit_classe($_POST['ref'],$_POST['nom'],$_POST['description'],$_POST['prix'],$_POST['select'],"");
	$id=$_POST['id'];
	ArticleR::modifierArticle($updateArticle,$id);
	header("location:product-list.php");
?>