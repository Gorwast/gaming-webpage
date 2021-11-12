<?php
include("includes/authcheck.inc.php");
$pageName = "Bitacora";
include("includes/header.inc.php");
include("includes/dbh.inc.php");
?>

<body>
    <?php
    include("includes/header.bar.inc.php");

    if (isset($_GET['pageno'])) {
        $pageno = $_GET['pageno'];
    } else {
        $pageno = 1;
    };
    $no_of_records_per_page = 25;
    $offset = ($pageno - 1) * $no_of_records_per_page;

    if (mysqli_connect_errno()) {
        echo "Failed to connect to MySQL: " . mysqli_connect_error();
        die();
    }

    $total_pages_sql = "SELECT COUNT(*) FROM triggers";
    $result = mysqli_query($connection, $total_pages_sql);
    $total_rows = mysqli_fetch_array($result)[0];
    $total_pages = ceil($total_rows / $no_of_records_per_page);

    $sql = "SELECT * FROM triggers LIMIT $offset, $no_of_records_per_page";
    $res_data = mysqli_query($connection, $sql);

    ?>


    <div class="container main">
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

                                    while ($row = mysqli_fetch_array($res_data)) { ?>
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


            <?php

            } else {
                echo '<p>No puedes ver esta pagina por no tener los privilegios</p>';
            }
            mysqli_close($connection);
            ?>
            <ul class="pagination">
                <li>
                    <a class="btn text-light btn-outline-light m-10" href="?pageno=1">Inicio</a>
                </li>
                <li class="<?php if ($pageno <= 1) {
                                echo 'disabled';
                            } ?>">
                    <a class="btn text-light btn-outline-light m-10" href="<?php if ($pageno <= 1) {
                                    echo '#';
                                } else {
                                    echo "?pageno=" . ($pageno - 1);
                                } ?>">Anterior</a>
                </li>
                <li class="<?php if ($pageno >= $total_pages) {
                                echo 'disabled';
                            } ?>">
                    <a class="btn text-light btn-outline-light m-10" href="<?php if ($pageno >= $total_pages) {
                                    echo '#';
                                } else {
                                    echo "?pageno=" . ($pageno + 1);
                                } ?>">Siguiente</a>
                </li>
                <li>
                    <a class="btn text-light btn-outline-light m-10" href="?pageno=<?php echo $total_pages; ?> ">Final</a>
                </li>
            </ul>
        </main>
    </div>
    <?php
    include("includes/footer.inc.php")
    ?>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>
</body>

</html>