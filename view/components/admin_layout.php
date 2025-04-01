
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
            background-color: #2D2D2D;
            color: #F0F3F4;
        }
        .sidebar {
            width: 250px;
            height: 100vh;
            position: fixed;
            left: 0;
            top: 0;
            background: #373636;
            padding: 20px;
        }
        .sidebar a {
            color: #F3BB5F;
            text-decoration: none;
            display: block;
            margin: 10px 0;
        }
        .content {
            margin-left: 260px;
            padding: 20px;
        }
        .card {
            background-color: #3E3E3E;
            color: #F0F3F4;
            border-radius: 10px;
            padding: 20px;
            margin-bottom: 20px;
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