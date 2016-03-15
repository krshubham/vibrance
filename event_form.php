<?php require_once("includes/session.php"); ?>
<?php require_once("includes/db_connection.php"); ?>
<?php require_once("includes/functions.php"); ?>

<?php confirm_admin_logged_in(); ?>

<?php
    $current_user = $_SESSION["username"];
    $name_query = "SELECT * FROM admins WHERE username = '{$current_user}' LIMIT 1";
    $name_result = mysqli_query($conn, $name_query);
    confirm_query($name_result);
    $name_title = mysqli_fetch_assoc($name_result);    
?>

<?php 
	if ($name_title['type']=="super_admin") {
		$view_whole = "";
	} else {
		$view_whole = "style='display: none;'";
	}
?>

<?php
	if (isset($_POST['submit'])) {
		$event = $_POST['event'];


		$query = "INSERT INTO spend (event) VALUES ('{$event}')";
		$result = mysqli_query($conn, $query);	

	    if ($result) {
	      	echo"Done";		
	    } else {

		   	echo"Not done";
	    }
	}
?>

<!DOCTYPE html>
<html>
<head>
	<link rel="icon" href="favicon.png" type="image/x-icon">
	<title>Event Form</title>
</head>

<body <?php echo $view_whole; ?> >
<form action="event_form.php" method="post">
	<input type="text" name="event">
	<input type="submit" name="submit" value="Submit">
</form>
</body>
</html>

<?php

	if (isset ($conn)){
	  mysqli_close($conn);
	}
?>