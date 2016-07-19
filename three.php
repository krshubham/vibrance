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
	$first_event = mysqli_real_escape_string($conn, htmlspecialchars($_POST['first_event1']));
	$second_event = mysqli_real_escape_string($conn, htmlspecialchars($_POST['second_event1']));
	$third_event = mysqli_real_escape_string($conn, htmlspecialchars($_POST['third_event1']));   
	$event_part1 = explode("_", $first_event);
	$event_part2 = explode("_", $second_event);
	$event_part3= explode("_", $third_event);
	$events = $first_event."+".$second_event."+".$third_event;
	$parti = 1;   
	if ($name_title['college']!="VIT") {
		$price = 250;
	} else {
		$price = 100;
	}
	$combo = "three";

	$check_query = "SELECT * FROM {$first_event} WHERE email = '{$current_user}' ";
	$check_result = mysqli_query($conn, $check_query);
	confirm_query($check_result);
	$check = mysqli_fetch_assoc($check_result);
	$check2_query = "SELECT * FROM {$second_event} WHERE email = '{$current_user}' ";
	$check2_result = mysqli_query($conn, $check2_query);
	confirm_query($check2_result);
	$check2 = mysqli_fetch_assoc($check2_result);
	$check3_query = "SELECT * FROM {$third_event} WHERE email = '{$current_user}' ";
	$check3_result = mysqli_query($conn, $check3_query);
	confirm_query($check3_result);
	$check3 = mysqli_fetch_assoc($check3_result);
	if (($check['email']== $email)||($check2['email']== $email)||($check3['email']== $email)) {
		echo "You have already registered for one of these event. ";
	} else {

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
		$mail->Body    = 'You have succesfully registered for <b>'.ucfirst($event_part1[0]).', '.ucfirst($event_part2[0]).' and '.ucfirst($event_part3[0]).'</b> in Vibrance16. Your E registration slip will be mailed and your participation will only be confirmed when you pay <b>Rs.'.$price.'</b> at our payment desks in VIT.'.'<br>'.' Regards, Team Vibrance. ';
		$mail->AltBody = 'This is the body in plain text for non-HTML mail clients';	

		if(!$mail->send()) {
		   echo 'Message could not be sent.';
		   echo 'Mailer Error: ' . $mail->ErrorInfo;
		   exit;
		}	
		
		
		$query1 = "INSERT INTO {$first_event} (name, email, college, regno, phno, altphno, parti, combo)";
		$query1 .= " VALUES ('{$name}', '{$email}', '{$college}', '{$regno}', '{$phno}', '{$altphno}', {$parti}, '{$combo}')";
		$result1 = mysqli_query($conn, $query1);	

		$query2 = "INSERT INTO {$second_event} (name, email, college, regno, phno, altphno, parti, combo)";
		$query2.= " VALUES ('{$name}', '{$email}', '{$college}', '{$regno}', '{$phno}', '{$altphno}', {$parti}, '{$combo}')";
		$result2 = mysqli_query($conn, $query2);	

		$query3 = "INSERT INTO {$third_event} (name, email, college, regno, phno, altphno, parti, combo)";
		$query3 .= " VALUES ('{$name}', '{$email}', '{$college}', '{$regno}', '{$phno}', '{$altphno}', {$parti}, '{$combo}')";
		$result3 = mysqli_query($conn, $query3);

		$query = "INSERT INTO combo (name, email, college, regno, phno, altphno, parti, type, price, events)";
		$query .= " VALUES ('{$name}', '{$email}', '{$college}', '{$regno}', '{$phno}', '{$altphno}', {$parti}, 'three', '{$price}', '{$events}')";
		$result = mysqli_query($conn, $query);		

	    if ($result1&&$result2&&$result3&&$result) {
	      	echo"You have succesfully registered for Vibrance16. Please check your email for the details. Your registraion will only be confirmed after you make the payment at our registration desk in VIT.";		
	    } else {
		   	echo"Registration failed.";
	    }    
	}		
?>      	
  
<?php
	if (isset ($conn)){
	  mysqli_close($conn);
	}
?>

