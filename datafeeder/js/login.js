function login() {
    const username = document.getElementById('username').value;
    const password = document.getElementById('password').value;
    const errorMessage = document.getElementById('errorMessage');

    // You should perform proper validation before sending data to the server

    fetch('api/login.php', {
        method: 'POST',
        headers: {
            'Content-Type': 'application/x-www-form-urlencoded',
        },
        body: `username=${encodeURIComponent(username)}&password=${encodeURIComponent(password)}`,
    })
    .then(response => response.json())
    .then(data => {
        if (data.success) {
            // Redirect to chavsu.php upon successful login
            window.location.href = 'chavsu.php';
        } else {
            errorMessage.textContent = 'Invalid username or password';
        }
    })
    .catch(error => console.error('Error during login:', error));
}
