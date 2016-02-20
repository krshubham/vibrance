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

	$check_query = "SELECT * FROM {$event} WHERE email = '{$current_user}' ";
	$check_result = mysqli_query($conn, $check_query);
	confirm_query($check_result);
	$check = mysqli_fetch_assoc($check_result);
	if ($check['email']== $email) {
		echo "You have already registered for this event. ";
	} else {

		$message = "Thank You for registering in Vibrance16.. Kindly confirm your registeration by paying at our payment desks in the academic block portico, VIT Chennai Campus.. Regards, Team Vibrance.";
		mail ($email, "Registration for Vibrance16", $message, "From: vibrance2016@gmail.com"); 
		$query = "INSERT INTO {$event} (name, email, college, regno, phno)";
		$query .= " VALUES ('{$name}', '{$email}', '{$college}', '{$regno}', '{$phno}')";
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

