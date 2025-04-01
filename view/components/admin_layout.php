
<?php include("../datas/session_checker.php"); ?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Admin Dashboard - Payroll System</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <style>
        body {
            background-color: #1e1e2e;
            color: #ffffff;
        }
        .sidebar {
            width: 250px;
            height: 100vh;
            position: fixed;
            background: #28293d;
            padding-top: 20px;
        }
        .sidebar a {
            padding: 15px;
            display: block;
            color: #f3bb5f;
            text-decoration: none;
        }
        .sidebar a:hover {
            background: #373753;
        }
        .main-content {
            margin-left: 260px;
            padding: 20px;
        }
        .card {
            background: #373753;
            color: #ffffff;
        }
    </style>
</head>
<body>
    <div class="sidebar">
        <h3 class="text-center">Admin Dashboard</h3>
        <a href="employee_management.php">Employee Management</a>
        <a href="#">Payroll Processing</a>
        <a href="#">Attendance Tracking</a>
        <a href="#">Salary Reports</a>
        <a href="#">Leave Requests</a>
        <a href="#">Settings</a>
        <a href="../datas/logout.php" class="text-danger">Logout</a>
    </div>

    <div class="main-content">