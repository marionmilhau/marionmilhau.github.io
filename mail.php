<?php $firstname = $_POST['firstname'];
$lastname = $_POST['lastname'];
$company = $_POST['company'];
$website = $_POST['website'];
$email = $_POST['email'];
$phone = $_POST['phone'];
$message = $_POST['message'];
$formcontent="From: $firstname $lastname $company \n Message: $message";
$recipient = "marion.milhau.pro@gmail.com";
$subject = "Contact Form";
$mailheader = "From: $firstname $lastname $company\r\n";
mail($recipient, $subject, $formcontent, $mailheader) or die("Error!");
echo "Thank You!";
?>
