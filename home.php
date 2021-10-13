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


    <div class="container">
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

            <div class="card card-body">
                <div class="col-12">
                    <div class="header">
                        <h1>Videojuegos</h1>
                    </div>
                </div>
                <div class="row">
                    <div class="col-12">
                        <table class="table table-bordered">
                            <thead>
                                <tr>
                                    <th>Titulo</th>
                                    <th>Generos</th>
                                    <th>Consola</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php
                                while ($row = mysqli_fetch_array($results)) { ?>
                                    <tr>
                                        <td><?php echo $row['Title'] ?></td>
                                        <td><?php echo $row['Metadata.Genres'] ?></td>
                                        <td><?php echo $row['Release.Console'] ?></td>

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

</body>

</html>