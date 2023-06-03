<?php
include '../../config/conn.php';
session_start();
$idreq = $_GET['id'];


if (isset($idreq)) {
    $sql2 = "DELETE FROM ryc WHERE id_ryc = $idreq";
        mysqli_query($conn, $sql2);
        header("Location: ../recycle.php?error=error");
        exit();
    } else {
        header("Location: ../recycle.php?one");
        exit();
    }

?>
