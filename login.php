<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login - Payroll System</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <style>
        body {
            background-color: #262626;
            color: #F0F3F4;
        }
        .login-container {
            max-width: 400px;
            margin: 100px auto;
            padding: 20px;
            background: #373636;
            border-radius: 10px;
            box-shadow: 0 0 10px rgba(255, 255, 255, 0.1);
            text-align: center;
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
        .signup-container {
            margin-top: 15px;
        }
    </style>
</head>
<body>
    <div class="login-container">
        <h2>Sign In</h2>
        <form method="POST" action="./datas/login.php" class="row g-3 needs-validation" novalidate>
            <input type="email" class="form-control" placeholder="Email" name="email" required>
            <input type="password" class="form-control" placeholder="Password" name="password" required>
            <button type="submit" class="btn">Sign In</button>
        </form>
        <div class="signup-container">
            <p>Don't have an account? <a href="register.php" class="link-text">Sign up</a></p>
        </div>
    </div>
</body>
</html>
