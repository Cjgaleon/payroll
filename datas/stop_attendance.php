<?php
session_start();
include("../db/config.php");

$userId = $_SESSION['user_id']; 

// Get the last unfinished attendance record
$query = "SELECT id, clock_in FROM attendance WHERE userId = ? AND clock_out IS NULL ORDER BY clock_in DESC LIMIT 1";
$stmt = $conn->prepare($query);
$stmt->bind_param("i", $userId);
$stmt->execute();
$result = $stmt->get_result();

if ($row = $result->fetch_assoc()) {
    $attendanceId = $row['id'];
    $clockInTime = strtotime($row['clock_in']);
    $clockOutTime = time();
    
    // Calculate worked hours
    $hoursWorked = round(($clockOutTime - $clockInTime) / 3600, 2);

    // Update attendance record with clock_out time and hours worked
    $updateQuery = "UPDATE attendance SET clock_out = NOW(), hours_worked = ? WHERE id = ?";
    $updateStmt = $conn->prepare($updateQuery);
    $updateStmt->bind_param("di", $hoursWorked, $attendanceId);

    if ($updateStmt->execute()) {
        echo json_encode(["status" => "success", "message" => "Clock-out recorded. Worked: $hoursWorked hours"]);
    } else {
        echo json_encode(["status" => "error", "message" => "Error updating attendance."]);
    }
    $updateStmt->close();
} else {
    echo json_encode(["status" => "error", "message" => "No active attendance session found."]);
}

$stmt->close();
$conn->close();
?>
