ini_set('display_errors', 1);
error_reporting(E_ALL);

<?php
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    // Capture form inputs
    $name = htmlspecialchars($_POST['name']);
    $email = htmlspecialchars($_POST['email']);
    $message = htmlspecialchars($_POST['message']);

    // Check if inputs are not empty
    if (!empty($name) && !empty($email) && !empty($message)) {
        // Email configuration (replace with your own email address)
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
?>
