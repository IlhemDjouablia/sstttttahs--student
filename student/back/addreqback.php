<?php
include '../../config/conn.php';
session_start();

if (isset($_POST['name']) && isset($_POST['address']) && isset($_POST['phone']) && isset($_POST['email']) && isset($_POST['manager_name']) && isset($_POST['contact']) && isset($_POST['duration']) && isset($_POST['startdate']) && isset($_POST['enddate']) && isset($_POST['workplan']) && isset($_POST['internshipname'])) {
    function validate($data) {
        $data = trim($data);
        $data = stripslashes($data);
        $data = htmlspecialchars($data);
        return $data;
    }
 

    $name = validate($_POST['name']);
    $address = validate($_POST['address']);
    $phone = validate($_POST['phone']);
    $email = validate($_POST['email']);
    $managerName = validate($_POST['manager_name']);
    $contact = validate($_POST['contact']);
    $duration = validate($_POST['duration']);
    $startDate = validate($_POST['startdate']);
    $endDate = validate($_POST['enddate']);
    $workPlan = validate($_POST['workplan']);
    $intern = validate($_POST['internshipname']);
    $id = $_SESSION['idst'];
    $dep = $_SESSION['depst'];



    $sql6 = "SELECT * FROM head WHERE dep_hod='$dep'";
    $result6 = mysqli_query($conn, $sql6);
    $row = mysqli_fetch_assoc($result6);
    $id_head=$row['id_hod'];



    if (isset($_POST['photo']) && !empty($_POST['photo'])) {
        $photo = validate($_POST['photo']);
        $sql = "INSERT INTO request(id_student, p_comp, name_comp, add_comp, phone_comp, email_comp, manager, email_manager, intern_name, duration, str_date, end_date, work_plan) VALUES ('$id', '$photo', '$name', '$address', '$phone', '$email', '$managerName', '$contact', '$intern', '$duration', '$startDate', '$endDate', '$workPlan')";
        $result = mysqli_query($conn, $sql);
        if ($result) {
            // Retrieve the last inserted ID
            $lastInsertId = mysqli_insert_id($conn);
            
            // Insert a notification into the head_notif table

            $link = "request.php"; // Update this with the appropriate link
            $message = "A new request has been added."; // Update this with the appropriate message
            $sql5 = "INSERT INTO head_notif (id_head, id_req, link, message) VALUES ('$id_head', '$lastInsertId', '$link', '$message')";
            $result5 = mysqli_query($conn, $sql5);

            header("Location: ../request.php?error=error");
            exit();
        }
    } else {
        $sql2 = "INSERT INTO request(id_student, name_comp, add_comp, phone_comp, email_comp, manager, email_manager, intern_name, duration, str_date, end_date, work_plan) VALUES ('$id', '$name', '$address', '$phone', '$email', '$managerName', '$contact', '$intern', '$duration', '$startDate', '$endDate', '$workPlan')";
        $result2 = mysqli_query($conn, $sql2);
        if ($result2) {

            // Retrieve the last inserted ID
            $lastInsertId = mysqli_insert_id($conn);
            
            // Insert a notification into the head_notif table
           
            $link = "request.php"; // Update this with the appropriate link
            $message = "A new request has been added."; // Update this with the appropriate message
            $sql5 = "INSERT INTO head_notif (id_head, id_req, link, message) VALUES ('$id_head', '$lastInsertId', '$link', '$message')";
            $result5 = mysqli_query($conn, $sql5);

            header("Location: ../request.php?error=error");
            exit();
        }
    }
} else {
    header("Location: ../addreq.php?error=error");
    exit();
}
?>
