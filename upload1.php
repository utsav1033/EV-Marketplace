<?php
// Check if the form is submitted
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Validate and sanitize form inputs
    $name = trim($_POST["name"]);
    $link = trim($_POST["link"]);
    $price = trim($_POST["price"]);
    $description = trim($_POST["description"]);

    // Additional validation can be added here

    // Database connection
    $servername = "localhost";
    $username = "root"; // Default MySQL user
    $password = ""; // Default MySQL password is empty
    $dbname = "product"; // Replace with your actual database name

    // Create connection
    $conn = new mysqli($servername, $username, $password, $dbname);

    // Check connection
    if ($conn->connect_error) {
        die("Connection failed: " . $conn->connect_error);
    }

    // Prepare SQL statement
    $stmt = $conn->prepare("INSERT INTO products (name, image, price, description) VALUES (?, ?, ?, ?)");
    $stmt->bind_param("ssds", $name, $link, $price, $description);

    // Execute SQL statement
    if ($stmt->execute() === TRUE) {
        // Product uploaded successfully, redirect to another page
        header("Location: show_products.php");
        exit; // Stop further execution
    } else {
        echo "Error: " . $stmt->error;
    }

    // Close statement and connection
    $stmt->close();
    $conn->close();
}
?>
