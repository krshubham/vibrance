<?php
	if (isset($_POST['submit'])) {
		$email = "pkpbhardwaj729@gmail.com";
		$message = "hello friend.";
		mail($email, "Confirm your email", $message, "From: cambuzz.vitcc@gmail.com");
		echo "Mail sent to ".$email;
	}
?>
<form action="mail.php" method="post">
	<input type="submit" name="submit" value="submit">
</form>

