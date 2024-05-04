<?php

// for index.html

use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\SMTP;
use PHPMailer\PHPMailer\Exception;

ob_end_flush();
header("Cache-Control: no-store, no-cache, must-revalidate, max-age=0");
header("Cache-Control: post-check=0, pre-check=0", false);
header("Pragma: no-cache");

//Load Composer's autoloader
require 'phpmailer/autoload.php';

// require 'PHPMailer/src/Exception.php';
// require 'PHPMailer/src/PHPMailer.php';
// require 'PHPMailer/src/SMTP.php';

//Create an instance; passing `true` enables exceptions

$mail = new PHPMailer(true);


$FullName   = $_GET['Full-Name'];
$CompanyName = $_GET['Company-Name'];
$Email  = $_GET['Email-3'];
$Phone  = $_GET['Phone-Number'];
$LookingFor = $_GET['Interested-Offering'];
$SourceLead = $_GET['Source-of-Lead'];
$CompanySize = $_GET['Company-Size'];

$subject = 'A New Enquiry form received from ' . $FullName;

$htmlContent = '<h2> Contact Us Form Received </h2>
                    <p><b>Applicant Name:</b>' . $FullName . '</p>
                    <p><b>CompanyName:</b>' . $CompanyName . '</p>
                    <p> <b>Email: </b> ' . $Email . '</p>
                    <p> <b>Phone Number: </b> ' . $Phone . '</p>
                    <p> <b>LookingFor : </b> ' . $LookingFor . '</p>
                    <p> <b>Source Of Lead: </b> ' . $SourceLead . '</p>          
                    <p> <b>Company Size: </b> ' . $CompanySize . ' </p>
                    ';


try {
    $mail->SMTPDebug = 2;                   // Enable verbose debug output
    $mail->isSMTP();                        // Set mailer to use SMTP
    $mail->Host       = 'aicraise.com';    // Specify main SMTP server
    $mail->SMTPAuth   = true;               // Enable SMTP authentication
    $mail->Username   = 'coworking@aicraise.com'; // SMTP username
    $mail->Password   = 'TVAZZHIM52SW';         // SMTP password
    $mail->SMTPSecure = 'ssl';              // Enable TLS encryption, 'ssl' also accepted
    $mail->Port       = 465;                // TCP port to connect to set `SMTPSecure = PHPMailer::ENCRYPTION_STARTTLS`

    $mail->setFrom('', 'AICRAISE');           // Set sender of the mail
    //$mail->addCC('', '');
    $userEmail = $_POST['user_email']; // Assuming you're getting the email from a form field named 'user_email'
    $mail->addAddress($userEmail);

    //Content
    $mail->isHTML(true);                                  //Set email format to HTML
    $mail->Subject = $subject;
    $mail->Body = $htmlContent;
    $mail->send();

    $successMessage = 'Application Submitted Successfully';
    $errorMessage = '';
} catch (Exception $e) {
    $successMessage = '';
    $errorMessage = "Message could not be sent. Mailer Error: {$mail->ErrorInfo}";
}


if (!empty($errorMessage)) {
    echo $errorMessage;
} else {
    echo $successMessage;
}
