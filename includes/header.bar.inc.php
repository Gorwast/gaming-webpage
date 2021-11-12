<nav class="navbar navbar-expand-md navbar-dark fixed-top bg-dark">
    <div class="container-fluid">
        <a href="/" class="navbar-brand">
            <img src="/img/logo.png" alt="GG" class="" height="30px">
        </a>
        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNavDropdown" aria-controls="navbarNavDropdown" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarNavDropdown">
            <ul class="navbar-nav">
                <li class="nav-item">
                    <a class="nav-link active" aria-current="page" href="home.php">Inicio</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="store.php">Tienda</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="#">Acerca de Nosotros</a>
                </li>
                <?php
                if (isset($_SESSION["username"])) {

                    if ($_SESSION['userType'] == 'ADMIN') {
                        echo '<li class="nav-item dropdown">
                        <a class="nav-link dropdown-toggle" href="#" id="navbarDropdownMenuLink" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                            Secciones
                        </a>
                        <ul class="dropdown-menu" aria-labelledby="navbarDropdownMenuLink">
                            <li><a class="dropdown-item" href="products.php">Productos</a></li>
                            <li><a class="dropdown-item" href="usuarios.php">Usuarios</a></li>
                            <li><a class="dropdown-item" href="bitacora.php">Registro</a></li>
                        </ul>
                    </li>';
                    }
                    if ($_SESSION['userType'] != 'INVITE') {
                        echo '<li class="nav-item">
                        <a class="nav-link" href="settings.php"><i class="fas fa-cog"></i> Configuración</a>
                    </li>';
                    }

                    echo '<li class="nav-item">
                    <a class="nav-link" href="includes/logout.inc.php">Cerrar Sesión</a>
                </li>';
                } else {
                    echo '<li class="nav-item">
                    <a class="nav-link" href="login.php">Login</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="signup.php">Sign-up</a>
                </li>';
                }
                ?>
                <li class="nav-item">
                    <a class="nav-link" href="carrito.php">
                        <i class="fas fa-shopping-cart"></i>
                        Carrito
                    </a>
                </li>
            </ul>
        </div>
    </div>
</nav>

<div class="container main">
    <div class="d-block"></div>
</div>