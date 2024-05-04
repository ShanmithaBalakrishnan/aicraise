<?php

// for schedule a visit

use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\SMTP;
use PHPMailer\PHPMailer\Exception;

//Load Composer's autoloader
require 'phpmailer/autoload.php';

// require 'PHPMailer/src/Exception.php';
// require 'PHPMailer/src/PHPMailer.php';
// require 'PHPMailer/src/SMTP.php';

//Create an instance; passing `true` enables exceptions


$mail = new PHPMailer(true);


$name   = $POST['name'];
$emailFrom  = $POST['email'];
$phone  = $_POST['Phone-Number'];
$DateVisit = $_POST['field'];
$CenterChoice = $_POST['locationInterest'];
$MembershipType = $_POST['Membership-Type'];
$SourceLead = $_POST['Source-of-lead'];

$subject = 'A New Schedule form received from ' . $name;

$htmlContent = '<h2> Schedule A Visit Form Received </h2>
                    <p><b>Applicant Name:</b>' . $name . '</p>
                    <p> <b>Email: </b> ' . $emailFrom . '</p>
                    <p> <b>Phone Number: </b> ' . $phone . '</p>
                    <p> <b>Date Of Visit : </b> ' . $DateVisit . '</p>
                    <p> <b>Centre Of Choice : </b> ' . $CenterChoice . '</p>
                    <p> <b>Membership Type: </b> ' . $MembershipType . '</p>
                    <p> <b>Where did you hear about us? : </b> ' . $SourceLead . '</p>';

try {
    $mail->SMTPDebug = 2;                   // Enable verbose debug output
    $mail->isSMTP();                        // Set mailer to use SMTP
    $mail->Host       = 'aicraise.com';    // Specify main SMTP server
    $mail->SMTPAuth   = true;               // Enable SMTP authentication
    $mail->Username   = 'coworking@aicraise.com'; // SMTP username
    $mail->Password   = 'QY3-3T2}Go!*';         // SMTP password
    $mail->SMTPSecure = 'ssl';              // Enable TLS encryption, 'ssl' also accepted
    $mail->Port       = 465;                // TCP port to connect to set `SMTPSecure = PHPMailer::ENCRYPTION_STARTTLS`

    $mail->setFrom('coworking@aicraise.com', 'AICRAISE');           // Set sender of the mail
    $mail->addAddress('Coworking@aicraise.com');           // Add a recipient
    //$mail->addCC('', '');

    //Content
    $mail->isHTML(true);                                  //Set email format to HTML
    $mail->Subject = $subject;
    $mail->Body = $htmlContent;
    $mail->send();
    echo 'Application Submitted Successfully';
} catch (Exception $e) {
    echo "Message could not be sent. Mailer Error: {$mail->ErrorInfo}";
}
