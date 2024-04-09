<?php
// Start session
session_start();

// Check if the form is submitted
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Validate and sanitize form inputs
    $username = trim($_POST["username"]);
    $password = trim($_POST["password"]);

    // Database connection parameters
    $servername = "localhost";
    $db_username = "root"; // Replace with your database username
    $db_password = ""; // Replace with your database password
    $dbname = "login"; // Replace with your database name

    try {
        // Create connection
        $conn = new mysqli($servername, $db_username, $db_password, $dbname);

        // Check connection
        if ($conn->connect_error) {
            throw new Exception("Connection failed: " . $conn->connect_error);
        }

        // Prepare SQL statement to retrieve user from database
        $stmt = $conn->prepare("SELECT * FROM users WHERE username = ?");
        $stmt->bind_param("s", $username);

        // Execute SQL statement
        $stmt->execute();

        // Get result
        $result = $stmt->get_result();

        // Check if user exists
        if ($result->num_rows == 1) {
            // Fetch user data
            $user = $result->fetch_assoc();

            // Verify password
            if (password_verify($password, $user['password'])) {
                // Password is correct, login successful
                // Store user data in session for future use
                $_SESSION['username'] = $user['username'];

                // Redirect user to show_products.php
                header("Location: show_products.php");
                exit;
            } else {
                // Password is incorrect
                $error_message = "Incorrect password. Please try again.";
            }
        } else {
            // User does not exist
            $error_message = "User does not exist. Please check your username.";
        }

        // Close statement and connection
        $stmt->close();
        $conn->close();
    } catch (Exception $e) {
        // Handle database connection or query errors
        $error_message = "Error: " . $e->getMessage();
    }
}
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login</title>
    <link rel="stylesheet" href="login.css">
    <link rel="shortcut icon" href="log.ico">
    <script>
        function validateForm() {
            var username = document.forms["loginForm"]["username"].value;
            var password = document.forms["loginForm"]["password"].value;

            if (username == "") {
                alert("Please enter your username.");
                return false;
            }

            if (password == "") {
                alert("Please enter your password.");
                return false;
            }

            return true;
        }
    </script>
</head>

<body>
    <div class="container">
        <form name="loginForm" method="post" autocomplete="off" onsubmit="return validateForm()">
            <h2>Sign In</h2>
            <div class="input-group">
                <input type="text" name="username" required>
                <label>Username</label>
                <span class="line"></span>
            </div>
            <div class="input-group">
                <input type="password" name="password" required>
                <label>Password</label>
                <span class="line"></span>
            </div>
            <?php if (isset($error_message)) : ?>
                <div class="error-message"><?php echo $error_message; ?></div>
            <?php endif; ?>
            <div class="check">
                <label>
                    <input type="checkbox"> Remember Me
                </label>
                <a href="">Forgot Password?</a>
            </div>
            <button type="submit">Login</button>
            <div class="signup">
                <p>Don't have an account? <a href="Sign_Up.php">Sign Up</a></p>
            </div>
        </form>
    </div>
</body>

</html>
