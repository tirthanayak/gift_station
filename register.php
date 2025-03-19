<?php
require 'db.php';

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $first_name = trim($_POST["first_name"]);
    $last_name = trim($_POST["last_name"]);
    $email = trim($_POST["email"]);
    $password = trim($_POST["password"]);
    $confirm_password = trim($_POST["confirm_password"]);
    // $phone = trim($_POST["phone"]);
    $phone = isset($_POST["phone"]) ? trim($_POST["phone"]) : null;


    if ($password !== $confirm_password) {
        $error = "Passwords do not match!";
    } else {
        $hashed_password = password_hash($password, PASSWORD_DEFAULT);
        $stmt = $conn->prepare("INSERT INTO users (first_name, last_name, email, password, phone) VALUES (?, ?, ?, ?, ?)");
        $stmt->bind_param("sssss", $first_name, $last_name, $email, $hashed_password, $phone);

        if ($stmt->execute()) {
            echo "<script>
                    setTimeout(function(){
                        Swal.fire({
                            title: 'Registration Successful!',
                            text: 'You will be redirected to the login page.',
                            icon: 'success',
                            timer: 3000,
                            showConfirmButton: false
                        }).then(() => {
                            window.location.href = 'login.php';
                        });
                    }, 500);
                </script>";
        } else {
            $error = "Error: " . $stmt->error;
        }

        $stmt->close();
    }

    $conn->close();
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Register</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script> 
    <style>
        @import url('https://fonts.googleapis.com/css2?family=Poppins:wght@300;400;600&display=swap');

        body {
            font-family: 'Poppins', sans-serif;
            background: linear-gradient(to right, #8360c3, #2ebf91);
            display: flex;
            justify-content: center;
            align-items: center;
            height: 100vh;
        }

        .register-container {
            width: 400px;
            background: rgba(255, 255, 255, 0.15);
            backdrop-filter: blur(10px);
            padding: 30px;
            border-radius: 15px;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
            color: #fff;
        }

        .register-container h3 {
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

        .btn-register {
            background: #2ebf91;
            color: white;
            border-radius: 8px;
            padding: 12px;
            font-size: 18px;
            font-weight: bold;
            transition: 0.3s;
            width: 100%;
        }

        .btn-register:hover {
            background: #26a583;
            transform: scale(1.05);
        }

        .alert {
            text-align: center;
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

<div class="register-container">
    <h3>Sign Up</h3>
    
    <?php if (isset($error)) { echo "<div class='alert alert-danger'>$error</div>"; } ?>

    <form method="POST">
        <div class="row mb-3">
            <div class="col-md-6">
                <input type="text" name="first_name" class="form-control" placeholder="First Name" required>
            </div>
            <div class="col-md-6">
                <input type="text" name="last_name" class="form-control" placeholder="Last Name" required>
            </div>
        </div>

        <div class="mb-3">
            <input type="email" name="email" class="form-control" placeholder="Email Address" required>
        </div>

        <!-- <div class="mb-3">
            <input type="password" name="password" class="form-control" placeholder="Password" required>
        </div>

        <div class="mb-3">
            <input type="password" name="confirm_password" class="form-control" placeholder="Confirm Password" required>
        </div> -->

        <div class="mb-3 position-relative">
        <input type="password" id="password" name="password" class="form-control" placeholder="Password" required>
        <span class="toggle-password" onclick="togglePassword('password', 'password-icon')" style="position: absolute; right: 10px; top: 50%; transform: translateY(-50%); cursor: pointer;">
            <span id="password-icon">👁️</span>
        </span>
    </div>

    <div class="mb-3 position-relative">
        <input type="password" id="confirm_password" name="confirm_password" class="form-control" placeholder="Confirm Password" required>
        <span class="toggle-password" onclick="togglePassword('confirm_password', 'confirm-password-icon')" style="position: absolute; right: 10px; top: 50%; transform: translateY(-50%); cursor: pointer;">
            <span id="confirm-password-icon">👁️</span>
        </span>
    </div>

        <!-- <div class="mb-3">
            <input type="text" name="phone" class="form-control" placeholder="Phone Number" required>
        </div> -->


        <div class="mb-3 form-check">
            <input type="checkbox" class="form-check-input" id="terms" name="terms" required>
            <label class="form-check-label" for="terms">
                I agree to the <a href="terms.php" target="_blank">Terms & Conditions</a> and 
                <a href="privacy.php" target="_blank">Privacy Policy</a>.
            </label>
        </div>

        <button type="submit" class="btn btn-register">Register</button>

        <p>Already have an account? <a href="login.php">Login</a></p>
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
