<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Chat | ChavSU</title>
    <link href="css/fontawesome.min.css" rel="stylesheet">
    <link href="css/chatai.css" rel="stylesheet">
    <link rel="icon" type="image/x-icon" href="favicon.ico">

    <!-- Link to external JavaScript file -->
    <script src="js/jquery-3.7.1.min.js"></script>
    <script src="js/chatai.js"></script>
</head>

<body>
    <div id="sidebar">
        <!-- <button id="toggle-sidebar-button" onclick="toggleSidebar()">Toggle Sidebar</button> -->
        <div id="logo-container">
            <button id="new_chat" title="New Chat" aria-label="New Chat">
                <i class="fa fa-envelope-o"></i>
                New Chat
            </button>
        </div>
        <!-- Add sidebar content here -->
    </div>

    <div id="chat-container">
      <div id="header">
        <img src="images/chavsu-head.png" alt="Logo">
          <a href="#" id="logout" title="Log out" aria-hidden="true" >
              <i class="fa fa-sign-out" style="font-size: 18px;"></i>
          </a>
          <!-- <button id="logout-button" aria-label="Log out" onclick="logout()"></button> -->
      </div>
        <div id="chat-messages"></div>
        <div id="user-input">
            <input type="text" id="message-input" placeholder="Type your message...">
            <button id="send-button" title="Send your message" aria-hidden="true" onclick="sendMessage()">
            <i class="fa fa-paper-plane" aria-hidden="true" style="font-size: 18px;"></i>
            </button>
        </div>
    </div>

    <script>
        function sendMessage() {
            var userInput = document.getElementById("message-input").value;

            // Display user message
            displayMessage("You", userInput, true);

            // Simulate bot response (you would replace this with actual API calls or backend logic)
            var botResponse = "Thank you for your message! This is just a sample response.";
            var botProfilePicture = "images/robot.png";
            displayMessage("ChavSU", botResponse, false, false, botProfilePicture);

            // Clear the input field
            document.getElementById("message-input").value = "";
        }

        function displayMessage(sender, message, isUser, isImage = false, profilePicture = null) {
            var chatMessages = document.getElementById("chat-messages");

            // Create a new message element
            var messageElement = document.createElement("div");
            messageElement.className = isUser ? "user-message" : "bot-message";

            if (profilePicture) {
                // If a profile picture is provided, create an image element for the profile picture
                var profilePictureElement = document.createElement("img");
                profilePictureElement.src = profilePicture;
                profilePictureElement.alt = "ChavSU Profile";
                profilePictureElement.className = "profile-picture";
                messageElement.appendChild(profilePictureElement);
            }


            // Create a paragraph element for the message
            var textElement = document.createElement("p");
            textElement.innerHTML = "<strong>" + sender + ":</strong> " + message;
            messageElement.appendChild(textElement);

            // Append the message to the chat container
            chatMessages.appendChild(messageElement);

            // Scroll to the bottom of the chat container
            chatMessages.scrollTop = chatMessages.scrollHeight;
        }

        function toggleSidebar() {
            var sidebar = document.getElementById("sidebar");
            sidebar.style.width = sidebar.style.width === "0px" ? "200px" : "0px";
        }

        function logout() {
            // Add your logout logic here
            alert("Logout button clicked!");
        }
    </script>

</body>

</html>