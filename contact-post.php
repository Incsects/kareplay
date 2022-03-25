<?php
require 'php/baglan.php';

use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;
use PHPMailer\PHPMailer\SMTP;

if ($_POST) {
    $names = $_POST['names'];
    $email = $_POST['email'];
    $messages = $_POST['messages'];

    DB::insert("INSERT INTO contactform(names, email, messages) VALUES(?,?,?)", array(
        $names,
        $email,
        $messages
    ));

    $mail_contents = "Merhaba Yönetici, Birisi Sizinle İletişime Geçti!<br />";
    $mail_contents .= "İsim: $names<br />";
    $mail_contents .= "E-Mail: $email<br />";
    $mail_contents .= "Mesaj: $messages<br />";

    require 'assets/phpmailer/src/Exception.php';
    require 'assets/phpmailer/src/PHPMailer.php';
    require 'assets/phpmailer/src/SMTP.php';



    //Create an instance; passing `true` enables exceptions
    $mail = new PHPMailer(true);

    try {

        $mail->SMTPDebug = 0;                      //Enable verbose debug output
        $mail->isSMTP();                                            //Send using SMTP
        $mail->Host       = 'mail.yoursite.com';                     //Set the SMTP server to send through
        $mail->SMTPAuth   = true;                                   //Enable SMTP authentication
        $mail->Username   = 'mail@yoursite.com';                     //SMTP username
        $mail->Password   = 'passw';                               //SMTP password
        $mail->SMTPSecure = PHPMailer::ENCRYPTION_SMTPS;            //Enable implicit TLS encryption
        $mail->Port       = 465;                                    //TCP port to connect to; use 587 if you have set `SMTPSecure = PHPMailer::ENCRYPTION_STARTTLS`
    
        $mail->SMTPOptions = array(
            'ssl' => array(
            'verify_peer' => false,
            'verify_peer_name' => false,
            'allow_self_signed' => true
            )
            );
    
    
        $mail->setFrom('mail@yoursite.com', 'Contact - Form');
        $mail->addAddress('yourmail@mail.com', 'Name-Surname');     //Add a recipient
    
        $mail->isHTML(true);                                  //Set email format to HTML
        $mail->CharSet = 'UTF-8';
        $mail->Subject = 'A contact form has been sent from your site.';
        $mail->Body    = $mail_contents;
        $mail->AltBody = $mail_contents;
    
        $mail->send();
    
    } catch (Exception $e) {
        echo "Message could not be sent. Mailer Error: {$mail->ErrorInfo}";
        die();
    }



    header("Location:contact.php?success=1");
}
