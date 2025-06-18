ini_set('display_errors', 1);
error_reporting(E_ALL);

<?php
// Display all errors (for debugging; remove in production)
ini_set('display_errors', 1);
error_reporting(E_ALL);

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    // Capture and sanitize form inputs
    $name = htmlspecialchars($_POST['name']);
    $email = htmlspecialchars($_POST['email']);
    $message = htmlspecialchars($_POST['message']);

    // Validate inputs
    if (!empty($name) && !empty($email) && !empty($message)) {
        if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
            echo "Invalid email format.";
            exit;
        }

        // Email configuration (replace with your email address)
        $to = "rupeshsanvatsarkar@gmail.com";
        $subject = "New Contact Form Submission";
        $body = "Name: $name\nEmail: $email\nMessage:\n$message";
        $headers = "From: $email";

        // Send the email
        if (mail($to, $subject, $body, $headers)) {
            echo "Thank you, $name! Your message has been sent.";
        } else {
            echo "Error: Unable to send your message. Please try again later.";
        }
    } else {
        echo "Error: All fields are required!";
    }
} else {
    echo "Invalid request method.";
}
