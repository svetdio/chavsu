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
})