<?php
session_start();
include("../db/config.php");

$userId = $_SESSION['user_id']; // Get logged-in user's ID

// Insert attendance record when user clocks in
$query = "INSERT INTO attendance (userId, clock_in) VALUES (?, NOW())";
$stmt = $conn->prepare($query);
$stmt->bind_param("i", $userId);

if ($stmt->execute()) {
    echo json_encode(["status" => "success", "message" => "Clock-in recorded."]);
} else {
    echo json_encode(["status" => "error", "message" => "Error recording attendance."]);
}
$stmt->close();
$conn->close();
?>
