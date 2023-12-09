<?php
$host = 'localhost';
$database = 'chavsu_db';

$conn = new mysqli($host, /* No username */, /* No password */, $database);

if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

$keywords = $_POST['keywords'];

// You should perform proper validation and sanitization here before inserting into the database

// For simplicity, let's assume all keywords have the same category
$category = 'Default Category';

$sql = "INSERT INTO Keywords (keyword, category) VALUES ('$keywords', '$category')";
$result = $conn->query($sql);

if (!$result) {
    echo json_encode(['error' => 'Error inserting keywords']);
} else {
    // Retrieve the inserted data and send it back to the client
    $insertedData = ['keyword' => $keywords, 'category' => $category];
    echo json_encode($insertedData);
}

$conn->close();
?>
