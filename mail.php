<?php
use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;

require 'path/to/PHPMailer/src/Exception.php';
require 'path/to/PHPMailer/src/PHPMailer.php';
require 'path/to/PHPMailer/src/SMTP.php';

function send_mail($to,$subject,$message){
	$mail = new PHPMailer(true);
	try {
          $mail->SMTPDebug = 0;   
          $mail->isSMTP(); 
          $mail->Host = 'Nr.Travel.com'; 
          $mail->SMTPAuth = true;
          $mail->Username = "support@travel.com"; 
          $mail->Password = "travel0p455w0rd";
          $mail->SMTPSecure = 'ssl';  
          $mail->Port = 465; 
          $mail->setFrom("support@travel.com", "Travel Point");
          $mail->addAddress($to);
          $mail->addReplyTo("support@travel.com","Travel Point");
          $mail->isHTML(true); 
          $mail->Subject = $subject;
          $mail->Body    = $message;
          $mail->AltBody = $message;
          $mail->send();
          //echo 'Message has been sent';
        } catch (Exception $e) {
            echo 'Message could not be sent. Mailer Error: ', $mail->ErrorInfo;
            return 0;
          }
         return 1;
}

?>
