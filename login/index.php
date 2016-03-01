<?php require_once("../includes/session.php");?>
<?php require_once("../includes/db_connection.php");?>
<?php require_once("../includes/functions.php");?>
<?php require_once("../includes/validation_functions.php"); ?>
<?php
if (logged_in()) {
	redirect_to ("../index.php");
}
?>
<?php
$username = ""; 
if (isset($_POST['submit'])) { 

	$required_fields = array("username", "password");
	validate_presence($required_fields);

	if (empty($errors)) {

		$username = $_POST['username'];
		$password = $_POST['password'];
		$found_user = attempt_login($username, $password);

		if ($found_user) {

			$_SESSION["user_id"] = $found_user["id"];
			$_SESSION["username"] = $found_user["username"];
			redirect_to("../index.php");
		} else {
			$_SESSION["message"] = "Hub ID/password not found.";
		}
	}
} else {

}
?>
<?php
if(isset($_POST['signup'])){

	$required_fields = array("username", "password");
	validate_presence($required_fields);

	$fields_with_max_lengths = array("username" => 30);
	validate_max_lengths($fields_with_max_lengths);

	if (empty($errors)) {

		$name = $_POST['name'];    
		$username = mysql_prep($_POST['username']);  
		$college = $_POST['college'];
		if (isset($_POST['regno'])) {
			$regno = $_POST['regno'];
		} else {
			$regno = "";
		}
		$phno = $_POST['phno'];
		$hashed_password = password_encrypt($_POST['password']);         

		$query = "INSERT INTO users (name, username, college, regno, phno, hashed_password)";
		$query .= " VALUES ('{$name}', '{$username}', '{$college}', '{$regno}', '{$phno}', '{$hashed_password}')";
		$result = mysqli_query($conn, $query);

		if ($result) {
			$_SESSION["message"] = "Your account created!";         
		} else {
			$_SESSION["message"] = "Profile account failed.";
		}         
	}
} 
?>

<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>

	<title>Vibrance</title>
	<link rel="stylesheet" href="style.css" type="text/css" media="all">
	<link rel="stylesheet" href="normalize.css" type="text/css" media="all">
	<link href='http://fonts.googleapis.com/css?family=Roboto:900,900italic,500,400italic,100,700italic,300,700,500italic,100italic,300italic,400' rel='stylesheet' type='text/css'>
	<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.0/jquery.min.js">

<script type="text/javascript">//<![CDATA[ 
	$(window).load(function(){
		$('.form-control').on('focus blur', function (e) {
			$(this).parents('.form-group').toggleClass('focused', (e.type === 'focus' || this.value.length > 0));
		}).trigger('blur');
});//]]>  
</script>
<style type="text/css">
	body{
		overflow: visible;
	}
	.form-group select{
		margin-bottom: -3em;
		margin-top: 4em;
	}
	.form-group select:hover{
		color: white;
		background-color: black;
	}
	.form-group{
		margin: 0.5em;
	}
	form{
		margin-top: -2em;
	}
</style>
</head>  
<body style="height: 100%; overflow: hidden; width: 100% !important;">

	<div id="fback"><div class="girisback"></div><div class="kayitback"></div></div>

	<div id="textbox">
		<div class="toplam">

			<div class="left">
				<div id="ic">
					<h2 style="color: #E85657; margin-top: -2.5em;">Sign Up</h2>
					<form id="girisyap" method="post" action="index.php">
						<div class="yarim sn form-group">
							<label class="control-label" for="inputNormal">Name</label>
							<input type="text" name="name" id="field_1" value="" class="bp-suggestions form-control" cols="50" rows="10" required></input>
						</div>
						<div class="form-group">
							<label class="control-label" for="inputNormal">Email</label>
							<input type="text" name="username" id="signup_email" class="bp-suggestions form-control" cols="50" rows="10" required></input>
						</div>
						<div class="yarim form-group">
							<label class="control-label" for="inputNormal">College</label><br>
							<select id="college-select">
								<option>Vellore Institute of technology</option>
								<option id="other">Other</option>
							</select>
						</div>
						<div class="form-group" style="display: none;" id="col-name">
							<label class="control-label" for="inputNormal">Name of the college</label>
							<input type="text" name="regno" id="signup_password" value="" class="bp-suggestions form-control" cols="50" rows="10"></input>
						</div>
						<div class="form-group">
							<label class="control-label" for="inputNormal">Reg. No(only for VIT students)</label>
							<input type="text" name="regno" id="signup_password" value="" class="bp-suggestions form-control" cols="50" rows="10"></input>
						</div>
						<div class="form-group">
							<label class="control-label" for="inputNormal">Contact Number</label>
							<input type="number" name="phno" id="signup_password" value="" class="bp-suggestions form-control" cols="50" rows="10" required></input>
						</div>
						<div class="form-group soninpt" style="margin-bottom: 0.5em;"> 
							<label class="control-label" for="inputNormal" required>Password</label>
							<input type="password" name="password" id="field_2" class="bp-suggestions form-control" cols="50" rows="10"></input>
						</div>
						<input type="submit" name="signup" id="signup_submit" value="Sign Up" class="girisbtn"  />
					</form>

					<button id="moveright" style="color: #E85657;">Login</button>
				</div>
			</div>

			<div class="right">
				<div id="ic">
					<h2 style="color: #E85657;">Login</h2>
					<form id="girisyap" method="post" action="index.php">

						<div class="form-group">
							<label class="control-label" for="inputNormal">Username</label>
							<input type="text" name="username" class="bp-suggestions form-control" cols="50" rows="10" required></input>
						</div>
						<div class="form-group soninpt">
							<label class="control-label" for="inputNormal">Password</label>
							<input type="password" name="password" class="bp-suggestions form-control" cols="50" rows="10" required></input>
						</div>
						<input type="submit" value="Login" class="girisbtn" tabindex="100" name="submit" />
					</form>

					<button id="moveleft">Sign Up</button>
				</div>
			</div>

		</div>
	</div>
	<script type="text/javascript">
		$("#college-select").click(function(){
			if($("#college-select")[0].selectedIndex==1){
				$("#col-name").fadeIn();
			}
			else{
				$("#col-name").fadeOut();
			}
		});
	</script>
	<script src="script.js"></script>

</body>
</html>
<?php
if (isset ($conn)){
	mysqli_close($conn);
}
?> 