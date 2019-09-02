<?php
$name = $_POST['name'];
$email = $_POST['email'];
$prez = $_POST['prez'];
$type = $_POST['type'];
$message = $_POST['message'];
$formcontent=" From: $name $prez \n Type: $type \n Message: $message";
$recipient = "onlizbrika@gmail.com";
$subject = "Contact Form";
$mailheader = "From: $email \r\n";
mail($recipient, $subject, $formcontent,$mailheader) or die("Error!");
echo "Hvala!" . " -" . "<a href='form.html' style='text-decoration:none;color:#ff0099;'> Return Home</a>";

?>