<?PHP
include "../../config/config.php";

class ArticleR {
	
	public static function ajouterArticle ($produit_classe)
	{
        $ref=$produit_classe->getRef();
        $id_ca=$produit_classe->getIdco();
        $nom=$produit_classe->getNomArticle();
        $description=$produit_classe->getDescription();
        $prix=$produit_classe->getMargedeprix();
        $image=$produit_classe->getImage();
      	$bdd = config::getConnexion();
        $insertmbr = $bdd->prepare('INSERT INTO produit (ref,nom,description,prix,id_ca,image) VALUES(?,?,?,?,?,?)');
        $insertmbr->execute(array($ref,$nom,$description,$prix,$id_ca,$image));
	}
	function afficherArticleF($id_ca)
	{
		$sql =  'SELECT * FROM produit WHERE id_ca = '.$id_ca.'';
		$db = config::getConnexion();
				foreach  ($db->query($sql) as $row)
				{
					echo '<div class="card">
				<div class="left">
					<img src="../nalika-master/nalika/image/'.$row['image'].'">
				</div>
				<div class="right">
				<h2>'.$row['nom'].'</h2>
					<div class="details">
					<h2>'.$row['nom'].'</h2>
					<p>'.$row['description'].'</p>
					<button class="AjouterDansPanier"><i class="fas fa-cart-plus"></i></button>
				</div>
				</div>
			</div>'; 			
				}	
	}
	function afficherArticleB()
	{
		$sql='SELECT * FROM produit';
		$db = config::getConnexion();
				foreach  ($db->query($sql) as $row)
				{
					echo'<tr>
                                    <td><img src="../../nalika-master/nalika/image/'.$row['image'].'"></td>
                                    <td>'.$row['ref'].'</td>
                                    <td>
                                        '.$row['nom'].'
                                    </td>
                                    <td>
                                    	'.$row['description'].'
                                    </td>
                                    <td>'.$row['prix'].'</td>
                                    <td>
                                    <form method="POST" action="product-edit.php">
                                        <button type="submit" name="id" value="'.$row['ref'].'" id="'.$row['ref'].'" style=" padding: 5px 10px;font-size: 14px;border-radius: 3px;border: 1px solid rgba(0,0,0,.12);background: #152036;" class="edit"><i class="fa fa-pencil-square-o" aria-hidden="true"></i></button>
                                    </form>    
                                    </td>
                                    <td>
                                    
                                    <button data-toggle="tooltip" name="'.$row['id_ca'].'" id="'.$row['ref'].'" style=" padding: 5px 10px;font-size: 14px;border-radius: 3px;border: 1px solid rgba(0,0,0,.12);background: #152036;" class="delete"><i class="fa fa-trash-o" aria-hidden="true"></i></button>
                                    
                                    </td>	
                                    
                                        
                                </tr>';			
				}
				
	}
	public static function recupererArticle($id) 
	{
		$sql="SELECT * from produit where ref=?";
		$db = config::getConnexion();
		try{
			$verif=$db->prepare($sql);
			$verif->execute(array($id));
		$liste=$verif->fetch();
		return $liste;
		}
        catch (Exception $e){
            die('Erreur: '.$e->getMessage());
        }
	}
	public static function supprimerArticle($id){
		$sql="DELETE FROM produit where ref=:id";
		$db = config::getConnexion();
        $req=$db->prepare($sql);
		$req->bindValue(':id',$id);
		try{
            $req->execute();
        }
        catch (Exception $e){
            die('Erreur: '.$e->getMessage());
        }
	}
	public static function modifierArticle($produit_classe,$id){
		$sql="UPDATE produit SET nom = :nom,description = :description,prix = :prix, id_ca=:id_ca,ref=:ref WHERE ref = :id";
		
		$db = config::getConnexion();
	try{		
        $req=$db->prepare($sql);
        $ref=$produit_classe->getRef();
        $id_ca=$produit_classe->getIdco();
        $nom=$produit_classe->getNomArticle();
        $description=$produit_classe->getDescription();
        $prix=$produit_classe->getMargedeprix();
		$req->bindValue(':nom',$nom);
		$req->bindValue(':id',$id);
		$req->bindValue(':prix',$prix);
		$req->bindValue(':id_ca',$id_ca);
		$req->bindValue(':description',$description);
		$req->bindValue(':ref',$ref);
		
            $s=$req->execute();
        }
        catch (Exception $e){
            echo " Erreur ! ".$e->getMessage();
   echo " Les datas : " ;
  print_r($datas);
        }
		
	}
}
?>