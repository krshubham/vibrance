<?php
	
	function redirect_to($new_location) {
		header("Location: " . $new_location);
		exit; 
	}
	
	$email_raw = $_GET['email'];
	$email_part = explode("%40", $email_raw);
	$email = $email_part[0]."@".$email_part[1];
	$event = mysqli_real_escape_string($conn, htmlspecialchars($_GET['event']));
	$event_part = explode("_", $event);
	$fees = mysqli_real_escape_string($conn, htmlspecialchars($_GET['fees']));

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
	$mail->Body    = 'You have still not paid for <b>'.ucfirst($event_part[0]).'</b> in Vibrance16. Your E registration slip will be mailed and your participation will only be confirmed when you pay <b>Rs.'.$fees.'</b> at our payment desks in VIT.'.'<br>'.' Regards, Team Vibrance. ';
	$mail->AltBody = 'This is the body in plain text for non-HTML mail clients';	

	if(!$mail->send()) {
	   echo 'Message could not be sent.';
	   echo 'Mailer Error: ' . $mail->ErrorInfo;
	   exit;
	} else {
		redirect_to('event_admin.php');
	}	
		
?>