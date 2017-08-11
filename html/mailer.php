<?php

    // Only process POST reqeusts.
    if ($_SERVER["REQUEST_METHOD"] == "POST") {
        // Get the form fields and remove whitespace.
        $name = strip_tags(trim($_POST["inputName"]));
				$name = str_replace(array("\r","\n"),array(" "," "),$name);
        $phone = filter_var(trim($_POST["inputPhone"]), FILTER_SANITIZE_EMAIL);
        $message = trim($_POST["inputMessage"]);

        // Check that data was sent to the mailer.
        if ( empty($name) OR empty($message) OR empty($phone) {
            // Set a 400 (bad request) response code and exit.
            http_response_code(400);
            echo "Oops! There was a problem with your submission. Please complete the form and try again.";
            exit;
        }

        // Set the recipient email address.
        // FIXME: Update this to your desired email address.
        $recipient = "dcurry876@gmail.com";

        // Set the email subject.
        $subject = "New Client Info";

        // Build the email content.
        $email_content = "Name: $name\n";
        $email_content .= "Phone: $phone\n\n";
        $email_content .= "Message:\n$message\n";

        // Build the email headers.
        $email_headers = "From: $name";

        // Send the email.
        if (mail($recipient, $subject, $email_content, $email_headers)) {
            // Set a 200 (okay) response code.
            http_response_code(200);
            echo "Thank You! Your message has been sent.";
        } else {
            // Set a 500 (internal server error) response code.
            http_response_code(500);
            echo "Oops! Something went wrong and we couldn't send your message.";
        }

    } else {
        // Not a POST request, set a 403 (forbidden) response code.
        http_response_code(403);
        echo "There was a problem with your submission, please try again.";
    }
