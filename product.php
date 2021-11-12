<?php
session_start();

include("includes/dbh.inc.php");
$query = "SELECT * FROM product WHERE id = " . $_GET['productID'];
$results = mysqli_query($connection, $query);
$row = mysqli_fetch_array($results);
$pageName = $row['product_name'];

include("./includes/header.inc.php");

?>

<body>

    <?php
    include("includes/header.bar.inc.php");
    ?>
    <div class="main">


        <main role="main" class="container">

            <div class="container">
                <div class="row">
                    <h1 class="header text-light"><?php echo $row['product_name'] ?></h1>
                </div>
                <div class="row">
                    <div class="col-md-8">
                        <div class="main-image"><img class="img-fluid" src="<?php echo $row['product_image'] ?>" alt=""></div>
                    </div>
                    <div class="col-md-4">
                        <h6 class="text-light">
                            <i class="fas fa-star"></i>
                            <i class="fas fa-star"></i>
                            <i class="fas fa-star"></i>
                            <i class="fas fa-star"></i>
                            <i class="fas fa-star"></i>
                        </h6>
                        <p class="text-light">
                            <?php echo $row['product_long_description'] ?>
                        </p>

                        <h3 class="price text-light">
                            $<?php echo $row['product_price'] ?>
                        </h3>
                        <select onchange="window.location.href = this.value">
                            <option value="#" selected="selected">1</option>
                            <option value="#">2</option>
                            <option value="#">3</option>
                            <option value="#">4</option>
                            <option value="#">5</option>
                        </select>
                        <form action="carrito.php" method="get">
                            <input class="d-none" type="text" name="addProduct" id="addProduct" value="<?php echo $row['ID'] ?>">
                            <button type="submit" class="btn btn-outline-light text-white">Agregar a carrito</button>
                        </form>

                    </div>
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