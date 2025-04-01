<?php
include("./components/admin_layout.php"); 
include("../db/config.php"); 

$userId = $_SESSION['userId'];
$query = "SELECT date, hours_worked FROM attendance WHERE userId = ? ORDER BY date DESC";
$stmt = $conn->prepare($query);
$stmt->bind_param("i", $userId);
$stmt->execute();
$result = $stmt->get_result();
?>

<div class="card">
    <h4>Your Attendance Records</h4>
    <table class="table table-dark">
        <thead>
            <tr>
                <th>Date</th>
                <th>Hours Worked</th>
            </tr>
        </thead>
        <tbody>
            <?php while ($row = $result->fetch_assoc()) : ?>
                <tr>
                    <td><?php echo $row['date']; ?></td>
                    <td><?php echo number_format($row['hours_worked'], 2); ?> hrs</td>
                </tr>
            <?php endwhile; ?>
        </tbody>
    </table>
</div>

<?php
$stmt->close();
$conn->close();
?>


<div class="row">
    <div class="col-md-4">
        <div class="card">
            <h5>Last Salary</h5>
            <p>$3000 - March 2025</p>
        </div>
    </div>
    <div class="col-md-4">
        <div class="card">
            <h5>Next Payday</h5>
            <p>April 15, 2025</p>
        </div>
    </div>
    <div class="col-md-4">
        <div class="card">
            <h5>Pending Leave Requests</h5>
            <p>2 Requests</p>
        </div>
    </div>
</div>

<div class="card mt-3">
    <h5>Today's Attendance</h5>
    <p><?php echo isset($hoursWorked) ? "{$hoursWorked} hours on {$attendanceDate}" : "No attendance recorded today."; ?></p>
</div>
