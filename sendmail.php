<?php
if ($_SERVER["REQUEST_METHOD"] === "POST") {
    $name    = htmlspecialchars($_POST["name"]);
    $email   = filter_var($_POST["email"], FILTER_VALIDATE_EMAIL);
    $phone   = htmlspecialchars($_POST["phone"]);
    $message = htmlspecialchars($_POST["message"]);

    if (!$email) {
        echo "Invalid email address.";
        exit;
    }

    $to      = "tech.fortress.system@gmail.com";
    $subject = "New Inquiry from SentryGuard Website";
    $headers = "From: noreply@sentryguard.co.za\r\n";
    $headers .= "Reply-To: $email\r\n";
    $headers .= "Content-Type: text/plain; charset=utf-8\r\n";

    $body  = "You received a new inquiry:\n\n";
    $body .= "Name: $name\n";
    $body .= "Email: $email\n";
    $body .= "Phone: $phone\n\n";
    $body .= "Message:\n$message\n";

    if (mail($to, $subject, $body, $headers)) {
        header("Location: thankyou.html");
        exit;
    } else {
        echo "Something went wrong. Please try again.";
    }
}
?>
