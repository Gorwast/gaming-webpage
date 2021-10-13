<?php

if (isset($_POST["update-submit"])) {
    $id = $_POST["id"];
    $name = $_POST["name"];
    $email = $_POST["email"];
    $username = $_POST["username"];
    $userType = $_POST["userType"];
    
    $password = $_POST["password"];
    $repeatPassword = $_POST["password"];

    require_once 'dbh.inc.php';
    require_once 'functions.inc.php';

    if (invalidUid($username) !== false) {
        header("location: ../usuario.php?error=invalidUid");
        exit();
    }
    if (invalidEmail($email) !== false) {
        header("location: ../update.php?error=invalidEmail&id=",$id);
        exit();
    }
    /*
    if (invalidPassword($password) !== false) {
        header("location: ../update.php?error=invalidPassword");
        exit();
    }
    */
    
    if (passwordMatch($password, $repeatPassword) !== false) {
        header("location: ../update.php?error=pwdsdontmatch&id=",$id);
        exit();
    }
    
    
    updateUser($connection,$id,$username,$password,$email,$name,$userType);
} else {
    header("location: ../usuarios.php");
}