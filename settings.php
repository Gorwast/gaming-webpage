<?php
require_once("includes/authcheck.inc.php");
$pageName = "Settings";
require_once("includes/header.inc.php");
?>

<body>

     <div class="container">
          <div class="row">
               <div class="col-1">
                    <a href="home.php"><img class="img-fluid" src="img/logo.png" alt="Inicio" height="auto"></a>
               </div>
          </div>
     </div>
     
     <div class="container">
          <main>
               <h1 class="text-white">Foto de perfil</h1>
               <div class="row">
                    <div class="col-3">
                         <a href=""><img class="img-fluid" src="<?php
                                                  echo $_SESSION['profilePictureRoute'];
                                                  ?>" alt=""></a>
                    </div>
               </div>

               <form action="includes/upload.inc.php" method="POST" enctype="multipart/form-data">
                    <input type="file" name="file" id="photo">
                    <button type="submit" name="submit">Subir</button>
               </form>
          </main>
     </div>
     <?php
     include("includes/copyright.inc.php");

     ?>
</body>