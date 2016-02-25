<?php
require_once ("class.phpmailer.php");
  $to['email'] = "pkpbhardwaj729@gmail.com";      
$to['name'] = "Prashant";   
$subject = "test subject";
$str = "<p>Hello, World</p>";
$mail = new PHPMailer;
$mail->IsSMTP();                                     
$mail->SMTPAuth = true;
$mail->Host = 'smtp.gmail.com';
$mail->Port = 587;
$mail->Username = 'hiddenshopping@gmail.com';
$mail->Password = '25nov1992';
$mail->SMTPSecure = 'ssl';
$mail->From = 'hiddenshopping@gmail.com';
$mail->FromName = "Vibrance";
$mail->AddReplyTo('hiddenshopping@gmail.com', 'any name'); 
$mail->AddAddress($to['email'],$to['name']);
$mail->Priority = 1;
$mail->AddCustomHeader("X-MSMail-Priority: High");
$mail->WordWrap = 50;    
$mail->IsHTML(true);  
$mail->Subject = $subject;
$mail->Body    = $str;
if(!$mail->Send()) {
$err = 'Message could not be sent.';
$err .= 'Mailer Error: ' . $mail->ErrorInfo;                        
}

$mail->ClearAddresses();
?>