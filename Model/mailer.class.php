<?php
session_start();

	use PHPMailer\PHPMailer\PHPMailer;
	use PHPMailer\PHPMailer\Exception;
	
require_once '../controler/controler.php';
require '../Includes/PHPMailer/src/Exception.php';
require '../Includes/PHPMailer/src/PHPMailer.php';
require '../Includes/PHPMailer/src/SMTP.php';
  
  
  $mail = new PHPMailer(true);

try {
    //Server settings
    $mail->isSMTP();                                            // Send using SMTP
    $mail->Host       = 'smtp.gmail.com';                       // Set the SMTP server to send through
    $mail->SMTPAuth   = true;                                   // Enable SMTP authentication
    $mail->Username   = 'robert.bajoo@gmail.com';               // SMTP username
    $mail->Password   = 'politechnika847';                      // SMTP password
    $mail->SMTPSecure = PHPMailer::ENCRYPTION_STARTTLS;         // Enable TLS encryption; `PHPMailer::ENCRYPTION_SMTPS` also accepted
    $mail->Port       = 587;                                    // TCP port to connect to

    //Recipients
    $mail->setFrom('robert.bajoo@gmail.com', 'Mailer');
    $mail->addAddress($_SESSION['UserEmail']);   			    // Add a recipient  
    $mail->addReplyTo('robert.bajoo@gmail.com', 'Information');

    // Attachments
   // $mail->addAttachment('/var/tmp/file.tar.gz');            // Add attachments
   // $mail->addAttachment('/tmp/image.jpg', 'new.jpg');       // Optional name

    // Content
    $mail->isHTML(true);                                       // Set email format to HTML
    $mail->Subject = 'Password reset link.';
    $mail->Body    = 'Hello '.$_SESSION['UserName'].',
				  You have requested password reset!
				  Please click this link to reset your password:
				  http://localhost/login-and-registration-form-master/resetPass.php?username='.$_SESSION['UserName'].'&hash='.$_SESSION['UserHash'].'&token='.$_SESSION['UserToken'];
 

    $mail->send();
			$_SESSION['msg_success'] = "Link resetujący został wysłany. Link będzie ważny 24h.";
			$redirect = new Controler;
			$redirect->redirect('../index.php');
} catch (Exception $e) {
			$_SESSION['error'] = "Wystapił błąd przy wysyłaniu maila z linkiem resetującym hasło.";	
			$redirect = new Controler;
			$redirect->redirect('../index.php');
}