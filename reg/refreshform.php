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
	$event = $_POST['event1'];
	$parti = $_POST['parti1'];

	$check_query = "SELECT * FROM {$event} WHERE email = '{$current_user}' ";
	$check_result = mysqli_query($conn, $check_query);
	confirm_query($check_result);
	$check = mysqli_fetch_assoc($check_result);
	if ($check['email']== $email) {
		echo "You have already registered for this event. ";
	} else {

		require 'PHPMailer-master/PHPMailerAutoload.php';
 
		$mail = new PHPMailer;
		 
		$mail->isSMTP();                                      // Set mailer to use SMTP
		$mail->Host = 'smtp.gmail.com';                       // Specify main and backup server
		$mail->SMTPAuth = true;                               // Enable SMTP authentication
		$mail->Username = 'pkpbhardwaj729@gmail.com';                   // SMTP username
		$mail->Password = 'NayaWala';               // SMTP password
		$mail->SMTPSecure = 'tls';                            // Enable encryption, 'ssl' also accepted
		$mail->Port = 587;                                    //Set the SMTP port number - 587 for authenticated TLS
		$mail->setFrom('pkpbhardwaj729@gmail.com', 'Vibrance Registrations Team');     //Set who the message is to be sent from
		//$mail->addReplyTo('labnol@gmail.com', 'First Last');  //Set an alternative reply-to address
		//$mail->addAddress('prashant.bhardwaj2014@vit.ac.in', 'Josh Adams');  // Add a recipient
		$mail->addAddress("$email");               // Name is optional
		//$mail->addCC('cc@example.com');
		//$mail->addBCC('bcc@example.com');
		$mail->WordWrap = 50;                                 // Set word wrap to 50 characters
		//$mail->addAttachment('/usr/labnol/file.doc');         // Add attachments
		//$mail->addAttachment('/images/image.jpg', 'new.jpg'); // Optional name
		$mail->isHTML(true);                                  // Set email format to HTML
		 
		$mail->Subject = 'Vibrance event registration.';
		$mail->Body    = 'This is the HTML message body <b>in bold!</b>';
		$mail->AltBody = 'This is the body in plain text for non-HTML mail clients';
		 
		//Read an HTML message body from an external file, convert referenced images to embedded,
		//convert HTML into a basic plain-text alternative body
		$mail->msgHTML(file_get_contents('PHPMailer-master/contents.html'), dirname(__FILE__)); 
		
		if(!$mail->send()) {
		   echo 'Message could not be sent.';
		   echo 'Mailer Error: ' . $mail->ErrorInfo;
		   exit;
		}

		$query = "INSERT INTO {$event} (name, email, college, regno, phno, parti)";
		$query .= " VALUES ('{$name}', '{$email}', '{$college}', '{$regno}', '{$phno}', {$parti})";
		$result = mysqli_query($conn, $query);	

	    if ($result) {
	      	echo"You have succesfully registered for Vibrance16. Please check your email for registraion slip. Your registraion will only be confirmed after you make the payment at our registration desk.";		
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

