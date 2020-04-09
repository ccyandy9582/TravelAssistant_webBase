<?php
    
// Import PHPMailer classes into the global namespace
// These must be at the top of your script, not inside a function
use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\SMTP;
use PHPMailer\PHPMailer\Exception;

// Load Composer's autoloader
if (isset($required)) {
    require("mail_reg_text.php");
    require 'vendor/autoload.php';

    // Instantiation and passing `true` enables exceptions
    $mail = new PHPMailer(true);

    try {
        $mail->SMTPOptions = array(
            'ssl' => array(
                'verify_peer' => false,
                'verify_peer_name' => false,
                'allow_self_signed' => true
            )
        );
        //Server settings
        $mail->SMTPDebug = 0;                      // Enable verbose debug output
        $mail->isSMTP();                                            // Send using SMTP
        $mail->Host       = 'ssl://smtp.gmail.com';                    // Set the SMTP server to send through
        $mail->SMTPAuth   = true;                                   // Enable SMTP authentication
        $mail->SMTPSecure =  'ssl';
        $mail->Host       = 'smtp.gmail.com';                    // Set the SMTP server to send through
        $mail->Port       = '465';     
        $mail->CharSet = "utf-8"; //郵件編碼
        $mail->Username   = 'fyp.travel.assistance@gmail.com';                     // SMTP username
        $mail->Password   = 'Fyp!123456';                               // SMTP password
        // $mail->SMTPSecure = PHPMailer::ENCRYPTION_STARTTLS;         // Enable TLS encryption; `PHPMailer::ENCRYPTION_SMTPS` also accepted                                  // TCP port to connect to

        //Recipients
        $mail->setFrom('fyp.travel.assistance@gmail.com', 'hoChillTrip');
        // $mail->addAddress('', 'nixon');     // Add a recipient
        $mail->addAddress($_POST["email"]);     // Add a recipient
        //$mail->addAddress('ellen@example.com');               // Name is optional
        //$mail->addReplyTo('info@example.com', 'Information');
        //$mail->addCC('cc@example.com');
        //$mail->addBCC('bcc@example.com');

        // Attachments
        // $mail->addAttachment('/var/tmp/file.tar.gz');         // Add attachments
        // $mail->addAttachment('/tmp/image.jpg', 'new.jpg');    // Optional name

        // Content
        $mail->isHTML(true);                                  // Set email format to HTML
        $mail->Subject = $mail_reg_text["title"];
        $mail->Body    = $mail_reg_text["content"];
        // $mail->AltBody = 'Thank you for registering';

        $mail->send();
        //echo 'Message has been sent';
    } catch (Exception $e) {
        //echo "Message could not be sent. Mailer Error: {$mail->ErrorInfo}";
    }
}
?>