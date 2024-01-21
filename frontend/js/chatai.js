$(function () {
    if (typeof localStorage['chavsu_user'] == 'undefined') {
        alert("Please log in");
        window.location = 'login.php';
    }

    const userID = JSON.parse(localStorage['chavsu_user']).id

    $.get('api/get_conv_list.php', { userID }, function (r) {
        let d = JSON.parse(r);

        if (d.success) {
            d.list.forEach(function (v) {
                createConvList(v)
            })
        } else {
            createConvList()
        }
    })
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

    $('#send-button').prop('disabled', true);

    // Add an input event listener to check the input value
    $('#message-input').on('input', function () {
        // If the input value is empty, disable the send button; otherwise, enable it
        $('#send-button').prop('disabled', $(this).val().trim() === '');
    });

    $('#send-button').unbind('click').click(function () {
        let q = $('#message-input').val();
        displayMessage("You", q, true);

        $('#message-input').val('');
        // Show typing indicator
        showTypingIndicator();

        $.get('http://localhost:8000/chat/', { q: q }, function (r) {
            // Hide typing indicator when the response is received
            hideTypingIndicator();

            let botProfilePicture = "images/robot.png";
            displayMessage("ChavSU", r, false, botProfilePicture);

        });
    });
});

// Function to show typing indicator
function showTypingIndicator() {
    $('.typing-indicator').removeClass('hide');
}

// Function to hide typing indicator
function hideTypingIndicator() {
    $('.typing-indicator').addClass('hide');
}

function createConvList(conv = false) {
    var convList = document.getElementById("sidebar-content");
    var convElement = document.createElement("div");
    convElement.className = "sidebar-item";
    
    if(conv) {
        convElement.setAttribute("data-conv_id", conv.conv_id);
        
        var convName = document.createElement('a')
        convName.href = '#'
        convName.innerHTML = "Chat # " + conv.conv_id
        
        var conActions = document.createElement('button')
        conActions.className = "del-button";
        conActions.setAttribute("data-conv_id", conv.conv_id);
        conActions.innerHTML = "Delete"
        convElement.appendChild(convName);
        convElement.appendChild(conActions);
    } else {
        convElement.innerHTML = "Start your first conversation by clicking New Chat"
    }

    convList.appendChild(convElement);
}

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
