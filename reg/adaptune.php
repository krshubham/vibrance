

  <?php require_once("includes/session.php"); ?>
<?php require_once("includes/db_connection.php"); ?>
<?php require_once("includes/functions.php"); ?>
<?php
$username=$_SESSION['username'];



  $query = "INSERT INTO adaptune (username)";
		$query .= " VALUES ('{$username}')";
		$result = mysqli_query($conn, $query);

        if ($result) {
          	echo"Your account created!";	       	
	    } else {
		   	echo"Profile account failed.";
	    }  
	    ?>      	
   
<?php
if (isset ($conn)){
  mysqli_close($conn);
}
?>

