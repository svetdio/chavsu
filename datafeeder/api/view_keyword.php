<?php
$host = 'localhost';
$database = 'chavsu_db';
$user = 'root';
$password = '';

$conn = new mysqli($host, $user, $password, $database);

if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

// $keywords = $_POST['keywords'];

// You should perform proper validation and sanitization here before inserting into the database

// For simplicity, let's assume all keywords have the same category
$category = 'Default Category';

// Retrieve the updated list of keywords and send it back to the client
$updatedKeywords = array();

$selectQuery = "SELECT * FROM Keywords";
$selectResult = $conn->query($selectQuery);

while ($row = $selectResult->fetch_assoc()) {
    $updatedKeywords[] = $row;
}

echo json_encode(['success' => true, 'keywords' => $updatedKeywords]);

$conn->close();
?>
