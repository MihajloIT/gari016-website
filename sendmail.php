 <?php

use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\SMTP;
use PHPMailer\PHPMailer\Exception;

//Load Composer's autoloader
require 'vendor/autoload.php';

//Create an instance; passing `true` enables exceptions
$mail = new PHPMailer(true);

try {
    //Server settings
    $mail->SMTPDebug = SMTP::DEBUG_SERVER;                      //Enable verbose debug output
    $mail->isSMTP();                                            //Send using SMTP
    $mail->Host       = 'smtp.example.com';                     //Set the SMTP server to send through
    $mail->SMTPAuth   = true;                                   //Enable SMTP authentication
    $mail->Username   = 'gari016mailer@gmail.com';                     //SMTP username
    $mail->Password   = 'rrfxyeqlaxlmvoem';                               //SMTP password
    $mail->SMTPSecure = PHPMailer::ENCRYPTION_SMTPS;            //Enable implicit TLS encryption
    $mail->Port       = 465;                                    //TCP port to connect to; use 587 if you have set `SMTPSecure = PHPMailer::ENCRYPTION_STARTTLS`

    //Recipients
    $mail->setFrom('gari016mailer@gmail.com', 'Mailer');
    $mail->addAddress('mihajlo1618@gmail.com', 'Joe User');     //Add a recipient
    $mail->addAddress('mihajlo1618@gmail.com');               //Name is optional
    $mail->addReplyTo('info@example.com', 'Information');
    $mail->addCC('cc@example.com');
    $mail->addBCC('bcc@example.com');

    //Attachments
    $mail->addAttachment('/var/tmp/file.tar.gz');         //Add attachments
    $mail->addAttachment('/tmp/image.jpg', 'new.jpg');    //Optional name

    //Content
    $mail->isHTML(true);                                  //Set email format to HTML
    $mail->Subject = 'Here is the subject';
    $mail->Body    = 'This is the HTML message body <b>in bold!</b>';
    $mail->AltBody = 'This is the body in plain text for non-HTML mail clients';

    $mail->send();
    echo 'Message has been sent';
} catch (Exception $e) {
    echo "Message could not be sent. Mailer Error: {$mail->ErrorInfo}";
}

    if($_SERVER["REQUEST_METHOD"] == "POST"){
        $ime = $_POST['name'];
        $email = $_POST['email'];
        $poruka = $_POST['message'];

        $to = 'gari016mailer@gmail.com';
        $subject = 'Novi email sa kontakt forme';
        $message = "Ime: $ime /nEmail: $email /nPoruka: $poruka";

        if(mail($to, $subject, $message)){
            echo "<p>Mail je uspesno poslat</p>";
        }else{
            echo "<p>Doslo je do greske</p>";
        }
    }





?>