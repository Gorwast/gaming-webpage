<?php

$pageName = "Home";
include("includes/header.inc.php");
?>

<body>
    <div class="container">
        <div class="d-flex flex-wrap align-items-center justify-content-center justify-content-lg-start">
            <h1 class="text-white">BIENVENIDO, <?php
                                                if (isset($_SESSION["name"])) {
                                                    echo $_SESSION["name"];
                                                }
                                                ?></h1>
            <div class="text-end">
                <?php
                if (isset($_SESSION["name"])) {
                    echo '<a type="button" class="btn btn-outline-light me-2" href="settings.php">Configuraciones</a>
                    <a type="button" class="btn btn-outline-light me-2" href="includes/logout.inc.php">Cerrar Sesión</a>';
                } else {
                    # code...
                }
                ?>
                
            </div>
        </div>


    </div>


    <div class="container">
        <main>
            <div class="row">
                <div class="col"></div>
                <div class="col"></div>
                <div class="col"></div>
            </div>
        </main>
    </div>
    <?php
    include("includes/footer.inc.php")
    ?>

</body>

</html>