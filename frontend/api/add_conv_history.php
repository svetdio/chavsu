<?php
$host = 'localhost';
$database = 'chavsu_db';
$user = 'root';
$password = '';
$db = new mysqli($host, $user, $password, $database);


$conv_id = $_POST['conv_id'];
$isUser = $_POST['isUser'] == 'true' ? 1 : 0;
$msg = addslashes($_POST['message']);

$query = "INSERT INTO conversation_history (conv_id, sender, `message`) VALUES ($conv_id, $isUser, '$msg')";

if ($db->query($query)) {
    $last_id = $db->insert_id;
    echo json_encode(['success' => true, 'conv_id' => $last_id]);
} else {
    echo json_encode(['success' => false, 'error' => 'Creating the conversation history failed.']);
}