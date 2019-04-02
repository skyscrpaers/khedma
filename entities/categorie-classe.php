<?PHP
 	class Categorie_classe
 	{
 		private $id;
		private $nomc;
		private $quantite;
		private $an;
		private $image;
		function __construct($nomc,$an,$image)
		{
			$this->nomc=$nomc;
			$this->an=$an;
			$this->image=$image;
		}
		public function getId()
		{
			return $this->id;
		}
		public function getNomCollection()
		{
			return $this->nomc;
		}
		public function getAn()
		{
			return $this->an;
		}
		public function getImage()
		{
			return $this->image;
		}
		public function getNbArticle()
		{
			return $this->quantite;
		}
		public function setId($val)
		{
			$this->id=$val;
		}
		public function setNomCollection($val)
		{
			$this->nomcollection=$val;
		}
		public function setAn($val)
		{
			$this->an=$val;
		}
		public function setNbArticle($val)
		{
			$this->quantite=$val;
		}

 	}
?>