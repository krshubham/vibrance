<?php
require("class.phpmailer.php");

$mail = new PHPMailer();

$mail->IsSMTP();                                      // set mailer to use SMTP
$mail->Host = "smtp.gmail.com";  // specify main and backup server
$mail->SMTPAuth = true;     // turn on SMTP authentication
$mail->Username = "hiddenshopping@gmail.com";  // SMTP username
$mail->Password = "25nov1992"; // SMTP password

$mail->From = "hiddenshopping@gmail.com";
$mail->FromName = "SuperUser";

$mail->AddAddress("pkpbhardwaj729@gmail.com");                  // name is optional


$mail->WordWrap = 50;                                 // set word wrap to 50 characters
    // optional name
$mail->IsHTML(true);                                  // set email format to HTML

$mail->Subject = "Here is the subject";
$mail->Body    = "This is the HTML message body <b>in bold!</b>";
$mail->AltBody = "This is the body in plain text for non-HTML mail clients";

if(!$mail->Send())
{
   echo "Message could not be sent. <p>";
   echo "Mailer Error: " . $mail->ErrorInfo;
   exit;
}

echo "Message has been sent";
?>