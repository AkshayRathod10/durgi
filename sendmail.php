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
die();


$mail = PHPMailer();

$mail->SMTPDebug = 2;                   // Enable verbose debug output
$mail->isSMTP();                        // Set mailer to use SMTP
$mail->Host       = 'smtp.gfg.com;';    // Specify main SMTP server
$mail->SMTPAuth   = true;               // Enable SMTP authentication
$mail->Username   = 'user@gfg.com';     // SMTP username
$mail->Password   = 'password';         // SMTP password
$mail->SMTPSecure = 'tls';              // Enable TLS encryption, 'ssl' also accepted
$mail->Port       = 587; 

$mail->setFrom('from@gfg.com', 'Name');           // Set sender of the mail
$mail->addAddress('receiver1@gfg.net');           // Add a recipient
$mail->addAddress('receiver2@gfg.com', 'Name');   // Name is optional

$mail->isHTML(true);                                  
$mail->Subject = 'Durgi Immigration Specialist - Inquire';
$mail->Body    = "<div>Name: $name </div><div>Number: $number </div><div>Email: $email</div><div>Education: $education</div><div>Requirement: $requirement</div>";
$mail->AltBody = 'Body in plain text for non-HTML mail clients';

$mail->send();