<?php
if(isset($_POST['email'])) {

    // EDIT THE 2 LINES BELOW AS REQUIRED
    $email_to = "marion.milhau.pro@gmail.com";
    $email_subject = "New contact";

    function died($error) {
        // your error code can go here
        echo "We are very sorry, but there were error(s) found with the form you submitted. ";
        echo "These errors appear below.<br /><br />";
        echo $error."<br /><br />";
        echo "Please go back and fix these errors.<br /><br />";
        die();
    }


    // validation expected data exists
    if(!isset($_POST['firstname']) ||
        !isset($_POST['lastname']) ||
        !isset($_POST['company']) ||
        !isset($_POST['website']) ||
        !isset($_POST['email']) ||
        !isset($_POST['phone']) ||
        !isset($_POST['platforms']) ||
        !isset($_POST['business']) ||
        !isset($_POST['service']) ||
        !isset($_POST['goal'])) {
        died('We are sorry, but there appears to be a problem with the form you submitted.');
    }

    $firstname = $_POST['firstname']; // required
    $lastname = $_POST['lastname']; // required
    $company  = $_POST['company']; // not required
    $website = $_POST['website']; // not required
    $email = $_POST['email']; // required
    $phone = $_POST['phone']; // not required
    $platforms = $_POST['platforms']; // required
    $business = $_POST['business']; // not required
    $service = $_POST['service']; // required
    $goal = $_POST['goal']; // not required

    $error_message = "";
    $email_exp = '/^[A-Za-z0-9._%-]+@[A-Za-z0-9.-]+\.[A-Za-z]{2,4}$/';

  if(!preg_match($email_exp,$email)) {
    $error_message .= 'The Email Address you entered does not appear to be valid.<br />';
  }

    $string_exp = "/^[A-Za-z .'-]+$/";

  if(!preg_match($string_exp,$firstname)) {
    $error_message .= 'The First Name you entered does not appear to be valid.<br />';
  }

  if(!preg_match($string_exp,$lastname)) {
    $error_message .= 'The Last Name you entered does not appear to be valid.<br />';
  }

  if(strlen($error_message) > 0) {
    died($error_message);
  }

    $email_message = "Form details below.\n\n";


    function clean_string($string) {
      $bad = array("content-type","bcc:","to:","cc:","href");
      return str_replace($bad,"",$string);
    }



    $email_message .= "First Name: ".clean_string($firstname)."\n";
    $email_message .= "Last Name: ".clean_string($lastname)."\n";
    $email_message .= "Copmany: ".clean_string($company)."\n";
    $email_message .= "Website: ".clean_string($website)."\n";
    $email_message .= "Email: ".clean_string($email_from)."\n";
    $email_message .= "Phone: ".clean_string($phone)."\n";
    $email_message .= "Platorms: ".clean_string($platforms)."\n";
    $email_message .= "Business: ".clean_string($business)."\n";
    $email_message .= "Service: ".clean_string($service)."\n";
    $email_message .= "Goals: ".clean_string($goal)."\n";

// create email headers
$headers = 'From: '.$email_from."\r\n".
'Reply-To: '.$email_from."\r\n" .
'X-Mailer: PHP/' . phpversion();
@mail($email_to, $email_subject, $email_message, $headers);
?>
 
<!-- include your own success html here -->

Thank you for contacting us. We will be in touch with you very soon.

<?php

}
?>
