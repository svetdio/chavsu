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

        <div id="sidebar-content">
            <div class="sidebar-item" data-conv_id='2'>
                <a href="#">Chat # 1</a>
                <button class="del-button" data-conv_id='2'>Delete</button>
            </div>
            <!-- Add more sidebar items as needed -->
        </div>
    </div>

    <div id="chat-container">
        <div id="header">
            <img src="images/chavsu-head.png" alt="Logo">
            <a href="#" id="logout" title="Log out" aria-hidden="true">
                <i class="fa fa-sign-out" style="font-size: 18px;"></i>
            </a>
            <!-- <button id="logout-button" aria-label="Log out" onclick="logout()"></button> -->
        </div>
        <div id="chat-messages">
            <div class="message-container bot-message">
                <img src="images/robot.png" alt="Bot Image" class="message-image">
                <div class="message-bubble">
                    Hi there! I'm a friendly bot.
                </div>
            </div>
            <div class="message-container bot-message">
                <img src="images/robot.png" alt="Bot Image" class="message-image">
                <div class="message-bubble">
                    Hi there! I'm a friendly bot. Lorem ipsum dolor sit amet consectetur adipisicing elit. Itaque harum, excepturi impedit omnis temporibus perferendis rerum repudiandae. Voluptatibus id, blanditiis soluta molestias nulla, animi maiores eius debitis atque, accusamus laborum.
                </div>
            </div>
            <div class="message-container bot-message">
                <img src="images/robot.png" alt="Bot Image" class="message-image">
                <div class="message-bubble">
                    Hi there! I'm a friendly bot. Lorem ipsum dolor sit amet consectetur adipisicing elit. Itaque harum, excepturi impedit omnis temporibus perferendis rerum repudiandae. Voluptatibus id, blanditiis soluta molestias nulla, animi maiores eius debitis atque, accusamus laborum.
                    Hi there! I'm a friendly bot. Lorem ipsum dolor sit amet consectetur adipisicing elit. Itaque harum, excepturi impedit omnis temporibus perferendis rerum repudiandae. Voluptatibus id, blanditiis soluta molestias nulla, animi maiores eius debitis atque, accusamus laborum.
                </div>
            </div>
            <div class="message-container bot-message">
                <img src="images/robot.png" alt="Bot Image" class="message-image">
                <div class="message-bubble">
                    Hi there! I'm a friendly bot. Lorem ipsum dolor sit amet consectetur adipisicing elit. Itaque harum, excepturi impedit omnis temporibus perferendis rerum repudiandae. Voluptatibus id, blanditiis soluta molestias nulla, animi maiores eius debitis atque, accusamus laborum.
                    Hi there! I'm a friendly bot. Lorem ipsum dolor sit amet consectetur adipisicing elit. Itaque harum, excepturi impedit omnis temporibus perferendis rerum repudiandae. Voluptatibus id, blanditiis soluta molestias nulla, animi maiores eius debitis atque, accusamus laborum.
                    Hi there! I'm a friendly bot. Lorem ipsum dolor sit amet consectetur adipisicing elit. Itaque harum, excepturi impedit omnis temporibus perferendis rerum repudiandae. Voluptatibus id, blanditiis soluta molestias nulla, animi maiores eius debitis atque, accusamus laborum.
                    Hi there! I'm a friendly bot. Lorem ipsum dolor sit amet consectetur adipisicing elit. Itaque harum, excepturi impedit omnis temporibus perferendis rerum repudiandae. Voluptatibus id, blanditiis soluta molestias nulla, animi maiores eius debitis atque, accusamus laborum.
                </div>
            </div>
        </div>
        <div id="user-input">
            <input type="text" id="message-input" placeholder="Type your message...">
            <button id="send-button" title="Send your message" aria-hidden="true">
                <i class="fa fa-paper-plane" aria-hidden="true" style="font-size: 18px;"></i>
            </button>
        </div>
    </div>

    <script src="js/chatai.js"></script>

</body>

</html>