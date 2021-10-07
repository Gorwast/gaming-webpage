<?php
include("includes/authcheck.inc.php");
$pageName = "Home";
include("includes/header.inc.php");
include("includes/dbh.inc.php");
?>

<body>
    <div class="container">
        <div class="d-flex flex-wrap align-items-center justify-content-center justify-content-lg-start">
            <div class="row">
                <div class="text-left col-md-6">
                    <h2 class="text-white">BIENVENIDO, <?php
                                                        if (isset($_SESSION["name"])) {
                                                            echo $_SESSION["name"];
                                                        }
                                                        ?></h2>
                </div>

                <div class="text-end col-md-6">
                    <?php
                    if ($_SESSION['userType'] == 'ADMIN') {
                        echo '<a type="button" class="btn btn-outline-light me-2" href="usuarios.php">Usuarios</a>';
                        echo '<a type="button" class="btn btn-outline-light me-2" href="bitacora.php">Bitacora</a>';
                    }
                    if (isset($_SESSION["username"])) { ?>
                        <a type="button" class="btn btn-outline-light me-2" href="settings.php">Configuraciones</a>
                        <a type="button" class="btn btn-outline-light me-2" href="includes/logout.inc.php">Cerrar Sesión</a>
                    <?php } else { ?>
                        <a type="button" class="btn btn-outline-light me-2" href="login.php">Login</a>
                        <a type="button" class="btn btn-warning" href="signup.php" name="signup">Sign-up</a>
                    <?php }
                    ?>

                </div>
            </div>

        </div>


    </div>


    <div class="container">
        <main>
            <?php
            if ($_SESSION['userType'] == 'ADMIN') { ?>

                <div class="card card-body">
                    <div class="col-12">
                        <div class="header">
                            <h1>Bitacora de movimientos</h1>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-12">
                            <table class="table table-bordered">
                                <thead>
                                    <tr>
                                        <th>Tipo</th>
                                        <th>Mensaje</th>
                                        <th>Fecha</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php

                                    $query = "SELECT * FROM triggers";
                                    $results = mysqli_query($connection, $query);

                                    while ($row = mysqli_fetch_array($results)) { ?>
                                        <tr>
                                            <td><?php echo $row['trigger_name'] ?></td>
                                            <td><?php echo $row['trigger_message'] ?></td>
                                            <td><?php echo $row['trigger_date'] ?></td>
                                        </tr>


                                    <?php } ?>
                                </tbody>
                            </table>
                        </div>

                    </div>
                </div>

            <?php } else {
                echo '<p>No puedes ver esta pagina por no tener los privilegios</p>';
            }
            ?>
        </main>
    </div>
    <?php
    include("includes/footer.inc.php")
    ?>

</body>

</html>