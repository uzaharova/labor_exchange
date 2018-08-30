function onSubmit(token) {
    return validateForm();
}
function validateForm() {
    var reg = /^([A-Za-z0-9_\-\.])+\@([A-Za-z0-9_\-\.])+\.([A-Za-z]{2,4})$/;
    var email = $('#email').val();
    var form_error = false;

    if (!email) {
        $('#emailError').text('Email is required');
        form_error = true;
    }

    if(reg.test(email) == false) {
        $('#emailError').text('The email must be a valid email address.');
        form_error = true;
    } else {
        $('#emailError').text('');
    }

    if (!form_error) {
        return true;
    } else {
        return false;
    }
}