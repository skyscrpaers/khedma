<?php
include "../../entities/produit_classe.php";
include "../../core/Produit.php";
 	if(isset($_FILES['image']) AND !empty($_FILES['image']['name'])) {
      $ref=htmlspecialchars($_POST['ref']);
      $nom=htmlspecialchars($_POST['nom']);
      $prix=htmlspecialchars($_POST['prix']);
      $description=htmlspecialchars($_POST['description']);
      $id_ca=htmlspecialchars($_POST['select']);
   $tailleMax = 2097152;
   $extensionsValides = array('jpg','jpeg','png');
   if($_FILES['image']['size'] <= $tailleMax) {
      $extensionUpload = strtolower(substr(strrchr($_FILES['image']['name'], '.'), 1));
      if(in_array($extensionUpload, $extensionsValides)) {
         $chemin = "image/".$ref.".".$extensionUpload;
         $image=$ref.".".$extensionUpload;
         $resultat = move_uploaded_file($_FILES['image']['tmp_name'], $chemin);
         if($resultat) {
               $newProduit = new produit_classe($ref,$nom,$description,$prix,$id_ca,$image);
               ArticleR::ajouterArticle($newProduit);
               $increment=1;
               $sql='UPDATE categorie set quantite=quantite + :increment WHERE id=:id';
               $db = config::getConnexion();
        		$req=$db->prepare($sql);
        		$req->bindValue(':increment',$increment);
				$req->bindValue(':id',$id_ca);
            $req->execute();
         } else {
            echo '<script>alert("Erreur durant l importation de la photo")</script>';
         }
      } else {
         echo '<script>alert("la photo doit être au format jpg, jpeg, gif ou png")</script>';
      }
   } else {
      echo '<script>alert("la photo ne doit pas dépasser 2Mo")';
   }
	}
	header("location:product-edit.php");
?>