<?php
$host = 'localhost';
$database = 'chavsu_db';
$user = 'root';
$password = '';

$db = new mysqli($host, $user, $password, $database);

$username = $_POST['email'];
$password = $_POST['pass'];

$query = "
    SELECT 
        * 
    FROM users 
    WHERE
    username = '$email'
";

$stmt = $db->query($query);
$users = $stmt->fetch_assoc(); // fetch data   

if (is_array($users) && count($users) > 0) {
    echo json_encode(array('error' => "Username is already taken."));
} else {
    $query2 = "
    INSERT INTO
        users (username, pass)
    VALUES
        (?, ?);
    ";

    $stmt2 = $db->prepare($query2);

    $stmt2->bind_param("ssssi", $email , $pass);

    if ($stmt2->execute()) {
        echo json_encode(array("result" => "success"));
    } else {
        echo json_encode(array('error' => "Incorrect password or Employee is not yet registered"));
    }
}
