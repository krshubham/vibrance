<?php require_once("includes/session.php"); ?>
<?php require_once("includes/db_connection.php"); ?>
<?php require_once("includes/functions.php"); ?>
<?php
	$email = $_SESSION["username"];
	$message = "hello friend.";
	mail($email, 'check', $message);
?>
<?php
	if (isset ($conn)){
	  mysqli_close($conn);
	}
?>
