$(function () {
    if (typeof localStorage['chavsu_user'] == 'undefined') {
        alert("Please log in");
        window.location = 'login.php';
    }
 
    $('.sidebar-item').unbind('click').click(function () {
        let conv_id = $(this).data('conv_id')
        get_conversation(conv_id);
    });


    const get_conversation = function (conv_id) {
        alert(conv_id)
    }


    $('#logout').unbind('click').click(function () {
        let c = confirm("Are you sure you want to log out?")
        if (c) {
            localStorage.removeItem('chavsu_user')
            window.location = 'login.php';
        }
    });

    $('#send-button').unbind('click').click(function () {
        let q = $('#message-input').val();
        displayMessage("You", q, true);

        // Display typing indicator
        toggleTypingIndicator(true);

        $.get('http://localhost:8000/chat/', { q: q }, function (r) {
            let botProfilePicture = "images/robot.png";
            displayMessage("ChavSU", r, false, botProfilePicture);

            // Hide typing indicator after receiving the response
            toggleTypingIndicator(false);
        });
    });
});

function toggleTypingIndicator(show) {
    var typingIndicator = document.querySelector('.typing-indicator');
    if (show) {
        typingIndicator.classList.remove('hide');
    } else {
        typingIndicator.classList.add('hide');
    }
}

toggleTypingIndicator(true);
toggleTypingIndicator(false);

function displayMessage(sender, message, isUser, profilePicture = null) {
    var chatMessages = document.getElementById("chat-messages");

    // Create a new message element
    var messageElement = document.createElement("div");
    messageElement.className = isUser ? "message-container user-message" : "message-container bot-message";


    if (profilePicture) {
        // If a profile picture is provided, create an image element for the profile picture
        var profilePictureElement = document.createElement("img");
        profilePictureElement.src = profilePicture;
        profilePictureElement.alt = "ChavSU Profile";
        profilePictureElement.className = "message-image";
        messageElement.appendChild(profilePictureElement);
    }

    // Create a message bubble
    var messageBubble = document.createElement("div");
    messageBubble.className = "message-bubble";
    messageBubble.innerHTML = message;

    // Append the message bubble to the message container
    messageElement.appendChild(messageBubble);

    // Append the message to the chat container
    chatMessages.appendChild(messageElement);

    // Scroll to the bottom of the chat container
    chatMessages.scrollTop = chatMessages.scrollHeight;
}
