// login function

function loginattempt() {
    // setting up components
    $('#loading').toggleClass('d-block');
    $('#password').removeClass('is-invalid');
    $('#username').removeClass('is-invalid');
    $('#invalid-username').html('');
    $('#invalid-password').html('');
    // sending data to validate
    $.ajax({
        url: 'action.php?auth=login',
        type: 'post',
        data: $('#login-form').serialize(),
        success: function(response) {
            if (response == 'invalid_username') {
                $('#loading').toggleClass('d-block');
                $('#username').addClass('is-invalid');
                $('#invalid-username').html('invalid username');
            }
            if (response == 'empty_username') {
                $('#loading').toggleClass('d-block');
                $('#username').addClass('is-invalid');
                $('#invalid-username').html('required');
            }
            if (response == 'invalid_password') {
                $('#loading').toggleClass('d-block');
                $('#password').addClass('is-invalid');
                $('#invalid-password').html('invalid password');
            }
            if (response == 'empty_password') {
                $('#loading').toggleClass('d-block');
                $('#password').addClass('is-invalid');
                $('#invalid-password').html('required');
            }
            if (response == 'success') {
                window.location.href = "http://localhost/ajaxfunction";
            }
        }
    });
}

// register function

function register() {
    // setting up components
    $('#loading').toggleClass('d-block');
    $('#password').removeClass('is-invalid');
    $('#username').removeClass('is-invalid');
    $('#email').removeClass('is-invalid');
    $('#confirm-password').removeClass('is-invalid');
    $('#invalid-username').html('');
    $('#invalid-email').html('');
    $('#invalid-password').html('');
    $('#invalid-confirm-password').html('');
    // sending data ajax
    $.ajax({
        url: 'action.php?auth=register',
        type: 'post',
        data: $('#register-form').serialize(),
        success: function(response) {
            if (response == 'invalid_username') {
                $('#loading').toggleClass('d-block');
                $('#username').addClass('is-invalid');
                $('#invalid-username').html('Username Not Available');
            }
            if (response == 'empty_username') {
                $('#loading').toggleClass('d-block');
                $('#username').addClass('is-invalid');
                $('#invalid-username').html('Required');
            }
            if (response == 'invalid_email') {
                $('#loading').toggleClass('d-block');
                $('#email').addClass('is-invalid');
                $('#invalid-email').html('Email already in use');
            }
            if (response == 'empty_email') {
                $('#loading').toggleClass('d-block');
                $('#email').addClass('is-invalid');
                $('#invalid-email').html('Required');
            }
            if (response == 'invalid_password') {
                $('#loading').toggleClass('d-block');
                $('#confirm-password').addClass('is-invalid');
                $('#invalid-confirm-password').html('Password Not Match');
            }
            if (response == 'empty_confirm_password') {
                $('#loading').toggleClass('d-block');
                $('#confirm-password').addClass('is-invalid');
                $('#invalid-confirm-password').html('Required');
            }
            if (response == 'empty_password') {
                $('#loading').toggleClass('d-block');
                $('#password').addClass('is-invalid');
                $('#invalid-password').html('Required');
            }
            if (response == 'success') {
                $('#loading').toggleClass('d-block');
                window.location.href = "http://localhost/ajaxfunction";
            }
            // alert(response);
        }
    });
}