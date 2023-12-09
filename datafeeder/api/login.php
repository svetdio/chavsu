<?php
// Simulated user data (replace with your actual user data and database connection)
$validUser = ['username' => 'admin', 'password' => 'password'];

$username = $_POST['username'];
$password = $_POST['password'];

if ($username === $validUser['username'] && $password === $validUser['password']) {
    // Successful login
    echo json_encode(['success' => true]);
} else {
    // Invalid credentials
    echo json_encode(['success' => false]);
}
?>
