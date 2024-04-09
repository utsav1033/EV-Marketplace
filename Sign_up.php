<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login</title>
    <link rel="stylesheet" href="login.css">
</head>
<body>
    <div class="container" style="height: 482px;">
        <form autocomplete="off" action="signup_process.php" method="post" onsubmit="return validateForm()">
            <h2>Sign Up</h2>
            <div class="input-group">
                <input type="text" name="username" required>
                <label>Name</label>
                <span class="line"></span>
            </div>
            <div class="input-group">
                <input type="text" id="email" name="email" required>
                <label>Email</label>
                <span class="line"></span>
            </div>
            <div class="input-group">
                <input type="password" name="password" required>
                <label>Password</label>
                <span class="line"></span>
            </div>
            <button type="submit">Done</button>
            <button onclick="redirectToLogin()">Login</button>
        </form>
    </div>

    <script>
        function validateForm() {
            var email = document.getElementById('email').value;
            var emailPattern = /^[^\s@]+@[^\s@]+\.[^\s@]+$/;
            if (!emailPattern.test(email)) {
                alert("Please enter a valid email address.");
                return false;
            }
            return true;
        }

        function redirectToLogin() {
            window.location.href = "login.php";
        }
    </script>
</body>
</html>
