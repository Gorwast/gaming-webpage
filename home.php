<?php

$pageName = "Home";
include("includes/authcheck.inc.php");
include("includes/header.inc.php");
include("includes/dbh.inc.php");

$queryUser = "SELECT * FROM usuarios WHERE id = " . $_SESSION["id"];
$resultsUser = mysqli_query($connection, $queryUser);
$rowUsers = mysqli_fetch_array($resultsUser);

$query = "SELECT * FROM video_games";
$results = mysqli_query($connection, $query);

?>

<body>

    <?php
    include("includes/header.bar.inc.php");
    ?>

    <div class="container main">
        <main>
            <div class="row">
                <div class="col-3">
                    <a href="">
                        <img class="img-fluid p-10" src="<?php if ($_SESSION['profilePictureRoute'] == null) {
                                                                echo 'img/blank-profile-picture.png';
                                                            } else {
                                                                echo $_SESSION['profilePictureRoute'];
                                                            } ?>" alt="">
                    </a>
                </div>
                <div class="col-9 p-10 lead">
                    <h1 class="text-start text-white"><?php echo $_SESSION["name"] ?></h1>
                    <p><?php echo $rowUsers["biography"] ?></p>
                </div>
            </div>

        </main>
    </div>
    <?php
    include("includes/footer.inc.php")
    ?>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>
</body>

</html>