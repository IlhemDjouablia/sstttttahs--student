<?php
include '../../config/conn.php';
session_start();
$idreq = $_GET['id'];
$idst = $_SESSION['idst'];

if (isset($idreq)) {
    $sql = "SELECT * FROM request WHERE id_req = $idreq";
    $result = mysqli_query($conn, $sql);  
    $row = mysqli_fetch_assoc($result);
    
    
    $p_comp = $row['p_comp'];
    $name_comp = $row['name_comp'];
    $add_comp = $row['add_comp'];
    $phone_comp = $row['phone_comp'];
    $email_comp = $row['email_comp'];
    $manager = $row['manager'];
    $email_manager = $row['email_manager'];
    $intern_name = $row['intern_name'];
    $duration = $row['duration'];
    $str_date = $row['str_date'];
    $end_date = $row['end_date'];
    $work_plan = $row['work_plan'];
    
    $sql = "INSERT INTO ryc (id_student, p_comp, name_comp, add_comp, phone_comp, email_comp, manager, email_manager, intern_name, duration, str_date, end_date, work_plan) VALUES ('$idst', '$p_comp', '$name_comp', '$add_comp', '$phone_comp', '$email_comp', '$manager', '$email_manager', '$intern_name', '$duration', '$str_date', '$end_date', '$work_plan')";
    
    if (mysqli_query($conn, $sql)) {
        $sql2 = "DELETE FROM request WHERE id_req = $idreq";
        mysqli_query($conn, $sql2);
        header("Location: ../request.php?error=error");
        exit();
    } else {
        header("Location: ../request.php?one");
        exit();
    }
} else {
    header("Location: ../request.php?two");
    exit();
}
?>
