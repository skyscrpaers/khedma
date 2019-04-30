<?php
error_reporting(0);

include "../config/config.php";
class user
{
    private $id;
    private $name;
    private $username;
    private $password;
    private $type;

    /**
     * User constructor.
     * @param $id
     * @param $nom
     * @param $prenom
     * @param $username
     * @param $password
     * @param $email
     * @param $type
     */
    public function __construct($name,$username,$password,$type)
    {
        $this->name = $name;
        $this->username = $username;
        $this->password = $password;
        $this->type = $type;
    }


    /**
     * @return mixed
     */
    public function getId()
    {
        return $this->id;
    }

    /**
     * @param mixed $id
     */
    public function setId($id)
    {
        $this->id = $id;
    }

    /**
     * @return mixed
     */
    public function getNom()
    {
        return $this->name;
    }

    /**
     * @param mixed $nom
     */
    public function setNom($name)
    {
        $this->name = $name;
    }

    /**
     * @return mixed
     */
  

    /**
     * @param mixed $prenom
     */
  
    /**
     * @return mixed
     */
    public function getUsername()
    {
        return $this->username;
    }

    /**
     * @param mixed $username
     */
    public function setUsername($username)
    {
        $this->username = $username;
    }

    /**
     * @return mixed
     */
    public function getPassword()
    {
        return $this->password;
    }

    /**
     * @param mixed $password
     */
    public function setPassword($password)
    {
        $this->password = $password;
    }

    /**
     * @return mixed
     */
 

    /**
     * @param mixed $email
     */
 
  

    /**
     * @param mixed $email
     */
 
    /**
     * @return mixed
     */
  

    /**
     * @param mixed $email
     */
  
    public function getType()
    {
        return $this->type;
    }

    /**
     * @param mixed $type
     */
    public function setType($type)
    {
        $this->type = $type;
    }


    public static function checklogin($username,$password)
    {
        $db = config::getConnexion(); //appel fonction static sans new
        $req = $db->prepare('SELECT * FROM users WHERE username =:username AND password =:password');
        $req->bindParam(':username', $username);
        $req->bindParam(':password', $password);
        $req->execute();
        $resultat=$req->fetch();
        return $resultat;

    }

    public static function getUserById($id)
    {
        $user = null;

        $db = config::getConnexion();
        $req = $db->prepare('SELECT * FROM users WHERE id =:num');
        $req->bindParam(':num',$id);

        $req->execute();

        foreach ($req->fetchAll() as $row) {
            $user =  new user($row['id'], $row['name'],$row['username'], $row['password'] ,$row['type']);
        }


        return $user;
    }


}
?>

