<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Reset Password | ChavSU</title>
  <!-- Link to external CSS file -->
  <link href="css/fontawesome.min.css" rel="stylesheet">
  <link rel="stylesheet" type="text/css" href="css/password.css">

  <!-- Link to external JavaScript file -->

  <link rel="icon" type="image/x-icon" href="favicon.ico">
</head>

<body>

<div id="header">
  <img src="images/chavsu-head.png" alt="Logo">
</div>

    <!-- log in form -->
    <div class="login-container">
      <h2> <img class="log" src="images/lock.png" /> Reset your password</h2>
      <form id="loginForm">
        <label for="email" class="cvsu-email">CvSU Email</label>
        <input type="email" id="email" class="email" placeholder="Enter your email">

        <label for="email" class="cvsu-email">Create your new password</label>
        <input type="email" id="email" class="email" placeholder="Enter your new password">

        <label for="pass" class="password">Confirm your password</label>
        <input type="password" id="pass" class="pass" placeholder="Confirm your password">


        <div class="button-container">
            <button id="signin" type="button"><strong>SAVE</strong></button>
            <button id="back" type="button"><strong>BACK</strong></button>
        </div>

      </form>
      <p id="errorMessage"></p>
    </div>
  </div>

    <script>
        document.getElementById("back").addEventListener("click", function () {
            window.location.href = "login.php";
        });
    </script>
</body>
</html>
