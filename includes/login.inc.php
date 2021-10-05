<?php

if (isset($_POST["login-submit"])) {
  
  require_once('dbh.inc.php');
  require_once('functions.inc.php');


  $usuario = $_POST['user'];
  $contraseña = md5($_POST['password']);
  session_start();

  if (emptyInputLogin($usuario, $contraseña) !== false) {
    header("location: ../login.php?error=emptyInput");
    exit();
  }

  loginUser($connection,$usuario,$contraseña);

  //$_SESSION['username'] = $usuario;

  /*
  $consulta = "SELECT * FROM usuarios where username = '$usuario' AND password='$contraseña'";
  $resultado = mysqli_query($connection, $consulta);

  $filas = mysqli_num_rows($resultado);

  if ($filas) {
    header("location:../home.php");
  } else {
?>

    <h1 class="text-danger">ERROR DE AUTENTIFICACION</h1>
    <?php
    header("location:../login.php?error=authfailure");
    ?>
<?php
  }
  mysqli_free_result($resultado);
  mysqli_close($connection);
  */
} else {
  header("location: ../index.php");
}
