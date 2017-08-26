$(function()
{
  // Get the form.
  var form = $('#ajax-contact');
});

//Setup event listener for the contact form:
$(form).submit(function(event)
{
  event.preventDefault();
});

//Serialize form data:
var formData = $(form).serialize();

// Submit the form using AJAX.
$.ajax({
    type: 'POST',
    url: $(form).attr('action'),
    data: formData
})
.done(function(response)
{
  // Clear the form.
    $('#inputName').val('');
    $('#inputPhone').val('');
    $('#inputMessage').val('');
});
