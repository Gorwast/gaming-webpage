<?php

$pageName = "Settings";
require_once("includes/authcheck.inc.php");
require_once("includes/header.inc.php");
?>

<body>

     <?php
     include("includes/header.bar.inc.php");

     include("includes/dbh.inc.php");

     $query = "SELECT * FROM usuarios WHERE id = " . $_SESSION["id"];
     $results = mysqli_query($connection, $query);
     $row = mysqli_fetch_array($results);
     ?>

     <div class="container">
          <main>

               <div class="row pt-10">


                    <div class="col-3">
                         <div class="header">
                              <h3 class="text-white">Foto de perfil </h3>
                         </div>
                         <a href=""><img class="img-fluid" src="<?php
                                                                 if ($_SESSION['profilePictureRoute'] == null) {
                                                                      echo 'img/blank-profile-picture.png';
                                                                 } else {
                                                                      echo $_SESSION['profilePictureRoute'];
                                                                 }

                                                                 ?>" alt=""></a>
                         <form action="includes/upload.inc.php" method="POST" enctype="multipart/form-data">
                              <input type="file" name="file" id="photo" accept="image/png, image/gif, image/jpeg">
                              <button type="submit" name="submit">Subir</button>
                         </form>
                    </div>

                    <div class="col-9">
                         <div class="header">
                              <h3 class="text-white">Biografia</h3>
                         </div>
                         <div class="input-biography">
                              <form action="includes/upload.inc.php" method="POST" enctype="multipart/form-data">
                                   <div class="form-group">
                                        <label for="biography">Biografia</label>
                                        <textarea class="form-control" name="biography" id="biography" rows="3"><?php echo $row["biography"] ?></textarea>
                                   </div>

                                   <button type="submit" name="submitBio">Subir</button>
                              </form>
                         </div>
                    </div>
               </div>


          </main>
     </div>
     
     <?php
     include("includes/footer.inc.php");
     ?>

     <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>
</body>