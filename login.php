<?php
session_start();

if ($_SERVER["REQUEST_METHOD"] === "POST") {
    // Database connection
    $servername = "localhost";
    $dbUsername = "root";
    $dbPassword = ""; // default for XAMPP
    $dbName = "store1";

    $conn = new mysqli($servername, $dbUsername, $dbPassword, $dbName);

    if ($conn->connect_error) {
        die("Connection failed: " . $conn->connect_error);
    }

    $username = trim($_POST['username']);
    $password = trim($_POST['password']);

    $stmt = $conn->prepare("SELECT password FROM users WHERE username = ?");
    $stmt->bind_param("s", $username);
    $stmt->execute();
    $result = $stmt->get_result();

    if ($result->num_rows === 1) {
        $row = $result->fetch_assoc();
        $hashedPassword = $row['password'];

        if (password_verify($password, $hashedPassword)) {
            $_SESSION['username'] = $username;
            header("Location: http://localhost/jersey_store/dashboard.php");
            exit();
        }
    }

    echo "<script>
        alert('Invalid username or password. Please register first.');
        window.location.href = 'register.html';
    </script>";

    $conn->close();
    exit();
}
?>
