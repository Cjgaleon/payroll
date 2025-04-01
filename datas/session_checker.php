<?php
session_start();

// Check if user is logged in
if (!isset($_SESSION['user_id']) || !isset($_SESSION['role'])) {
    // Redirect to login page if not authenticated
    header("Location: ../login.php?message=unauthorized");
    exit();
}

// Optionally, enforce role-based access
if (basename($_SERVER['PHP_SELF']) == "admin_dashboard.php" && $_SESSION['role'] !== "admin") {
    header("Location: ../view/user_dashboard.php?message=access_denied");
    exit();
}
?>