<?php
session_start();
$pageName = "Inicio";
include("includes/header.inc.php");
?>

<body>

    <main>
        <nav class="navbar navbar-expand-md navbar-dark fixed-top bg-dark">
            <a class="navbar-brand" href="#"><img class="small-logo" src="img/logo.svg" alt=""></a>
            <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarCollapse" aria-controls="navbarCollapse" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarCollapse">
                <ul class="navbar-nav mr-auto">
                    <li class="nav-item active">
                        <a class="nav-link" href="#">Home <span class="sr-only">(current)</span></a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="#">Link</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link disabled" href="#">Disabled</a>
                    </li>
                </ul>
                <form class="form-inline mt-2 mt-md-0">
                    <input class="form-control mr-sm-2" type="text" placeholder="Search" aria-label="Search">
                    <button class="btn btn-outline-success my-2 my-sm-0" type="submit">Search</button>
                </form>
            </div>
        </nav>
        <header class="p-3 bg-dark text-white">
            <div class="container">
                <div class="d-flex flex-wrap align-items-center justify-content-center justify-content-lg-start">
                    <a href="/" class="d-flex align-items-center mb-2 mb-lg-0 text-white text-decoration-none">
                        <img src="img/logo.png" alt="GG" class="" height="30px">
                    </a>

                    <ul class="nav col-12 col-lg-auto me-lg-auto mb-2 justify-content-center mb-md-0">
                        <li><a href="#" class="nav-link px-2 text-secondary">Inicio</a></li>
                        <li><a href="#" class="nav-link px-2 text-white">Acerca de nosotros</a></li>
                        <li><a href="#" class="nav-link px-2 text-white">Pricing</a></li>
                        <li><a href="#" class="nav-link px-2 text-white">FAQs</a></li>
                        <li><a href="#" class="nav-link px-2 text-white">About</a></li>
                    </ul>


                    <div class="text-end">
                        <?php
                        if (isset($_SESSION["username"])) {
                            if ($pageName != 'Home') {
                                echo '<a type="button" class="btn btn-outline-light me-2" href="home.php">Inicio</a>';
                            }
                            echo '  <a type="button" class="btn btn-outline-light me-2" href="settings.php">Configuraciones</a>
                                    <a type="button" class="btn btn-outline-light me-2" href="includes/logout.inc.php">Cerrar Sesión</a>';
                        } else {
                            echo '<a type="button" class="btn btn-outline-light me-2" href="login.php">Login</a>
                            <a type="button" class="btn btn-warning" href="signup.php" name="signup">Sign-up</a>';
                        }
                        ?>

                    </div>
                </div>
            </div>
        </header>


        <div class="container">
            <div class="px-4 py-5 my-5 text-center">
                <img class="d-block mx-auto mb-4 img_fluid" src="img/logo.svg" alt="GG Logo">

                <h1 class="display-5 fw-bold text-white">GG GAMING</h1>
                <div class="col-lg-6 mx-auto">
                    <p class="lead mb-4">Nosotros una pagina de gustos de videojuegos en el cual puedes almacenar los videojuegos que te interesan, que te has pasado y por los cuales tienes alguna pasión por compartir.</p>
                    <div class="d-grid gap-2 d-sm-flex justify-content-sm-center">
                        <a class="btn btn-primary btn-lg px-4 gap-3" href="login.php">A darle!</a>
                        <a class="btn btn-outline-secondary btn-lg px-4">Ver Mas</a>
                    </div>
                </div>
            </div>
        </div>

        <div class="container-md">
            <div class="row">
                <div class="col-lg-6 d-flex mx-auto">
                    <p class="align-self-center lead mb-4">Nosotros una pagina de gustos de videojuegos en el cual puedes almacenar los videojuegos que te interesan, que te has pasado y por los cuales tienes alguna pasión por compartir.</p>
                    <div class="d-grid gap-2 d-sm-flex justify-content-sm-center">

                    </div>
                </div>
                <div class="col-lg-6 mx-auto">
                    <img class="img-fluid rounded" src="img/gaming-monitor.jpg" alt="">

                </div>
            </div>
            <div class="row">
                <div class="col-lg-6 mx-auto">

                    <div class="d-grid gap-2 d-sm-flex justify-content-sm-center">
                        <img class="img-fluid rounded" src="img/Gaming-Cloud.jpg" alt="Control Gaming">
                    </div>

                </div>
                <div class="p-2"></div>
                <div class="col-lg-6 d-flex mx-auto">
                    <p class="align-self-center lead mb-4">Si tienes una pasion por los videojuegos y quieres enterarte de noticias mas recientes, puedes entrar a nuestra pagina para mas informacion, tambien en un futuro podras comprar los juegos que mas te gustan!.</p>
                    <div class="d-grid gap-2 d-sm-flex justify-content-sm-center">
                    </div>

                </div>
            </div>

        </div>
    </main>

    <?php
    include("includes/footer.inc.php");
    ?>



    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/2.1.3/jquery.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>
</body>

</html>