<?php
include_once("dbh.inc.php");

if (isset($_POST['submit'])) {
    $file = $_FILES['file'];

    $fileName = $_FILES['file']['name'];
    $fileTmpName = $_FILES['file']['tmp_name'];
    $fileSize = $_FILES['file']['size'];
    $fileError = $_FILES['file']['error'];
    $fileType = $_FILES['file']['type'];

    $fileExt = explode('.', $fileName);

    $fileActualExt = strtolower(end($fileExt));

    $allowed = array('jpg', 'jpeg', 'png');

    if (in_array($fileActualExt, $allowed)) {
        if ($fileError === 0) {
            if ($fileSize < 500000) {
                $fileNameNew = uniqid('', true) . "." . $fileActualExt;
                $fileDestination = 'uploads/'.$fileNameNew;
                if (move_uploaded_file($fileTmpName,$fileDestination)) {
                    header("Location: ../settings.php?uploadsuccess");
                } else {
                    header("location: ../settings.php?uploaderror");
                }
                
                
                
            } else {

                echo "El archivo es demasiado grande!";
            }
        } else {
            echo "Sucedio un error subiendo el archivo!";
        }
    } else {
        echo "No puedes subir ningun archivo que no sea una foto";
    }
} else {
    header("location:../settings.php?errorUploading");
}
