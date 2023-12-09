<?php
$host = 'localhost';
$database = 'chavsu_db';
$user = 'root';
$password = '';

$conn = new mysqli($host, $user, $password, $database);

$kid = $_POST['id'];

$del_query = "DELETE FROM keywords WHERE keyword_id = $kid";

if (!$conn->query($del_query)) {
    echo json_encode(['error' => 'Error deleting keywords']);
} else {
    echo json_encode(['status' => 'Keyword is Successfully Removed']);
}