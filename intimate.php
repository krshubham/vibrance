<?php
	
	function redirect_to($new_location) {
		header("Location: " . $new_location);
		exit; 
	}
	
	$email1 = $_GET['email1'];
	$email2 = $_GET['email2'];
	$email = $email1."@".$email2;	
	$event = $_GET['event'];	
	$fees = $_GET['price'];

	require 'PHPMailer-master/PHPMailerAutoload.php';
 
	$mail = new PHPMailer;
	 
	$mail->isSMTP();                                      
	$mail->Host = 'smtp.gmail.com';                       
	$mail->SMTPAuth = true;                               
	$mail->Username = 'vibrancechennai@gmail.com';                   
	$mail->Password = 'NayaWala';               
	$mail->SMTPSecure = 'tls';                            
	$mail->Port = 587;                                    
	$mail->setFrom('vibrancechennai@gmail.com', 'Vibrance Registrations Team');
	$mail->addAddress("$email");       
	$mail->WordWrap = 50; 
	$mail->isHTML(true);                                  
	 
	$mail->Subject = 'Vibrance event registration.';
	$mail->Body    = 'You have still not paid for <b>'.ucfirst($event).'</b> in Vibrance16. Your E registration slip will be mailed and your participation will only be confirmed when you pay <b>Rs.'.$fees.'</b> at our payment desks in VIT.'.'<br>'.' Regards, Team Vibrance. ';
	$mail->AltBody = 'This is the body in plain text for non-HTML mail clients';	

	if(!$mail->send()) {
	   echo 'Message could not be sent.';
	   echo 'Mailer Error: ' . $mail->ErrorInfo;
	   exit;
	} else {
		redirect_to("event_admin.php");
	}
		
?>