<?php
$host = 'localhost';
$database = 'chavsu_db';
$user = 'root';
$password = '';

$conn = new mysqli($host, $user, $password, $database);

$kid = $_POST['id'];
$kword = $_POST['kword'];
$resp = $_POST['resp'];

$del_query = "UPDATE keywords_response SET
keywords = '$kword',
response = '$resp'
WHERE id = $kid";

if (!$conn->query($del_query)) {
    echo json_encode(['error' => 'Error updating keywords']);
} else {
    echo json_encode(['status' => 'Keyword is Successfully Updated']);
}
