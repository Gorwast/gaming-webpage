<header class="p-3 bg-dark text-white">
    <div class="container">
        <div class="d-flex flex-wrap align-items-center justify-content-center justify-content-lg-start">
            <div class="col-1">
                <a href="/" class="d-flex align-items-center mb-2 mb-lg-0 text-white text-decoration-none">
                    <img src="img/logo.png" alt="GG" class="" height="30px">
                </a>
            </div>

            <div class="col-2 d-none d-lg-block align-middle nav col-12 col-md-auto me-md-auto mb-2 justify-content-center mb-md-0">
                <div class="text-left text-white">
                    <p class="px-2 text-white"> <?php if (isset($_SESSION["name"])) {
                                                                echo "BIENVENIDO, ". $_SESSION["name"];
                                                            } ?></p>
                </div>
            </div>

            <ul class="nav col-12 col-md-auto d-none d-lg-inline-flex me-md-auto mb-2 justify-content-center mb-md-0">
                <li><a href="#" class="nav-link px-2 text-secondary">Inicio</a></li>
                <li><a href="#" class="nav-link px-2 text-white">Acerca de nosotros</a></li>
                <li><a href="#" class="nav-link px-2 text-white">FAQs</a></li>
                <li><a href="#" class="nav-link px-2 text-white">About</a></li>
            </ul>

            <div class="text-end">
                <?php
                if (isset($_SESSION["username"])) {
                    if ($pageName != "Home") {
                        echo '<a type="button" class="btn btn-outline-light me-2" href="home.php">Hogar</a>';
                    }
                    if ($_SESSION['userType'] == 'ADMIN' and $pageName != 'Inicio') {
                        echo '<a type="button" class="btn btn-outline-light me-2" href="usuarios.php">Usuarios</a>';
                        echo '<a type="button" class="btn btn-outline-light me-2" href="bitacora.php">Bitacora</a>';
                    }
                    if ($_SESSION['userType'] != 'INVITE') {
                        echo '<a type="button" class="btn btn-outline-light me-2" href="settings.php">Configuraciones</a>';
                    }

                    echo '<a type="button" class="btn btn-outline-light me-2" href="includes/logout.inc.php">Cerrar Sesión</a>';
                } else {
                    echo '<a type="button" class="btn btn-outline-light me-2" href="login.php">Login</a>
                          <a type="button" class="btn btn-warning" href="signup.php" name="signup">Sign-up</a>';
                }
                ?>

            </div>
        </div>
    </div>
</header>