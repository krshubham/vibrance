<?php require_once("includes/session.php"); ?>
<?php require_once("includes/db_connection.php"); ?>
<?php require_once("includes/functions.php"); ?>

<?php
if (isset($_POST['submit'])) {
	$inp = mysqli_real_escape_string($conn, htmlspecialchars($_POST['inp']));
	$query = "INSERT INTO test (inp)";
	$query .= " VALUES ('{$inp}')";
	$result = mysqli_query($conn, $query);  
}
$query = "SELECT * FROM test ORDER BY id DESC";	
$result = mysqli_query($conn, $query);
confirm_query($query);
$location = mysqli_fetch_assoc($result);
echo $location['inp']; 

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
<?php
if (isset ($conn)){
  mysqli_close($conn);
}
?>