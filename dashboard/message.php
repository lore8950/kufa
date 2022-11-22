<?php
session_start();
require_once('../db_connect.php');

    $name = htmlspecialchars ($_POST['name']);
    $email = htmlspecialchars ($_POST['email']);
    $message =htmlspecialchars ($_POST['message']);

    $mysqli_email_query = "INSERT INTO email (name, email, message) VALUES ('$name','$email','$message')";
    $mysqli_email_query_db = mysqli_query($db_connect,$mysqli_email_query);



//Import PHPMailer classes into the global namespace
//These must be at the top of your script, not inside a function
use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\SMTP;
use PHPMailer\PHPMailer\Exception;

//Load Composer's autoloader
require '../vendor/autoload.php';

//Create an instance; passing `true` enables exceptions
$mail = new PHPMailer(true);

try {
    //Server settings
    $mail->SMTPDebug = 1;                      //Enable verbose debug output
    $mail->isSMTP();                                            //Send using SMTP
    $mail->Host       = "smtp.gmail.com";                     //Set the SMTP server to send through
    $mail->SMTPAuth   = TRUE;                                   //Enable SMTP authentication
    $mail->Username   = "apurbodebnath046@gmail.com";                     //SMTP username
    $mail->Password   = 'ouzrvdozvahybzmr';                               //SMTP password
    $mail->SMTPSecure = 'tls';            //Enable implicit TLS encryption
    $mail->Port       = 587;                                    //TCP port to connect to; use 587 if you have set `SMTPSecure = PHPMailer::ENCRYPTION_STARTTLS`

        $email_query = "SELECT * FROM email WHERE 1";
        $email_query_db = mysqli_query($db_connect,$email_query);

    //Recipients
    $mail->setFrom("$email", "$name");
    $mail->addAddress('lm0666770@gmail.com', 'lucifer morningstar');     //Add a recipient
    // $mail->addAddress('ellen@example.com');               //Name is optional
    // $mail->addReplyTo('info@example.com', 'Information');
    // $mail->addCC('cc@example.com');
    // $mail->addBCC('bcc@example.com');

            

    //Content
    $mail->isHTML(true);                                  //Set email format to HTML
    $mail->Subject = "contact message form $name";
    $mail->Body    = "<h1>$name</h1>
                      <h2>$email</h2>
                      <p>$message</p>";
    
    $mail->send();
    echo 'Message has been sent';
    $_SESSION["sent"] = 'email sent';
    header('location:../frontend/index.php');
} catch (Exception $e) {
    echo "Message could not be sent. Mailer Error: {$mail->ErrorInfo}";
}
?>