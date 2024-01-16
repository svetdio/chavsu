<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Log in | ChavSU</title>
  <!-- Link to external CSS file -->
  <link rel="stylesheet" type="text/css" href="css/login.css">

  <!-- Link to external JavaScript file -->
  <script src="js/jquery-3.7.1.min.js"></script>
  <script src="js/login.js"></script>

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
  
  <!-- header -->
  <div id="header">
    <img src="images/chavsu-head.png" alt="Logo">
    <a href="help.php" title="Help" aria-label="Help">
      <svg xmlns="http://www.w3.org/2000/svg" fill="white" class="help" viewBox="0 0 16 16">
        <path d="M16 8A8 8 0 1 1 0 8a8 8 0 0 1 16 0M5.496 6.033h.825c.138 0 .248-.113.266-.25.09-.656.54-1.134 1.342-1.134.686 0 1.314.343 1.314 1.168 0 .635-.374.927-.965 1.371-.673.489-1.206 1.06-1.168 1.987l.003.217a.25.25 0 0 0 .25.246h.811a.25.25 0 0 0 .25-.25v-.105c0-.718.273-.927 1.01-1.486.609-.463 1.244-.977 1.244-2.056 0-1.511-1.276-2.241-2.673-2.241-1.267 0-2.655.59-2.75 2.286a.237.237 0 0 0 .241.247m2.325 6.443c.61 0 1.029-.394 1.029-.927 0-.552-.42-.94-1.029-.94-.584 0-1.009.388-1.009.94 0 .533.425.927 1.01.927z"/>
      </svg>
    </a>
  </div>
  
  <!-- log in form -->
  <div class="login-container">
    <h2> <img class="log" src="images/log.png" /> Log-in with your CvSU account</h2>
    <form id="loginForm">
      <label for="email" class="cvsu-email">CvSU Email</label>
      <input type="email" id="email" class="email" placeholder="Enter your email">

      <label for="pass" class="password">Password</label>
      <input type="password" id="pass" class="pass" placeholder="Enter your password">
      
      <div class="forgot-pass"><a href="reset-pass.php" style="color: black;">Forgot password?</a></div>
      
      <!-- TODO: temporary -->
      <button id="login" type="button"><strong>LOG IN</strong></button>
    </form>
    
    <p id="errorMessage"></p>
    
    <div class="register">Don’t have an account? <strong><a href="register.php" style="color: black;">Register here</a></strong></div>
  </div>

</body>
</html>
