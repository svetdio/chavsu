<?php
$host = 'localhost';
$database = 'chavsu_db';
$user = 'root';
$password = '';

$conn = new mysqli($host, $user, $password, $database);

$keywords = $_POST['k'];
$keywords = explode(',', $keywords);

$ins_query = "INSERT INTO keywords (keywords)
        VALUES
        ";

$keywords_vals = implode("'), ('", $keywords);

$ins_query .= "('$keywords_vals')";

if (!$conn->query($ins_query)) {
    echo json_encode(['error' => 'Error inserting keywords']);
} else {
    echo json_encode(['status' => 'Keywords Saved']);
}
