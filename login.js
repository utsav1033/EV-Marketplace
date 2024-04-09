function validateForm() {
    const username = document.getElementById('username').value.trim();
    const password = document.getElementById('password').value.trim();
    const errorMessage = document.getElementById('error-message');

    // Basic validation - check if fields are empty
    if (username === '' || password === '') {
        errorMessage.textContent = 'Username and password are required.';
        return false; // Prevent form submission
    }

    // Here you can add more advanced validation if needed

    // Clear any previous error messages
    errorMessage.textContent = 'please recheck';

    // If all validations pass, you can proceed with form submission
    // For demonstration, we'll log the username and password
    console.log('Username:', username);
    console.log('Password:', password);

    // You can submit the form to a server using AJAX or other methods
    // For this example, we'll just prevent the default form submission
    return false;
}
