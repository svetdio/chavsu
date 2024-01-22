$(function () {
    if (typeof localStorage['chavsu_user'] == 'undefined') {
        alert("Please log in");
        window.location = 'login.php';
    }
    const userID = JSON.parse(localStorage['chavsu_user']).id

    const displayMessage = function (conv_id, message, isUser, saveConvo = true) {
        var chatMessages = document.getElementById("chat-messages");

        // Create a new message element
        var messageElement = document.createElement("div");
        messageElement.className = isUser ? "message-container user-message" : "message-container bot-message";

        if (!isUser) {
            // If a profile picture is provided, create an image element for the profile picture
            let botProfilePicture = "images/robot.png";
            var profilePictureElement = document.createElement("img");
            profilePictureElement.src = botProfilePicture;
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

        if (saveConvo) {
            $.post('api/add_conv_history.php', { conv_id, isUser, message }, function (s) {
                console.log('Message sent');
            });
        }
    }

    const createConvList = function (conv = false) {
        var convList = document.getElementById("sidebar-content");
        var convElement = document.createElement("div");
        convElement.className = "sidebar-item";

        if (conv) {
            convElement.setAttribute("data-conv_id", conv.conv_id);

            var convName = document.createElement('a')
            convName.href = '#'
            convName.innerHTML = "Chat # " + conv.conv_id
            convName.setAttribute("data-conv_id", conv.conv_id);

            var conActions = document.createElement('button')
            conActions.className = "del-button";
            conActions.setAttribute("data-conv_id", conv.conv_id);
            conActions.innerHTML = '<i class="fa fa-trash" aria-hidden="true"></i>'
            convElement.appendChild(convName);
            convElement.appendChild(conActions);
        } else {
            convElement.innerHTML = "Start your first conversation by clicking New Chat"
        }

        convList.appendChild(convElement);
    }

    // Function to show typing indicator
    const showTypingIndicator = function () {
        $('.typing-indicator').removeClass('hide');
    }

    // Function to hide typing indicator
    const hideTypingIndicator = function () {
        $('.typing-indicator').addClass('hide');
    }

    const getConversationList = function () {
        $('#sidebar-content').html('')

        $.get('api/get_conv_list.php', { userID }, function (r) {
            let d = JSON.parse(r);

            if (d.success) {
                d.list.forEach(function (v) {
                    createConvList(v)
                })
            } else {
                createConvList()
            }

            $('.sidebar-item a').unbind('click').click(function () {
                let conv_id = $(this).data('conv_id')
                get_conversation(conv_id);
            });

            $('.del-button').unbind('click').click(function () {
                let c = confirm("Are you sure you want to delete this conversation?")
                let conv_id = $(this).data('conv_id')
                if (c) {
                    $.post('api/del_conversation.php', { conv_id }, function (r) {
                        let d = JSON.parse(r);
                        if (d.success) {
                            alert(d.message)
                            getConversationList();
                            $('#chat-messages').html('');
                        } else {
                            alert(d.error)
                        }
                    });
                }

            });
        })
    }

    const createNewConvo = function () {
        $.post('api/add_conversation.php', { userID }, function (r) {
            let d = JSON.parse(r);

            if (d.success) {
                let conv_id = d.conv_id
                getConversationList();
                $('#chat-messages').html('');
                $('#send-button').attr('data-conv_id', conv_id);
                displayMessage(conv_id, "Hi there! I'm <strong>ChavSU.</strong> How can I assist you?", false);
            } else {
                alert(d.error);
            }
        });
    }

    const get_conversation = function (conv_id) {
        $('#chat-messages').html('');
        $('#send-button').attr('data-conv_id', conv_id);

        $.get('api/get_conv_hist.php', { conv_id, userID }, function (r) {
            let d = JSON.parse(r);

            if (d.success) {

                d.conversation.forEach(function (v) {
                    let msg = v.message
                    let sender = v.sender == 'bot' ? false : true;
                    displayMessage(conv_id, msg, sender, false);
                })

            } else {
                alert(d.error);
            }
        })
    }

    const predict = function (q) {
        $.get('http://localhost:8000/chat/', { q: q }, function (r) {
            // Hide typing indicator when the response is received
            hideTypingIndicator();

            displayMessage(conv_id, r, false);
        });
    }

    getConversationList();

    $('#new_chat').unbind('click').click(function () {
        createNewConvo();
    });

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
        let conv_id = $(this).data('conv_id')

        if (typeof conv_id !== 'undefined') {
            displayMessage(conv_id, q, true);

            $('#message-input').val('');
            // Show typing indicator
            $('#send-button').prop('disabled', $(this).val().trim() === '');
            showTypingIndicator();

            predict()
        } else {
            // $('#new_chat').trigger('click');
        }
    });
});