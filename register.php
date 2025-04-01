<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Register - Payroll System</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <style>
        body {
            background-color: #262626;
            color: #F0F3F4;
        }
        .register-container {
            max-width: 400px;
            margin: 100px auto;
            padding: 20px;
            background: #373636;
            border-radius: 10px;
            box-shadow: 0 0 10px rgba(255, 255, 255, 0.1);
            text-align: center;
        }
        .logo {
            width: 100px;
            height: 120px;
            margin-bottom: 16px;
        }
        .form-control {
            width: 100%;
            height: 45px;
            border: 1px solid #373636;
            margin: 10px 0;
            padding: 12px;
            border-radius: 8px;
            background-color: #262626;
            color: #F0F3F4;
        }
        .form-control:focus {
            background-color: #444;
            color: white;
        }
        .btn {
            width: 100%;
            background-color: #373636;
            color: #F3BB5F;
            padding: 10px;
            font-size: 17px;
            border-radius: 8px;
            margin-top: 10px;
            border: none;
        }
        .btn:hover {
            background-color: #4a4a4a;
        }
        .link-text {
            color: #F3BB5F;
            text-decoration: none;
            display: block;
            margin-top: 10px;
        }
    </style>
</head>
<body>
    <div class="register-container">
        <h2>Register</h2>
        <form method="POST" action="./datas/register.php" class="row g-3 needs-validation" novalidate>
    <input type="text" class="form-control" placeholder="First Name" name="firstName" required>
    <input type="text" class="form-control" placeholder="Last Name" name="lastName" required>
    <input type="email" class="form-control" placeholder="Email" name="email" required>
    <input type="password" class="form-control" placeholder="Password" name="password" required>
    <input type="password" class="form-control" placeholder="Confirm Password" name="cpassword" required>
    <input type="text" class="form-control" placeholder="Phone number" name="phoneNumber" required>
    <div class="col-12">
        <label for="gender" class="form-label">Gender</label>
        <select name="gender" id="gender" class="form-select" required>
            <option selected disabled>Select Gender</option>
            <option value="Male">Male</option>
            <option value="Female">Female</option>
        </select>
    </div>
    <div class="col-12">
        <label for="birthday" class="form-label">Date of Birth</label>
        <input type="date" name="birthday" class="form-control" id="birthday" required>
    </div>
    <button type="submit" class="btn" name="register">Create Account</button>
</form>

        <p>Already have an account? <a href="login.php" class="link-text">Login</a></p>
    </div>
</body>
</html>
