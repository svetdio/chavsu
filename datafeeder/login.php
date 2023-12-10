<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login | CHAVSU Data Feeder</title>
    <link rel="stylesheet" type="text/css" href="css/fontawesome.min.css">
    <link rel="stylesheet" href="css/styles1.css">
</head>
<body>
    <div class="login-container">
        <h2>CHAVSU - ADMIN</h2>
        <form id="loginForm">
            <label for="username">Username:</label>
            <input type="text" id="username" name="username" required>

            <label for="password">Password:</label>
            <input type="password" id="password" name="password" required>

            <button type="button" onclick="login()">Login</button>
        </form>
        <p id="errorMessage"></p>
    </div>

    <script src="js/script1.js"></script>
</body>
</html>
