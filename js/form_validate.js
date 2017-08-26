
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
    return false;
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
