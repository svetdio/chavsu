<?php
$host = 'localhost';
$database = 'chavsu_db';
$user = 'root';
$password = '';

$db = new mysqli($host, $user, $password, $database);

$username = $_POST['username'];
$password = $_POST['password'];

$query = "
    SELECT 
        * 
    FROM admin 
    WHERE
    username = '$username'
    and
    isAdmin = 1
";

$stmt = $db->query($query);
$admin = $stmt->fetch_assoc(); // fetch data   

if (is_array($admin) && count($admin) > 0) {
    if ($admin['pass'] == $password) {
        $_SESSION['login_details'] = $admin;
        echo json_encode($admin);
    } else {
        echo json_encode(array('error' => "Incorrect Username or Password"));
    }
} else {
    echo json_encode(array('error' => "Username does not exist"));
}

// if ($username === $validUser['username'] && $password === $validUser['password']) {
//     // Successful login
//     echo json_encode(['success' => true]);
// } else {
//     // Invalid credentials
//     echo json_encode(['success' => false]);
// }
?>
