<?PHP
 	class produit_classe
 	{			
 		private $ref;	
		private $nom;
		private $description;
		private $prix;
		private $id_ca;
		private $image;
		function __construct($ref,$nom,$description,$prix,$id_ca,$image)
		{
		 	$this->id_ca=$id_ca;
		 	$this->nom=$nom;
			$this->ref=$ref;
			$this->description=$description;
			$this->prix=$prix;
			$this->image=$image;
		}
		public function getRef()
		{
			return $this->ref;
		}
		public function getIdco()
		{
			return $this->id_ca;
		}
		public function getNomArticle()
		{
			return $this->nom;
		}
		public function getDescription()
		{
			return $this->description;
		}
		public function getImage()
		{
			return $this->image;
		}
		public function getMargedeprix()
		{
			return $this->prix;
		}
		public function setRef($val)
		{
			$this->ref=$val;
		}
		public function setIdco($val)
		{
			$this->id_ca=$val;
		}
		public function setNomArticle($val)
		{
		    $this->nom=$val;
		}
		public function setDescription($val)
		{
			$this->description=$val;
		}
		public function setMargedeprix($val)
		{
			$this->prix=$val;
		}

 	}
?>