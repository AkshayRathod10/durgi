<?php

use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;

require 'vendor/autoload.php';

function isPost($name){
    if(isset($_POST[$name])){
        return $_POST[$name];
    }

    return '';
}


$name = isPost('name');
$number = isPost('number');
$email = isPost('email');
$education = isPost('education');
$requirement = isPost('requirement');

echo "<div>Name: $name </div><div>Number: $number </div><div>Email: $email</div><div>Education: $education</div><div>Requirement: $requirement</div>";



try{

    $mail = new PHPMailer(true);

    $mail->SMTPDebug = 1;                   // Enable verbose debug output
    $mail->isSMTP();                        // Set mailer to use SMTP
    $mail->Host       = 'smtp.gmail.com';    // Specify main SMTP server
    $mail->SMTPAuth   = true;               // Enable SMTP authentication
    $mail->Username   = 'durgiimmigrationspecialist@gmail.com';     // SMTP username
    $mail->Password   = 'Durgi@2023';         // SMTP password
    $mail->SMTPSecure = 'tls';              // Enable TLS encryption, 'ssl' also accepted
    $mail->Port       = 587; 
    
    $mail->setFrom('durgiimmigrationspecialist@gmail.com', 'Durgi Immigration Specialist');           // Set sender of the mail
    $mail->addAddress('akshayrathod9@gmail.com');           // Add a recipient
    
    $mail->isHTML(true);                                  
    $mail->Subject = 'Durgi Immigration Specialist - Inquire';
    $mail->Body    = "<div>Name: $name </div><div>Number: $number </div><div>Email: $email</div><div>Education: $education</div><div>Requirement: $requirement</div>";
    $mail->AltBody = 'Body in plain text for non-HTML mail clients';
    
    $mail->send();
}
catch (phpmailerException $e) {
    echo $e->errorMessage(); //Pretty error messages from PHPMailer
  } catch (Exception $e) {
    echo $e->getMessage(); //Boring error messages from anything else!
  }