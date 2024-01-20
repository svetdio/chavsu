<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Chatbot Example</title>
    <!-- Add the Font Awesome CDN link in the head section -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css">
    <style>
        body {
            font-family: Arial, sans-serif;
            margin: 0;
            padding: 0;
            background-color: #f4f4f4;
            display: flex;
            height: 100vh;
            overflow: hidden;
        }

        #sidebar {
            width: 200px;
            background-color: #333;
            color: #fff;
            padding: 20px;
            box-sizing: border-box;
            overflow-y: auto;
            transition: width 0.3s;
        }

        #logo-container {
            text-align: center;
            margin-bottom: 20px;
            padding: 10px;
            background-color: #444;
        }

        #logo-container img {
            width: 80%;
            height: auto;
        }

        #chat-container {
            flex-grow: 1;
            background-color: #fff;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
            border-radius: 8px;
            overflow: hidden;
            display: flex;
            flex-direction: column;
            height: 100%;
        }

        #header {
            background-color: #444;
            color: #fff;
            padding: 10px;
            text-align: center;
            position: sticky;
            top: 0;
            z-index: 1000;
            display: flex;
            justify-content: space-between;
            align-items: center;
        }

        #logout-button {
            background-color: #c0392b;
            color: #fff;
            border: none;
            padding: 8px 16px;
            border-radius: 4px;
            cursor: pointer;
        }

        #logout-button i {
            margin-right: 5px;
        }

        #chat-messages {
            flex-grow: 1;
            padding: 20px;
            overflow-y: auto;
        }

        .message-container {
            display: flex;
            margin-bottom: 10px;
        }

        .user-message {
            justify-content: flex-end;
        }

        .bot-message {
            justify-content: flex-start;
        }

        .message-bubble {
            max-width: 70%;
            padding: 10px;
            border-radius: 8px;
            margin: 0 10px;
            word-wrap: break-word;
        }

        .user-message .message-bubble {
            background-color: #4caf50;
            color: #fff;
        }

        .bot-message .message-bubble {
            background-color: #eee;
            color: #333;
        }

        .message-image {
            max-width: 100%;
            border-radius: 8px;
            margin-top: 10px;
        }

        #user-input {
            padding: 10px;
            background-color: #eee;
            display: flex;
        }

        #message-input {
            flex-grow: 1;
            padding: 8px;
            border: 1px solid #ccc;
            border-radius: 4px;
            margin-right: 10px;
        }

        #send-button {
            background-color: #4caf50;
            color: #fff;
            border: none;
            padding: 8px 16px;
            border-radius: 4px;
            cursor: pointer;
        }

        #toggle-sidebar-button {
            background-color: #444;
            color: #fff;
            border: none;
            padding: 8px;
            border-radius: 4px;
            cursor: pointer;
            position: absolute;
            left: 20px;
            top: 10px;
            z-index: 2000;
        }

        /* Responsive styles */
        @media only screen and (max-width: 768px) {
            #sidebar {
                width: 0;
            }

            #chat-container {
                border-radius: 0;
            }
        }
    </style>
</head>
<body>

<div id="sidebar">
    <button id="toggle-sidebar-button" onclick="toggleSidebar()">Toggle Sidebar</button>
    <!-- Add sidebar content here -->
</div>

<div id="chat-container">
    <div id="logo-container">
        <img src="images/chavsu-head.png" alt="Logo">
    </div>
    <div id="header">
        Chatbot Header
        <button id="logout-button" onclick="logout()"><i class="fas fa-sign-out-alt"></i> Logout</button>
    </div>
    <div id="chat-messages">
        <!-- Example messages with images -->
        <div class="message-container user-message">
            <div class="message-bubble">
                Hello! How can I help you today?
            </div>
            <img src="images/robot.png" alt="User Image" class="message-image">
        </div>

        <div class="message-container bot-message">
            <img src="images/robot.png" alt="Bot Image" class="message-image">
            <div class="message-bubble">
                Hi there! I'm a friendly bot.
            </div>
        </div>

        <div class="message-container user-message">
            <div class="message-bubble">
                I have a question about your services.
            </div>
            <img src="images/robot.png" alt="User Image" class="message-image">
        </div>

        <!-- Add more messages as needed -->
    </div>
    <div id="user-input">
        <input type="text" id="message-input" placeholder="Type your message...">
        <button id="send-button" onclick="sendMessage()">Send</button>
    </div>
</div>

<!-- Add the Font Awesome script at the end of the body section -->
<script src="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/js/all.min.js"></script>

<script>
    function sendMessage() {
        var userInput = document.getElementById("message-input").value;

        // Display user message
        displayMessage("User", userInput, true, "user-image.jpg");

        // Simulate bot response (you would replace this with actual API calls or backend logic)
        var botResponse = "Thank you for your message! This is just a sample response.";
        displayMessage("Bot", botResponse, false, "bot-image.jpg");

        // Clear the input field
        document.getElementById("message-input").value = "";
    }

    function displayMessage(sender, message, isUser, imageUrl) {
        var chatMessages = document.getElementById("chat-messages");

        // Create a new message container
        var messageContainer = document.createElement("div");
        messageContainer.className = "message-container " + (isUser ? "user-message" : "bot-message");

        // Create a message bubble
        var messageBubble = document.createElement("div");
        messageBubble.className = "message-bubble";
        messageBubble.innerHTML = message;

        // Append the message bubble to the message container
        messageContainer.appendChild(messageBubble);

        // Create an image element
        var messageImage = document.createElement("img");
        messageImage.className = "message-image";
        messageImage.src = imageUrl;
        messageImage.alt = sender + " Image";

        // Append the image to the message container
        messageContainer.appendChild(messageImage);

        // Append the message container to the chat container
        chatMessages.appendChild(messageContainer);

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
