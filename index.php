<?php
session_start();
$pageName = "Inicio";
include("includes/header.inc.php");
?>

<body>

    <main>

        <?php
        include("includes/header.bar.inc.php");
        ?>

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
            <div class="row p-10">
                <div class="col-lg-6 d-flex mx-auto">
                    <p class="align-self-center lead mb-4">Nosotros una pagina de gustos de videojuegos en el cual puedes almacenar los videojuegos que te interesan, que te has pasado y por los cuales tienes alguna pasión por compartir.</p>

                </div>
                <div class="col-lg-6 mx-auto">
                    <img class="img-fluid rounded" src="img/gaming-monitor.jpg" alt="">

                </div>
            </div>
            <div class="row p-10">

                <div class="col-lg-6 d-flex mx-auto">
                    <img class="img-fluid rounded" src="img/Gaming-Cloud.jpg" alt="Control Gaming">
                </div>

                <div class="align-self-center lead mb-4">
                    <p class="align-self-center lead mb-4">Si tienes una pasion por los videojuegos y quieres enterarte de noticias mas recientes, puedes entrar a nuestra pagina para mas informacion, tambien en un futuro podras comprar los juegos que mas te gustan!.</p>
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