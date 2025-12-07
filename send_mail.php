<?php
if ($_SERVER['REQUEST_METHOD'] !== 'POST') {
    http_response_code(405);
    echo "Method Not Allowed";
    exit;
}

$to      = "hey.siya01@gmail.com";
$first   = trim($_POST['first_name'] ?? '');
$last    = trim($_POST['last_name'] ?? '');
$email   = trim($_POST['email'] ?? '');
$subject = trim($_POST['subject'] ?? 'Portfolio Contact Form');
$message = trim($_POST['message'] ?? '');

if (!$first || !$email || !$message) {
    echo "Please fill all required fields.";
    exit;
}

$full_subject = "Portfolio Contact: " . $subject;

$body  = "New message from your portfolio website:\n\n";
$body .= "Name: {$first} {$last}\n";
$body .= "Email: {$email}\n";
$body .= "Subject: {$subject}\n\n";
$body .= "Message:\n{$message}\n";

$headers  = "From: {$first} {$last} <{$email}>\r\n";
$headers .= "Reply-To: {$email}\r\n";

if (mail($to, $full_subject, $body, $headers)) {
    echo "Thank you! Your message has been sent.";
} else {
    echo "Sorry, something went wrong. Please try again later.";
}
