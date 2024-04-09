<?php
// Start session
session_start();

// Process sign-up form data if form is submitted
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Database connection parameters
    $servername = "localhost";
    $username = "root"; // Replace with your database username
    $password = ""; // Replace with your database password if applicable
    $dbname = "login"; // Replace with your database name

    // Create connection
    $conn = new mysqli($servername, $username, $password, $dbname);

    // Check connection
    if ($conn->connect_error) {
        die("Connection failed: " . $conn->connect_error);
    }

    // Sanitize input
    $username = mysqli_real_escape_string($conn, $_POST["username"]);
    $email = mysqli_real_escape_string($conn, $_POST["email"]);
    $password = mysqli_real_escape_string($conn, $_POST["password"]);

    // Check if username already exists
    $sql = "SELECT * FROM users WHERE username='$username'";
    $result = $conn->query($sql);

    if ($result->num_rows > 0) {
        // Username already exists
        $_SESSION['error'] = "Username already exists";
        $conn->close();
        header("Location: sign_up.php");
        exit();
    }

    // Check if email already exists
    $sql = "SELECT * FROM users WHERE email='$email'";
    $result = $conn->query($sql);

    if ($result->num_rows > 0) {
        // Email already exists
        $_SESSION['error'] = "Email already exists";
        $conn->close();
        header("Location: sign_up.php");
        exit();
    }

    // Prepare and bind SQL statement
    $stmt = $conn->prepare("INSERT INTO users (username, email, password) VALUES (?, ?, ?)");
    $stmt->bind_param("sss", $username, $email, $hashed_password);

    // Hash password
    $hashed_password = password_hash($password, PASSWORD_DEFAULT);

    // Execute SQL statement
    if ($stmt->execute()) {
        // Registration successful
        $stmt->close();
        $conn->close();
        $_SESSION['success'] = "Registration successful. You can now log in.";
        header("Location: login.php");
        exit();
    } else {
        // Error occurred during registration
        $_SESSION['error'] = "Error occurred during registration.";
        $stmt->close();
        $conn->close();
        header("Location: sign_up.php");
        exit();
    }
}
?>
