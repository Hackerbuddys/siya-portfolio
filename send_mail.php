<?php
if(isset($_POST['submit'])){

    $to = "hey.siya01@gmail.com";  // Your email
    $first_name = $_POST['first_name'];
    $last_name = $_POST['last_name'];
    $email = $_POST['email'];
    $subject = $_POST['subject'];
    $message = $_POST['message'];

    $fullMessage = "
    Name: $first_name $last_name
    Email: $email
    Subject: $subject

    Message:
    $message
    ";

    $headers = "From: $email";

    if(mail($to, $subject, $fullMessage, $headers)){
        echo "<script>alert('Thank you! Your message has been sent successfully.'); window.history.back();</script>";
    } else {
        echo "<script>alert('Message sending failed. Please try again.'); window.history.back();</script>";
    }
}
?>
