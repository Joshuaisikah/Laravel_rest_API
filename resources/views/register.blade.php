<!-- resources/views/auth/register.blade.php -->

<!-- resources/views/auth/register.blade.php -->
<form id="registrationForm">
    @csrf
    <label for="name">Name:</label>
    <input type="text" id="name" name="name" required>

    <label for="email">Email:</label>
    <input type="email" id="email" name="email" required>

    <label for="password">Password:</label>
    <input type="password" id="password" name="password" required>

    <button type="button" onclick="submitRegistrationForm()">Register</button>
</form>

<div id="registrationMessage" style="display: none;"></div>

<script>
    function submitRegistrationForm() {
        // JavaScript function to handle form submission
        var formData = new FormData(document.getElementById('registrationForm'));

        fetch('http://127.0.0.1/api/register', {
            method: 'POST',
            body: formData
        })
        .then(response => response.json())
        .then(data => {
            // Handle API response, update UI, etc.
            console.log('Registration response:', data);

            // Example: Display a success or error message to the user
            var messageElement = document.getElementById('registrationMessage');
            if (data.success) {
                messageElement.textContent = 'Registration successful!';
                messageElement.style.color = 'green';
            } else {
                messageElement.textContent = 'Registration failed. Please try again.';
                messageElement.style.color = 'red';
            }

            messageElement.style.display = 'block';
        })
        .catch(error => {
            console.error('Registration failed:', error);

            // Example: Display an error message to the user
            var messageElement = document.getElementById('registrationMessage');
            messageElement.textContent = 'Registration failed. Please try again.';
            messageElement.style.color = 'red';
            messageElement.style.display = 'block';
        });
    }
</script>
