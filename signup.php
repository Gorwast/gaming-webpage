<?php
if (isset($_SESSION["name"])) {
    header("location:index.php");
}
$pageName="Signup";
require_once("includes/header.inc.php");
?>
<body>
    <div class="login-page">

        <div class="form">
            <form class="register-form" action="includes/signup.inc.php" method="POST">
                <div class="header">
                    <h1>Registro de usuarios</h1>
                </div>
                <input type="text" placeholder="Nombre" name="name" />
                <input type="text" placeholder="Nombre de usuario" name="username" />
                <input type="text" placeholder="Correo Electronico" name="email" />
                <input type="password" placeholder="Contraseña" name="password" />
                <input type="password" placeholder="Repetir Contraseña" name="repeatPassword" />
                <button name="register-submit">Crear Cuenta</button>
                <?php
                if (isset($_GET["error"])) {
                    if ($_GET["error"] == "emptyInput") {
                        echo "<p class='text-danger'>LLena todos los campos!</p>";
                    } else if ($_GET["error"] == "invalidUid") {
                        echo "<p class='text-danger'>Elige un nombre de usuario adecuado!</p>";
                    } else if ($_GET["error"] == "invalidEmail") {
                        echo "<p class='text-danger'>Correo Electronico Invalido!</p>";
                    } else if ($_GET["error"] == "invalidPassword") {
                        echo "<p class='text-danger'>Contraseña no segura!</p>";
                    } else if ($_GET["error"] == "pwdsdontmatch") {
                        echo "<p class='text-danger'>Las contraseñas no son iguales!</p>";
                    } else if ($_GET["error"] == "uidExists") {
                        echo "<p class='text-danger'>El usuario y/o correo ya existe, intente de nuevo!</p>";
                    } else if ($_GET["error"] == "stmtfailed") {
                        echo "<p class='text-danger'>Algo fallo, intenta de nuevo!</p>";
                    } else if ($_GET["error"] == "none") {
                        header("location:login.php?error=accountCreated");
                    }
                }
                ?>
                <p class="message">¿Ya esta registrado? <a href="login.php">Iniciar sesión</a></p>
            </form>
        </div>
    </div>


    <?php
    include("includes/copyright.inc.php")
    ?>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.6.0/jquery.js" integrity="sha512-n/4gHW3atM3QqRcbCn6ewmpxcLAHGaDjpEBu4xZd47N0W2oQ+6q7oc3PXstrJYXcbNU1OHdQ1T7pAP+gi5Yu8g==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>

</body>

</html>