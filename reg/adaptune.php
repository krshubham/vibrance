<?php require_once("includes/session.php"); ?>
<?php require_once("includes/db_connection.php"); ?>
<?php require_once("includes/functions.php"); ?>

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

	$check_query = "SELECT * FROM adaptune WHERE email = '{$current_user}' ";
	$check_result = mysqli_query($conn, $check_query);
	confirm_query($check_result);
	if ($check_result) {
		echo "You have already registered for this event. ";
	} else {
		$query =$check_title['email']==$email "INSERT INTO adaptune (name, email, college, regno, phno)";
		$query .= " VALUES ('{$name}', '{$email}', '{$college}', '{$regno}', '{$phno}')";
		$result = mysqli_query($conn, $query);

	    if ($result) {
	      	echo"You have succesfully registered for adaptune. Please check your email for registraion slip. Your registraion will only be confirmed after you make the payment at our registration desk.";	       	
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

