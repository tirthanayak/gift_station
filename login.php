<?php
require 'db.php';
session_start();

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $email = trim($_POST["email"]);
    $password = trim($_POST["password"]);

    $stmt = $conn->prepare("SELECT id, first_name, password FROM users WHERE email = ?");
    $stmt->bind_param("s", $email);
    $stmt->execute();
    $stmt->store_result();
    
    if ($stmt->num_rows > 0) {
        $stmt->bind_result($id, $first_name, $hashed_password);
        $stmt->fetch();

        if (password_verify($password, $hashed_password)) {
            $_SESSION["user_id"] = $id;
            $_SESSION["user_name"] = $first_name;

            echo "<script>
                    setTimeout(function(){
                        Swal.fire({
                            title: 'Login Successful!',
                            text: 'Welcome to Dashboard, $first_name!',
                            icon: 'success',
                            timer: 3000,
                            showConfirmButton: false
                        }).then(() => {
                            window.location.href = 'index_main.php';
                        });
                    }, 500);
                </script>";
        } else {
            echo "<script>
                    setTimeout(function(){
                        Swal.fire({
                            title: 'Error!',
                            text: 'Invalid credentials!',
                            icon: 'error',
                            timer: 3000,
                            showConfirmButton: false
                        });
                    }, 500);
                </script>";
        }
    } else {
        echo "<script>
                setTimeout(function(){
                    Swal.fire({
                        title: 'Error!',
                        text: 'No account found!',
                        icon: 'error',
                        timer: 3000,
                        showConfirmButton: false
                    });
                }, 500);
            </script>";
    }

    $stmt->close();
    $conn->close();
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
    <style>
        @import url('https://fonts.googleapis.com/css2?family=Poppins:wght@300;400;600&display=swap');

        body {
            font-family: 'Poppins', sans-serif;
            background: linear-gradient(to right, #2ebf91, #8360c3);
            display: flex;
            justify-content: center;
            align-items: center;
            height: 100vh;
        }

        .login-container {
            width: 400px;
            background: rgba(255, 255, 255, 0.15);
            backdrop-filter: blur(10px);
            padding: 30px;
            border-radius: 15px;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
            color: #fff;
        }

        .login-container h3 {
            text-align: center;
            font-weight: 600;
            margin-bottom: 20px;
        }

        .form-control {
            border-radius: 8px;
            border: none;
            padding: 12px;
            font-size: 16px;
            transition: 0.3s ease-in-out;
        }

        .form-control:focus {
            box-shadow: 0 0 10px rgba(255, 255, 255, 0.5);
            border: 2px solid #2ebf91;
        }

        .btn-login {
            background: #2ebf91;
            color: white;
            border-radius: 8px;
            padding: 12px;
            font-size: 18px;
            font-weight: bold;
            transition: 0.3s;
            width: 100%;
        }

        .btn-login:hover {
            background: #26a583;
            transform: scale(1.05);
        }

        p {
            text-align: center;
            margin-top: 15px;
        }

        p a {
            color: darkblue;
            font-weight: bold;
            text-decoration: none;
        }

        p a:hover {
            text-decoration: underline;
        }
    </style>
</head>
<body>

<div class="login-container">
    <h3>Login</h3>
    
    <form method="POST">
        <div class="mb-3">
            <input type="email" name="email" class="form-control" placeholder="Email Address" required>
        </div>

        <div class="mb-3 position-relative">
            <input type="password"  id="password" name="password" class="form-control" placeholder="Password" required>
            <span class="toggle-password" onclick="togglePassword('password', 'password-icon')" style="position: absolute; right: 10px; top: 50%; transform: translateY(-50%); cursor: pointer;">
            <span id="password-icon">👁️</span>
        </span>
        </div>

        <button type="submit" class="btn btn-login">Login</button>

        <p>Don't have an account? <a href="register.php">Sign Up</a></p>
    </form>
</div>

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
<script>
    function togglePassword(fieldId, iconId) {
        var field = document.getElementById(fieldId);
        var icon = document.getElementById(iconId);
        if (field.type === "password") {
            field.type = "text";
            icon.innerHTML = "👁️‍🗨️"; 
        } else {
            field.type = "password";
            icon.innerHTML = "👁️"; 
        }
    }
</script>
</body>
</html>









