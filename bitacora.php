<?php
include("includes/authcheck.inc.php");
$pageName = "Bitacora";
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