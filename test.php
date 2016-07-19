<?php require_once("includes/session.php"); ?>
<?php require_once("includes/db_connection.php"); ?>
<?php require_once("includes/functions.php"); ?>

<?php
if (isset($_POST['submit'])) {
	$inp = $_POST['inp'];
	$query = "INSERT INTO test (inp)";
	$query .= " VALUES ('{$inp}')";
	$result = mysqli_query($conn, $query);  
}

$check_query = "SELECT * FROM test ";
$check_result = mysqli_query($conn, $check_query);
confirm_query($check_result);
$check = mysqli_fetch_assoc($check_result);
echo $check['inp'];
?>
<!DOCTYPE html>
<html>
<head>
	<title>test</title>
</head>
<body>
	<form method="post" action="test.php">
		<input type="text" name="inp">
		<input type="submit" name="submit" value="submit">
	</form>
</body>
<script type="text/javascript"></script>
</html>