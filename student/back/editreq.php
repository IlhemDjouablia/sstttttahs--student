<?php
include '../../config/conn.php';
session_start();
$id = $_GET['id'];

if (isset($_POST['name']) && isset($_POST['address']) && isset($_POST['phone']) && isset($_POST['email']) && isset($_POST['manager_name']) && isset($_POST['contact']) && isset($_POST['duration']) && isset($_POST['startdate']) && isset($_POST['enddate']) && isset($_POST['workplan']) && isset($_POST['internshipname'])) {
    function validate($data)
    {
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

    // Check if the "photo" field exists in the submitted form
    if (isset($_POST['photo'])&& !empty($_POST['photo'])) {
        $photo = validate($_POST['photo']);
    } else {
        // Set a default photo if "photo" field is not submitted
        $photo = 'company.jpg';
    }

    $sql = "UPDATE request SET p_comp = '$photo', name_comp = '$name', add_comp = '$address', phone_comp = '$phone', email_comp = '$email', manager = '$managerName', email_manager = '$contact', intern_name = '$intern', duration = '$duration', str_date = '$startDate', end_date = '$endDate', work_plan = '$workPlan' WHERE id_req = '$id'";
    $result = mysqli_query($conn, $sql);

    if ($result) {
        header("Location: ../request.php?success=success");
        exit();
    } else {
        header("Location: ../request.php?error=error");
        exit();
    }
} else {
    header("Location: ../request.php?error=error");
    exit();
}
?>
