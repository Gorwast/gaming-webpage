<?php

include("dbh.inc.php");

$id = $_GET['id'];
$sql = "DELETE FROM usuarios WHERE id = ?;";
$stmt = mysqli_stmt_init($connection);
if (!mysqli_stmt_prepare($stmt, $sql)) {
    header("location: ../usuarios.php?error=stmtfailed");
    exit();
}

mysqli_stmt_bind_param($stmt, "s", $id);
mysqli_stmt_execute($stmt);
mysqli_stmt_close($stmt);
header("location: ../usuarios.php?error=deleted");
