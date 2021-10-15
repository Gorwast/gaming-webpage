<?php
session_start();
include_once("dbh.inc.php");
require_once("functions.inc.php");

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

    #Este codigo es malisimo, hay que deshacer todos los nested if
    if (in_array($fileActualExt, $allowed)) {
        if ($fileError === 0) {
            if ($fileSize < 500000) {
                $fileNameNew = uniqid('', true) . "." . $fileActualExt;
                $fileAbstractDestination = 'uploads/' . $fileNameNew;
                $fileDestination = $_SERVER['DOCUMENT_ROOT'] . '/login/' . $fileAbstractDestination;

                if (move_uploaded_file($fileTmpName, $fileDestination)) {
                    echo $fileName . $fileTmpName . $fileSize . $fileError . $fileType;
                    header("Location: ../settings.php?uploadsuccess");
                    updateProfilePicture($connection, $fileAbstractDestination, $_SESSION["username"]);
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

} elseif (isset($_POST['submitBio'])) {
    updateBio($connection,$_SESSION['id'], $_POST['biography']);
} else {
    header("location:../settings.php?errorUploading");
}
