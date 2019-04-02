<?php
	include "../../core/Produit.php";
	ArticleR::supprimerArticle($_POST['ref']);
	$id=$_POST['id'];
			   $increment=1;
               $sql='UPDATE categorie set quantite=quantite - :increment WHERE id_ca=:id';
               $db = config::getConnexion();
        		$req=$db->prepare($sql);
        		$req->bindValue(':increment',$increment);
				$req->bindValue(':id',$id);
            $req->execute();
?>