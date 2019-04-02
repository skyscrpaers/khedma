<?php
	include "../../core/Produit.php";
	$query='';
	$query .= "SELECT * FROM produit ";
if(isset($_POST["search"]["value"]))
{
 $query .= 'WHERE ref LIKE "%'.$_POST["search"]["value"].'%" OR nom LIKE "%'.$_POST["search"]["value"].'%" OR prix LIKE "%'.$_POST["search"]["value"].'%" OR description LIKE "%'.$_POST["search"]["value"].'%" ';
}
    $hi = new ArticleR();
    $hi->afficherArticleB($query);
?>