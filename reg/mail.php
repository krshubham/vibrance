<?php require_once("includes/session.php"); ?>
<?php require_once("includes/db_connection.php"); ?>
<?php require_once("includes/functions.php"); ?>
<?php
	if (isset($_POST['submit'])) {
		$email = $_SESSION["username"];
		$message = "hello friend.";
		mail($email, 'check', $message);
		echo "Mail sent to ".$email;
	}
?>
<form action="mail.php" method="post">
	<input type="submit" name="submit" value="submit">
</form>
<?php
	if (isset ($conn)){
	  mysqli_close($conn);
	}
?>
