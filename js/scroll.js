// Code to scroll to specific sections of the page:
$('#Top_of_page').click(function()
{
    $('html, body').animate({
        scrollTop: ($('#top').offset().top)
    },500);
});

$('#service_tab').click(function()
{
    $('html, body').animate({
        scrollTop: ($('#service_link').offset().top)
    },500);
});

$('#about_tab').click(function()
{
    $('html, body').animate({
        scrollTop: ($('#p_about').offset().top)
    },500);
});

$('#contact_tab').click(function()
{
    $('html, body').animate({
        scrollTop: ($('#contact_link').offset().top)
    },500);
});
