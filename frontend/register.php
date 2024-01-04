<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Register | CHAVSU</title>
  <!-- Link to external CSS file -->
  <link rel="stylesheet" type="text/css" href="css/register.css">

  <!-- Link to external JavaScript file -->

  <link rel="icon" type="image/x-icon" href="favicon.ico">
</head>

<body>
<style>
body  {
  background-image: url("images/background.png");
  background-position: center;
  background-repeat: no-repeat;
  background-size: cover;
  position: relative;
  max-width: 100%;
}
</style>    

    <img class="chavsu-head" src="images/chavsu-head.png" />
    <img class="help" src="images/help.png" />

    <!-- log in form -->
    <div class="login-container">
      <h2> <img class="log" src="images/reg.png" /> Create your account</h2>
      <form id="loginForm">
        <label for="email" class="cvsu-email">CvSU Email</label>
        <input type="email" id="email" class="email" placeholder="Enter your CvSU email">

        <label for="pass" class="password">Create your password</label>
        <input type="password" id="pass" class="pass" placeholder="Enter your password">

        <label for="pass" class="password">Confirm your password</label>
        <input type="password" id="pass" class="pass" placeholder="Enter your password">

        <button id="login" type="button"><strong>LOG IN</strong></button>
      </form>
      <p id="errorMessage"></p>

      <div class="register">Don’t have an account? <strong><a href="#" style="color: black;">Register here</a></strong></div>
    </div>
  </div>
</body>

</html>