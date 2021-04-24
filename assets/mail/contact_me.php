<?php
// Check for empty fields
if(empty($_POST['entry.2005620554']) || empty($_POST['entry.1045781291']) || empty($_POST['entry.1166974658']) || empty($_POST['entry.839337160']) || !filter_var($_POST['entry.1045781291'], FILTER_VALIDATE_EMAIL)) {
  http_response_code(500);
  exit();
}

$name = strip_tags(htmlspecialchars($_POST['entry.2005620554']));
$email = strip_tags(htmlspecialchars($_POST['entry.1045781291']));
$phone = strip_tags(htmlspecialchars($_POST['entry.1166974658']));
$message = strip_tags(htmlspecialchars($_POST['entry.839337160']));

// Create the email and send the message
$to = "admin@nowyouknow.pk"; // Add your email address in between the "" replacing yourname@yourdomain.com - This is where the form will send a message to.
$subject = "Website Contact Form:  $name";
$body = "You have received a new message from your website contact form.\n\n"."Here are the details:\n\nName: $name\n\nEmail: $email\n\nPhone: $phone\n\nMessage:\n$message";
$header = "From: noreply@yourdomain.com\n"; // This is the email address the generated message will be from. We recommend using something like noreply@yourdomain.com.
$header .= "Reply-To: $email";	

if(!mail($to, $subject, $body, $header))
  http_response_code(500);
?>
