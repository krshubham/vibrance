<?php require_once("includes/session.php"); ?>
<?php require_once("includes/db_connection.php"); ?>
<?php require_once("includes/functions.php"); ?>
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
	<title>Event Form</title>
</head>
<body>
<form method="post" action="event_form.php">
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