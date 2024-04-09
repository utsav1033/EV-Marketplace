<!DOCTYPE html>
<html>
<head>
    <title>Feedback</title>
    <link rel="stylesheet" href="styles.css">
    <style>
        /* Additional styles specific to this page */
        /* Add styling for the feedback form container */
        .feedback-container {
            max-width: 600px;
            margin: 0 auto;
            padding: 20px;
            background-color: #ffffff;
            border-radius: 10px;
            box-shadow: 0 2px 5px rgba(0, 0, 0, 0.1);
        }

        /* Add styling for feedback form labels */
        .feedback-label {
            font-weight: bold;
        }

        /* Add styling for feedback form inputs */
        .feedback-input {
            width: 100%;
            padding: 10px;
            margin-bottom: 20px;
            border: 1px solid #ccc;
            border-radius: 5px;
            transition: border-color 0.3s ease;
        }

        /* Add styling for feedback form inputs on focus */
        .feedback-input:focus {
            border-color: #1ab188;
        }

        /* Add styling for feedback form submit button */
        .feedback-submit {
            padding: 10px 20px;
            background-color: #1ab188;
            color: #fff;
            border: none;
            border-radius: 5px;
            cursor: pointer;
            transition: background-color 0.3s ease;
        }

        /* Add styling for feedback form submit button on hover */
        .feedback-submit:hover {
            background-color: #0e5e3e;
        }

        /* Add background image */
        body {
            background-image: url('tok5.jpg');
            background-size: cover;
            background-position: center;
            background-repeat: no-repeat;
            font-family: Coolvetica, sans-serif;
        }
    </style>
</head>
<body>
    <nav class="navbar">
        <div class="container">
            <h1 style="font-size: 40px;">Feedback</h1>
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

    <div class="container feedback-container">
        <h2>Feedback</h2>
        <div class="mb-4 small">Please provide your feedback in the form below</div>
        <form name="feedback_form" id="feedback_form" method="post" align="center">
            <label class="feedback-label" for="feedback_rating">How do you rate your overall experience?</label>
            <div class="mb-3 d-flex flex-row py-1">
                <div class="form-check mr-3">
                    <input class="form-check-input" type="radio" name="rating" id="rating_bad" value="bad">
                    <label class="form-check-label" for="rating_bad">Bad</label>
                </div>
                
                <div class="form-check mx-3">
                    <input class="form-check-input" type="radio" name="rating" id="rating_good" value="good">
                    <label class="form-check-label" for="rating_good">Good</label>
                </div>
                
                <div class="form-check mx-3">
                    <input class="form-check-input"  type="radio" name="rating" id="rating_excellent" value="excellent">
                    <label class="form-check-label" for="rating_excellent">Excellent!</label>
                </div>
            </div>
            <div class="mb-4">
                <label class="feedback-label" for="feedback_comments">Comments:</label>
                <textarea class="feedback-input" required rows="6" name="comments" id="feedback_comments"></textarea>
            </div>
            <div class="row">
                <div class="col">
                    <label class="feedback-label" for="feedback_name">Your Name:</label>
                    <input type="text" required name="name" class="feedback-input" id="feedback_name"/>
                </div>
                
                <div class="col mb-4">
                    <label class="feedback-label" for="feedback_email">Email:</label>
                    <input type="email" name="email" required class="feedback-input" id="feedback_email"/>
                </div>
            </div>
            <button type="submit" class="feedback-submit">Post</button>
        </form>

        <div id="feedback_message">
            <!-- This div will display the feedback submission status -->
        </div>

        <!-- PHP code to handle form submission and store feedback data in database -->
        <?php include('submit_feedback.php'); ?>
    </div>
</body>
</html>
