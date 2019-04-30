<?php
/**
 * Created by PhpStorm.
 * User: lenovo
 * Date: 17/03/2018
 * Time: 17:15
 */
session_start();
$_SESSION=array();
session_destroy();


echo "<script language=\"javascript\">alert(\"Vous êtes déconnecté.\");document.location.href='../web/index.php';</script>";

?>