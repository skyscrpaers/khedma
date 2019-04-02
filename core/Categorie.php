<?PHP
include "../../config/config.php";
class CollectionR {
	
	public static function ajouterCollection ($Categorie_classe)
	{
        $nomc=$Categorie_classe->getNomCollection();
		$an=$Categorie_classe->getAn();
      	$image=$Categorie_classe->getImage();
      	$bdd = config::getConnexion();
        $insertmbr = $bdd->prepare('INSERT INTO categorie(nomc,an,image) VALUES(?,?,?)');
        $insertmbr->execute(array($nomc,$an,$image));
	}
	function afficherCollectionF()
	{
		$sql =  'SELECT * FROM categorie ORDER BY an';
		$db = config::getConnexion();
				foreach  ($db->query($sql) as $row)
				{
					echo '<script>alert("'. $row['image'] .'");</script> ';
					echo '<div class="swiper-slide">
				<div class="swiper-image">
					<button classe="id_ca" onclick="showpic(this.id)"; style="border:none;background-color:transparent;" type="submit" name="send" id="'.$row['id'].'" value="'.$row['id'].'"><img src="../nalika-master/nalika/image/'. $row['image'] .'"></button>
				</div>
			</div>'; 			
				}

		echo '<script>alert("'.$sql.'");</script>';			
	}
	function afficherCollectionB()
	{
		$sql =  'SELECT * FROM categorie ORDER BY an';
		$db = config::getConnexion();
				foreach  ($db->query($sql) as $row)
				{
					echo'<tr>
                                    <td><img src="../../nalika-master/nalika/image/'. $row['image'] .'"></td>
                                    <td>'.$row['nomc'].'</td>
<td></td>
                                    <td>
                                    	'.$row['an'].'
                                    </td>
                                    
                                    <td>'.$row['quantite'].'</td>
                                    <td>
                                    <form method="POST" action="category-edit.php">
                                        <button type="submit" name="id" value="'.$row['id'].'" id="'.$row['id'].'" style=" padding: 5px 10px;font-size: 14px;border-radius: 3px;border: 1px solid rgba(0,0,0,.12);background: #152036;" class="edit"><i class="fa fa-pencil-square-o" aria-hidden="true"></i></button>
                                    </form>    
                                    </td>
                                    <td><button data-toggle="tooltip" name="delete" id="'.$row['id'].'" style="padding: 5px 10px;font-size: 14px;border-radius: 3px;border: 1px solid rgba(0,0,0,.12);background: #152036;" class="delete"><i class="fa fa-trash-o" aria-hidden="true"></i></button></td>
                                </tr>';			
				}
				
	}
	public static function recupererCollection($id) 
	{
		$sql="SELECT * from categorie where id=?";
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
	public static function supprimerCollection($id){
		$sql="DELETE FROM categorie where id = :id";
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
	public static function modifiercollection($Categorie_classe,$id){
		$sql="UPDATE categorie SET nomc = :nomc, an = :an WHERE id = :id";
		
		$db = config::getConnexion();
		//$db->setAttribute(PDO::ATTR_EMULATE_PREPARES,false);
try{		
        $req=$db->prepare($sql);
        $nomc=$Categorie_classe->getNomCollection();
		$an=$Categorie_classe->getAn();
		$datas = array(':nomc'=>$nomc , ':an'=>$an);
		$req->bindValue(':nomc',$nomc);
		$req->bindValue(':an',$an);
		$req->bindValue(':id',$id);
		
            $s=$req->execute();
			
           // header('Location: index.php');
        }
        catch (Exception $e){
            echo " Erreur ! ".$e->getMessage();
   echo " Les datas : " ;
  print_r($datas);
        }
		
	}
}
?>