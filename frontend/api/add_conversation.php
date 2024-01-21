<?php
$host = 'localhost';
$database = 'chavsu_db';
$user = 'root';
$password = '';
$db = new mysqli($host, $user, $password, $database);


$userID = $_POST['userID'];

$query = "INSERT INTO conversation (userID) VALUES ($userID)";

if ($db->query($query)) {
    $last_id = $db->insert_id;
    echo json_encode(['success' => true, 'conv_id' => $last_id]);
} else {
    echo json_encode(['success' => false, 'error' => 'Creating the conversation failed.']);
}
