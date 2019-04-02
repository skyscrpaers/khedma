<?php 
include "../../entities/categorie-classe.php";
include "../../core/Categorie.php";
 	if(isset($_FILES['image']) AND !empty($_FILES['image']['name'])) {
      $an=htmlspecialchars($_POST['an']);
      $nomc=htmlspecialchars($_POST['nomcollection']);
   $tailleMax = 2097152;
   $extensionsValides = array('jpg','jpeg','png');
   if($_FILES['image']['size'] <= $tailleMax) {
      $extensionUpload = strtolower(substr(strrchr($_FILES['image']['name'], '.'), 1));
      if(in_array($extensionUpload, $extensionsValides)) {
         $chemin = "image/".$an.".".$extensionUpload;
         $image=$an.".".$extensionUpload;
         $resultat = move_uploaded_file($_FILES['image']['tmp_name'], $chemin);
         if($resultat) {
               $newCategorie = new Categorie_classe($nomc,$an,$image);
               CollectionR::ajouterCollection($newCategorie);
         } else {
            echo '<script>alert("Erreur durant l importation de votre photo de profil")</script>';
         }
      } else {
         echo '<script>alert("Votre photo de profil doit être au format jpg, jpeg, gif ou png")</script>';
      }
   } else {
      echo '<script>alert("Votre photo de profil ne doit pas dépasser 2Mo")';
   }
	}
   header("location:category-edit.php");
 ?>