<?php

    // Only process POST reqeusts.
    if ($_SERVER["REQUEST_METHOD"] == "POST")
    {
        if (empty($_POST["name"]))
        {
            $nameErr = "Name is required";
        }
        else if (!preg_match("/^[a-zA-Z ]*$/",$name))
        {
            $nameErr = "Only letters and white space allowed";
        }
        else
        {
            $name = $_POST["name"];
        }

        if (empty($_POST["phone"]))
        {
            $phoneErr = "Phone is required";
        }
        else
        {
            //format the phone number after it is inserted.
            $phone = formatPhoneNumber(($_POST["phone"]));
        }

        if (empty($_POST["message"]))
        {
            $messageErr = "Message is required";
        }
        else if (!preg_match("/^[a-zA-Z ]*$/",$message))
        {
            $messageErr = "Only letters and white space allowed";
        }
        else
        {
            $message = $_POST["message"];
        }

        // Set the recipient email address.
        // FIXME: Update this to your desired email address.
        $recipient = "dcurry876@gmail.com";

        // Set the email subject.
        $subject = "New Client Info";

        // Build the email content.
        $email_content = "Name: " . $name . "\n";
        $email_content .= "Phone: " . $phone . "\n\n";
        $email_content .= "Message: " . $message . "\n";

        // Build the email headers.
        $email_headers = "From: " . $name;


        // Send the email.
        if (mail($recipient, $subject, $email_content, $email_headers))
        {
            // Set a 200 (okay) response code.
            http_response_code(200);
            echo "Thank You! Your message has been sent.";
        }
        else
        {
            // Set a 500 (internal server error) response code.
            http_response_code(500);
            echo "Oops! Something went wrong and we couldn't send your message.";
        }

    }
    else
    {
        // Not a POST request, set a 403 (forbidden) response code.
        http_response_code(403);
        echo "There was a problem with your submission, please try again.";
    }


    function formatPhoneNumber($phoneNumber) {
    $phoneNumber = preg_replace('/[^0-9]/','',$phoneNumber);

    if(strlen($phoneNumber) > 10) {
        $countryCode = substr($phoneNumber, 0, strlen($phoneNumber)-10);
        $areaCode = substr($phoneNumber, -10, 3);
        $nextThree = substr($phoneNumber, -7, 3);
        $lastFour = substr($phoneNumber, -4, 4);

        $phoneNumber = '+'.$countryCode.' ('.$areaCode.') '.$nextThree.'-'.$lastFour;
    }
    else if(strlen($phoneNumber) == 10) {
        $areaCode = substr($phoneNumber, 0, 3);
        $nextThree = substr($phoneNumber, 3, 3);
        $lastFour = substr($phoneNumber, 6, 4);

        $phoneNumber = '('.$areaCode.') '.$nextThree.'-'.$lastFour;
    }
    else if(strlen($phoneNumber) == 7) {
        $nextThree = substr($phoneNumber, 0, 3);
        $lastFour = substr($phoneNumber, 3, 4);

        $phoneNumber = $nextThree.'-'.$lastFour;
    }

    return $phoneNumber;
}



?>
