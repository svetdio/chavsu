<?php
$host = 'localhost';
$database = 'chavsu_db';
$user = 'root';
$password = '';
$db = new mysqli($host, $user, $password, $database);

$conv_id = $_GET['conv_id'];
$userID = $_GET['userID'];

$query = "SELECT 
        c.conv_id,
        IF(ch.sender = 0, 'bot', 'user') sender,
        ch.message
    FROM conversation c 
    LEFT JOIN conversation_history ch 
        ON c.conv_id = ch.conv_id 
    WHERE 
        c.userID = $userID
        AND c.conv_id = $conv_id
    ORDER BY ch.id ASC
    ";

$stmt = $db->query($query);

$conv = array();

while ($r = $stmt->fetch_assoc()) {
    if (!is_null($r['message'])) {
        $conv[] = $r;
    }
}

if (!empty($conv)) {
    echo json_encode(['success' => true, 'conversation' => $conv]);
} else {
    echo json_encode(['success' => false, 'error' => 'No conversation history']);
}
