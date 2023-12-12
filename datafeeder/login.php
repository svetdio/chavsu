<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Main Panel | CHAVSU Data Feeder</title>
  <!-- Link to external CSS file -->
  <link rel="stylesheet" type="text/css" href="css/fontawesome.min.css">
  <link rel="stylesheet" type="text/css" href="css/datatables.css">
  <link rel="stylesheet" type="text/css" href="css/login.css">

  <!-- Link to external JavaScript file -->
  <script src="js/jquery-3.7.1.min.js"></script>
  <script src="js/datatables.js"></script>
  <script src="js/login.js"></script>

  <link rel="icon" type="image/x-icon" href="favicon.ico">
</head>

<body>
    <div class="login-container">
        <h2>CHAVSU - ADMIN</h2>
        <form id="loginForm">
            <label for="username">Username:</label>
            <input type="text" id="username" name="username" required>

            <label for="password">Password:</label>
            <input type="password" id="password" name="password" required>

            <button id="login" type="button">LOGIN</button>
        </form>
        <p id="errorMessage"></p>
    </div>
</body>
</html>
