<?php
include("includes/authcheck.inc.php");
$pageName = "Usuarios";
include("includes/header.inc.php");
include("includes/dbh.inc.php");
?>

<body>
    <?php
    include("includes/header.bar.inc.php");
    ?>


    <div class="container">
        <main>
            <?php
            if ($_SESSION['userType'] == 'ADMIN') { ?>

                <div class="card card-body">
                    <div class="col-12">
                        <div class="header">
                            <h1>Lista de Usuarios</h1>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-12">
                            <a type="button" class="btn btn-outline-dark me-2" href="newuser.php"><i class="fas fa-user"></i> Añadir Usuario</a>
                            <table class="table table-bordered">
                                <thead>
                                    <tr>
                                        <th>ID</th>
                                        <th>Usuario</th>
                                        <th>correo</th>
                                        <th>Nombre</th>
                                        <th>Tipo de usuario</th>
                                        <th>Accion</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php

                                    $query = "SELECT * FROM usuarios";
                                    $results = mysqli_query($connection, $query);

                                    while ($row = mysqli_fetch_array($results)) { ?>
                                        <tr>
                                            <td><?php echo $row['id'] ?></td>
                                            <td><?php echo $row['username'] ?></td>
                                            <td><?php echo $row['email'] ?></td>
                                            <td><?php echo $row['name'] ?></td>
                                            <td><?php echo $row['userType'] ?></td>
                                            <td>

                                                <a class="btn btn-secondary" href="update.php?id=<?php echo $row['id'] ?>">
                                                    <span style="color:white">
                                                        <i class="fas fa-marker"></i>
                                                    </span>
                                                </a>
                                                <a class="btn btn-danger" href="includes/delete.inc.php?id=<?php echo $row['id'] ?>">
                                                    <span style="color:white">
                                                        <i class="fas fa-trash"></i>
                                                    </span>
                                                </a>
                                            </td>
                                        </tr>


                                    <?php } ?>
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>

            <?php } else {
                echo '<p>No puedes ver los usuarios por ser un usuario normal</p>';
            }
            ?>



        </main>
    </div>
    <?php
    include("includes/footer.inc.php")
    ?>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>
</body>

</html>