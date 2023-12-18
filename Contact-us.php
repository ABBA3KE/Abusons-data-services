<?php
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $name = $_POST["name"];
    $email = $_POST["email"];
    $message = $_POST["message"];

    // Here you can implement the logic to send the email or store the data in a database

    // For example, sending a simple email
    $to = "your@email.com";
    $subject = "New Contact Form Submission";
    $headers = "From: $email";

    mail($to, $subject, $message, $headers);

    // Redirect to a thank-you page or display a success message
    header("Location: thank_you.html");
    exit();
}
?>
