$(function () {
    // script.js
    document.getElementById('saveButton').addEventListener('click', function () {
        // Replace this with your save functionality
        let k = $('#keywords').val();

        $.post('api/save_keyword.php', { k }, function (d) {
            console.log(d)
        })
    });

    // You should perform proper validation before sending data to the serve
    $.get('api/view_keyword.php', function (d) {
        console.log(d)
    })
    // fetch('api/view_keyword.php', {
    //     method: 'POST',
    //     headers: {
    //         'Content-Type': 'application/x-www-form-urlencoded',
    //     },
    //     // body: username=${encodeURIComponent(username)}&password=${encodeURIComponent(password)},
    // })
    //     .then(response => response.json())
    //     .then(data => {
    //             if (data.success) {
    //                 console.log(data.keywords);
    //                 data.keywords.forEach(keywords => {
    //                     console.log(keywords); // Log each keyword to the console
    //                 }); 
    //             } else {
    //                 errorMessage.textContent = 'Invalid username or password';
    //             }
    //     })

    //     .catch(error => console.error('Error during login:', error));
})