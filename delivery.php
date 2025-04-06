<?php
$host = "localhost";
$username = "root";
$password = "";
$dbname = "store1";

$conn = new mysqli($host, $username, $password, $dbname);

if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

if ($_SERVER["REQUEST_METHOD"] === "POST") {
    $fullName = trim($_POST['fullName']);
    $phone = trim($_POST['phone']);
    $street = trim($_POST['street']);
    $city = trim($_POST['city']);
    $state = trim($_POST['state']);
    $zip = trim($_POST['zip']);
    $size = trim($_POST['size']);
    $payment = isset($_POST['payment']) ? trim($_POST['payment']) : 'COD';

    $sql = "INSERT INTO deliveries (fullName, phone, street, city, state, zip, size, payment_method) 
            VALUES (?, ?, ?, ?, ?, ?, ?, ?)";
    $stmt = $conn->prepare($sql);
    $stmt->bind_param("ssssssss", $fullName, $phone, $street, $city, $state, $zip, $size, $payment);

    ?>
    <!DOCTYPE html>
    <html>
    <head>
        <title>Order Confirmation</title>
        <style>
            body {
                margin: 0;
                padding: 0;
                background: #f0f0f0;
                font-family: 'Segoe UI', sans-serif;
                display: flex;
                align-items: center;
                justify-content: center;
                height: 100vh;
            }
            .container {
                text-align: center;
                background: #fff;
                padding: 40px;
                border-radius: 15px;
                box-shadow: 0 0 15px rgba(0,0,0,0.1);
            }
            .container img {
                max-width: 400px;
                width: 100%;
                margin-top: 20px;
            }
            .success {
                font-size: 24px;
                color: green;
                margin-bottom: 10px;
            }
        </style>
    </head>
    <body>
    <div class="container">
        <?php
        if ($stmt->execute()) {
            echo "<div class='success'>✅ Order placed successfully!</div>";
            echo "<img src='ok.jpg' alt='Success'>";
        } else {
            echo "<div style='color:red;'>❌ Error: " . $stmt->error . "</div>";
        }
        ?>
    </div>
    </body>
    </html>
    <?php

    $stmt->close();
    $conn->close();
} else {
    echo "⛔ This page should be accessed via form submission.";
}
?>
