<?php
$host = 'localhost';
$database = 'chavsu_db';
$user = 'root';
$password = '';

$conn = new mysqli($host, $user, $password, $database);

if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

$updatedKeywords = array();

$selectQuery = "SELECT * FROM keywords_response";
$selectResult = $conn->query($selectQuery);

while ($row = $selectResult->fetch_assoc()) {
    $updatedKeywords[] = $row;
}

echo json_encode(['success' => true, 'keywords' => $updatedKeywords]);

$conn->close();
