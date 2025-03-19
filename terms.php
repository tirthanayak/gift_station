<?php
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Terms & Conditions</title>
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
    <h2>Terms & Conditions</h2>
    <p>Welcome to GiftStation. By using our website, you agree to comply with the following terms and conditions.</p>

    <p><strong>1. General Use:</strong> You must be at least 18 years old to use our services. You agree to provide accurate information.</p>
    
    <p><strong>2. Account Security:</strong> You are responsible for maintaining the confidentiality of your account credentials.</p>
    
    <p><strong>3. Orders & Payments:</strong> All orders are subject to availability. Payments must be made in full before the product is dispatched.</p>
    
    <p><strong>4. Returns & Refunds:</strong> Products can be returned within 7 days if they meet the return policy requirements.</p>
    
    <p><strong>5. Prohibited Activities:</strong> You agree not to misuse the website for fraudulent purposes.</p>

    <p><strong>6. Amendments:</strong> GiftStation reserves the right to modify these terms at any time.</p>

    <a href="register.php" class="btn-back">Back to Registration</a>
</div>

</body>
</html>
