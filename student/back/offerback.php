<?php
include '../../config/conn.php';
session_start();
$idof = $_GET['id'];
$idst = $_SESSION['idst'];

if (isset($idof)) {
    $sql = "SELECT * FROM offer WHERE id_offer = $idof";
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
    $sql3 = "SELECT * FROM request WHERE intern_name='$intern_name' AND id_student='$idst'";
    $result3 = mysqli_query($conn, $sql3);
    if (mysqli_num_rows($result3) > 0) {
        header("Location: ../offers.php?error=error");
        exit();
    }else {
        $sql2 = "INSERT INTO request(id_student, p_comp, name_comp,
     add_comp, phone_comp, email_comp, manager, email_manager, intern_name, 
     duration, str_date, end_date, work_plan) VALUES ('$idst', '$p_comp', '$name_comp',
      '$add_comp', '$phone_comp', '$email_comp', '$manager', ' $email_manager', '$intern_name', '$duration', 
      '$str_date', '$end_date', '$work_plan')";
    $result2 = mysqli_query($conn, $sql2);
    if ($result2) {
        header("Location: ../request.php?error=error");
        exit();
    }else {
        header("Location: ../offers.php?error=error");
        exit();
    }
   
    }
  
}        header("Location: ../offers.php?error=error");
exit();
?>
