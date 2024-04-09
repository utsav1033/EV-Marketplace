<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Billing</title>
    <link rel="stylesheet" href="custom_style.css">
    <link href="https://fonts.googleapis.com/css2?family=Coolvetica&display=swap" rel="stylesheet">
</head>
<body>

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
    <div class="product-details">
        <?php
        // Retrieve product details from GET parameters
        $name = $_GET['name'];
        $price = $_GET['price'];
        $description = $_GET['description'];
        $image = $_GET['image'];
        



        // Display product details
        echo '<img src="' . $image . '" alt="' . $name . '">';
        echo '<h2>Product Details</h2>';
        echo '<h3>' . $name . '</h3>';
        echo '<p>Price: $' . $price . '</p>';
        echo '<p>Description: ' . $description . '</p>';

        // Add form fields for name and address
        echo '<form action="payment.html" method="POST">';
        echo '<label for="name">Name:</label>';
        echo '<input type="text" id="name" name="name" required><br>';
        echo '<label for="address">Address:</label>';
        echo '<input type="text" id="address" name="address" required><br>';
        // Hidden fields to pass product details
        echo '<input type="hidden" name="product_name" value="' . $name . '">';
        echo '<input type="hidden" name="product_price" value="' . $price . '">';
        echo '<input type="hidden" name="product_description" value="' . $description . '">';
        echo '<input type="hidden" name="product_image" value="' . $image . '">';
        echo '<button type="submit" class="buy-button">Buy Now</button>';
        echo '</form>';
        ?>
    </div>
</div>

</body>
</html>
