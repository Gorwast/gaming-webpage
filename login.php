<?php
if (isset($_SESSION["username"])) {
    header("location: index.php");
}
$pageName = "Login";
include("includes/header.inc.php");
?>

<body>
    <div class="login-page">

        <div class="form">
            <form class="login-form" action="includes/login.inc.php" method="POST">
                <div class="header">
                    <h1>Iniciar Sesion</h1>
                </div>

                <input type="text" placeholder="Usuario, Correo o No. Expediente" name="user" />
                <input type="password" placeholder="Contraseña" name="password" />
                <button name="login-submit">Iniciar Sesión</button>
                <button name="login-invite">Entrar como Invitado</button>

                <?php
                if (isset($_GET["error"])) {
                    if ($_GET["error"] == "emptyInput") {
                        echo "<p>LLena todos los campos!</p>";
                    } else if ($_GET["error"] == "wronglogin") {
                        echo "<p>Información de inicio de sesion incorrecta!</p>";
                    } else if ($_GET["error"] == "authfailure") {
                        echo "<p>Contraseña o usuario incorrectos, intente de nuevo!</p>";
                    } else if ($_GET["error"] == "accountCreated") {
                        echo "<p>Cuenta creada, inicie sesión!</p>";
                    }
                }
                ?>

                <p class="message">¿No estas registrado? <a href="signup.php">Crear una cuenta</a></p>
            </form>
        </div>
    </div>


    <?php
    include("includes/copyright.inc.php")
    ?>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.6.0/jquery.js" integrity="sha512-n/4gHW3atM3QqRcbCn6ewmpxcLAHGaDjpEBu4xZd47N0W2oQ+6q7oc3PXstrJYXcbNU1OHdQ1T7pAP+gi5Yu8g==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>
    <script src="js/main.js"></script>
</body>

</html>