<?php
session_start();
$pageName = "Tienda";
include("./includes/header.inc.php");

include("includes/dbh.inc.php");

if (isset($_GET['pageno'])) {
    $pageno = $_GET['pageno'];
} else {
    $pageno = 1;
}

$no_of_records_per_page = 10;
$offset = ($pageno - 1) * $no_of_records_per_page;


if (isset($_GET['search'])) {
    $querystring = $_GET['search'];
    $total_pages_sql = "SELECT COUNT(*) FROM product WHERE MATCH(product_name,product_description,product_long_description) AGAINST ('$querystring');";
} else {
    $total_pages_sql = "SELECT COUNT(*) FROM product ";
}

$result = mysqli_query($connection, $total_pages_sql);
$total_rows = mysqli_fetch_array($result)[0];
$total_pages = ceil($total_rows / $no_of_records_per_page);

if (isset($_GET['search'])) {
    $sql = "SELECT * FROM product WHERE MATCH(product_name,product_description,product_long_description) AGAINST ('$querystring') LIMIT $offset, $no_of_records_per_page;";
} else {
    $sql = "SELECT * FROM product LIMIT $offset, $no_of_records_per_page;";
}
$res_data = mysqli_query($connection, $sql);

mysqli_close($connection);
?>

<body>

    <?php
    include("includes/header.bar.inc.php");


    ?>
    <div class="main">

        <main role="main" class="container">
            <div class="container">
                <form action="store.php" method="GET">
                    <div class="input-group mb-3">

                        <input type="text" class="form-control" placeholder="Buscar Producto" aria-label="Buscar Producto" aria-describedby="basic-addon2" name="search">
                        <div class="input-group-append">
                            <button class="btn btn-outline-secondary" type="submit"> <i class="fas fa-search"></i> Buscar </button>
                        </div>
                    </div>
                </form>

            </div>

            <p></p>

            <div class="container">
                <div class="row text-center py-5">
                    <?php
                    if ($res_data) {
                        while ($row = mysqli_fetch_array($res_data)) { ?>
                            <div class="col-lg-3 col-md-6 my-3 my-md-1">
                                <form action="carrito.php?addProduct=<?php echo $row['ID'] ?>" method="get">
                                    <div class="card shadow">
                                        <div>
                                            <input class="d-none" type="text" name="addProduct" id="" value="<?php echo $row['ID'] ?>">
                                            <a href="product.php?productID=<?php echo $row['ID'] ?>">
                                                <img src="<?php echo $row['product_image'] ?>" alt="" class="img-fluid card-img-top product-img" height="200px">
                                            </a>
                                        </div>
                                        <div class="card-body">
                                            <h5 class="card-title"><?php echo $row['product_name'] ?></h5>
                                            <h6>
                                                <i class="fas fa-star"></i>
                                                <i class="fas fa-star"></i>
                                                <i class="fas fa-star"></i>
                                                <i class="fas fa-star"></i>
                                                <i class="fas fa-star"></i>
                                            </h6>
                                            <p class="card-text">
                                                <?php if ($row['product_name'] != null) echo $row['product_description'] ?>
                                            </p>
                                            <h5>
                                                <span class="price">
                                                    $<?php echo $row['product_price'] ?>
                                                </span>
                                            </h5>

                                            <button type="submit" class="btn btn-outline-dark me-2">Añadir al Carrito<i class="fas fas-shopping-cart"></i></button>
                                        </div>
                                    </div>
                                </form>
                            </div>


                    <?php }
                    } ?>
                </div>
                <div class="row">
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
                                                                                        if (isset($_GET['search'])) {
                                                                                            echo "&search=" . $_GET['search'];
                                                                                        }
                                                                                    } ?>">Anterior</a>
                        </li>
                        <li class="<?php if ($pageno >= $total_pages) {
                                        echo 'disabled';
                                    } ?>">
                            <a class="btn text-light btn-outline-light m-10" href="<?php if ($pageno >= $total_pages) {
                                                                                        echo '#';
                                                                                    } else {
                                                                                        echo "?pageno=" . ($pageno + 1);
                                                                                        if (isset($_GET['search'])) {
                                                                                            echo "&search=" . $_GET['search'];
                                                                                        }
                                                                                    } ?>">Siguiente</a>
                        </li>
                        <li>
                            <a class="btn text-light btn-outline-light m-10" href="?pageno=<?php echo $total_pages;
                                                                                            if (isset($_GET['search'])) {
                                                                                                echo "&search=" . $_GET['search'];
                                                                                            } ?> ">Final</a>
                        </li>
                    </ul>
                </div>
            </div>
        </main>
    </div>

    <?php
    include("/xampp/htdocs/includes/footer.inc.php");

    ?>

    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/2.1.3/jquery.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>
</body>

</html>