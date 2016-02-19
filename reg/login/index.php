<?php require_once("../includes/session.php");?>
<?php require_once("../includes/db_connection.php");?>
<?php require_once("../includes/functions.php");?>
<?php require_once("../includes/validation_functions.php"); ?>

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
<!DOCTYPE html>
<html>

<head>
    <meta charset="UTF-8">
    <title>Vibrance</title>
    <link rel="stylesheet" href="css/reset.css">
    <link rel='stylesheet prefetch' href='http://fonts.googleapis.com/css?family=Roboto:400,100,300,500,700,900|RobotoDraft:400,100,300,500,700,900'>
    <link rel='stylesheet prefetch' href='http://maxcdn.bootstrapcdn.com/font-awesome/4.3.0/css/font-awesome.min.css'>
    <link rel="stylesheet" href="css/style.css">
</head>

<body>
    <!-- Mixins-->
    <!-- Pen Title-->
    <div class="pen-title">
        <h1>Vibrance '16</h1><span>Experience the extravaganza!</span>
    </div>
    <div class="container">
        <div class="card"></div>
        <div class="card">
            <h1 class="title">Login</h1>
            <form method="post" action="index.php">
                <div class="input-container">
                    <input type="text" name="username" id="Username" required="required" />
                    <label for="Username">Email</label>
                    <div class="bar"></div>
                </div>
                <div class="input-container">
                    <input type="password" name="password" id="Password" required="required" />
                    <label for="Password">Password</label>
                    <div class="bar"></div>
                </div>
                <div class="button-container">
                    <button><span><input type="submit" name="submit" value="GO"></span></button>
                </div>
            </form>
        </div>
        <div class="card alt">
            <div class="toggle"></div>
            <h1 class="title">Register
      <div class="close"></div>
    </h1>
            <form method="post" action="index.php">
                <div class="input-container">
                    <input type="text" name="name" id="name" required="required" />
                    <label for="Name">Name</label>
                    <div class="bar"></div>
                </div>
                <div class="input-container">
                    <input type="email" name="username" id="Username" required="required" />
                    <label for="Username">Email</label>
                    <div class="bar"></div>
                </div>
                <div class="input-container">
                    <input type="text" name="college" id="college" required="required" />
                    <label for="College">College</label>
                    <div class="bar"></div>
                </div>
                <div class="input-container">
                    <input type="text" name="regno" id="regno" required="required" />
                    <label for="Registration No.">Reg. No. (for VIT students)</label>
                    <div class="bar"></div>
                </div>
                <div class="input-container">
                    <input type="text" name="phno" id="college" required="required" />
                    <label for="Phone Number">Phone Number</label>
                    <div class="bar"></div>
                </div>
                
                <div class="input-container">
                    <input type="password" name="password" id="Password" required="required" />
                    <label for="Password">Password</label>
                    <div class="bar"></div>
                </div>
                <div class="input-container">
                    <input type="password" id="Repeat Password" required="required" />
                    <label for="Repeat Password">Repeat Password</label>
                    <div class="bar"></div>
                </div>
                <div class="button-container">
                    <button><span><input type="submit" name="signup" value="SUBMIT"></span></button>
                </div>
            </form>
        </div>
    </div>
    
    </script>
    <script src='http://cdnjs.cloudflare.com/ajax/libs/jquery/2.1.3/jquery.min.js'></script>
    <script src="js/index.js"></script>
</body>

</html>
<?php
if (isset ($conn)){
  mysqli_close($conn);
}
?>