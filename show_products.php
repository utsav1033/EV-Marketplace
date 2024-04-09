<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Products</title>
    <link rel="stylesheet" href="style_buy.css">
    <link href="https://fonts.googleapis.com/css2?family=Coolvetica&display=swap" rel="stylesheet">
</head>
<body style="background-image: url('tok5.jpg');">
<nav class="navbar">
    <div class="container">
        <h1>Buy EV Products</h1>
        <div class="nav-links">
            <a href="home.php">Home</a>
            <a href="aboutus.html">About Us</a>
            <a href="contact.html">Contact</a>
            <a href="feedback.php">Feedback</a>
            <a href="show_products.php">Buy</a>
            <a href="index.html">Sell</a>
            <a href="login.php">Logout</a>
        </div>
    </div>
</nav>

<div class="container">
    <h2>Products</h2>
    <div class="product-grid">
        <?php
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

        // Fetch data from database
        $sql = "SELECT name, price, description, image FROM products";
        $result = $conn->query($sql);

        // Display data in boxes
        if ($result->num_rows > 0) {
            while($row = $result->fetch_assoc()) {
                echo '<div class="product-box">';
                echo '<img src="' . $row["image"] . '" alt="' . $row["name"] . '">';
                echo '<h3>' . $row["name"] . '</h3>';
                echo '<p>Price: $' . $row["price"] . '</p>';
                echo '<p>' . $row["description"] . '</p>';
                // Modify the form action to pass product details to billing.php
                echo '<form action="billing.php" method="GET">';
                echo '<input type="hidden" name="name" value="' . $row["name"] . '">';
                echo '<input type="hidden" name="price" value="' . $row["price"] . '">';
                echo '<input type="hidden" name="description" value="' . $row["description"] . '">';
                echo '<input type="hidden" name="image" value="' . $row["image"] . '">';
                echo '<button onclick="location.href = \'payment.html\'" type="submit">Buy</button>';
                echo '</form>';
                echo '</div>';
            }
        } 
        else {
            echo "0 results";
        }

        // Close connection
        $conn->close();
        ?>
    </div>
</div>

</body>
</html>
