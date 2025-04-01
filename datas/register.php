<?php
include("../db/config.php");
session_start();

if(isset($_POST['register'])){
    $firstName = $_POST['firstName'];
    $lastName = $_POST['lastName'];
    $email = $_POST['email'];
    $password = $_POST['password'];
    $cpassword = $_POST['cpassword'];
    $phoneNumber = $_POST['phoneNumber'];
    $gender = $_POST['gender'];
    $birthday = $_POST['birthday'];

    // Validate if passwords match
    if($password !== $cpassword){
        $_SESSION['message'] = "Passwords do not match!";
        $_SESSION['code'] = "error";
        header("Location: ../register.php");
        exit();
    }

    // Check if email already exists
    $stmt = $conn->prepare("SELECT * FROM `user` WHERE `email` = ?");
    $stmt->bind_param("s", $email);
    $stmt->execute();
    $result = $stmt->get_result();

    if($result->num_rows > 0){
        $_SESSION['message'] = "Email address already exists!";
        $_SESSION['code'] = "error";
        header("Location: ../register.php");
        exit();
    }

    // Hash the password before storing
    $hashed_password = password_hash($password, PASSWORD_BCRYPT);

    // Assign role (default to 'employee')
    $role = "employee"; 

    // Insert user data into the database
    $stmt = $conn->prepare("INSERT INTO `user`(`firstName`, `lastName`, `email`, `password`, `phoneNumber`, `gender`, `birthday`, `role`) 
                            VALUES (?, ?, ?, ?, ?, ?, ?, ?)");
    $stmt->bind_param("ssssssss", $firstName, $lastName, $email, $hashed_password, $phoneNumber, $gender, $birthday, $role);

    if ($stmt->execute()){
        $_SESSION['message'] = "Registered successfully!";
        $_SESSION['code'] = "success";
        header("Location: ../login.php");
        exit();
    } else {
        $_SESSION['message'] = "Error: " . $conn->error;
        $_SESSION['code'] = "error";
        header("Location: ../register.php");
        exit();
    }

    // Close connection
    $stmt->close();
    $conn->close();
}
?>
