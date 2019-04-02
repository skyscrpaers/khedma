<?php
	include "../../core/Categorie.php";
	CollectionR::supprimerCollection($_POST['id']);
	header("location:category-list.php");
?>