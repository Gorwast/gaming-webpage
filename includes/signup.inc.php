<?php

if (isset($_POST["register-submit"])) {

    $name = $_POST["name"];
    $email = $_POST["email"];
    $username = $_POST["username"];
    $password = $_POST["password"];
    $repeatPassword = $_POST["repeatPassword"];

    require_once 'dbh.inc.php';
    require_once 'functions.inc.php';

    if (emptyInputSignup($name, $email, $username, $password, $repeatPassword) !== false) {
        header("location: ../signup.php?error=emptyInput");
        exit();
    }
    if (invalidUid($username) !== false) {
        header("location: ../signup.php?error=invalidUid");
        exit();
    }
    if (invalidEmail($email) !== false) {
        header("location: ../signup.php?error=invalidEmail");
        exit();
    }
    /*
    if (invalidPassword($password) !== false) {
        header("location: ../signup.php?error=invalidPassword");
        exit();
    }
    */
    
    if (passwordMatch($password, $repeatPassword) !== false) {
        header("location: ../signup.php?error=pwdsdontmatch");
        exit();
    }
    

    if (uidExists($connection, $username, $email) !== false) {
        header("location: ../signup.php?error=uidExists");
        exit();
    }

    createUser($connection, $username, $password, $email, $name);
} else {
    header("location: ../index.php");
}
