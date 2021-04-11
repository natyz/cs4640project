<?php
use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception; 
require 'PHPMailer/src/Exception.php';
require 'PHPMailer/src/PHPMailer.php';
require 'PHPMailer/src/SMTP.php';
$mail = new PHPMailer(true);  
try{
    $mail->isSMTP();                          
    $mail->Mailer = "smtp";
    
    $mail->SMTPDebug = 0;                     // 1 = Enable verbose debug output. 2 = message only. 0 = nothing. only confirm message
    $mail->SMTPAuth = TRUE;                   // Enable SMTP authentication
    $mail->SMTPSecure = "tls";                // Enable TLS encryption, 'ssl' (a predecessor to TSL) is also accepted
    $mail->Port = 587;                        // TCP port to connect to (587 is a standard port for SMTP)
    $mail->Host = "smtp.gmail.com";           // Specify main and backup SMTP servers
    $mail->Username = "natandwan2@gmail.com";  // SMTP username
    $mail->Password = "natandwan4640";         // SMTP password 
    
    //Recipients
    $mail->setFrom('natandwan2@gmail.com', 'NatAndWan');
    $mail->addAddress($_POST['email']);

    $mail->isHTML(true);

    $mail->Subject = 'Contact Us';
    $mail->Body = 'From=' . $_POST['name'] . ': email address=' . $_POST['email'] . ': comment=' . $_POST['comment'];

    $mail->send();
    $confirm = "Thank you. Your comment has been sent.";
    echo '<div class ="center confirm">'.$confirm.'</div>';
} 
catch (Exception $e) {
    $msg = "sorry it was not sent.";
}


?>