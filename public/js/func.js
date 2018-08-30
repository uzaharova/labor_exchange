$(document).ready(function() {
    if (document.getElementById('url_home')) {
        setTimeout(function () {
            window.location.href = $('#url_home').val()
        }, 5000);
    }
});