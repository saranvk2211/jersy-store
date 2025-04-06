<?php
// Connect to the database
$host = "localhost";
$dbUsername = "root";
$dbPassword = "";
$dbName = "store1";

// Create connection
$conn = new mysqli($host, $dbUsername, $dbPassword, $dbName);

// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

// Sanitize and validate input
$fullname = trim($_POST['fullname']);
$email = trim($_POST['email']);
$username = trim($_POST['username']);
$password = trim($_POST['password']);

// Basic validation
if (strlen($fullname) < 2 || strlen($fullname) > 20) {
    die("Full Name must be between 2 and 20 characters.");
}
if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
    die("Invalid email format.");
}
if (strlen($username) < 3 || strlen($username) > 20) {
    die("Username must be between 3 and 20 characters.");
}
if (strlen($password) < 6 || strlen($password) > 20 || !preg_match('/[0-9]/', $password) || !preg_match('/[!@#$%^&*(),.?":{}|<>]/', $password)) {
    die("Password must be 6–20 characters, contain a number and a special character.");
}

// Hash password
$hashedPassword = password_hash($_POST['password'], PASSWORD_DEFAULT);


// Insert into database
$sql = "INSERT INTO users (fullname, email, username, password) VALUES (?, ?, ?, ?)";
$stmt = $conn->prepare($sql);
$stmt->bind_param("ssss", $fullname, $email, $username, $hashedPassword);

if ($stmt->execute()) {
    header("Location: login.html");
    exit();
} else {
    echo "Error: " . $stmt->error;
}

$stmt->close();
$conn->close();
?>
