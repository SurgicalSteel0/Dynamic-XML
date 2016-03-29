$(document).ready(function () {

    $.backstretch("images/background.jpg");

    $(document.body).on("backstretch.show", function () {
        $(document.body).css({opacity: 1});
    });

    $('a.fade-page-out').click(function () {
        $(document.body).css({opacity: 0});
    });

});