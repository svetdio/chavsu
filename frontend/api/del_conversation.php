<?php
$host = 'localhost';
$database = 'chavsu_db';
$user = 'root';
$password = '';
$db = new mysqli($host, $user, $password, $database);


$conv_id = $_POST['conv_id'];

$query = "DELETE FROM conversation WHERE conv_id = '$conv_id'";

if ($db->query($query)) {
    $query2 = "DELETE FROM conversation_history WHERE conv_id = '$conv_id'";
    if ($db->query($query2)) {
        echo json_encode(['success' => true, 'message' => "Conversation successfully deleted"]);
    } else {
        echo json_encode(['success' => false, 'error' => 'Failed to delete conversation.']);
    }
} else {
    echo json_encode(['success' => false, 'error' => 'Failed to delete conversation.']);
}
