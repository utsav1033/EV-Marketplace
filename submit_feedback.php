<?php
// Check if form is submitted
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Validate form fields
    $name = trim($_POST["name"]);
    $email = trim($_POST["email"]);
    $rating = $_POST["rating"];
    $comments = trim($_POST["comments"]);

    // Validate and sanitize input data
    if (empty($name) || empty($email) || empty($rating) || empty($comments)) {
        echo "All fields are required.";
        exit;
    }

    // Validate email format
    if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
        echo "Invalid email format.";
        exit;
    }

    // Connect to MySQL database
    $servername = "localhost";
    $username = "root";
    $password = "";
    $dbname = "feedback_db";

    $conn = new mysqli($servername, $username, $password, $dbname);
    if ($conn->connect_error) {
        die("Connection failed: " . $conn->connect_error);
    }

    // Prepare SQL statement to insert feedback data into database
    $sql = "INSERT INTO feedback (name, email, rating, comments) VALUES (?, ?, ?, ?)";
    $stmt = $conn->prepare($sql);
    $stmt->bind_param("ssss", $name, $email, $rating, $comments);

    // Execute SQL statement
    if ($stmt->execute()) {
        echo "Feedback submitted successfully.";
    } else {
        echo "Error submitting feedback: " . $stmt->error;
    }

    // Close database connection
    $stmt->close();
    $conn->close();
}
?>
