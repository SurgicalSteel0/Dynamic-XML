$(document).ready(function() {

    $.backstretch("images/background.jpg");

    $(document.body).on("backstretch.show", function() {
        $(document.body).css({opacity: 1});
    });

    $('a.fade-page-out').click(function() {
        $(document.body).css({opacity: 0});
    });

    /*
     |--------------------------------------------------------------------------
     | Loading Button Effect
     |--------------------------------------------------------------------------
     |
     | You may register any <button> or <a role="button"> here to provide a
     | loading effect to that element.
     |
     */
    registerLoadingButton($('#uploadZipBtn'), $('#uploadZipForm'));
    registerLoadingButton($('#processXMLFilesBtn'), $('#processXMLFilesForm'));

});

/**
 * Adds a loading effect to the given button.
 *
 * @param button
 * @param form
 */
function registerLoadingButton(button, form) {
    form.on('submit', function(e) {
        if (e.isDefaultPrevented()) {
            // handle the invalid form...
        } else {
            button.addClass('m-progress');
        }
    });
}