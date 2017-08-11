
$("#btn_submit_info").click(function()
{
  var errorMessage = ""; //start with an empty string and add the errors onto it.
  var fieldsMissing = "";

  if ($("#inputName").val() == "")
  {
    fieldsMissing += "<br>Name";
  }

  if ($("#inputPhone").val() == "")
  {
    fieldsMissing += "<br>Telephone";
  }

  if ($("#inputMessage").val() == "")
  {
    fieldsMissing += "<br>Message";
  }

  if (fieldsMissing != "")
  {
    errorMessage += "<p>The following field(s) are missing:" + fieldsMissing;
  }


  if ($.isNumeric($("#phone").val()) == false)
  {
    errorMessage += "<p>Your phone number is not numeric.</p>";
  }


  if (errorMessage != "")
  {
    $("#errorMessage").html(errorMessage);
  }
  else
  {
    $("#successMessage").show(); //show the message
    $("#errorMessage").hide(); //hide the error message
  }

});

$(function()
{
  // Get the form.
  var form = $('#ajax-contact');
});

//Setup event listener for the contact form:
$(form).submit(function(event)
{
  return false;
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
    $('#name').val('');
    $('#email').val('');
    $('#message').val('');
})
