<?php
session_start();
include("../db/config.php");

if(!isset($_SESSION['userId'])) {
    echo "User not logged in!";
    exit();
}

$user_id = $_SESSION['userId'];
$elapsedtime = intval($_POST['elapsedtime']);// Get time in seconds
$hoursWorked = $elapsedtime / 3600;

//INsert into database
$stmt = $conn-> prepare("INSERT INTO attendance(userId, date, hours_worked) VALUES (?, NOW(), ?)");
$stmt-> bind_param("userId", $userId. $hoursWorked);

if ($stmt-> execute()){
    echo "Attendance recorded successgully!";
}else {
    echo "ERROR: " . $conn->error;
}

$stmt->close();
$stmt->close();


?>