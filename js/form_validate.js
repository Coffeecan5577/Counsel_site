
$("#btn_submit_info").click(function()
{
  var errorMessage = ""; //start with an empty string and add the errors onto it.
  var fieldsMissing = "";

  if ($("#inputName").val() == "")
  {
    fieldsMissing += "<br>Name";
    return false;
  }

  if ($("#inputPhone").val() == "")
  {
    fieldsMissing += "<br>Telephone";
    return false;
  }

  if ($("#inputMessage").val() == "")
  {
    fieldsMissing += "<br>Message";
    return false;
  }

  if (fieldsMissing != "")
  {
    errorMessage += "<p>The following field(s) are missing:" + fieldsMissing;
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
