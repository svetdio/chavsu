$(function () {
    const validatePasswords = function (pass1) {
        var minNumberofChars = 8;
        var regularExpression = /^(?=.*\d)(?=.*[!@#$%^&*])(?=.*[a-z])(?=.*[A-Z]).{8,}$/;

        // If less than 8 characters
        if (pass1.length < minNumberofChars) {
            return { "success": false, "errorMsg": "Password should be 8 characters or longer" };
        }

        // if has atleast 1 number and special character
        if (!regularExpression.test(pass1)) {
            return { "success": false, "errorMsg": "Password should contain at least 1 special character, 1 uppercase letter, and 1 number" };
        }

        return { "success": true };
    }

    if (typeof localStorage['chavsu_user'] !== 'undefined') {
        alert("You are already logged-in");
        window.location = 'chatai.php';

    } else {
        $(".cb").on('click', function () {
            var x = $('input#pass');
            var y = $('input#confirm-pass');
            if (x.attr('type') == "password") {
                x.attr('type', 'text');
            } else {
                x.attr('type', 'password');
            }
            if (y.attr('type') == "password") {
                y.attr('type', 'text');
            } else {
                y.attr('type', 'password');
            }
        });

        $('#signin').on("click", function (e) {
            e.preventDefault();
            let email = $('input#email').val();
            let pass = $('input#pass').val();
            let pass2 = $('input#confirm-pass').val();
            let hasError = false;

            if (email == "") {
                $('span#email').html('Username is required.');
            } else {
                $('span#email').html("");
            }
            let password_validation = validatePasswords(pass)

            if (!password_validation.success) {
                $('span#pass').html(password_validation.errorMsg);
            } else {
                $('span#pass').html("");
            }

            if (pass2 !== pass || !password_validation.success) {
                $('span#confirm-pass').html("Passwords did not match");
            } else {
                $('span#confirm-pass').html("");
            }

            $.each($('span.errormsg'), function (i, d) {
                if ($(d).html() !== "") {
                    hasError = true;
                    return false;
                }
            });

            if (!hasError) {
                $.post('api/register.php', { email, pass }, function (res) {
                    let data = JSON.parse(res)
                    if (typeof data.error === "undefined") {
                        alert('Accounted created successfully! You may now log-in.');
                        window.location = 'login.php';
                    } else {
                        alert(data.error);
                    }
                });
            }
        });
    }
});