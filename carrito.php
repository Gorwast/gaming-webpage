<?php

$pageName = "Carrito";

session_start();
if (!isset($_SESSION['username'])) {
    header("location:/signup.php");
}
include("includes/header.inc.php");
include("includes/dbh.inc.php");

if (isset($_GET['addProduct'])) {
    $query = "INSERT INTO `cart`(`username_id`, `product_id`, `quantity`) VALUES (" . $_SESSION['id'] . "," . $_GET['addProduct'] . ",1);";
    if (mysqli_query($connection, $query)) {
        echo "New record created successfully";
    } else {
        echo "Error: " . $sql . "<br>" . mysqli_error($conn);
    }
}

$query = "SELECT p.ID, p.product_name, p.product_price, p.product_image, COUNT(p.ID) AS Quantity FROM cart AS c
INNER JOIN product AS p ON p.ID = c.product_id WHERE c.username_id = " . $_SESSION['id'] . "
GROUP BY p.ID;
";
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
                        <h1>Carrito de Compras</h1>
                    </div>
                </div>
                <div class="row">
                    <div class="col-12">
                        <table class="table table-bordered">
                            <thead>
                                <tr>
                                    <th>Titulo</th>
                                    <th>Precio</th>
                                    <th>Imagen</th>
                                    <th>Cantidad</th>
                                    <th>Opciones</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php
                                if ($results) {
                                    while ($row = mysqli_fetch_array($results)) { ?>
                                        <tr>

                                            <td><?php echo $row['product_name'] ?></td>
                                            <td><?php echo $row['product_price'] ?></td>
                                            <td><img class="img-fluid p-10" src="<?php echo $row['product_image'] ?>" alt="" height="60" width="90">
                                                </td>
                                            <td><?php echo $row['Quantity']?></td>
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
                                <?php }
                                } ?>
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