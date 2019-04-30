<?php
include "../entities/user.php";
if (ISSET($_POST['username']) && (ISSET($_POST['password']))) {
    $username = $_POST['username'];
    $password = $_POST['password'];
    $user = User::checklogin($username, $password);
    if ($user) {
        session_start();
        $_SESSION['username'] = $user['username'];
        $_SESSION['type'] = $user['type'];
        $_SESSION['password'] = $user['password'];
        $_SESSION['id'] = $user['id'];
        $_SESSION['name'] = $user['name'];

        echo "<script language=\"javascript\">document.location.href='../web/index.php';</script>";
    } else {
        echo ");document.location.href='../web/login.php';</script>";
    }
}

?>