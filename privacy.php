<?php
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Privacy Policy</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
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

        .content-container {
            width: 70%;
            background: rgba(255, 255, 255, 0.15);
            backdrop-filter: blur(10px);
            padding: 30px;
            border-radius: 15px;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
            color: #fff;
            overflow-y: auto;
            max-height: 80vh;
        }

        h2 {
            text-align: center;
            font-weight: 600;
            margin-bottom: 20px;
        }

        p {
            text-align: justify;
            font-size: 16px;
            line-height: 1.6;
        }

        .btn-back {
            display: block;
            width: fit-content;
            margin: 20px auto;
            padding: 10px 20px;
            background: #2ebf91;
            color: white;
            border-radius: 8px;
            text-decoration: none;
            font-weight: bold;
            text-align: center;
            transition: 0.3s;
        }

        .btn-back:hover {
            background: #26a583;
            transform: scale(1.05);
        }
    </style>
</head>
<body>

<div class="content-container">
    <h2>Privacy Policy</h2>
    <p>Your privacy is important to us. This Privacy Policy outlines how GiftStation collects, uses, and protects your information.</p>

    <p><strong>1. Information We Collect:</strong> We collect personal details such as name, email, and phone number when you register or make a purchase.</p>
    
    <p><strong>2. Use of Information:</strong> Your data is used to process orders, improve our services, and send promotional content (if opted in).</p>
    
    <p><strong>3. Data Security:</strong> We use industry-standard security measures to protect your data.</p>
    
    <p><strong>4. Cookies:</strong> We use cookies to enhance your browsing experience. You can manage cookie preferences in your browser.</p>
    
    <p><strong>5. Third-Party Sharing:</strong> We do not sell your information. However, we may share it with payment processors and delivery services as necessary.</p>
    
    <p><strong>6. Updates:</strong> We reserve the right to update this Privacy Policy at any time.</p>

    <a href="register.php" class="btn-back">Back to Registration</a>
</div>

</body>
</html>
