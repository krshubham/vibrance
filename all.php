<?php require_once("includes/session.php"); ?>
<?php require_once("includes/db_connection.php"); ?>
<?php require_once("includes/functions.php"); ?>
<?php confirm_logged_in(); ?>

<?php
	$current_user = $_SESSION["username"];
	$name_query = "SELECT * FROM users WHERE username = '{$current_user}' LIMIT 1";
	$name_result = mysqli_query($conn, $name_query);
	confirm_query($name_result);
	$name_title = mysqli_fetch_assoc($name_result);

	$name = $name_title['name'];
	$email = $current_user;
	$college = $name_title['college'];
	$regno = $name_title['regno'];
	$phno = $name_title['phno'];
	$altphno = $name_title['altphno'];	
	$parti = 1;   
	if ($name_title['college']!="VIT") {
		$price = 500;
	} else {
		$price = 250;
	}
	$combo = "all";

	
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
	$mail->Body    = 'You have succesfully registered for <b> All the events except dance club, music club, games and social innovators </b> in Vibrance16. Your E registration slip will be mailed and your participation will only be confirmed when you pay <b>Rs.'.$price.'</b> at our payment desks in VIT.'.'<br>'.' Regards, Team Vibrance. ';
	$mail->AltBody = 'This is the body in plain text for non-HTML mail clients';	

	if(!$mail->send()) {
	   echo 'Message could not be sent.';
	   echo 'Mailer Error: ' . $mail->ErrorInfo;
	   exit;
	}				
	
	$query = "INSERT INTO combo (name, email, college, regno, phno, altphno, parti, type, price, events)";
	$query .= " VALUES ('{$name}', '{$email}', '{$college}', '{$regno}', '{$phno}', '{$altphno}', {$parti}, 'all', '{$price}', 'all')";
	$result = mysqli_query($conn, $query);	
	
    if ($result) {
      	echo"You have succesfully registered for Vibrance16. Please check your email for the details. Your registraion will only be confirmed after you make the payment at our registration desk in VIT.";		
    } else {
	   	echo"Registration failed.";
    }    
			
		
			
?>      	
  
<?php
	if (isset ($conn)){
	  mysqli_close($conn);
	}
?>

