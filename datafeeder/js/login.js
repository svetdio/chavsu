$(function () {
    if (typeof localStorage['chavsu_admin'] !== 'undefined') {
        alert("You are already logged-in");
        window.location = 'chavsu.php';
    }

    $('#login').on("click", function (e) {
        e.preventDefault();
        let username = $('#username').val();
        let password = $('#password').val();

        if (username == "" || password == "") {
            alert("Please input username or password!");
        } else {
            $.post('api/login.php', { username, password }, function (res) {
                let data = JSON.parse(res)
                if (typeof data.error === "undefined") {
                    localStorage['chavsu_admin'] = res;
                    alert("Log in Successful!");
                        window.location = 'chavsu.php';
                } else {
                    alert(data.error);
                }
            });
        }
    })
});