<?php
$pageName = 'Actualizar';
include_once("includes/authcheck.inc.php");
include_once("includes/dbh.inc.php");
include("includes/header.inc.php");

?>

<body>
    <?php include("includes/header.bar.inc.php") ?>
    <div class="form">
        <form class="register-form" action="includes/update.inc.php" method="POST">

            <div class="header">
                <h1>Editar Usuario</h1>
            </div>
            <?php
            $query = "SELECT * FROM usuarios WHERE id = " . $_GET['id'];
            $results = mysqli_query($connection, $query);
            $row = mysqli_fetch_array($results);
            ?>
            <div class="form-group">
                <label class="text-black" for="id">ID</label>
                <input type="text" placeholder="ID" value="<?php echo $row['id'] ?>" name="id" readonly />
            </div>

            <input type="text" placeholder="Nombre" value="<?php echo $row['name'] ?>" name="name" />
            <input type="text" placeholder="Nombre de usuario" value="<?php echo $row['username'] ?>" name="username" />
            <input type="text" placeholder="Correo Electronico" value="<?php echo $row['email'] ?>" name="email" />
            <input type="password" placeholder="Contraseña" value="" name="password" />
            <label class="text-black" for="userType">Tipo de Usuario</label>
            <select class="form-select" id="userType" name="userType">
                <option value="ADMIN" <?php if ($row['userType'] == 'ADMIN') {
                                            echo 'selected';
                                        } ?>>Administrador</option>
                <option value="USER" <?php if ($row['userType'] == 'USER') {
                                            echo 'selected';
                                        } ?>>Usuario Normal</option>
                <option value="CLIENT" <?php if ($row['userType'] == 'CLIENT') {
                                            echo 'selected';
                                        } ?>>Cliente</option>
            </select>

            <button name="update-submit">Actualizar Cuenta</button>

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
        </form>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>
</body>