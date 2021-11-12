<?php

$pageName = "Products";
include("includes/authcheck.inc.php");
include("includes/header.inc.php");
include("includes/dbh.inc.php");

$query = "SELECT * FROM product";
$results = mysqli_query($connection, $query);
?>

<body>

    <?php
    include("includes/header.bar.inc.php");
    ?>

    <div class="container">
        <main>
            <div class="card card-body">
                <div class="col-12">
                    <div class="header">
                        <h1>Productos</h1>
                    </div>
                </div>
                <div class="row">
                    <div class="col-12">
                        <table class="table table-bordered">
                            <thead>
                                <tr>
                                    <th>ID</th>
                                    <th>Titulo</th>
                                    <th>Precio</th>
                                    <th>Imagen</th>
                                    <th>Editar</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php
                                while ($row = mysqli_fetch_array($results)) { ?>
                                    <tr>
                                        <td><?php echo $row['ID'] ?></td>
                                        <td><?php echo $row['product_name'] ?></td>
                                        <td><?php echo $row['product_price'] ?></td>
                                        <td><a href="<?php?>"><img src="<?php echo $row['product_image'] ?>" alt="<?php echo "Sin Imagen" ?>" width="50px"></a></td>
                                        <td>

                                            <a class="btn btn-secondary" href="update.php?id=<?php echo $row['ID'] ?>">
                                                <span style="color:white">
                                                    <i class="fas fa-marker"></i>
                                                </span>
                                            </a>
                                            <a class="btn btn-danger" href="includes/delete.inc.php?id=<?php echo $row['ID'] ?>">
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

            <?php
            ?>

        </main>
    </div>
    <?php
    include("includes/footer.inc.php")
    ?>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>
</body>

</html>