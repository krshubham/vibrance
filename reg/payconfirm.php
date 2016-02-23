<?php require_once("includes/session.php");?>
<?php require_once("includes/db_connection.php");?>
<?php require_once("includes/functions.php");?>

<?php 
$id = $_GET["id"];
$event = $_GET['event'];
$parti = $_GET['parti'];

$update_query = "UPDATE {$event} SET paid = 1, parti = {$parti} WHERE id = {$id} LIMIT 1";
$update_result = mysqli_query($conn, $update_query);

if ($result && mysqli_affected_rows($conn) == 1) {

	redirect_to("payments.php");
} else {

	redirect_to("payments.php");
}

?>
 