<?php

include('dbh.inc.php');

function emptyInputLogin($username, $password)
{
    $result = true;
    if (empty($username) || empty($password)) {
        $result = true;
    } else {
        $result = false;
    }
    return $result;
}

function emptyInputSignup($name, $email, $username, $password, $repeatPassword)
{
    $result = true;
    if (empty($name) || empty($email) || empty($username) || empty($password) || empty($repeatPassword)) {
        $result = true;
    } else {
        $result = false;
    }
    return $result;
}

function invalidUid($username)
{
    $result = true;
    if (!preg_match("/^[a-zA-Z0-9]*$/", $username)) {
        $result = true;
    } else {
        $result = false;
    }
    return $result;
}

function invalidEmail($email)
{
    $result = true;
    if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
        $result = true;
    } else {
        $result = false;
    }
    return $result;
}

function invalidPassword($password)
{
    $result = true;
    if (!preg_match("/^(?=.*\d)(?=.*[a-z])(?=.*[A-Z])(?=.*[a-zA-Z]).{8,}$/", $password)) {
        $result = true;
    } else {
        $result = false;
    }
    return $result;
}

function passwordMatch($password, $repeatPassword)
{
    $result = true;
    if ($password !== $repeatPassword) {
        $result = true;
    } else {
        $result = false;
    }
    return $result;
}

function uidExists($connection, $username, $email)
{
    $sql = "SELECT * FROM usuarios WHERE username = ? OR email = ?;";
    $stmt = mysqli_stmt_init($connection);
    $result = true;
    if (!mysqli_stmt_prepare($stmt, $sql)) {
        header("location: ../login.php?error=stmtfailed");
        exit();
    }

    mysqli_stmt_bind_param($stmt, "ss", $username, $email);
    mysqli_stmt_execute($stmt);

    $resultData = mysqli_stmt_get_result($stmt);


    if ($row = mysqli_fetch_assoc($resultData)) {
        return $row;
    } else {
        $result = false;
        return $result;
    }

    mysqli_stmt_close($stmt);
}

function createUser($connection, $username, $password, $email, $name)
{
    $sql = "INSERT INTO usuarios(username,password,email,name,userType) VALUES (?,?,?,?,'USER') ;";
    $stmt = mysqli_stmt_init($connection);
    if (!mysqli_stmt_prepare($stmt, $sql)) {
        header("location: ../login.php?error=stmtfailed");
        exit();
    }

    //$hashedPwd = password_hash($password, PASSWORD_DEFAULT);

    mysqli_stmt_bind_param($stmt, "ssss", $username, md5($password), $email, $name);
    mysqli_stmt_execute($stmt);
    mysqli_stmt_close($stmt);
    header("location: ../signup.php?error=none");
}

function loginUser($connection, $username, $password)
{
    $uidExists = uidExists($connection, $username, $password);
    if ($uidExists === false) {
        header("location:../login.php?error=invalidUid");
    }

    $pwdHashed = $uidExists["password"];

    $checkpwd = password_verify($password, $pwdHashed);
    $checkpwd = $password == $pwdHashed;

    if (!$checkpwd) {
        header("location: ../login.php?error=wronglogin");
        exit();
    } elseif ($checkpwd) {
        session_start();
        $_SESSION["username"] = $uidExists["username"];
        $_SESSION["email"] = $uidExists["email"];
        $_SESSION["name"] = $uidExists["name"];
        $_SESSION["profilePictureRoute"] = $uidExists["profilePictureRoute"];
        $_SESSION["userType"] = $uidExists["userType"];
        header("location: ../home.php");
    }
}

function updateProfilePicture($connection, $profilePicture, $username)
{
    $sql = "UPDATE usuarios SET profilePictureRoute = ? WHERE username = ?;";
    $stmt = mysqli_stmt_init($connection);
    if (!mysqli_stmt_prepare($stmt, $sql)) {
        header("location: ../settings.php?error=stmtfailed");
        exit();
    }

    mysqli_stmt_bind_param($stmt, "ss", $profilePicture, $username);
    mysqli_stmt_execute($stmt);
    mysqli_stmt_close($stmt);
    $_SESSION['profilePictureRoute'] = $profilePicture;
    header("location: ../settings.php?error=none");
}
