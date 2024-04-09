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
    <div class="description-box">
        <h1>About EV Marketplace</h1>
        <p>EV Marketplace is revolutionizing the way we interact with electric vehicles (EVs). As the world transitions towards sustainable transportation, EV Marketplace stands at the forefront, offering a comprehensive platform for all things EV-related. Whether you're a seasoned EV enthusiast or just beginning your journey into the world of electric mobility, EV Marketplace is here to support you every step of the way.</p>
        <p>Our platform boasts an extensive array of EV products and services, ranging from cutting-edge electric vehicles to state-of-the-art charging infrastructure and eco-friendly accessories. With a focus on accessibility, affordability, and sustainability, EV Marketplace aims to make the transition to electric transportation seamless and enjoyable for all.</p>
        <p>At EV Marketplace, we're more than just a marketplace – we're a community. Our platform fosters collaboration, knowledge-sharing, and innovation, bringing together EV enthusiasts, industry experts, and eco-conscious consumers from around the globe. Whether you're looking to buy, sell, or simply learn more about electric vehicles, you'll find everything you need right here at EV Marketplace.</p>
        <img src="ev.jpg" alt="EV Marketplace Image">
    </div>
    <div class="product-grid">
        <!-- Product boxes will be displayed here -->
    </div>
</div>

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
                echo '<button type="submit">Buy</button>';
                echo '</form>';
                echo '</div>';
            }
        } else {
            echo "0 results";
        }

        // Close connection
        $conn->close();
        ?>
    </div>
</div>

</body>
</html>
