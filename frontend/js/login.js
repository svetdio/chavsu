$(function () {
    if (typeof localStorage['chavsu_user'] !== 'undefined') {
        alert("You are already logged-in");
        window.location = 'chatai.php';
    }

    $('#login').on("click", function (e) {
        e.preventDefault();
        let username = $('#email').val();
        let password = $('#pass').val();

        if (username == "" || password == "") {
            alert("Please input username or password!");
        } else {
            $.post('api/login.php', { username, password }, function (res) {
                let data = JSON.parse(res)
                if (typeof data.error === "undefined") {
                    localStorage['chavsu_user'] = res;
                    alert("Log in Successful!");
                        window.location = 'chatai.php';
                } else {
                    alert(data.error);
                }
            });
        }
    })
});