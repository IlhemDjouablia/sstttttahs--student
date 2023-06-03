<?php
session_start();
include('../config/conn.php');
$idst=$_SESSION['idst'];

if (isset($_POST["view"])) {
    if ($_POST["view"] != '') {
        mysqli_query($conn, "UPDATE `student_notif` SET seen_status='1' WHERE seen_status='0' and idst= $idst");
    }
    
    $query = mysqli_query($conn, "SELECT * FROM `student_notif`INNER JOIN request ON student_notif.idreq = request.id_req WHERE idst= $idst ORDER BY userid DESC LIMIT 5 ");
    $output = '';

    if (mysqli_num_rows($query) > 0) {
        while ($row = mysqli_fetch_array($query)) {
            $output .= '
            <div class="notification" >
            <img src="../head/img/'.$row['p_comp'].'" alt="avatar">
            <div class="notification-text">
            <a href="' . $row['link'] . '">
                <p>'.$row['intern_name'].'</p>
                <p>' . $row['message'] . '</p>
                <span>' . $row['time'] . '</span>
            </div></a>
        </div>
            ';
        }
    } else {
        $output .= '<div class="notification">
        <img src="img/profile.png" alt="avatar">
        <div class="notification-text">
            <p>no notification </p>
           
        </div>
    </div>';
    }

    $query1 = mysqli_query($conn, "SELECT * FROM `student_notif` WHERE seen_status='0'and idst= $idst ");
    $count = mysqli_num_rows($query1);
    $data = array(
        'notification' => $output,
        'unseen_notification' => $count
    );
    echo json_encode($data);
}
?>
