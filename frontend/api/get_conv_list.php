<?php
$host = 'localhost';
$database = 'chavsu_db';
$user = 'root';
$password = '';
$db = new mysqli($host, $user, $password, $database);

$userID = $_GET['userID'];

$query = "SELECT 
       *
    FROM conversation c 
    WHERE 
        c.userID = $userID
    ORDER BY c.added_date
    ";

$stmt = $db->query($query);

$conv_list = array();

while ($r = $stmt->fetch_assoc()) {
    $conv_list[] = $r;
}

if (!empty($conv_list)) {
    echo json_encode(['success' => true, 'list' => $conv_list]);
} else {
    echo json_encode(['success' => false, 'error' => 'No conversation list']);
}