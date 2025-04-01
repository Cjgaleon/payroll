<?php
session_start();
include("../db/config.php"); // Ensure database connection is correct

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $email = mysqli_real_escape_string($conn, $_POST['email']);
    $password = $_POST['password']; // No need to escape, password is never used in a SQL query directly

    // Fetch user data securely using prepared statement
    $stmt = $conn->prepare("SELECT * FROM `user` WHERE `email` = ? LIMIT 1");
    $stmt->bind_param("s", $email);
    $stmt->execute();
    $result = $stmt->get_result();

    if ($result && $result->num_rows == 1) {
        $user = $result->fetch_assoc();

        // Verify password hash
        if (password_verify($password, $user['password'])) {
            $_SESSION['user_id'] = $user['userId'];
            $_SESSION['role'] = $user['role'];
            $_SESSION['firstName'] = $user['firstName'];
            $_SESSION['lastName'] = $user['lastName'];

            // Debugging: Check if role is set correctly
            error_log("User role: " . $_SESSION['role']);

            // Redirect based on role
            if ($user['role'] === 'admin') {
                header("Location: ../view/admin_dashboard.php");
                exit();
            } else {
                header("Location: ../view/user_dashboard.php");
                exit();
            }
        } else {
            $_SESSION['message'] = "Invalid password!";
        }
    } else {
        $_SESSION['message'] = "User not found!";
    }
    
    // Redirect back to login with error
    header("Location: ../login.php");
    exit();
}
?>
