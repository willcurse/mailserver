<?php
use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;

require 'phpmailer/src/Exception.php';
require 'phpmailer/src/PHPMailer.php';
require 'phpmailer/src/SMTP.php';

if (isset($_POST["send"])) {
    $mail = new PHPMailer(true);

    // Server settings
    $mail->isSMTP();
    $mail->Host = 'smtp.gmail.com'; // Corrected to 'smtp.gmail.com'
    $mail->SMTPAuth = true;
    $mail->Username = 'www.gamingmindfps@gmail.com';
    $mail->Password = 'ufpuaezwtyelzrlp';
    $mail->SMTPSecure = PHPMailer::ENCRYPTION_SMTPS; // Use the PHPMailer constant for SMTPS encryption
    $mail->Port = 465; 

    // Recipients
    $mail->setFrom('www.gamingmindfps@gmail.com');
    $mail->addAddress($_POST["email"]);

    // Content
    $mail->isHTML(true);
    $mail->Subject = $_POST["subject"];
    $mail->Body = $_POST["message"];

    $mail->send();

    echo "
    <script>
    alert('send Successfully');
    document.location.href = 'HomePage.php';
    </script>
    "; 
}
?>
