$(function () {
    if (typeof localStorage['chavsu_user'] == 'undefined') {
        alert("Please log in");
        window.location = 'login.php';
    }

    $('#logout').unbind('click').click(function () {
        let c = confirm("Are you sure do you want to log out?")
        if (c) {
            localStorage.removeItem('chavsu_user')
            window.location = 'login.php';
        }
    });

    // var botResponse = "Thank you for your message! This is just a sample response.";
    // var botProfilePicture = "images/robot.png";
    // displayMessage("ChavSU", botResponse, false, false, botProfilePicture);

    $('#send-button').unbind('click').click(function () {
        let q = $('#message-input').val();
        displayMessage("You", q, true);
        $('#message-input').val('')
        
        // var botResponse = "Thank you for your message! This is just a sample response.";
        // var botProfilePicture = "images/robot.png";
        // displayMessage("ChavSU", botResponse, false, botProfilePicture);

        $.get('http://localhost:8000/chat/', { q: q }, function (r) {
            let botProfilePicture = "images/robot.png";
            displayMessage("ChavSU", r, false, botProfilePicture);
        });
    })
})

// function sendMessage() {
//     var userInput = document.getElementById("message-input").value;

//     // Display user message
//     displayMessage("You", userInput, true);

//     // Simulate bot response (you would replace this with actual API calls or backend logic)
//     var botResponse = "Thank you for your message! This is just a sample response.";
//     var botProfilePicture = "images/robot.png";
//     displayMessage("ChavSU", botResponse, false, false, botProfilePicture);

//     // Clear the input field
//     document.getElementById("message-input").value = "";
// }

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

    // Create a paragraph element for the message
    // var textElement = document.createElement("p");
    // textElement.innerHTML = "<strong>" + sender + ":</strong> " + message;
    // messageElement.appendChild(textElement);

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
    alert("Logout button clicked!");
}