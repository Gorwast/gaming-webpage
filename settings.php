<?php

$pageName = "Settings";
require_once("includes/header.inc.php")

?>

<body>

     <div class="container">
         <form action="includes/upload.inc.php" method="POST" enctype="multipart/form-data">
         <input type="file" name="file" id="photo">
         <button type="submit" name="submit">Subir</button>
        </form>
     </div>
<?php
include("includes/copyright.inc.php");

?>
</body>