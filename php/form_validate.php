<?php
print_r($_POST); //the name attributes are what is passed through the server, not the ids or classes.
  $error = "";
  $successMessage = "";

  if ($_POST)
  {

    if (!$_POST["name"]) //If the variable is empty
    {
      $error .= "Your name is required <br />";
    }
    if (!$_POST["phone"]) //If the variable is empty
    {
      $error .= "A phone number is required <br />";
    }
    if (!$_POST["message"]) //If the variable is empty
    {
      $error .= "Please provide your reason for contacting us. <br />";
    }

    if ($error != "")
    {
      $error = '<div class="alert alert-danger" role="alert">
    <strong>There were error(s) in your form:</strong>' . $error . '</div>';
    }
    else
    {
      if ($_POST["name"] && $_POST["phone"] && $_POST["message"])
      {
        $successMessage = '<div class="alert alert-success" role="success">
        Thank you for getting in contact. We will be in touch soon.</div>';
      }
      else
      {
        $error = '<div class="alert alert-danger" role="alert">
        <strong>Your information could not be sent. Please try again later</strong></div>';
      }
    }
  }
  ?>
