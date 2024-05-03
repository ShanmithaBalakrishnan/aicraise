<?php

// for index.html

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


    $FullName   = $_POST['Full-Name'];
    $CompanyName = $_POST['Company-Name'];
    $Email  = $_POST['Email-3'];
    $Phone  = $_POST['Phone-Number'];
    $LookingFor =$_POST['Interested-Offering'];
    $SourceLead =$_POST['Source-of-Lead'];
    $CompanySize =$_POST['Company-Size'];

    $subject = 'A New Enquiry form received from ' .$FullName;

    $htmlContent = '<h2> Contact Us Form Received </h2>
                    <p><b>Applicant Name:</b>'. $FullName .'</p>
                    <p><b>CompanyName:</b>'. $CompanyName .'</p>
                    <p> <b>Email: </b> '.$Email .'</p>
                    <p> <b>Phone Number: </b> '.$Phone .'</p>
                    <p> <b>LookingFor : </b> '.$LookingFor.'</p>
                    <p> <b>Source Of Lead: </b> '.$SourceLead.'</p>          
                    <p> <b>Company Size: </b> '.$CompanySize.' </p>
                    ';

                 
    try {
        $mail->SMTPDebug = 2;                   // Enable verbose debug output
        $mail->isSMTP();                        // Set mailer to use SMTP
        $mail->Host       = 'https://shanmithabalakrishnan.github.io/aicraise/';    // Specify main SMTP server
        $mail->SMTPAuth   = true;               // Enable SMTP authentication
        $mail->Username   = 'coworking@aicraise.com'; // SMTP username
        $mail->Password   = 'TVAZZHIM52SW';         // SMTP password
        $mail->SMTPSecure = 'ssl';              // Enable TLS encryption, 'ssl' also accepted
        $mail->Port       = 465;                // TCP port to connect to set `SMTPSecure = PHPMailer::ENCRYPTION_STARTTLS`

        $mail->setFrom('coworking@aicraise.com' , 'AICRAISE' );           // Set sender of the mail
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
