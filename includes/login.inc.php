<?php
session_start();
if (isset($_POST["login-submit"])) {

  require_once('dbh.inc.php');
  require_once('functions.inc.php');


  $usuario = $_POST['user'];
  $contraseña = md5($_POST['password']);


  if (emptyInputLogin($usuario, $contraseña) !== false) {
    header("location: ../login.php?error=emptyInput");
    exit();
  }
  loginUser($connection, $usuario, $contraseña);
} elseif (isset($_POST["login-invite"])) {
  $_SESSION["username"] = "invitado";
  $_SESSION["email"] = "invitado";
  $_SESSION["name"] = "Invitado";
  $_SESSION["profilePictureRoute"] = "profilePictureRoute";
  $_SESSION["userType"] = "INVITE";
  header("location: ../home.php");
} else {
  header("location: ../index.php");
}
