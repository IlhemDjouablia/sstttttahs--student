<?php
session_start();
include "../config/conn.php";
// Connect to the database

// Get the company ID from the query parameter
$companyId = $_GET['id'];

// Fetch the company information from the database
$sql = "SELECT * FROM company WHERE id_company = '$companyId'";
$result = mysqli_query($conn, $sql);
if ($result && mysqli_num_rows($result) > 0) {
    $info = mysqli_fetch_assoc($result);
    // Send the company information as JSON
    header('Content-Type: application/json');
    echo json_encode($info);
} else {
    http_response_code(404);
}

?>

    