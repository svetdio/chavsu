<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Chat | ChavSU</title>
  <!-- Link to external CSS file -->
  <link rel="stylesheet" type="text/css" href="css/chatai.css">

  <!-- Link to external JavaScript file -->
  <script src="js/jquery-3.7.1.min.js"></script>
  <script src="js/chatai.js"></script>

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

  <!-- chat form -->
  <div class="tab"></div>

  <!-- nav for new conversation -->
  <button id="new-chat-btn">
    <img class="msg" src="images/msg.png" />
    New Chat
  </button>

  <textarea class="textarea" placeholder="Enter your message..."></textarea>
  <button class="send-btn">
  <svg xmlns="http://www.w3.org/2000/svg" width="20" height="20" viewBox="0 0 16 16">
    <path d="M15.964.686a.5.5 0 0 0-.65-.65L.767 5.855H.766l-.452.18a.5.5 0 0 0-.082.887l.41.26.001.002 4.995 3.178 3.178 4.995.002.002.26.41a.5.5 0 0 0 .886-.083zm-1.833 1.89L6.637 10.07l-.215-.338a.5.5 0 0 0-.154-.154l-.338-.215 7.494-7.494 1.178-.471z"/>
  </svg>
  </button>

  <!-- TODO: temporary nav for logout -->
  <a id="logout" href="#" title="Log out" aria-label="Log out">
    <svg xmlns="http://www.w3.org/2000/svg" fill="white" class="logout" viewBox="0 0 16 16">
      <path fill-rule="evenodd" d="M6 12.5a.5.5 0 0 0 .5.5h8a.5.5 0 0 0 .5-.5v-9a.5.5 0 0 0-.5-.5h-8a.5.5 0 0 0-.5.5v2a.5.5 0 0 1-1 0v-2A1.5 1.5 0 0 1 6.5 2h8A1.5 1.5 0 0 1 16 3.5v9a1.5 1.5 0 0 1-1.5 1.5h-8A1.5 1.5 0 0 1 5 12.5v-2a.5.5 0 0 1 1 0z"/>
      <path fill-rule="evenodd" d="M.146 8.354a.5.5 0 0 1 0-.708l3-3a.5.5 0 1 1 .708.708L1.707 7.5H10.5a.5.5 0 0 1 0 1H1.707l2.147 2.146a.5.5 0 0 1-.708.708z"/>
    </svg>
  </a>

</body>
</html>
