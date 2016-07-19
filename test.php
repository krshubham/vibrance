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
$name_query = "SELECT * FROM test";
$name_result = mysqli_query($conn, $name_query);
//confirm_query($name_result);
$name_title = mysqli_fetch_assoc($name_result);    

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

	<?php echo $name_title['inp']; echo "heyeye"; ?>
</body>
<script type="text/javascript"></script>
</html>
<?php
if (isset ($conn)){
  mysqli_close($conn);
}
?>