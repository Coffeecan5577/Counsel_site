// Code to scroll to specific sections of the page:
$('#service_tab').click(function()
{
    $('html, body').animate({
        scrollTop: ($('#service_link').offset().top)
    },500);
});
