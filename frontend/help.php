<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Help | ChavSU</title>
  <!-- Link to external CSS file -->
  <link href="css/fontawesome.min.css" rel="stylesheet">
  <link rel="stylesheet" type="text/css" href="css/help.css">

  <link rel="icon" type="image/x-icon" href="favicon.ico">
</head>

<body>

<div id="header">
  <img src="images/chavsu-head.png" alt="Logo">
</div>

<img class="chavsu" src="images/chavsu.png" />


    <div id="guide">
      <img class="help-black" src="images/help-black.png" />
      <strong><i>Help</i></strong>
      <br/><br/>
      <strong>Who can use ChavSU?</strong><br /><br />
      <i>You also need a CvSU Email account that you manage on your own for which your admin enabled access to ChavSU. You can’t access ChavSU with a Personal Gmail Account or Google Account managed by Family Link or with a Google Workspace for Education account designated as under the age of 18.<br /><br /> Generative AI and all of its possibilities are exciting, but it’s still new. ChavSU is an experiment, and it will make mistakes. Even though it’s getting better every day, ChavSU can provide inaccurate information, or it can even make offensive statements.</i>
      <button id="back" type="button">BACK</button>
    </div>
    
    <script>
        document.getElementById("back").addEventListener("click", function () {
            window.location.href = "login.php";
        });
    </script>
</body>
</html>
